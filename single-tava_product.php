<?php
/**
 * Single Product Template for tava_product
 */
get_header();

// Dữ liệu sản phẩm hiện tại
$post_id = get_the_ID();
$title = get_the_title();

// Meta cơ bản
$model = get_post_meta($post_id, '_product_model', true) ?: 'TVC-' . rand(1000, 9999);
$img_fallback = 'https://placehold.co/900x900/fff8f6/f05a25?text=Updating...';
$product_img = get_post_meta($post_id, '_product_img', true);
$thumbnail_url = has_post_thumbnail($post_id) ? get_the_post_thumbnail_url($post_id, 'full') : (!empty($product_img) ? $product_img : $img_fallback);

// Dynamic Meta for bulk import
$gallery_raw = get_post_meta($post_id, '_product_gallery', true);
$gallery_imgs = [];
if (is_array($gallery_raw)) {
    $gallery_imgs = $gallery_raw;
} elseif (!empty($gallery_raw) && is_string($gallery_raw)) {
    $gallery_imgs = array_map('trim', explode('|', $gallery_raw));
}
$overview = get_post_meta($post_id, '_product_overview', true) ?: get_post_meta($post_id, 'tong_quan', true);
$specs = get_post_meta($post_id, '_product_specs', true) ?: get_post_meta($post_id, 'thong_so_ky_thuat', true);
$install_info = get_post_meta($post_id, '_product_install_info', true) ?: get_post_meta($post_id, 'thong_tin_lap_dat', true);
$faq = get_post_meta($post_id, '_product_faq', true);

// Phân loại
$terms_cat = wp_get_post_terms($post_id, 'product_cat');
$cat_name = (!is_wp_error($terms_cat) && !empty($terms_cat)) ? $terms_cat[0]->name : 'Danh mục chung';
$cat_url_raw = (!is_wp_error($terms_cat) && !empty($terms_cat)) ? get_term_link($terms_cat[0]) : '';
$cat_url = (!is_wp_error($cat_url_raw) && !empty($cat_url_raw)) ? $cat_url_raw : home_url('/tat-ca-san-pham');

$terms_sub = wp_get_post_terms($post_id, 'product_subcat');
$subcat_name = (!is_wp_error($terms_sub) && !empty($terms_sub)) ? $terms_sub[0]->name : $cat_name;

$terms_spec = wp_get_post_terms($post_id, 'product_spec');
$spec_name = (!is_wp_error($terms_spec) && !empty($terms_spec)) ? $terms_spec[0]->name : 'Tiêu chuẩn';

$terms_brand = wp_get_post_terms($post_id, 'product_brand');
$brand_name = (!is_wp_error($terms_brand) && !empty($terms_brand)) ? $terms_brand[0]->name : 'TavaLLS';

?>

