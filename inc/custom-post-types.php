<?php
if ( ! defined('ABSPATH') ) { exit; }

/**
 * Universal CPTs: Services & Projects
 * - post type: service  (آرشیو: /services)
 * - post type: project  (آرشیو: /projects)
 * - taxonomies:
 *      - service_category  (hierarchical)
 *      - project_category  (hierarchical)
 *      - project_tag       (non-hierarchical)
 *
 * نکته: برای ژنریک بودن، از APP_TEXTDOMAIN و APP_SLUG (اگر طبق فایل استارتر تعریف شده‌اند) استفاده می‌کنیم،
 * اگر نبودند، fallback می‌گیریم.
 */
if ( ! defined('APP_TEXTDOMAIN') ) {
    $td = wp_get_theme()->get('TextDomain');
    define('APP_TEXTDOMAIN', $td ? $td : sanitize_key( get_template() ));
}
if ( ! defined('APP_SLUG') ) {
    define('APP_SLUG', sanitize_key( get_template() ));
}

add_action('init', function () {
    /** SERVICE CPT */
    $service_labels = [
        'name'                  => _x('سرویس‌ها', 'Post Type General Name', APP_TEXTDOMAIN),
        'singular_name'         => _x('سرویس', 'Post Type Singular Name', APP_TEXTDOMAIN),
        'menu_name'             => __('سرویس‌ها', APP_TEXTDOMAIN),
        'name_admin_bar'        => __('سرویس', APP_TEXTDOMAIN),
        'add_new'               => __('افزودن سرویس', APP_TEXTDOMAIN),
        'add_new_item'          => __('سرویس جدید', APP_TEXTDOMAIN),
        'edit_item'             => __('ویرایش سرویس', APP_TEXTDOMAIN),
        'new_item'              => __('سرویس جدید', APP_TEXTDOMAIN),
        'view_item'             => __('مشاهده سرویس', APP_TEXTDOMAIN),
        'view_items'            => __('مشاهده سرویس‌ها', APP_TEXTDOMAIN),
        'search_items'          => __('جستجوی سرویس', APP_TEXTDOMAIN),
        'not_found'             => __('موردی یافت نشد', APP_TEXTDOMAIN),
        'not_found_in_trash'    => __('در زباله‌دان پیدا نشد', APP_TEXTDOMAIN),
        'all_items'             => __('همه سرویس‌ها', APP_TEXTDOMAIN),
        'archives'              => __('آرشیو سرویس‌ها', APP_TEXTDOMAIN),
        'attributes'            => __('ویژگی‌های سرویس', APP_TEXTDOMAIN),
        'item_updated'          => __('سرویس به‌روزرسانی شد.', APP_TEXTDOMAIN),
    ];
    $service_args = [
        'label'                 => __('سرویس', APP_TEXTDOMAIN),
        'labels'                => $service_labels,
        'public'                => true,
        'show_in_rest'          => true,            // سازگار با ادیتور بلاکی و API
        'menu_position'         => 22,
        'menu_icon'             => 'dashicons-hammer',
        'has_archive'           => true,
        'rewrite'               => ['slug' => 'services', 'with_front' => false],
        'supports'              => ['title','editor','thumbnail','excerpt','revisions','page-attributes'],
        'hierarchical'          => false,
        'show_in_nav_menus'     => true,
        'map_meta_cap'          => true,
    ];
    register_post_type('service', $service_args);

    /** PROJECT CPT */
    $project_labels = [
        'name'                  => _x('پروژه‌ها', 'Post Type General Name', APP_TEXTDOMAIN),
        'singular_name'         => _x('پروژه', 'Post Type Singular Name', APP_TEXTDOMAIN),
        'menu_name'             => __('پروژه‌ها', APP_TEXTDOMAIN),
        'name_admin_bar'        => __('پروژه', APP_TEXTDOMAIN),
        'add_new'               => __('افزودن پروژه', APP_TEXTDOMAIN),
        'add_new_item'          => __('پروژه جدید', APP_TEXTDOMAIN),
        'edit_item'             => __('ویرایش پروژه', APP_TEXTDOMAIN),
        'new_item'              => __('پروژه جدید', APP_TEXTDOMAIN),
        'view_item'             => __('مشاهده پروژه', APP_TEXTDOMAIN),
        'view_items'            => __('مشاهده پروژه‌ها', APP_TEXTDOMAIN),
        'search_items'          => __('جستجوی پروژه', APP_TEXTDOMAIN),
        'not_found'             => __('موردی یافت نشد', APP_TEXTDOMAIN),
        'not_found_in_trash'    => __('در زباله‌دان پیدا نشد', APP_TEXTDOMAIN),
        'all_items'             => __('همه پروژه‌ها', APP_TEXTDOMAIN),
        'archives'              => __('آرشیو پروژه‌ها', APP_TEXTDOMAIN),
        'attributes'            => __('ویژگی‌های پروژه', APP_TEXTDOMAIN),
        'item_updated'          => __('پروژه به‌روزرسانی شد.', APP_TEXTDOMAIN),
    ];
    $project_args = [
        'label'                 => __('پروژه', APP_TEXTDOMAIN),
        'labels'                => $project_labels,
        'public'                => true,
        'show_in_rest'          => true,
        'menu_position'         => 23,
        'menu_icon'             => 'dashicons-portfolio',
        'has_archive'           => true,
        'rewrite'               => ['slug' => 'projects', 'with_front' => false],
        'supports'              => ['title','editor','thumbnail','excerpt','revisions','page-attributes'],
        'hierarchical'          => false,
        'show_in_nav_menus'     => true,
        'map_meta_cap'          => true,
    ];
    register_post_type('project', $project_args);

    /** TAXONOMIES */

    // Service Category (hierarchical)
    $svc_cat_labels = [
        'name'              => __('دسته‌های سرویس', APP_TEXTDOMAIN),
        'singular_name'     => __('دسته سرویس', APP_TEXTDOMAIN),
        'search_items'      => __('جستجوی دسته سرویس', APP_TEXTDOMAIN),
        'all_items'         => __('همه دسته‌ها', APP_TEXTDOMAIN),
        'edit_item'         => __('ویرایش دسته', APP_TEXTDOMAIN),
        'update_item'       => __('به‌روزرسانی دسته', APP_TEXTDOMAIN),
        'add_new_item'      => __('افزودن دسته جدید', APP_TEXTDOMAIN),
        'new_item_name'     => __('نام دسته جدید', APP_TEXTDOMAIN),
        'menu_name'         => __('دسته سرویس', APP_TEXTDOMAIN),
    ];
    register_taxonomy('service_category', ['service'], [
        'hierarchical'      => true,
        'labels'            => $svc_cat_labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'show_in_rest'      => true,
        'rewrite'           => ['slug' => 'service-category', 'with_front' => false],
    ]);

    // Project Category (hierarchical)
    $prj_cat_labels = [
        'name'              => __('دسته‌های پروژه', APP_TEXTDOMAIN),
        'singular_name'     => __('دسته پروژه', APP_TEXTDOMAIN),
        'menu_name'         => __('دسته پروژه', APP_TEXTDOMAIN),
    ];
    register_taxonomy('project_category', ['project'], [
        'hierarchical'      => true,
        'labels'            => $prj_cat_labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'show_in_rest'      => true,
        'rewrite'           => ['slug' => 'project-category', 'with_front' => false],
    ]);

    // Project Tag (non-hierarchical)
    $prj_tag_labels = [
        'name'                       => __('برچسب‌های پروژه', APP_TEXTDOMAIN),
        'singular_name'              => __('برچسب پروژه', APP_TEXTDOMAIN),
        'separate_items_with_commas' => __('جداکردن با ویرگول', APP_TEXTDOMAIN),
        'menu_name'                  => __('برچسب پروژه', APP_TEXTDOMAIN),
    ];
    register_taxonomy('project_tag', ['project'], [
        'hierarchical'      => false,
        'labels'            => $prj_tag_labels,
        'show_ui'           => true,
        'show_admin_column' => false,
        'show_in_rest'      => true,
        'rewrite'           => ['slug' => 'project-tag', 'with_front' => false],
    ]);
});

