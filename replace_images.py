import os
import re

urls = [
    f"https://tavaled.vn/wp-content/uploads/2026/03/{str(i).zfill(4)}_TavaLED_Hinh_Anh.jpg" 
    for i in range(1, 65)
]

dirs = [
    "/Applications/ServBay/www/wordpress/wp-content/themes/tavaled_02/templates",
    "/Applications/ServBay/www/wordpress/wp-content/themes/tavaled_02/template-parts"
]

pattern = re.compile(r'https://images\.unsplash\.com/[^\s"\'<>]+|https://via\.placeholder\.com/[^\s"\'<>]+')

url_index = 0

def process_file(filepath):
    global url_index
    with open(filepath, 'r', encoding='utf-8') as f:
        content = f.read()

    def replacer(match):
        global url_index
        replacement = urls[url_index % len(urls)]
        url_index += 1
        return replacement

    new_content, num_subs = pattern.subn(replacer, content)
    
    if num_subs > 0:
        with open(filepath, 'w', encoding='utf-8') as f:
            f.write(new_content)
        print(f"Replaced {num_subs} URLs in {filepath}")

for d in dirs:
    for root, _, files in os.walk(d):
        for file in files:
            if file.endswith('.php') or file.endswith('.html'):
                process_file(os.path.join(root, file))

print(f"Total replacements made: {url_index}")
