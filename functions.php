<?php
/**
 * Author : Bamdad Studio (www.bamdad.studio)
 */

if ( ! defined('ABSPATH') ) { exit; }

/* -----------------------------------------------------------------------
 *   DYNAMIC CONTEXT (Slug, Textdomain, Paths)
 * -------------------------------------------------------------------- */
if ( ! defined('APP_SLUG') ) {
    // ex: twentytwentyfive
    define('APP_SLUG', sanitize_key( get_template() ));
}
if ( ! defined('APP_TEXTDOMAIN') ) {
    // اگر در style.css Text Domain تنظیم نشده بود، از SLUG استفاده می‌کنیم
    $td = wp_get_theme()->get('TextDomain');
    define('APP_TEXTDOMAIN', $td ? $td : APP_SLUG);
}
if ( ! defined('APP_VER') ) {
    $ver = wp_get_theme()->get('Version');
    define('APP_VER', $ver ? $ver : '1.0.11');
}
if ( ! defined('APP_PATH') ) {
    define('APP_PATH', trailingslashit( get_template_directory() ));
}
if ( ! defined('APP_URI') ) {
    define('APP_URI', trailingslashit( get_template_directory_uri() ));
}

/* -----------------------------------------------------------------------
 *   HELPERS: versioning & urls
 * -------------------------------------------------------------------- */

/** نسخه فایل لوکال با filemtime یا APP_VER */
function app_ver( string $rel_path = '' ): string {
    if ( empty($rel_path) ) return APP_VER;
    $file = APP_PATH . ltrim($rel_path, '/');
    return file_exists($file) ? (string) filemtime($file) : APP_VER;
}

/** تولید URL دارایی از مسیر نسبی */
function app_asset( string $rel_path ): string {
    return APP_URI . ltrim($rel_path, '/');
}

/** تشخیص صفحات خانه/وبلاگ برای لود شرطی */
function app_is_home_like(): bool {
    return is_front_page() || is_home();
}

/* -----------------------------------------------------------------------
 *   THEME SETUP
 * -------------------------------------------------------------------- */
add_action('after_setup_theme', function () {
    // ترجمه‌ها
    load_theme_textdomain( APP_TEXTDOMAIN, APP_PATH . 'languages' );

    // قابلیت‌های عمومی
    add_theme_support('automatic-feed-links');
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', [
        'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script'
    ]);
    add_theme_support('responsive-embeds');

    // ادیتور بلاکی
    add_theme_support('align-wide');
    add_theme_support('editor-styles');
    // اگر فایل ادیتور داشتی، فعال کن:
    if ( file_exists(APP_PATH . 'assets/css/editor.css') ) {
        add_editor_style('assets/css/editor.css');
    }

    // لوگوی سفارشی (در صورت نیاز)
    add_theme_support('custom-logo', [
        'height'      => 120,
        'width'       => 360,
        'flex-width'  => true,
        'flex-height' => true,
    ]);

    // منوها
    register_nav_menus([
        'primary' => esc_html__('Primary Menu', APP_TEXTDOMAIN),
        'footer'  => esc_html__('Footer Menu', APP_TEXTDOMAIN),
    ]);

    // اندازه‌های تصویر نمونه (دلخواه)
    add_image_size('thumb-640', 640, 360, true);
    add_image_size('thumb-960', 960, 540, true);

    // content width برای embedها (در صورت نیاز)
    global $content_width;
    if ( ! isset($content_width) ) {
        $content_width = 1200;
    }
});

/* -----------------------------------------------------------------------
 *   WIDGETS / SIDEBARS
 * -------------------------------------------------------------------- */
// add_action('widgets_init', function () {
//     register_sidebar([
//         'name'          => esc_html__('Main Sidebar', APP_TEXTDOMAIN),
//         'id'            => 'sidebar-1',
//         'description'   => esc_html__('Shown in blog and pages.', APP_TEXTDOMAIN),
//         'before_widget' => '<section id="%1$s" class="widget %2$s">',
//         'after_widget'  => '</section>',
//         'before_title'  => '<h3 class="widget-title">',
//         'after_title'   => '</h3>',
//     ]);
// });

/* -----------------------------------------------------------------------
 *   FRONT ASSETS (CSS/JS)
 *   - نسخه‌دهی: filemtime برای لوکال / شماره نسخه قالب برای سایرین
 *   - strategy=defer اگر پشتیبانی شد (WP 6.3+)
 * -------------------------------------------------------------------- */
