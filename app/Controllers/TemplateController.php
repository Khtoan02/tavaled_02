<?php

namespace App\Controllers;

if (!defined('ABSPATH')) exit;

class TemplateController
{
    public function register()
    {
        // Thêm các mẫu trang trong thư mục templates vào danh sách của WordPress
        add_filter('theme_page_templates', [$this, 'add_custom_templates']);
    }

    /**
     * Tự động quét và thêm Page Templates từ folder /templates
     */
    public function add_custom_templates($templates)
    {
        $template_directory = get_template_directory() . '/templates/';
        
        if (!is_dir($template_directory)) return $templates;

        $files = scandir($template_directory);
        
        foreach ($files as $file) {
            if ($file === '.' || $file === '..' || substr($file, -4) !== '.php') continue;

            $full_path = $template_directory . $file;
            $file_data = get_file_data($full_path, ['Template Name' => 'Template Name']);

            if (!empty($file_data['Template Name'])) {
                // Key là đường dẫn tương đối từ gốc theme, Value là tên hiển thị
                $templates['templates/' . $file] = $file_data['Template Name'];
            }
        }

        return $templates;
    }
}
