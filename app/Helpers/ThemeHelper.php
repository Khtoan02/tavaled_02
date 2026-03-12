<?php
namespace App\Helpers;

class ThemeHelper {
    /**
     * Lấy giá trị cấu hình doanh nghiệp
     * @param string $key Tên của option (bỏ tiền tố tavaled_ để gọi cho ngắn)
     * @param string $default Giá trị mặc định nếu không có
     * @return string
     */
    public static function getOption($key, $default = '') {
        return get_option('tavaled_' . $key, $default);
    }
}