add_action('wp_enqueue_scripts', function () {
    if ( is_admin() ) return;

    // استایل اصلی قالب:
    // اگر سبک می‌خواهی: get_stylesheet_uri()
    // اگر سنگین‌تر است: assets/css/main.css را ترجیح بده
    $main_css_rel = file_exists(APP_PATH.'assets/css/main.css')
        ? 'assets/css/main.css'
        : basename( get_stylesheet_uri() ); // style.css

    wp_enqueue_style( APP_SLUG . '-style', app_asset($main_css_rel), [], app_ver($main_css_rel) );

    // اسکریپت اصلی فرانت (اختیاری)
    if ( file_exists(APP_PATH.'assets/js/main.js') ) {
        wp_enqueue_script( APP_SLUG . '-main', app_asset('assets/js/main.js'), [], app_ver('assets/js/main.js'), true );
        if ( function_exists('wp_script_add_data') ) {
            // بهتر: فایل main.js خودش ESModules باشد و import کند
            wp_script_add_data( APP_SLUG . '-main', 'strategy', 'defer' );
        }
        // انتقال مقادیر نمونه به JS
        wp_localize_script( APP_SLUG . '-main', 'APP', [
            'ajaxUrl' => admin_url('admin-ajax.php'),
            'nonce'   => wp_create_nonce( APP_SLUG . '_nonce' ),
        ]);
    }

    // پاسخ‌دهی کامنت‌ها فقط وقتی لازم است
    if ( is_singular() && comments_open() && get_option('thread_comments') ) {
        wp_enqueue_script('comment-reply');
    }

    // --- نمونه‌ی لود شرطی (خاموش پیش‌فرض) ---
    // if ( app_is_home_like() || is_page_template('templates/home.php') ) {
    //     // مثال: Swiper فقط در صفحه خانه
    //     wp_enqueue_style( 'swiper-css', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css', [], '11' );
    //     wp_enqueue_script( 'swiper-js', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js', [], '11', true );
    //     if ( function_exists('wp_script_add_data') ) {
    //         wp_script_add_data('swiper-js', 'strategy', 'defer');
    //     }
    // }
}, 20);

/* -----------------------------------------------------------------------
 *   RESOURCE HINTS (DNS Prefetch / Preconnect) – اختیاری
 * -------------------------------------------------------------------- */
add_filter('wp_resource_hints', function ($hints, $relation_type) {
    // دامنه‌های پرتکرار را اینجا لیست کن
    $hosts = [
        // 'https://cdn.jsdelivr.net',
        // 'https://cdnjs.cloudflare.com',
        // 'https://code.jquery.com',
        // 'https://unpkg.com',
    ];

    if ( $relation_type === 'dns-prefetch' ) {
        foreach ( $hosts as $host ) { $hints[] = $host; }
    } elseif ( $relation_type === 'preconnect' ) {
        foreach ( $hosts as $host ) { $hints[] = [ 'href' => $host, 'crossorigin' => true ]; }
    }
    return $hints;
}, 10, 2);

/* -----------------------------------------------------------------------
 *   SMALL CLEANUPS & SAFETY
 * -------------------------------------------------------------------- */

// غیرفعال کردن ایموجی‌های هسته (سبک‌تر شدن head)
add_action('init', function () {
    remove_action('wp_head', 'print_emoji_detection_script', 7);
    remove_action('admin_print_scripts', 'print_emoji_detection_script');
    remove_action('wp_print_styles', 'print_emoji_styles');
    remove_action('admin_print_styles', 'print_emoji_styles');
    remove_filter('the_content_feed', 'wp_staticize_emoji');
    remove_filter('comment_text_rss', 'wp_staticize_emoji');
    remove_filter('wp_mail', 'wp_staticize_emoji_for_email');
});

// تمیزکاری‌های head
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');

// SVG امن برای مدیران
add_filter('upload_mimes', function ($mimes) {
    if ( current_user_can('manage_options') ) {
        $mimes['svg']  = 'image/svg+xml';
        $mimes['svgz'] = 'image/svg+xml';
    }
    return $mimes;
});

// جلوگیری از رشته‌ی “…更多/More” در excerpt (نمونه‌ی استانداردسازی)
add_filter('excerpt_more', function ($more) {
    return ' …';
});


/* -----------------------------------------------------------------------
 *   INCLUDES
 * -------------------------------------------------------------------- */
$includes = [
    'inc/custom-post-types.php',
    // 'inc/taxonomies.php',
    // 'inc/template-tags.php',
    // 'inc/blocks.php',
    'inc/acf-settings.php',
];
foreach ($includes as $rel) {
    $file = APP_PATH . ltrim($rel, '/');
    if ( file_exists($file) ) { require_once $file; }
}
