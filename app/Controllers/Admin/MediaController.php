<?php
namespace App\Controllers\Admin;

class MediaController {

    public function register() {
        add_filter('attachment_fields_to_edit', [$this, 'addField'], 10, 2);
        add_filter('attachment_fields_to_save', [$this, 'saveField'], 10, 2);
    }

    public function addField($form_fields, $post) {
        $solutions = [
            '' => '-- Không chọn --',
            'GIÁO DỤC & TƯƠNG TÁC' => 'GIÁO DỤC & TƯƠNG TÁC',
            'HỘI HỌP & DOANH NGHIỆP' => 'HỘI HỌP & DOANH NGHIỆP',
            'SỰ KIỆN & SÂN KHẤU' => 'SỰ KIỆN & SÂN KHẤU',
            'QUẢNG CÁO & THƯƠNG HIỆU' => 'QUẢNG CÁO & THƯƠNG HIỆU',
            'F&B & GIẢI TRÍ ĐÊM' => 'F&B & GIẢI TRÍ ĐÊM',
            'GIẢI TRÍ TẠI GIA' => 'GIẢI TRÍ TẠI GIA',
        ];

        $selected = get_post_meta($post->ID, '_tavaled_project_solution', true);

        $html = '<select name="attachments[' . $post->ID . '][_tavaled_project_solution]">';
        foreach ($solutions as $val => $label) {
            $selected_attr = ($selected === $val) ? 'selected' : '';
            $html .= '<option value="' . esc_attr($val) . '" ' . $selected_attr . '>' . esc_html($label) . '</option>';
        }
        $html .= '</select>';

        $form_fields['tavaled_project_solution'] = [
            'label' => 'Giải pháp dự án',
            'input' => 'html',
            'html'  => $html,
            'helps' => 'Chọn giải pháp để phân loại hình ảnh dự án (Dùng cho Trang Chủ).',
        ];

        return $form_fields;
    }

    public function saveField($post, $attachment) {
        if (isset($attachment['_tavaled_project_solution'])) {
            update_post_meta($post['ID'], '_tavaled_project_solution', sanitize_text_field($attachment['_tavaled_project_solution']));
        }
        return $post;
    }
}