<style>
    /* ══════════════════════════════════
   RESET & VARIABLES
══════════════════════════════════ */
    #tava-single-product {
        --orange: #f05a25;
        --orange-dk: #c8451a;
        --orange-lt: #fde8df;
        --orange-xlt: #fff4f0;
        --bg: #fff8f6;
        --white: #ffffff;
        --ink: #1c2857;
        /* Change from dark gray to selected navy color */
        --mid: #374151;
        /* Dark gray for mid-text */
        --muted: #6b7280;
        --light: #9ca3af;
        --border: #eeddd6;
        --border-lt: #f5e8e2;

        font-family: var(--font-body);
        color: var(--ink);
        font-size: 14px;
        line-height: 1.65;
        background: var(--bg);
        padding-bottom: 50px;
    }

    #tava-single-product *,
    #tava-single-product *::before,
    #tava-single-product *::after {
        box-sizing: border-box;
    }

    /* ══════════════════════════════════
   PROGRESS BAR
══════════════════════════════════ */
    .progress-bar {
        position: fixed;
        top: 0;
        left: 0;
        height: 3px;
        background: linear-gradient(90deg, var(--orange), var(--orange-dk));
        width: 0%;
        z-index: 9999;
        transition: width .1s linear;
        box-shadow: 0 0 8px rgba(240, 90, 37, .45);
    }

    /* ══════════════════════════════════
   BREADCRUMB
══════════════════════════════════ */
    .breadcrumb-container {
        background: var(--bg);
    }

    .sp-breadcrumb {
        max-width: 1600px;
        margin: 0 auto;
        padding: 16px 32px 32px;
        display: flex;
        align-items: center;
        gap: 8px;
        font-size: 12px;
        color: var(--muted);
    }

    .sp-breadcrumb a {
        color: var(--muted);
        text-decoration: none;
        transition: color .2s;
    }

    .sp-breadcrumb a:hover {
        color: var(--orange);
    }

    .sp-breadcrumb__sep {
        color: var(--light);
        font-size: 10px;
    }

    .sp-breadcrumb__cur {
        color: var(--ink);
        font-weight: 500;
    }

    /* ══════════════════════════════════
   PRODUCT LAYOUT
══════════════════════════════════ */
    .product-wrap {
        max-width: 1600px;
        margin: 0 auto;
        padding: 0 32px 80px;
        display: grid;
        grid-template-columns: 1fr 480px;
        gap: 56px;
        align-items: start;
    }

    /* ══════════════════════════════════
   LEFT — IMAGE GALLERY
══════════════════════════════════ */
    .gallery-strip {
        display: none;
    }

    .gallery-item {
        border-radius: 12px;
        overflow: hidden;
        background: var(--white);
        border: 1px solid var(--border-lt);
        position: relative;
        margin-bottom: 14px;
    }

    .gallery-item:last-child {
        margin-bottom: 0;
    }

    .gallery-item img {
        width: 100%;
        height: auto;
        object-fit: contain;
        object-position: center;
        max-height: 800px;
        display: block;
        filter: saturate(.86);
        transition: filter .4s, transform .55s cubic-bezier(.16, 1, .3, 1);
    }

    .gallery-item:hover img {
        filter: saturate(1);
        transform: scale(1.025);
    }

    .gallery-item__badge {
        position: absolute;
        top: 14px;
        left: 14px;
        background: var(--orange);
        color: #fff;
        font-size: 9.5px;
        font-weight: 700;
        letter-spacing: 0.13em;
        text-transform: uppercase;
        padding: 4px 11px;
        border-radius: 4px;
        z-index: 2;
        box-shadow: 0 2px 10px rgba(240, 90, 37, .35);
    }

    .gallery-item__caption {
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        padding: 40px 20px 16px;
        background: linear-gradient(transparent, rgba(17, 24, 39, .62));
        color: rgba(255, 255, 255, .85);
        font-size: 12px;
        font-weight: 500;
        letter-spacing: 0.03em;
        line-height: 1.5;
    }

    .gallery-item__num {
        position: absolute;
        top: 14px;
        right: 14px;
        background: rgba(17, 24, 39, .52);
        backdrop-filter: blur(6px);
        color: rgba(255, 255, 255, .75);
        font-size: 10px;
        font-weight: 700;
        letter-spacing: 0.1em;
        padding: 4px 10px;
        border-radius: 20px;
        z-index: 2;
    }

    /* MOBILE CAROUSEL */
    @media (max-width: 860px) {
        .gallery-carousel {
            position: relative;
            overflow: hidden;
            border-radius: 12px;
            border: 1px solid var(--border-lt);
            background: var(--white);
        }

        .gallery-item {
            display: none;
            border-radius: 0;
            border: none;
            margin-bottom: 0;
        }

        .gallery-item.carousel-active {
            display: block;
        }

        .gallery-item img {
            height: auto;
            max-height: 400px;
        }

        .carousel-btn,
        .carousel-dots {
            display: flex;
        }
    }

    .carousel-btn {
        display: none;
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        width: 40px;
        height: 40px;
        background: rgba(255, 255, 255, .88);
        backdrop-filter: blur(8px);
        border: 1px solid var(--border);
        border-radius: 50%;
        cursor: pointer;
        align-items: center;
        justify-content: center;
        z-index: 10;
        transition: background .2s, border-color .2s, transform .2s;
        box-shadow: 0 2px 12px rgba(17, 24, 39, .12);
    }

    .carousel-btn:hover {
        background: var(--white);
        border-color: var(--orange);
        transform: translateY(-50%) scale(1.08);
    }

    .carousel-btn svg {
        width: 16px;
        height: 16px;
        stroke: var(--ink);
        fill: none;
        stroke-width: 2;
    }

    .carousel-btn:hover svg {
        stroke: var(--orange);
    }

    .carousel-btn--prev {
        left: 12px;
    }

    .carousel-btn--next {
        right: 12px;
    }

    .carousel-dots {
        display: none;
        justify-content: center;
        gap: 6px;
        padding: 12px 0 4px;
    }

    .carousel-dot {
        width: 6px;
        height: 6px;
        border-radius: 50%;
        background: var(--border);
        border: none;
        cursor: pointer;
        transition: background .2s, transform .2s, width .2s;
        padding: 0;
    }

    .carousel-dot.active {
        background: var(--orange);
        width: 18px;
        border-radius: 3px;
    }

    /* ══════════════════════════════════
   RIGHT — STICKY INFO PANEL
══════════════════════════════════ */
    .product-info {
        position: sticky;
        top: 160px;
        display: flex;
        flex-direction: column;
        gap: 0;
    }

    .prod-category {
        display: inline-flex;
        align-items: center;
        gap: 7px;
        font-size: 10.5px;
        font-weight: 700;
        letter-spacing: 0.16em;
        text-transform: uppercase;
        color: var(--orange);
        margin-bottom: 10px;
    }

    .prod-category::before {
        content: '';
        display: inline-block;
        width: 20px;
        height: 1.5px;
        background: var(--orange);
        border-radius: 2px;
    }

    .prod-name {
        font-family: var(--font-heading);
        font-weight: 700;
        font-size: 2.1rem;
        line-height: 1.12;
        letter-spacing: -0.025em;
        color: var(--ink);
        margin-bottom: 6px;
    }

    .prod-model {
        font-size: 11.5px;
        color: var(--muted);
        font-weight: 500;
        margin-bottom: 20px;
        letter-spacing: 0.04em;
    }

    .prod-model span {
        color: var(--ink);
        font-weight: 600;
    }

    .prod-div {
        height: 1px;
        background: linear-gradient(90deg, var(--border), transparent);
        margin: 20px 0;
    }

    .prod-rating {
        display: flex;
        align-items: center;
        gap: 10px;
        margin-bottom: 20px;
    }

    .stars {
        display: flex;
        gap: 2px;
    }

    .star {
        width: 15px;
        height: 15px;
        fill: var(--orange);
        stroke: none;
    }

    .star--empty {
        fill: var(--border);
    }

    .prod-rating__count {
        font-size: 12px;
        color: var(--muted);
        font-weight: 500;
    }

    .prod-rating__reviews {
        font-size: 12px;
        color: var(--orange);
        font-weight: 600;
        cursor: pointer;
        border-bottom: 1px solid rgba(240, 90, 37, .3);
    }

    .prod-specs-pills {
        display: flex;
        flex-wrap: wrap;
        gap: 7px;
        margin-bottom: 22px;
    }

    .spec-pill {
        display: inline-flex;
        align-items: center;
        gap: 5px;
        background: var(--white);
        border: 1px solid var(--border);
        border-radius: 6px;
        padding: 5px 11px;
        font-size: 12px;
        color: var(--mid);
        font-weight: 500;
    }

    .spec-pill__label {
        font-size: 10px;
        color: var(--muted);
        font-weight: 600;
        letter-spacing: 0.08em;
        text-transform: uppercase;
    }

    .spec-pill__val {
        color: var(--ink);
        font-weight: 700;
    }

    .prod-desc {
        font-size: 13.5px;
        color: var(--mid);
        line-height: 1.75;
        margin-bottom: 24px;
    }

    .prod-desc strong {
        color: var(--ink);
        font-weight: 600;
    }

    .prod-variants-label {
        font-size: 11px;
        font-weight: 700;
        letter-spacing: 0.1em;
        text-transform: uppercase;
        color: var(--muted);
        margin-bottom: 10px;
    }

    .prod-variants {
        display: flex;
        gap: 8px;
        flex-wrap: wrap;
        margin-bottom: 24px;
    }

    .variant-btn {
        padding: 7px 15px;
        border-radius: 7px;
        border: 1.5px solid var(--border);
        background: var(--white);
        color: var(--mid);
        font-size: 12.5px;
        font-weight: 600;
        cursor: pointer;
        transition: border-color .2s, color .2s, background .2s;
    }

    .variant-btn:hover {
        border-color: var(--orange);
        color: var(--orange);
    }

    .variant-btn.active {
        border-color: var(--orange);
        background: var(--orange-xlt);
        color: var(--orange);
    }

    .prod-cta {
        display: flex;
        flex-direction: column;
        gap: 10px;
        margin-bottom: 22px;
    }

    .btn-primary-sp {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 9px;
        width: 100%;
        padding: 16px 24px;
        background: linear-gradient(135deg, var(--orange), var(--orange-dk));
        color: #fff;
        font-size: 14.5px;
        font-weight: 700;
        letter-spacing: 0.04em;
        border: none;
        border-radius: 12px;
        cursor: pointer;
        text-decoration: none;
        transition: all .3s cubic-bezier(.16, 1, .3, 1);
        box-shadow: 0 8px 24px -6px rgba(240, 90, 37, .4);
        position: relative;
        overflow: hidden;
    }

    .btn-primary-sp::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 50%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, .2), transparent);
        transform: skewX(-20deg);
        transition: left .5s;
    }

    .btn-primary-sp:hover {
        transform: translateY(-3px);
        box-shadow: 0 12px 32px -8px rgba(240, 90, 37, .5);
    }

    .btn-primary-sp:hover::before {
        left: 150%;
    }

    .btn-primary-sp:active {
        transform: translateY(-1px);
        box-shadow: 0 4px 16px -4px rgba(240, 90, 37, .4);
    }

    .btn-primary-sp svg {
        width: 18px;
        height: 18px;
        stroke: #fff;
        fill: none;
        stroke-width: 2.2;
        flex-shrink: 0;
    }

    .cskh-dropdown-wrapper {
        position: relative;
        margin-bottom: 24px;
        z-index: 50;
    }

    .cskh-dropdown-menu {
        position: absolute;
        top: calc(100% + 8px);
        left: 0;
        right: 0;
        background: var(--white);
        border: 1px solid rgba(0, 0, 0, 0.08);
        border-radius: 12px;
        box-shadow: 0 16px 40px -12px rgba(17, 24, 39, 0.15);
        opacity: 0;
        visibility: hidden;
        transform: translateY(-10px);
        transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
        max-height: 380px;
        overflow-y: auto;
    }

    .cskh-dropdown-menu::-webkit-scrollbar {
        width: 6px;
    }

    .cskh-dropdown-menu::-webkit-scrollbar-thumb {
        background: #d1d5db;
        border-radius: 3px;
    }

    .cskh-dropdown-wrapper:hover .cskh-dropdown-menu,
    .cskh-dropdown-wrapper:focus-within .cskh-dropdown-menu {
        opacity: 1;
        visibility: visible;
        transform: translateY(0);
    }

    .cskh-dropdown-wrapper:hover .dropdown-chevron {
        transform: rotate(180deg);
    }

    .cskh-dropdown-item {
        display: flex;
        align-items: center;
        gap: 12px;
        padding: 14px 16px;
        border-bottom: 1px solid var(--border-lt);
        transition: background 0.2s;
    }

    .cskh-dropdown-item:last-child {
        border-bottom: none;
    }

    .cskh-dropdown-item:hover {
        background: #fafafb;
    }

    .cskh-dropdown-avatar {
        width: 42px;
        height: 42px;
        border-radius: 50%;
        border: 2px solid var(--orange-lt);
        overflow: hidden;
        flex-shrink: 0;
    }

    .cskh-dropdown-avatar img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .cskh-dropdown-info {
        flex: 1;
        min-width: 0;
    }

    .cskh-dropdown-role {
        font-size: 9px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.1em;
        color: var(--muted);
        margin-bottom: 2px;
    }

    .cskh-dropdown-name {
        font-size: 13px;
        font-weight: 700;
        color: var(--ink);
        margin-bottom: 2px;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .cskh-dropdown-phone {
        font-family: var(--font-heading);
        font-size: 1.05rem;
        font-weight: 800;
        color: var(--orange);
        letter-spacing: -0.01em;
    }

    .cskh-action-btns {
        display: flex;
        gap: 6px;
    }

    .cskh-action-btn {
        width: 34px;
        height: 34px;
        border-radius: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
        text-decoration: none;
        transition: transform 0.2s, background 0.2s;
        flex-shrink: 0;
    }

    .cskh-btn-zalo {
        background: #e8f4fc;
        color: #0088ff;
    }

    .cskh-btn-zalo:hover {
        background: #0088ff;
        color: #fff;
        transform: scale(1.1);
    }

    .cskh-btn-call {
        background: var(--orange-xlt);
        color: var(--orange);
    }

    .cskh-btn-call:hover {
        background: var(--orange);
        color: #fff;
        transform: scale(1.1);
    }

    .btn-secondary-sp {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 9px;
        width: 100%;
        padding: 15px 24px;
        background: var(--white);
        color: var(--ink);
        font-size: 14.5px;
        font-weight: 700;
        letter-spacing: 0.03em;
        border: 1.5px solid var(--border);
        border-radius: 12px;
        cursor: pointer;
        text-decoration: none;
        transition: all .3s cubic-bezier(.16, 1, .3, 1);
    }

    .btn-secondary-sp:hover {
        border-color: var(--orange);
        color: var(--orange);
        background: var(--orange-xlt);
        transform: translateY(-2px);
        box-shadow: 0 8px 24px -8px rgba(240, 90, 37, .15);
    }

    .btn-secondary-sp svg {
        width: 17px;
        height: 17px;
        stroke: currentColor;
        fill: none;
        stroke-width: 2.2;
        flex-shrink: 0;
    }

    .commitment-box {
        background: var(--white);
        border: 1px solid rgba(0, 0, 0, .04);
        border-radius: 12px;
        overflow: hidden;
        margin-bottom: 24px;
        box-shadow: 0 4px 24px -8px rgba(17, 24, 39, .04);
    }

    .commitment-box__head {
        background: var(--ink);
        padding: 14px 20px;
        display: flex;
        align-items: center;
        gap: 9px;
        position: relative;
        overflow: hidden;
    }

    .commitment-box__head::after {
        content: '';
        position: absolute;
        left: 0;
        top: 0;
        bottom: 0;
        width: 4px;
        background: var(--orange);
    }

    .commitment-box__head-title {
        font-size: 11px;
        font-weight: 700;
        letter-spacing: 0.16em;
        text-transform: uppercase;
        color: rgba(255, 255, 255, .9);
        margin-left: 4px;
    }

    .commitment-list {
        list-style: none;
        padding: 4px 0;
        margin: 0;
    }

    .commitment-list li {
        display: flex;
        align-items: center;
        gap: 12px;
        padding: 12px 20px;
        border-bottom: 1px solid var(--border-lt);
        transition: background .2s;
    }

    .commitment-list li:last-child {
        border-bottom: none;
    }

    .commitment-list li:hover {
        background: #fafafb;
    }

    .commit-icon {
        width: 8px;
        height: 8px;
        border-radius: 50%;
        background: var(--orange);
        flex-shrink: 0;
        opacity: 0.8;
    }

    .commit-title {
        font-size: 13.5px;
        font-weight: 600;
        color: var(--ink);
    }

    .contact-strip {
        display: flex;
        align-items: center;
        gap: 10px;
        background: var(--orange-xlt);
        border: 1px solid var(--orange-lt);
        border-radius: 8px;
        padding: 12px 16px;
        margin-bottom: 20px;
    }

    .contact-strip__icon {
        width: 34px;
        height: 34px;
        border-radius: 50%;
        background: var(--orange);
        flex-shrink: 0;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .contact-strip__icon svg {
        width: 16px;
        height: 16px;
        stroke: #fff;
        fill: none;
        stroke-width: 2;
    }

    .contact-strip__label {
        font-size: 10.5px;
        font-weight: 600;
        letter-spacing: 0.08em;
        text-transform: uppercase;
        color: var(--orange);
        margin-bottom: 1px;
    }

    .contact-strip__number {
        font-family: var(--font-heading);
        font-size: 1.15rem;
        font-weight: 700;
        color: var(--ink);
        letter-spacing: -0.01em;
    }

    .prod-share {
        display: flex;
        align-items: center;
        gap: 8px;
        padding-top: 16px;
        border-top: 1px solid var(--border-lt);
    }

    .prod-share__label {
        font-size: 11px;
        font-weight: 600;
        letter-spacing: 0.1em;
        text-transform: uppercase;
        color: var(--muted);
    }

    .share-btn {
        width: 32px;
        height: 32px;
        border-radius: 7px;
        border: 1.5px solid var(--border);
        background: var(--white);
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        text-decoration: none;
        transition: border-color .2s, background .2s, transform .15s;
    }

    .share-btn:hover {
        border-color: var(--orange);
        background: var(--orange-xlt);
        transform: translateY(-2px);
    }

    .share-btn svg {
        width: 14px;
        height: 14px;
        stroke: var(--mid);
        fill: none;
        stroke-width: 1.8;
    }

    .share-btn:hover svg {
        stroke: var(--orange);
    }

    /* ══════════════════════════════════
   DETAIL TABS
══════════════════════════════════ */
    .prod-detail {
        max-width: 1600px;
        margin: 0 auto;
        padding: 0 32px 80px;
    }

    .tabs-nav {
        display: inline-flex;
        gap: 6px;
        background: rgba(0, 0, 0, .03);
        padding: 6px;
        border-radius: 12px;
        margin-bottom: 40px;
        border: 1px solid rgba(0, 0, 0, .03);
    }

    .tab-btn {
        padding: 10px 24px;
        font-size: 13.5px;
        font-weight: 600;
        color: var(--muted);
        cursor: pointer;
        border: none;
        background: transparent;
        border-radius: 8px;
        letter-spacing: 0.02em;
        transition: all .3s cubic-bezier(.16, 1, .3, 1);
    }

    .tab-btn.active {
        color: var(--orange);
        background: var(--white);
        box-shadow: 0 4px 16px -4px rgba(17, 24, 39, .1);
        font-weight: 700;
    }

    .tab-btn:hover:not(.active) {
        color: var(--ink);
        background: rgba(0, 0, 0, .02);
    }

    .tab-panel {
        display: none;
        animation: fadeUp .4s cubic-bezier(.16, 1, .3, 1);
    }

    .tab-panel.active {
        display: block;
    }

    .specs-section-title {
        font-family: var(--font-heading);
        font-weight: 700;
        font-size: 1.3rem;
        color: var(--ink);
        margin-bottom: 16px;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .specs-section-title::after {
        content: '';
        flex: 1;
        height: 1px;
        background: var(--border);
    }

    /* Bảng thông số kỹ thuật (Cấu trúc tối giản, chuyên nghiệp) */
    .desc-content table {
        width: 100% !important;
        border-collapse: collapse;
        border: 1px solid #e5e7eb;
        margin: 16px 0 24px;
        background: var(--white);
        display: block;
        overflow-x: auto;
    }

    .desc-content table th,
    .desc-content table td {
        padding: 10px 14px;
        font-size: 13.5px;
        color: var(--ink);
        border: 1px solid #e5e7eb;
        text-align: left;
        vertical-align: top;
        line-height: 1.5;
        min-width: 120px;
    }

    .desc-content table th {
        background: #f9fafb;
        font-weight: 700;
        text-transform: uppercase;
        font-size: 12.5px;
        letter-spacing: 0.03em;
        color: #4b5563;
    }

    /* Cột 1 bảng (tên thông số) - In đậm và nền xám nhạt */
    .desc-content table tbody td:first-child {
        width: 30%;
        font-weight: 600;
        background: #fcfcfd;
        color: #374151;
    }

    .desc-content table tbody td:nth-child(2) {
        color: #4b5563;
        font-weight: 500;
    }

    .desc-content table tbody tr:hover td {
        background: #f9fafb;
    }

    .desc-content h2 {
        font-family: var(--font-heading);
        font-weight: 800;
        font-size: 1.6rem;
        color: var(--ink);
        margin: 36px 0 16px;
        position: relative;
        padding-left: 18px;
        letter-spacing: -0.01em;
    }

    .desc-content h2::before {
        content: '';
        position: absolute;
        left: 0;
        top: 4px;
        bottom: 4px;
        width: 4px;
        background: var(--orange);
        border-radius: 4px;
    }

    .desc-content h3 {
        font-family: var(--font-heading);
        font-weight: 700;
        font-size: 1.35rem;
        color: var(--ink);
        margin: 28px 0 12px;
        position: relative;
        padding-left: 14px;
    }

    .desc-content h3::before {
        content: '';
        position: absolute;
        left: 0;
        top: 4px;
        bottom: 4px;
        width: 3px;
        background: var(--orange);
        border-radius: 3px;
        opacity: 0.8;
    }

    .desc-content h4 {
        font-family: var(--font-heading);
        font-weight: 700;
        font-size: 1.15rem;
        color: var(--ink);
        margin: 24px 0 10px;
    }

    .desc-content h5 {
        font-family: var(--font-heading);
        font-weight: 600;
        font-size: 1.05rem;
        color: var(--ink);
        margin: 20px 0 8px;
    }

    .desc-content p {
        font-size: 14.5px;
        color: var(--mid);
        line-height: 1.8;
        margin-bottom: 18px;
    }

    .desc-content img,
    .desc-content figure img {
        display: block;
        width: 100% !important;
        max-width: 100% !important;
        height: auto !important;
        aspect-ratio: 16 / 9 !important;
        object-fit: cover !important;
        border-radius: 12px;
        margin: 42px auto !important;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.06);
    }

    .desc-content figure {
        max-width: 100% !important;
        margin: 42px 0;
        overflow: hidden;
    }

    .desc-content iframe,
    .desc-content video {
        width: 100% !important;
        max-width: 100% !important;
        aspect-ratio: 16 / 9;
        border-radius: 12px;
        margin: 42px 0;
    }

    .desc-content ul {
        list-style: none;
        margin-bottom: 18px;
        padding: 0;
    }

    .desc-content ul li {
        padding: 8px 0 8px 24px;
        position: relative;
        font-size: 14px;
        color: var(--mid);
        line-height: 1.65;
        border-bottom: 1px solid var(--border-lt);
    }

    .desc-content ul li:last-child {
        border-bottom: none;
    }

    .desc-content ul li::before {
        content: '';
        position: absolute;
        left: 0;
        top: 16px;
        width: 8px;
        height: 8px;
        border-radius: 50%;
        background: var(--orange);
        opacity: .65;
    }



    /* ══════════════════════════════════
   RELATED PRODUCTS
══════════════════════════════════ */
    .related-products {
        max-width: 1600px;
        margin: 0 auto;
        padding: 0 32px 80px;
    }

    .rel-head {
        display: flex;
        align-items: flex-end;
        justify-content: space-between;
        margin-bottom: 28px;
    }

    .rel-eyebrow {
        font-size: 10.5px;
        font-weight: 600;
        letter-spacing: 0.2em;
        text-transform: uppercase;
        color: var(--orange);
        opacity: .8;
        margin-bottom: 6px;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .rel-eyebrow::before {
        content: '';
        display: inline-block;
        width: 22px;
        height: 1.5px;
        background: var(--orange);
    }

    .rel-title {
        font-family: var(--font-heading);
        font-weight: 700;
        font-size: 2rem;
        letter-spacing: -0.02em;
        color: var(--ink);
        margin-bottom: 0;
    }

    .rel-title em {
        font-style: italic;
        color: var(--orange);
    }

    .rel-more {
        font-size: 11.5px;
        font-weight: 600;
        color: var(--muted);
        text-decoration: none;
        letter-spacing: 0.08em;
        text-transform: uppercase;
        border-bottom: 1.5px solid var(--border-lt);
        padding-bottom: 1px;
        transition: color .2s, border-color .2s;
    }

    .rel-more:hover {
        color: var(--orange);
        border-color: var(--orange);
    }

    .rel-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 24px;
    }

    .prod-card-sp {
        background: var(--white);
        border-radius: 14px;
        overflow: hidden;
        border: 1px solid rgba(0, 0, 0, .05);
        transition: all .4s cubic-bezier(.16, 1, .3, 1);
        cursor: pointer;
        text-decoration: none;
        display: flex;
        flex-direction: column;
    }

    .prod-card-sp:hover {
        transform: translateY(-6px);
        box-shadow: 0 24px 48px -12px rgba(17, 24, 39, .08);
        border-color: rgba(240, 90, 37, .2);
    }

    .prod-card-sp__thumb {
        position: relative;
        overflow: hidden;
        flex-shrink: 0;
        aspect-ratio: 4/3;
        background: #fafafb;
    }

    .prod-card-sp__thumb img {
        width: 100%;
        height: 100%;
        object-fit: contain;
        object-position: center;
        display: block;
        mix-blend-mode: multiply;
        transition: transform .65s cubic-bezier(.16, 1, .3, 1);
    }

    .prod-card-sp:hover .prod-card-sp__thumb img {
        transform: scale(1.05);
    }

    .prod-card-sp__cat {
        position: absolute;
        top: 12px;
        left: 12px;
        background: rgba(255, 255, 255, .9);
        backdrop-filter: blur(8px);
        color: var(--mid);
        font-size: 9px;
        font-weight: 700;
        letter-spacing: 0.13em;
        text-transform: uppercase;
        padding: 4px 10px;
        border-radius: 6px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, .04);
    }

    .prod-card-sp__body {
        padding: 20px;
        flex: 1;
        display: flex;
        flex-direction: column;
    }

    .prod-card-sp__name {
        font-family: var(--font-heading);
        font-weight: 700;
        font-size: 1.1rem;
        line-height: 1.3;
        color: var(--ink);
        margin-bottom: 8px;
        transition: color .2s;
    }

    .prod-card-sp:hover .prod-card-sp__name {
        color: var(--orange);
    }

    .prod-card-sp__model {
        font-size: 11.5px;
        color: var(--muted);
        margin-bottom: 16px;
        font-weight: 500;
    }

    .prod-card-sp__foot {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-top: auto;
        padding-top: 14px;
        border-top: 1px dashed var(--border);
    }

    .prod-card-sp__cta {
        font-size: 11.5px;
        font-weight: 700;
        color: var(--orange);
        text-decoration: none;
        letter-spacing: 0.05em;
        text-transform: uppercase;
        display: flex;
        align-items: center;
        gap: 4px;
        transition: gap .2s;
    }

    .prod-card-sp__cta::after {
        content: '→';
        font-size: 14px;
    }

    .prod-card-sp:hover .prod-card-sp__cta {
        gap: 8px;
    }

    .prod-card-sp__tag {
        font-size: 10.5px;
        font-weight: 600;
        color: var(--muted);
        background: #f3f4f6;
        padding: 4px 10px;
        border-radius: 6px;
    }

    /* ANIMATIONS */
    @keyframes fadeUp {
        from {
            opacity: 0;
            transform: translateY(18px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .anim {
        opacity: 0;
        animation: fadeUp .65s cubic-bezier(.16, 1, .3, 1) forwards;
    }

    .d1 {
        animation-delay: .05s
    }

    .d2 {
        animation-delay: .12s
    }

    .d3 {
        animation-delay: .18s
    }

    .d4 {
        animation-delay: .24s
    }

    /* RESPONSIVE */
    @media (max-width: 1100px) {
        .product-wrap {
            grid-template-columns: 1fr 400px;
            gap: 40px;
        }

        .rel-grid {
            grid-template-columns: repeat(2, 1fr);
        }
    }

    @media (max-width: 860px) {
        .product-wrap {
            grid-template-columns: 1fr;
            gap: 32px;
        }

        .product-info {
            position: static;
        }

        .rel-grid {
            grid-template-columns: repeat(2, 1fr);
        }

        /* Tab + Sidebar layout: stack vertically on mobile */
        .prod-detail-inner {
            flex-direction: column !important;
            gap: 32px !important;
        }

        .prod-detail-sidebar {
            width: 100% !important;
            max-width: 100% !important;
        }

        .tabs-nav {
            overflow-x: auto;
            flex-wrap: nowrap !important;
            -webkit-overflow-scrolling: touch;
            scrollbar-width: none;
        }

        .tabs-nav::-webkit-scrollbar {
            display: none;
        }

        .tab-btn {
            white-space: nowrap;
            flex-shrink: 0;
        }
    }

    @media (max-width: 560px) {

        .sp-breadcrumb,
        .product-wrap,
        .prod-detail,
        .related-products {
            padding-left: 16px;
            padding-right: 16px;
        }

        .rel-grid {
            grid-template-columns: 1fr;
        }
    }
</style>

<div id="tava-single-product">
    <div class="progress-bar" id="progressBar"></div>

    <!-- ══ BREADCRUMB ══ -->
    <div class="breadcrumb-container">
        <nav class="sp-breadcrumb">
            <a href="<?php echo home_url(); ?>">Trang chủ</a>
            <span class="sp-breadcrumb__sep">›</span>
            <a href="<?php echo $cat_url; ?>"><?php echo esc_html($cat_name); ?></a>
            <span class="sp-breadcrumb__sep">›</span>
            <span class="sp-breadcrumb__cur"><?php echo esc_html($title); ?></span>
        </nav>
    </div>

    <!-- ══ PRODUCT GRID ══ -->
    <div class="product-wrap">

        <!-- ── LEFT: IMAGE GALLERY ── -->
        <div class="product-gallery anim d1">

            <!-- Carousel wrapper -->
            <div class="gallery-carousel" id="galleryCarousel">

                <!-- Main Product Image -->
                <div class="gallery-item carousel-active">
                    <span class="gallery-item__badge">Chính hãng</span>
                    <span class="gallery-item__num">1 / <?php echo count($gallery_imgs) + 1; ?></span>
                    <img src="<?php echo esc_url($thumbnail_url); ?>" alt="<?php echo esc_attr($title); ?>">
                    <div class="gallery-item__caption"><?php echo esc_html($title); ?></div>
                </div>

                <?php
                $img_count = 2;
                foreach ($gallery_imgs as $g_img) {
                    if (empty($g_img))
                        continue;
                    ?>
                    <div class="gallery-item">
                        <span class="gallery-item__num"><?php echo $img_count; ?> /
                            <?php echo count($gallery_imgs) + 1; ?></span>
                        <img src="<?php echo esc_url($g_img); ?>" alt="Gallery Image <?php echo $img_count; ?>">
                    </div>
                    <?php $img_count++;
                } ?>

                <!-- Prev / Next buttons -->
                <button class="carousel-btn carousel-btn--prev" id="prevBtn" aria-label="Ảnh trước">
                    <svg viewBox="0 0 24 24">
                        <polyline points="15 18 9 12 15 6" />
                    </svg>
                </button>
                <button class="carousel-btn carousel-btn--next" id="nextBtn" aria-label="Ảnh tiếp">
                    <svg viewBox="0 0 24 24">
                        <polyline points="9 18 15 12 9 6" />
                    </svg>
                </button>

            </div>

            <!-- Dots -->
            <div class="carousel-dots" id="carouselDots">
                <button class="carousel-dot active"></button>
                <?php foreach ($gallery_imgs as $g_img) {
                    if (!empty($g_img)) {
                        echo '<button class="carousel-dot"></button>';
                    }
                } ?>
            </div>

        </div>

        <!-- ── RIGHT: STICKY INFO ── -->
        <div class="product-info anim d2">

            <div class="prod-category"><?php echo esc_html($subcat_name); ?></div>

            <h1 class="prod-name"><?php echo esc_html($title); ?></h1>

            <div class="prod-model">
                Model: <span><?php echo esc_html($model); ?></span>&nbsp;&nbsp;|&nbsp;&nbsp;
                Thương hiệu: <span><?php echo esc_html($brand_name); ?></span>
            </div>



            <!-- Quick specs pills -->
            <div class="prod-specs-pills">
                <div class="spec-pill">
                    <span class="spec-pill__label">Thương hiệu</span>
                    <span class="spec-pill__val"><?php echo esc_html($brand_name); ?></span>
                </div>
                <?php if (!empty($model)): ?>
                    <div class="spec-pill">
                        <span class="spec-pill__label">Mã Model</span>
                        <span class="spec-pill__val"><?php echo esc_html($model); ?></span>
                    </div>
                <?php endif; ?>
            </div>

            <div class="prod-div"></div>

            <!-- Description Snippet -->
            <?php
            $overview_clean = wp_strip_all_tags($overview);
            $word_count = count(explode(' ', trim($overview_clean)));
            $needs_expand = $word_count > 150; // Cho phép kịch bản dài khoảng 150-200 từ
            ?>
            <div class="prod-desc-wrapper" style="position: relative; margin-bottom: 24px;">
                <div class="prod-desc-content" style="
                font-size: 13.5px;
                color: var(--mid);
                line-height: 1.75;
                <?php if ($needs_expand): ?>
                max-height: 320px; 
                overflow: hidden;
                position: relative;
                transition: max-height 0.4s ease;
                <?php endif; ?>
            ">
                    <div class="prod-desc-inner">
                        <?php echo apply_filters('the_content', $overview); ?>
                    </div>

                    <?php if ($needs_expand): ?>
                        <div class="prod-desc-gradient" style="
                    position: absolute;
                    bottom: 0; left: 0; right: 0;
                    height: 100px;
                    background: linear-gradient(to bottom, rgba(255,248,246,0), rgba(255,248,246,1));
                    pointer-events: none;
                    transition: opacity 0.3s ease;
                "></div>
                    <?php endif; ?>
                </div>

                <?php if ($needs_expand): ?>
                    <button class="prod-desc-btn" onclick="toggleDesc(this)" style="
                display: flex;
                align-items: center;
                gap: 5px;
                margin: 12px 0 0 0;
                background: none;
                border: none;
                color: var(--orange);
                font-weight: 700;
                font-size: 12.5px;
                cursor: pointer;
                text-transform: uppercase;
                letter-spacing: 0.05em;
                padding: 0;
                transition: opacity 0.2s;
            ">Xem thêm <svg style="width:14px;height:14px;" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2.5">
                            <path d="M6 9l6 6 6-6" />
                        </svg></button>
                <?php endif; ?>
            </div>

            <!-- Highlight -->
            <div class="install-highlight"
                style="background: rgba(14, 165, 233, 0.05); border: 2px dashed rgba(14, 165, 233, 0.4); color: #0284c7; padding: 14px 20px; border-radius: 9px; text-align: center; font-weight: 700; font-size: 15px; margin-bottom: 22px; display: flex; align-items: center; justify-content: center; gap: 8px;">
                <svg viewBox="0 0 24 24" style="width: 24px; height: 24px; fill: #0ea5e9;">
                    <path
                        d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z" />
                </svg>
                SẴN SÀNG THI CÔNG LẮP ĐẶT TOÀN QUỐC
            </div>

            <!-- CTA with Dropdown -->
            <div class="cskh-dropdown-wrapper">
                <?php
                $phone_raw = \App\Helpers\ThemeHelper::getOption('phone_cskh');
                $phone_arr = is_string($phone_raw) ? json_decode($phone_raw, true) : $phone_raw;
                if (!is_array($phone_arr) || empty($phone_arr)) {
                    $phone_arr = [['name' => 'Chuyên viên tư vấn', 'phone' => $phone_raw, 'role' => 'Tư vấn miễn phí 24/7', 'avatar' => '']];
                }
                ?>
                <a href="javascript:void(0)" class="btn-primary-sp"
                    style="justify-content: flex-start; padding-left: 20px;">
                    <svg viewBox="0 0 24 24">
                        <path
                            d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07A19.5 19.5 0 0 1 4.7 12.5a19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 3.59 2h3a2 2 0 0 1 2 1.72c.127.96.361 1.903.7 2.81a2 2 0 0 1-.45 2.11L7.91 9.91a16 16 0 0 0 6.1 6.1l.96-.96a2 2 0 0 1 2.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0 1 22 16.92z"
                            stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    Liên hệ nhận báo giá ngay
                    <svg class="dropdown-chevron"
                        style="width: 20px; height: 20px; stroke: #fff; fill: none; margin-left: auto; transition: transform 0.3s;"
                        viewBox="0 0 24 24">
                        <polyline points="6 9 12 15 18 9" />
                    </svg>
                </a>

                <!-- Dropdown Menu -->
                <div class="cskh-dropdown-menu">
                    <?php foreach ($phone_arr as $contact):
                        $c_name = $contact['name'] ?? 'Chuyên viên tư vấn';
                        $c_phone = $contact['phone'] ?? '';
                        $c_role = $contact['role'] ?? 'Hỗ trợ kỹ thuật';
                        $c_avatar = !empty($contact['avatar']) ? $contact['avatar'] : 'https://placehold.co/100x100/f05a25/ffffff?text=' . urlencode(mb_substr($c_name, 0, 1));
                        ?>
                        <div class="cskh-dropdown-item">
                            <div class="cskh-dropdown-avatar">
                                <img src="<?php echo esc_url($c_avatar); ?>" alt="<?php echo esc_attr($c_name); ?>">
                            </div>
                            <div class="cskh-dropdown-info">
                                <div class="cskh-dropdown-role"><?php echo esc_html($c_role); ?></div>
                                <div class="cskh-dropdown-name"><?php echo esc_html($c_name); ?></div>
                                <div class="cskh-dropdown-phone"><?php echo esc_html($c_phone); ?></div>
                            </div>
                            <div class="cskh-action-btns">
                                <a href="tel:<?php echo esc_attr(preg_replace('/[^0-9+]/', '', $c_phone)); ?>"
                                    class="cskh-action-btn cskh-btn-call" title="Gọi điện">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                        stroke-width="2.5">
                                        <path
                                            d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07A19.5 19.5 0 0 1 4.7 12.5a19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 3.59 2h3a2 2 0 0 1 2 1.72c.127.96.361 1.903.7 2.81a2 2 0 0 1-.45 2.11L7.91 9.91a16 16 0 0 0 6.1 6.1l.96-.96a2 2 0 0 1 2.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0 1 22 16.92z" />
                                    </svg>
                                </a>
                                <a href="https://zalo.me/<?php echo esc_attr(preg_replace('/[^0-9]/', '', $c_phone)); ?>"
                                    target="_blank" class="cskh-action-btn cskh-btn-zalo" title="Chat Zalo">
                                    <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor">
                                        <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <div class="commitment-box">
                <div class="commitment-box__head">
                    <span class="commitment-box__head-title">Cam kết của TavaLLS</span>
                </div>
                <ul class="commitment-list">
                    <li>
                        <div class="commit-icon"></div>
                        <div class="commit-title">Hàng chính hãng 100%</div>
                    </li>
                    <li>
                        <div class="commit-icon"></div>
                        <div class="commit-title">Nguồn gốc xuất xứ rõ ràng</div>
                    </li>
                    <li>
                        <div class="commit-icon"></div>
                        <div class="commit-title">Giá cạnh tranh nhất thị trường</div>
                    </li>
                </ul>
            </div>

            <!-- Share row -->
            <div class="prod-share">
                <span class="prod-share__label">Chia sẻ:</span>
                <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode(get_permalink()); ?>" target="_blank" rel="noopener" class="share-btn" title="Facebook">
                    <svg viewBox="0 0 24 24">
                        <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z" />
                    </svg>
                </a>
                <a href="https://sp.zalo.me/share_button?url=<?php echo urlencode(get_permalink()); ?>" target="_blank" rel="noopener" class="share-btn" title="Zalo">
                    <svg viewBox="0 0 24 24">
                        <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z" />
                    </svg>
                </a>
            </div>

        </div>

    </div>


    <!-- ══ DETAIL TABS ══ -->
    <div class="prod-detail anim d3">

        <div class="prod-detail-inner" style="display: flex; flex-wrap: wrap; gap: 50px;">
            <!-- Left: Main Tabs -->
            <div style="flex: 1; min-width: 0; overflow: hidden;">
                <div class="tabs-nav" style="flex-wrap: wrap;">
                    <button class="tab-btn active" onclick="switchTab(this,'tab-desc')">Mô tả chuyên sâu</button>
                    <?php if (!empty($specs)) { ?><button class="tab-btn" onclick="switchTab(this,'tab-specs')">Thông số
                            kỹ thuật</button><?php } ?>
                    <?php if (!empty($install_info)) { ?><button class="tab-btn"
                            onclick="switchTab(this,'tab-install')">Thông tin dự án / Lắp đặt</button><?php } ?>
                    <?php if (!empty($faq)) { ?><button class="tab-btn" onclick="switchTab(this,'tab-faq')">Câu hỏi
                            thường gặp</button><?php } ?>
                </div>

                <!-- Tab: Mô tả -->
                <div class="tab-panel active" id="tab-desc">
                    <?php
                    $content = apply_filters('the_content', get_post_field('post_content', $post_id));
                    if (!empty($content)):
                        $desc_clean = wp_strip_all_tags($content);
                        $desc_words = count(explode(' ', trim($desc_clean)));
                        $desc_needs_expand = $desc_words > 150;
                        ?>
                        <div class="prod-desc-wrapper" style="position: relative; margin-bottom: 24px;">
                            <div class="prod-desc-content" style="
                        <?php if ($desc_needs_expand): ?>
                        max-height: 500px; 
                        overflow: hidden;
                        position: relative;
                        transition: max-height 0.4s ease;
                        <?php endif; ?>
                    ">
                                <div class="prod-desc-inner desc-content">
                                    <?php echo $content; ?>
                                </div>

                                <?php if ($desc_needs_expand): ?>
                                    <div class="prod-desc-gradient" style="
                            position: absolute;
                            bottom: 0; left: 0; right: 0;
                            height: 120px;
                            background: linear-gradient(to bottom, rgba(255,248,246,0), rgba(255,248,246,1));
                            pointer-events: none;
                            transition: opacity 0.3s ease;
                        "></div>
                                <?php endif; ?>
                            </div>

                            <?php if ($desc_needs_expand): ?>
                                <button class="prod-desc-btn" onclick="toggleMainDesc(this)" style="
                        display: flex;
                        align-items: center;
                        justify-content: center;
                        gap: 6px;
                        margin: 16px auto 0;
                        background: var(--white);
                        border: 1px solid var(--border-lt);
                        border-radius: 6px;
                        color: var(--ink);
                        font-weight: 600;
                        font-size: 13px;
                        cursor: pointer;
                        letter-spacing: 0.02em;
                        padding: 10px 24px;
                        transition: all 0.2s;
                        box-shadow: 0 2px 8px rgba(17,24,39,0.02);
                    " onmouseover="this.style.borderColor='var(--orange)';this.style.color='var(--orange)';"
                                    onmouseout="this.style.borderColor='var(--border-lt)';this.style.color='var(--ink)';">Đọc
                                    toàn bộ nội dung <svg style="width:16px;height:16px;" viewBox="0 0 24 24" fill="none"
                                        stroke="currentColor" stroke-width="2.2">
                                        <path d="M6 9l6 6 6-6" />
                                    </svg></button>
                            <?php endif; ?>
                        </div>
                    <?php else: ?>
                        <div class="desc-content">
                            <p>Đang cập nhật nội dung chuyên sâu...</p>
                        </div>
                    <?php endif; ?>
                </div>

                <!-- Tab: Thông số -->
                <?php if (!empty($specs)) { ?>
                    <div class="tab-panel" id="tab-specs">
                        <?php
                        $sp_clean = wp_strip_all_tags($specs);
                        $sp_words = count(explode(' ', trim($sp_clean)));
                        // Table content generally takes more vertical space per word, limit set to 60 "words" for safety.
                        $sp_needs_expand = $sp_words > 60;
                        ?>
                        <div class="prod-desc-wrapper" style="position: relative; margin-bottom: 24px;">
                            <div class="prod-desc-content" style="
                        <?php if ($sp_needs_expand): ?>
                        max-height: 400px; 
                        overflow: hidden;
                        position: relative;
                        transition: max-height 0.4s ease;
                        <?php endif; ?>
                    ">
                                <div class="prod-desc-inner desc-content">
                                    <?php echo apply_filters('the_content', $specs); ?>
                                </div>

                                <?php if ($sp_needs_expand): ?>
                                    <div class="prod-desc-gradient" style="
                            position: absolute;
                            bottom: 0; left: 0; right: 0;
                            height: 100px;
                            background: linear-gradient(to bottom, rgba(255,248,246,0), rgba(255,248,246,1));
                            pointer-events: none;
                            transition: opacity 0.3s ease;
                        "></div>
                                <?php endif; ?>
                            </div>

                            <?php if ($sp_needs_expand): ?>
                                <button class="prod-desc-btn" onclick="toggleSpDesc(this)" style="
                        display: flex;
                        align-items: center;
                        justify-content: center;
                        gap: 6px;
                        margin: 16px auto 0;
                        background: var(--white);
                        border: 1px solid var(--border-lt);
                        border-radius: 6px;
                        color: var(--ink);
                        font-weight: 600;
                        font-size: 13px;
                        cursor: pointer;
                        letter-spacing: 0.02em;
                        padding: 10px 24px;
                        transition: all 0.2s;
                        box-shadow: 0 2px 8px rgba(17,24,39,0.02);
                    " onmouseover="this.style.borderColor='var(--orange)';this.style.color='var(--orange)';"
                                    onmouseout="this.style.borderColor='var(--border-lt)';this.style.color='var(--ink)';">Xem
                                    toàn bộ thông số kỹ thuật <svg style="width:16px;height:16px;" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2.2">
                                        <path d="M6 9l6 6 6-6" />
                                    </svg></button>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php } ?>

                <!-- Tab: FAQ -->
                <?php if (!empty($faq)) { ?>
                    <div class="tab-panel" id="tab-faq">
                        <div class="desc-content">
                            <?php echo apply_filters('the_content', $faq); ?>
                        </div>
                    </div>
                <?php } ?>

                <!-- Tab: Lắp đặt -->
                <?php if (!empty($install_info)) { ?>
                    <div class="tab-panel" id="tab-install">
                        <?php
                        $inst_clean = wp_strip_all_tags($install_info);
                        $inst_words = count(explode(' ', trim($inst_clean)));
                        $inst_needs_expand = $inst_words > 120;
                        ?>
                        <div class="prod-desc-wrapper" style="position: relative; margin-bottom: 24px;">
                            <div class="prod-desc-content" style="
                        <?php if ($inst_needs_expand): ?>
                        max-height: 400px; 
                        overflow: hidden;
                        position: relative;
                        transition: max-height 0.4s ease;
                        <?php endif; ?>
                    ">
                                <div class="prod-desc-inner desc-content">
                                    <?php echo apply_filters('the_content', $install_info); ?>
                                </div>

                                <?php if ($inst_needs_expand): ?>
                                    <div class="prod-desc-gradient" style="
                            position: absolute;
                            bottom: 0; left: 0; right: 0;
                            height: 100px;
                            background: linear-gradient(to bottom, rgba(255,248,246,0), rgba(255,248,246,1));
                            pointer-events: none;
                            transition: opacity 0.3s ease;
                        "></div>
                                <?php endif; ?>
                            </div>

                            <?php if ($inst_needs_expand): ?>
                                <button class="prod-desc-btn" onclick="toggleInstDesc(this)" style="
                        display: flex;
                        align-items: center;
                        justify-content: center;
                        gap: 6px;
                        margin: 16px auto 0;
                        background: var(--white);
                        border: 1px solid var(--border-lt);
                        border-radius: 6px;
                        color: var(--ink);
                        font-weight: 600;
                        font-size: 13px;
                        cursor: pointer;
                        letter-spacing: 0.02em;
                        padding: 10px 24px;
                        transition: all 0.2s;
                        box-shadow: 0 2px 8px rgba(17,24,39,0.02);
                    " onmouseover="this.style.borderColor='var(--orange)';this.style.color='var(--orange)';"
                                    onmouseout="this.style.borderColor='var(--border-lt)';this.style.color='var(--ink)';">Xem
                                    chi tiết phần lắp đặt <svg style="width:16px;height:16px;" viewBox="0 0 24 24" fill="none"
                                        stroke="currentColor" stroke-width="2.2">
                                        <path d="M6 9l6 6 6-6" />
                                    </svg></button>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php } ?>
            </div>

            <!-- Right: Sidebar News Widget -->
            <div class="prod-detail-sidebar" style="width: 100%; max-width: 340px; flex-shrink: 0;">

                <!-- DỰ ÁN NỔI BẬT WIDGET -->
                <div
                    style="background: var(--white); border: 1px solid rgba(0,0,0,0.06); border-radius: 16px; padding: 24px; box-shadow: 0 4px 24px -8px rgba(17,24,39,0.06); margin-bottom: 24px;">
                    <h3
                        style="margin-top:0; margin-bottom: 20px; font-size: 14.5px; font-weight: 800; text-transform: uppercase; color: var(--ink); letter-spacing: 0.05em; display: flex; align-items: center; gap: 8px;">
                        <span
                            style="display: block; width: 4px; height: 16px; background: var(--orange); border-radius: 4px;"></span>
                        Dự án nổi bật
                    </h3>
                    <div style="display: flex; flex-direction: column; gap: 4px;">
                        <?php
                        $duan_query = new WP_Query([
                            'post_type' => 'post',
                            'category_name' => 'du-an',
                            'posts_per_page' => 3,
                            'orderby' => 'date',
                            'order' => 'DESC'
                        ]);
                        if ($duan_query->have_posts()) {
                            while ($duan_query->have_posts()) {
                                $duan_query->the_post();
                                $news_img = has_post_thumbnail() ? get_the_post_thumbnail_url(get_the_ID(), 'medium') : 'https://placehold.co/400x400/fff8f6/f05a25?text=Du+An';
                                ?>
                                <a href="<?php the_permalink(); ?>"
                                    style="display: flex; gap: 14px; align-items: center; text-decoration: none; padding: 12px; margin: 0 -12px; border-radius: 12px; transition: background 0.3s;"
                                    onmouseover="this.style.background='#f3f4f6'; this.querySelector('h4').style.color='var(--orange)'; this.querySelector('img').style.transform='scale(1.1)';"
                                    onmouseout="this.style.background='transparent'; this.querySelector('h4').style.color='var(--ink)'; this.querySelector('img').style.transform='scale(1)';">
                                    <div
                                        style="width: 72px; height: 72px; border-radius: 10px; overflow: hidden; flex-shrink: 0; border: 1px solid rgba(0,0,0,0.05);">
                                        <img style="width: 100%; height: 100%; object-fit: cover; transition: transform 0.5s cubic-bezier(.16,1,.3,1);"
                                            src="<?php echo esc_url($news_img); ?>" alt="<?php the_title_attribute(); ?>">
                                    </div>
                                    <div style="flex: 1;">
                                        <h4
                                            style="margin: 0 0 6px; font-size: 13px; line-height: 1.45; font-weight: 700; color: var(--ink); text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; transition: color 0.3s;">
                                            <?php echo get_the_title(); ?></h4>
                                        <div
                                            style="font-size: 10.5px; color: var(--muted); font-weight: 600; text-transform: uppercase; letter-spacing: 0.05em;">
                                            <?php echo get_the_date('d/m/Y'); ?></div>
                                    </div>
                                </a>
                                <?php
                            }
                            wp_reset_postdata();
                        } else {
                            echo '<p style="font-size:13px; color:var(--muted);">Đang cập nhật dự án...</p>';
                        }
                        ?>
                    </div>
                </div>

                <!-- TIN TỨC MỚI NHẤT WIDGET -->
                <div
                    style="background: var(--white); border: 1px solid rgba(0,0,0,0.06); border-radius: 16px; padding: 24px; box-shadow: 0 4px 24px -8px rgba(17,24,39,0.06);">
                    <h3
                        style="margin-top:0; margin-bottom: 20px; font-size: 14.5px; font-weight: 800; text-transform: uppercase; color: var(--ink); letter-spacing: 0.05em; display: flex; align-items: center; gap: 8px;">
                        <span
                            style="display: block; width: 4px; height: 16px; background: var(--orange); border-radius: 4px;"></span>
                        Tin tức mới nhất
                    </h3>
                    <div style="display: flex; flex-direction: column; gap: 4px;">
                        <?php
                        $tintuc_query = new WP_Query([
                            'post_type' => 'post',
                            'category_name' => 'tin-tuc',
                            'posts_per_page' => 3,
                            'orderby' => 'date',
                            'order' => 'DESC'
                        ]);
                        if ($tintuc_query->have_posts()) {
                            while ($tintuc_query->have_posts()) {
                                $tintuc_query->the_post();
                                $news_img = has_post_thumbnail() ? get_the_post_thumbnail_url(get_the_ID(), 'medium') : 'https://placehold.co/400x400/fff8f6/f05a25?text=News';
                                ?>
                                <a href="<?php the_permalink(); ?>"
                                    style="display: flex; gap: 14px; align-items: center; text-decoration: none; padding: 12px; margin: 0 -12px; border-radius: 12px; transition: background 0.3s;"
                                    onmouseover="this.style.background='#f3f4f6'; this.querySelector('h4').style.color='var(--orange)'; this.querySelector('img').style.transform='scale(1.1)';"
                                    onmouseout="this.style.background='transparent'; this.querySelector('h4').style.color='var(--ink)'; this.querySelector('img').style.transform='scale(1)';">
                                    <div
                                        style="width: 72px; height: 72px; border-radius: 10px; overflow: hidden; flex-shrink: 0; border: 1px solid rgba(0,0,0,0.05);">
                                        <img style="width: 100%; height: 100%; object-fit: cover; transition: transform 0.5s cubic-bezier(.16,1,.3,1);"
                                            src="<?php echo esc_url($news_img); ?>" alt="<?php the_title_attribute(); ?>">
                                    </div>
                                    <div style="flex: 1;">
                                        <h4
                                            style="margin: 0 0 6px; font-size: 13px; line-height: 1.45; font-weight: 700; color: var(--ink); text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; transition: color 0.3s;">
                                            <?php echo get_the_title(); ?></h4>
                                        <div
                                            style="font-size: 10.5px; color: var(--muted); font-weight: 600; text-transform: uppercase; letter-spacing: 0.05em;">
                                            <?php echo get_the_date('d/m/Y'); ?></div>
                                    </div>
                                </a>
                                <?php
                            }
                            wp_reset_postdata();
                        } else {
                            echo '<p style="font-size:13px; color:var(--muted);">Đang cập nhật tin tức...</p>';
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="related-products anim d4" style="margin-top: 40px;">
        <div class="rel-head">
            <div>
                <div class="rel-eyebrow">Giải pháp mở rộng</div>
                <h2 class="rel-title">Sản Phẩm <em>Cùng Nhóm</em></h2>
            </div>
            <a href="<?php echo $cat_url; ?>" class="rel-more">Xem tất cả →</a>
        </div>

        <div class="rel-grid">
            <?php
            $related_args = [
                'post_type' => 'tava_product',
                'posts_per_page' => 4,
                'post__not_in' => [$post_id],
                'orderby' => 'rand'
            ];
            if (!empty($terms_cat) && !is_wp_error($terms_cat)) {
                $related_args['tax_query'] = [
                    [
                        'taxonomy' => 'product_cat',
                        'field' => 'term_id',
                        'terms' => $terms_cat[0]->term_id,
                    ]
                ];
            }
            $related_query = new WP_Query($related_args);

            if ($related_query->have_posts()):
                while ($related_query->have_posts()):
                    $related_query->the_post();
                    get_template_part('app/Views/components/product-card');
                endwhile;
                wp_reset_postdata();
            else:
                echo '<p>Đang cập nhật...</p>';
            endif;
            ?>
        </div>
    </div>

</div> <!-- /#tava-single-product -->

<script>
    /* ── Reading progress bar ── */
    const bar = document.getElementById('progressBar');
    window.addEventListener('scroll', () => {
        const doc = document.documentElement;
        const scrollTop = doc.scrollTop || document.body.scrollTop;
        const scrollHeight = doc.scrollHeight - doc.clientHeight;
        bar.style.width = (scrollHeight > 0 ? (scrollTop / scrollHeight) * 100 : 0) + '%';
    });

    /* ── Carousel (mobile only) ── */
    const items = Array.from(document.querySelectorAll('.gallery-item'));
    const dots = Array.from(document.querySelectorAll('.carousel-dot'));
    const prevBtn = document.getElementById('prevBtn');
    const nextBtn = document.getElementById('nextBtn');
    let current = 0;

    function isMobile() { return window.innerWidth <= 860; }

    function goTo(idx) {
        if (!isMobile()) return;
        items[current].classList.remove('carousel-active');
        if (dots[current]) dots[current].classList.remove('active');
        current = (idx + items.length) % items.length;
        items[current].classList.add('carousel-active');
        if (dots[current]) dots[current].classList.add('active');
    }

    if (prevBtn) prevBtn.addEventListener('click', () => goTo(current - 1));
    if (nextBtn) nextBtn.addEventListener('click', () => goTo(current + 1));
    dots.forEach((dot, i) => dot.addEventListener('click', () => goTo(i)));

    let touchStartX = 0;
    const carousel = document.getElementById('galleryCarousel');
    if (carousel) {
        carousel.addEventListener('touchstart', e => { touchStartX = e.touches[0].clientX; }, { passive: true });
        carousel.addEventListener('touchend', e => {
            if (!isMobile()) return;
            const dx = e.changedTouches[0].clientX - touchStartX;
            if (Math.abs(dx) > 40) goTo(dx < 0 ? current + 1 : current - 1);
        });
    }

    function syncDesktop() {
        if (!isMobile()) {
            items.forEach(item => item.style.display = '');
        } else {
            items.forEach((item, i) => {
                item.style.display = i === current ? '' : '';
            });
            items.forEach((item, i) => {
                item.classList.toggle('carousel-active', i === current);
            });
        }
    }
    window.addEventListener('resize', syncDesktop);
    syncDesktop();

    /* ── Tab switcher ── */
    function switchTab(btn, panelId) {
        document.querySelectorAll('#tava-single-product .tab-btn').forEach(b => b.classList.remove('active'));
        document.querySelectorAll('#tava-single-product .tab-panel').forEach(p => p.classList.remove('active'));
        if (btn) btn.classList.add('active');
        const panel = document.getElementById(panelId);
        if (panel) panel.classList.add('active');
    }

    /* ── Description Read More Toggle ── */
    function toggleDesc(btn) {
        const content = btn.previousElementSibling;
        const gradient = content.querySelector('.prod-desc-gradient');
        const isExpanded = content.classList.contains('expanded');

        if (isExpanded) {
            // Collapse
            content.classList.remove('expanded');
            content.style.maxHeight = '320px';
            if (gradient) gradient.style.opacity = '1';
            btn.innerHTML = 'Xem thêm <svg style="width:14px;height:14px;" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M6 9l6 6 6-6"/></svg>';
        } else {
            // Expand
            content.classList.add('expanded');
            content.style.maxHeight = content.scrollHeight + 'px';
            if (gradient) gradient.style.opacity = '0';
            btn.innerHTML = 'Thu gọn <svg style="width:14px;height:14px;" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M18 15l-6-6-6 6"/></svg>';

            // Cập nhật lại height nếu nội dung load thêm ảnh
            setTimeout(() => {
                if (content.classList.contains('expanded')) {
                    content.style.maxHeight = 'none';
                }
            }, 400);
        }
    }

    /* ── Specs Read More Toggle ── */
    function toggleSpDesc(btn) {
        const content = btn.previousElementSibling;
        const gradient = content.querySelector('.prod-desc-gradient');
        const isExpanded = content.classList.contains('expanded');

        if (isExpanded) {
            content.classList.remove('expanded');
            content.style.maxHeight = '400px';
            if (gradient) gradient.style.opacity = '1';
            btn.innerHTML = 'Xem toàn bộ thông số kỹ thuật <svg style="width:16px;height:16px;" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M6 9l6 6 6-6"/></svg>';
        } else {
            content.classList.add('expanded');
            content.style.maxHeight = content.scrollHeight + 'px';
            if (gradient) gradient.style.opacity = '0';
            btn.innerHTML = 'Thu gọn <svg style="width:16px;height:16px;" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M18 15l-6-6-6 6"/></svg>';
            setTimeout(() => { if (content.classList.contains('expanded')) content.style.maxHeight = 'none'; }, 400);
        }
    }

    /* ── Main Desc Read More Toggle ── */
    function toggleMainDesc(btn) {
        const content = btn.previousElementSibling;
        const gradient = content.querySelector('.prod-desc-gradient');
        const isExpanded = content.classList.contains('expanded');

        if (isExpanded) {
            content.classList.remove('expanded');
            content.style.maxHeight = '500px';
            if (gradient) gradient.style.opacity = '1';
            btn.innerHTML = 'Đọc toàn bộ nội dung <svg style="width:16px;height:16px;" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M6 9l6 6 6-6"/></svg>';
        } else {
            content.classList.add('expanded');
            content.style.maxHeight = content.scrollHeight + 'px';
            if (gradient) gradient.style.opacity = '0';
            btn.innerHTML = 'Thu gọn <svg style="width:16px;height:16px;" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M18 15l-6-6-6 6"/></svg>';
            setTimeout(() => { if (content.classList.contains('expanded')) content.style.maxHeight = 'none'; }, 400);
        }
    }

    /* ── Install Read More Toggle ── */
    function toggleInstDesc(btn) {
        const content = btn.previousElementSibling;
        const gradient = content.querySelector('.prod-desc-gradient');
        const isExpanded = content.classList.contains('expanded');

        if (isExpanded) {
            content.classList.remove('expanded');
            content.style.maxHeight = '400px';
            if (gradient) gradient.style.opacity = '1';
            btn.innerHTML = 'Xem chi tiết phần lắp đặt <svg style="width:16px;height:16px;" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M6 9l6 6 6-6"/></svg>';
        } else {
            content.classList.add('expanded');
            content.style.maxHeight = content.scrollHeight + 'px';
            if (gradient) gradient.style.opacity = '0';
            btn.innerHTML = 'Thu gọn <svg style="width:16px;height:16px;" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M18 15l-6-6-6 6"/></svg>';
            setTimeout(() => { if (content.classList.contains('expanded')) content.style.maxHeight = 'none'; }, 400);
        }
    }
</script>

<?php get_footer(); ?>