import os
import re

dirs = [
    "/Applications/ServBay/www/wordpress/wp-content/themes/tavaled_02/templates",
    "/Applications/ServBay/www/wordpress/wp-content/themes/tavaled_02/template-parts"
]

def clean_classes(match):
    # Regex to capture the entire img or div tag containing the image URL
    full_tag = match.group(0)
    # Remove filter-related classes
    full_tag = re.sub(r'\b(filter|grayscale|opacity-[a-zA-Z0-9\[\]\.]+|brightness-[a-zA-Z0-9\[\]\.]+|saturate-[a-zA-Z0-9\[\]\.]+|mix-blend-[a-zA-Z0-9\-]+|bg-black[^\s"]*|bg-[\w\[\]\#]+/[0-9]+)\b', '', full_tag)
    # Clean up multiple spaces
    full_tag = re.sub(r'\s+', ' ', full_tag).replace(' class=""', '')
    return full_tag

def remove_overlays(content):
    # 1. Clean the image tags themselves for filter classes
    # Finds <img ... src="...TavaLED_Hinh_Anh.jpg" ... >
    content = re.sub(r'<img[^>]*TavaLED_Hinh_Anh\.jpg[^>]*>', clean_classes, content)
    
    # Also clean elements wrapping or div with inline background
    content = re.sub(r'<div[^>]*style="[^"]*TavaLED_Hinh_Anh\.jpg[^"]*"[^>]*>', clean_classes, content)

    # 2. Remove common overlay divs that follow or precede these images
    # We look for <div class="absolute ... bg-... "></div> or similar
    # This might be tricky, so let's target <div class="absolute inset-0 [^"]*"></div> that contain gradients or black
    overlay_pattern = re.compile(r'\n\s*<div class="absolute [^"]*(bg-gradient|from-|bg-black|inset-0 opacity)[^"]*"></div>')
    content = overlay_pattern.sub('', content)

    # Specific overlays like: <div class="absolute bottom-0 left-0 w-full bg-gradient-to-t ...></div> if they don't contain text.
    # Text-containing overlays shouldn't be blindly removed because they might have titles.
    # We only remove empty divs. Empty divs end in ></div> or >\s*</div>.
    overlay_empty_pattern = re.compile(r'\n\s*<div class="absolute [^"]*(bg-gradient|from-|bg-black)[^"]*">\s*</div>')
    content = overlay_empty_pattern.sub('', content)

    return content

processed = 0

for d in dirs:
    if not os.path.exists(d):
        continue
    for root, _, files in os.walk(d):
        for file in files:
            if file.endswith('.php') or file.endswith('.html'):
                filepath = os.path.join(root, file)
                with open(filepath, 'r', encoding='utf-8') as f:
                    original = f.read()
                
                cleaned = remove_overlays(original)
                
                if cleaned != original:
                    with open(filepath, 'w', encoding='utf-8') as f:
                        f.write(cleaned)
                    print(f"Cleaned overlays in {filepath}")
                    processed += 1

print(f"Total files processed: {processed}")
