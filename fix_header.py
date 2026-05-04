import os

file_path = '/Applications/ServBay/www/toan.host/wp-content/themes/tavaled_02/app/Views/layouts/header.php'
with open(file_path, 'r') as f:
    content = f.read()

content = content.replace("/danh-muc/man-hinh-led/", "/man-hinh-led/")
content = content.replace("/danh-muc/am-thanh/", "/am-thanh/")
content = content.replace("/danh-muc/anh-sang/", "/anh-sang/")

with open(file_path, 'w') as f:
    f.write(content)
