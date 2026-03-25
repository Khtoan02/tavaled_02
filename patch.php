<?php
$file = '/Applications/ServBay/www/dawnbridge/wp-content/themes/tavaled_02/app/Views/layouts/header.php';
$content = file_get_contents($file);

// Replace fetch logic
$oldFetch = <<<OLD
// Lấy danh sách menu items cho Giải Pháp Trọn Gói và Về Chúng Tôi
\$locations = get_nav_menu_locations();

\$sol_items = [];
\$about_items = [];

if (isset(\$locations['mega_solutions'])) {
    \$sol_menu = wp_get_nav_menu_object(\$locations['mega_solutions']);
    if (\$sol_menu) {
        \$sol_items = wp_get_nav_menu_items(\$sol_menu->term_id);
    }
}

if (isset(\$locations['mega_about'])) {
    \$about_menu = wp_get_nav_menu_object(\$locations['mega_about']);
    if (\$about_menu) {
        \$about_items = wp_get_nav_menu_items(\$about_menu->term_id);
    }
}
OLD;

$newFetch = <<<NEW
// Lấy danh sách Giải Pháp và Về Chúng Tôi từ Option động Fix cứng
\$mega_custom_data = get_option('tavaled_hardcoded_mega_menu');
\$sol_items = \$mega_custom_data['solutions'] ?? [];
\$about_items = \$mega_custom_data['about'] ?? [];
NEW;

$content = str_replace($oldFetch, $newFetch, $content);

// Replace About HTML
$oldAboutStart = '                                        <?php if (!empty($about_items)): ' . "\n" . '                                            foreach($about_items as $item): ';
$oldAboutFull = substr($content, strpos($content, $oldAboutStart));
$oldAboutFull = substr($oldAboutFull, 0, strpos($oldAboutFull, '                                        <?php endif; ?>') + strlen('                                        <?php endif; ?>'));

$newAboutFull = <<<NEW
                                        <?php if (!empty(\$about_items)): 
                                            foreach(\$about_items as \$item): 
                                                \$icon_class = \$item['icon'] ?? 'ph-fill ph-aperture';
                                                \$slug = \$item['slug'] ?? '#';
                                                \$title = \$item['title'] ?? '';
                                        ?>
                                        <li>
                                            <a href="<?php echo esc_url(\$slug); ?>" class="flex flex-col items-center p-5 rounded-2xl bg-white border border-transparent hover:border-orange-200 hover:bg-orange-50/50 hover:shadow-md hover:-translate-y-1 transition-all duration-300 group/item text-center h-full">
                                                <div class="w-14 h-14 mb-4 bg-blue-50 text-[#1d2857] rounded-full flex items-center justify-center group-hover/item:bg-orange-100 group-hover/item:text-orange-600 transition-all duration-300">
                                                    <?php if(strpos(\$icon_class, '<svg') !== false): ?>
                                                        <?php echo \$icon_class; ?>
                                                    <?php else: ?>
                                                        <i class="<?php echo esc_attr(\$icon_class); ?> text-2xl"></i>
                                                    <?php endif; ?>
                                                </div>
                                                <span class="font-semibold text-gray-700 group-hover/item:text-orange-600"><?php echo esc_html(\$title); ?></span>
                                            </a>
                                        </li>
                                        <?php endforeach; 
                                        endif; ?>
NEW;

$content = str_replace($oldAboutFull, $newAboutFull, $content);

// Replace Solutions HTML
$oldSolStart = '                                    <?php if(!empty($sol_items)):';
$oldSolFull = substr($content, strpos($content, $oldSolStart));
$oldSolFull = substr($oldSolFull, 0, strpos($oldSolFull, '                                    <?php endif; ?>') + strlen('                                    <?php endif; ?>'));

$newSolFull = <<<NEW
                                    <?php if(!empty(\$sol_items)):
                                        foreach(\$sol_items as \$item):
                                            \$image = \$item['image'] ?? 'https://images.unsplash.com/photo-1524178232363-1fb2b07ceb58?q=80&w=600&auto=format&fit=crop';
                                            \$slug = \$item['slug'] ?? '#';
                                            \$title = \$item['title'] ?? '';
                                            \$is_hot = isset(\$item['is_hot']) && \$item['is_hot'] == '1';
                                    ?>
                                    <a href="<?php echo esc_url(\$slug); ?>" class="sol-card">
                                        <div class="sol-card__img-wrap">
                                            <?php if(\$is_hot): ?>
                                                <span class="sol-card__hot">HOT</span>
                                            <?php endif; ?>
                                            <img src="<?php echo esc_url(\$image); ?>"
                                                 onerror="this.onerror=null;this.src='https://placehold.co/600x375/1d2857/FFF?text=TavaLLS';"
                                                 alt="<?php echo esc_attr(\$title); ?>"
                                                 class="sol-card__img">
                                            <div class="sol-card__overlay"></div>
                                            <div class="sol-card__body">
                                                <h4 class="sol-card__title"><?php echo esc_html(\$title); ?></h4>
                                                <div class="sol-card__line"></div>
                                            </div>
                                        </div>
                                    </a>
                                    <?php endforeach;
                                    endif; ?>
NEW;

$content = str_replace($oldSolFull, $newSolFull, $content);

file_put_contents($file, $content);
echo "Patched successfully.\n";
