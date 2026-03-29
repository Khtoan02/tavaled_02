import os
import re

dirs = [
    "/Applications/ServBay/www/wordpress/wp-content/themes/tavaled_02/templates",
    "/Applications/ServBay/www/wordpress/wp-content/themes/tavaled_02/template-parts"
]

def clean_file(filepath):
    with open(filepath, 'r', encoding='utf-8') as f:
        content = f.read()

    # Function to target only lines with the image
    def clean_img_line(match):
        line = match.group(0)
        # Remove Tailwind filter classes including hover variations
        line = re.sub(r'\b(filter|grayscale[^\s"]*|opacity-[a-z0-9\[\]\.]+|brightness-[^\s"]*|saturate-[^\s"]*|mix-blend-[^\s"]*|hover:grayscale[^\s"]*|group-hover:grayscale[^\s"]*|hover:opacity[^\s"]*|group-hover:opacity[^\s"]*|hover:brightness[^\s"]*|group-hover:brightness[^\s"]*|hover:saturate[^\s"]*|group-hover:saturate[^\s"]*)\b', '', line)
        line = re.sub(r'class="\s+', 'class="', line)
        line = re.sub(r'\s+"', '"', line)
        line = re.sub(r'\s+', ' ', line)
        return line

    # 1. Clean Tailwind filters from any parent div or img line containing the image URL
    content = re.sub(r'<[^>]*TavaLED_Hinh_Anh\.jpg[^>]*>', clean_img_line, content)

    # What about parent divs that don't have the image URL in their tag but wrap the image?
    # e.g. <div class="opacity-40 grayscale group-hover:grayscale-0"> <img src="...Hinh_Anh.jpg"> </div>
    # Let's fix lines specifically that have both class="..." and TavaLED_Hinh_Anh on the same line, just in case.
    lines = content.split('\n')
    for i in range(len(lines)):
        if "TavaLED_Hinh_Anh" in lines[i]:
            # Clean that specific line entirely for filter classes
            lines[i] = clean_img_line(re.match(r'.*', lines[i]))
            
            # Also clean the previous line if it's a div wrapper with hover filters (often the case)
            if i > 0 and "<div" in lines[i-1]:
                lines[i-1] = re.sub(r'\b(filter|grayscale[^\s"]*|opacity-[a-z0-9\[\]\.]+|brightness-[^\s"]*|saturate-[^\s"]*|mix-blend-[^\s"]*|hover:grayscale[^\s"]*|group-hover:grayscale[^\s"]*|hover:opacity[^\s"]*|group-hover:opacity[^\s"]*|hover:brightness[^\s"]*|group-hover:brightness[^\s"]*|hover:saturate[^\s"]*|group-hover:saturate[^\s"]*)\b', '', lines[i-1])

    content = '\n'.join(lines)

    # 2. Remove inline CSS filters from style blocks
    # Carefully match filter: ...; avoiding backdrop-filter
    content = re.sub(r'(?<!backdrop-)filter\s*:\s*[^;}]+[;]?', '', content)

    # Remove any extra spaces inside classes
    content = re.sub(r' class="\s+', ' class="', content)

    with open(filepath, 'w', encoding='utf-8') as f:
        f.write(content)
    
for d in dirs:
    if os.path.exists(d):
        for root, _, files in os.walk(d):
            for file in files:
                if file.endswith('.php') or file.endswith('.html'):
                    filepath = os.path.join(root, file)
                    clean_file(filepath)

print("Finished cleaning hover filters and inline styles.")