/**
 * Flush rewrite rules on theme switch
 * - برای قالب‌ها از after_switch_theme استفاده می‌کنیم (نه register_activation_hook که مخصوص پلاگین است).
 */
add_action('after_switch_theme', function () {
    // مطمئن شو CPTها قبل از flush رجیستر شده‌اند
    do_action('init');
    flush_rewrite_rules();
});

/** --------------------------
 * Admin columns: thumbnail
 * -------------------------*/
add_filter('manage_service_posts_columns', function ($cols) {
    $new = [];
    // ستون تصویر را جلوی عنوان می‌گذاریم
    $new['cb']      = $cols['cb'];
    $new['thumb']   = __('تصویر', APP_TEXTDOMAIN);
    $new['title']   = $cols['title'];
    unset($cols['cb'], $cols['title']);
    return array_merge($new, $cols);
});
add_action('manage_service_posts_custom_column', function ($col, $post_id) {
    if ($col === 'thumb') {
        echo get_the_post_thumbnail($post_id, [60,60], ['style'=>'border-radius:6px;']) ?: '—';
    }
}, 10, 2);

add_filter('manage_project_posts_columns', function ($cols) {
    $new = [];
    $new['cb']      = $cols['cb'];
    $new['thumb']   = __('تصویر', APP_TEXTDOMAIN);
    $new['title']   = $cols['title'];
    unset($cols['cb'], $cols['title']);
    return array_merge($new, $cols);
});
add_action('manage_project_posts_custom_column', function ($col, $post_id) {
    if ($col === 'thumb') {
        echo get_the_post_thumbnail($post_id, [60,60], ['style'=>'border-radius:6px;']) ?: '—';
    }
}, 10, 2);

/** --------------------------
 * Nice-to-have: default order for archives (مثلاً جدیدترین‌ها)
 * -------------------------*/
add_action('pre_get_posts', function ($q) {
    if ( is_admin() || ! $q->is_main_query() ) return;

    if ( $q->is_post_type_archive(['service','project']) ) {
        // بر اساس منطق خودت تغییر بده: تاریخ انتشار نزولی
        $q->set('orderby', 'date');
        $q->set('order', 'DESC');
        // اگر بخواهی بر اساس منوی مرتب‌سازی (page-attributes) باشد:
        // $q->set('orderby', ['menu_order' => 'ASC', 'date' => 'DESC']);
    }
});
