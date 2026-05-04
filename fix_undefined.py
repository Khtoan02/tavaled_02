import re

file_path = '/Applications/ServBay/www/toan.host/wp-content/themes/tavaled_02/templates/template-products.php'
with open(file_path, 'r') as f:
    content = f.read()

# Define the block we want to extract
start_marker = "// 1. Hardcoded configs for the BIG 3 (to preserve their custom logic and SEO text)"
end_marker = "$dynamic_data = [];"

# Find the indices
start_idx = content.find(start_marker)
end_idx = content.find(end_marker)

if start_idx != -1 and end_idx != -1:
    # Extract the block
    block_to_move = content[start_idx:end_idx].strip()
    
    # Remove the block from its original location
    # Note: we also remove the <?php tag that precedes it if it's right before it
    before_block = content[:start_idx]
    if before_block.strip().endswith('<?php'):
        # It's inside a PHP tag, let's keep the tag
        pass
        
    content = content[:start_idx] + "\n// Moved to top\n\n" + content[end_idx:]
    
    # Now insert the block right after get_header(); ?>
    insert_marker = "get_header(); ?>"
    insert_idx = content.find(insert_marker)
    if insert_idx != -1:
        insert_pos = insert_idx + len(insert_marker)
        
        new_block = "\n\n<?php\n" + block_to_move + "\n?>\n"
        content = content[:insert_pos] + new_block + content[insert_pos:]
        
    with open(file_path, 'w') as f:
        f.write(content)
        print("Success")
else:
    print("Could not find markers")
