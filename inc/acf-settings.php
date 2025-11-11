<?php
/**
 * ACF: Theme Settings (Bamdad Studio)
 * - Options pages (Site Settings + subpages)
 * - Local JSON save/load to /acf-json
 * - Helpers to read options with defaults
 * - Safe output of custom head/body/footer scripts
 */

if ( ! defined('ABSPATH') ) { exit; }

/** -------------------------------------------
 *  0) Textdomain/Slug fallbacks (ژنریک)
 * ------------------------------------------*/
if ( ! defined('APP_TEXTDOMAIN') ) {
    $td = wp_get_theme()->get('TextDomain');
    define('APP_TEXTDOMAIN', $td ? $td : sanitize_key( get_template() ));
}
if ( ! defined('APP_SLUG') ) {
    define('APP_SLUG', sanitize_key( get_template() ));
}
if ( ! defined('APP_PATH') ) {
    define('APP_PATH', trailingslashit( get_template_directory() ));
}

/** -------------------------------------------
 *  1) Options Pages
 * ------------------------------------------*/
add_action('init', function () {
    if ( ! function_exists('acf_add_options_page') ) return;

    // صفحهٔ اصلی تنظیمات
    $parent = acf_add_options_page([
        'page_title'  => __('تنظیمات قالب (Bamdad)', APP_TEXTDOMAIN),
        'menu_title'  => __('تنظیمات قالب', APP_TEXTDOMAIN),
        'menu_slug'   => 'bs-site-settings',
        'capability'  => 'manage_options',
        'redirect'    => true,
        'position'    => '59.8',
        'icon_url'    => 'dashicons-admin-generic',
        'update_button' => __('ذخیره تنظیمات', APP_TEXTDOMAIN),
        'updated_message' => __('تنظیمات ذخیره شد.', APP_TEXTDOMAIN),
    ]);

    // زیربرگه‌ها
    $subs = [
        [
            'page_title' => __('برندینگ', APP_TEXTDOMAIN),
            'menu_title' => __('برندینگ', APP_TEXTDOMAIN),
            'menu_slug'  => 'bs-branding',
        ],
        [
            'page_title' => __('هدر', APP_TEXTDOMAIN),
            'menu_title' => __('هدر', APP_TEXTDOMAIN),
            'menu_slug'  => 'bs-header',
        ],
        [
            'page_title' => __('فوتر', APP_TEXTDOMAIN),
            'menu_title' => __('فوتر', APP_TEXTDOMAIN),
            'menu_slug'  => 'bs-footer',
        ],
        [
            'page_title' => __('سئو (پایه)', APP_TEXTDOMAIN),
            'menu_title' => __('سئو', APP_TEXTDOMAIN),
            'menu_slug'  => 'bs-seo',
        ],
        [
            'page_title' => __('یکپارچه‌سازی‌ها', APP_TEXTDOMAIN),
            'menu_title' => __('Integrations', APP_TEXTDOMAIN),
            'menu_slug'  => 'bs-integrations',
        ],
        [
            'page_title' => __('پرفورمنس', APP_TEXTDOMAIN),
            'menu_title' => __('Performance', APP_TEXTDOMAIN),
            'menu_slug'  => 'bs-performance',
        ],
        [
            'page_title' => __('اسکریپت‌ها', APP_TEXTDOMAIN),
            'menu_title' => __('Scripts', APP_TEXTDOMAIN),
            'menu_slug'  => 'bs-scripts',
        ],
        [
            'page_title' => __('نگه‌داری/خاموشی', APP_TEXTDOMAIN),
            'menu_title' => __('Maintenance', APP_TEXTDOMAIN),
            'menu_slug'  => 'bs-maintenance',
        ],
    ];

    foreach ($subs as $sub) {
        $sub['parent_slug'] = $parent['menu_slug'];
        $sub['capability']  = 'manage_options';
        acf_add_options_sub_page($sub);
    }
});

/** -------------------------------------------
 *  2) ACF Local JSON: save/load to /acf-json
 *  - بهترین روش برای نگهداری فیلدها در گیت
 * ------------------------------------------*/
add_filter('acf/settings/save_json', function ($path) {
    $dir = APP_PATH . 'acf-json';
    if ( ! file_exists($dir) ) {
        wp_mkdir_p($dir);
    }
    return $dir;
});
add_filter('acf/settings/load_json', function ($paths) {
    // مسیر پیش‌فرض را حفظ می‌کنیم و مسیر قالب را اضافه می‌کنیم
    $paths[] = APP_PATH . 'acf-json';
    return $paths;
});

/** -------------------------------------------
 *  3) محدودیت نمایش منوی ACF برای غیرمدیرها (اختیاری)
 * ------------------------------------------*/
add_filter('acf/settings/show_admin', function ($show) {
    // فقط مدیران ببینند
    return current_user_can('manage_options');
});

/** -------------------------------------------
 *  4) Helpers: خواندن آپشن‌ها با پیش‌فرض امن
 * ------------------------------------------*/
if ( ! function_exists('app_opt') ) {
    /**
     * app_opt: خواندن ACF option با پیش‌فرض
     * @param string $key       Field name
     * @param mixed  $default   Default value if empty
     * @return mixed
     */
    function app_opt(string $key, $default = null) {
        if ( ! function_exists('get_field') ) {
            return $default;
        }
        $val = get_field($key, 'option');
        if ( $val === null || $val === '' || $val === false ) {
            return $default;
        }
        return $val;
    }
}

/** -------------------------------------------
 *  5) خروجی اسکریپت‌های سفارشی از تنظیمات
 *  - فیلدها: bs_head_code, bs_body_open_code, bs_footer_code (textarea)
 *  - به‌صورت امن و فقط برای مدیران قابل ویرایش
 * ------------------------------------------*/
add_action('wp_head', function () {
    $code = app_opt('bs_head_code', '');
    if ( $code ) {
        echo "\n<!-- Bamdad: head custom code -->\n" . $code . "\n";
    }
}, 99);

add_action('wp_body_open', function () {
    $code = app_opt('bs_body_open_code', '');
    if ( $code ) {
        echo "\n<!-- Bamdad: body-open custom code -->\n" . $code . "\n";
    }
}, 10);

add_action('wp_footer', function () {
    $code = app_opt('bs_footer_code', '');
    if ( $code ) {
        echo "\n<!-- Bamdad: footer custom code -->\n" . $code . "\n";
    }
}, 99);

/** -------------------------------------------
 *  6) نمونه استفاده در قالب‌ها (logo, socials و …)
 *  - فقط نمونهٔ هوک/تابع؛ مارکاپ را در فایل‌های تم استفاده کن
 * ------------------------------------------*/

// Example: گرفتن لوگو (ACF: bs_logo, bs_logo_dark)
if ( ! function_exists('app_logo_url') ) {
    function app_logo_url(bool $dark = false): ?string {
        $field = $dark ? 'bs_logo_dark' : 'bs_logo';
        $img   = app_opt($field, null);
        if ( is_array($img) && ! empty($img['url']) ) {
            return $img['url'];
        }
        if ( is_string($img) ) {
            return $img; // اگر return_format روی URL باشد
        }
        return null;
    }
}

// --- Maintenance Mode (front-end only) ---
add_action('template_redirect', function () {
    // نیاز به ACF و helper داریم؛ اگر نیست، خروج
    if ( ! function_exists('app_opt') ) return;

    // اگر خاموش است یا کاربر مجاز است، خروج
    $enabled = (bool) app_opt('bs_maintenance_enable', false);
    if ( ! $enabled ) return;

    // استثناها: ادمین‌ها، پیشخوان، REST, Cron، CLI، لاگین، پیش‌نمایش
    if ( is_admin() ) return;
    if ( defined('WP_CLI') && WP_CLI ) return;
    if ( defined('DOING_CRON') && DOING_CRON ) return;

    // REST API: اگر نمی‌خواهی بلاک شود، همین را نگه دار
    $is_rest = defined('REST_REQUEST') && REST_REQUEST;
    if ( $is_rest ) return;

    // صفحه لاگین و درخواست‌های مربوط
    $req_uri = $_SERVER['REQUEST_URI'] ?? '';
    if ( str_contains($req_uri, 'wp-login.php') || str_contains($req_uri, 'wp-signup.php') ) return;

    // پیش‌نمایش پست‌ها
    if ( is_preview() ) return;

    // اگر کاربر لاگین است و مدیر یا قابلیت ویرایش دارد، معاف
    if ( is_user_logged_in() && current_user_can('manage_options') ) return;

    // 🚧 از اینجا به بعد: نگه‌داری را نمایش بده
    // هدرهای درست برای SEO/کش
    status_header(503);
    header('Retry-After: 3600'); // یک ساعت
    nocache_headers();

    // اگر فایل maintenance.php در قالب موجود است، همان را لود کن
    $template = locate_template('maintenance.php', false, false);
    if ( $template ) {
        include $template;
        exit;
    }

    // خروجی مینیمال پیش‌فرض (در صورت نبود maintenance.php)
    $title   = get_bloginfo('name');
    $message = function_exists('app_opt') ? (app_opt('bs_maintenance_message', '') ?: 'وب‌سایت در حال بروزرسانی است. لطفاً ساعتی دیگر مراجعه کنید.') : 'وب‌سایت در حال بروزرسانی است.';

    ?>
    <!doctype html>
    <html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo('charset'); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?php echo esc_html($title); ?> — نگه‌داری</title>
        <style>
            body{margin:0;background:#0b1020;color:#e5e7eb;font:16px/1.6 system-ui,-apple-system,Segoe UI,Roboto,Helvetica,Arial,sans-serif;display:grid;place-items:center;height:100dvh}
            .box{max-width:720px;padding:32px;border:1px solid #1f2937;border-radius:16px;background:#0f172a;box-shadow:0 10px 30px rgba(0,0,0,.25);text-align:center}
            h1{margin:0 0 12px;font-size:1.5rem}
            p{margin:0 0 16px;color:#9ca3af}
            small{opacity:.8}
        </style>
    </head>
    <body>
        <div class="box">
            <h1>در حال نگه‌داری</h1>
            <p><?php echo esc_html($message); ?></p>
        </div>
    </body>
    </html>
    <?php
    exit;
}, 1);

// --- Admin Bar (front-end) toggle ---
add_action('after_setup_theme', function () {
    if ( ! function_exists('app_opt') ) return;

    // فقط فرانت‌اند؛ پنل ادمین دست‌نخورده بماند
    if ( is_admin() ) return;

    // اگر کاربر لاگین نیست، اصلاً admin bar نشان داده نمی‌شود
    if ( ! is_user_logged_in() ) return;

    $enabled = (bool) app_opt('bs_admin_bar_enable', true);

    // اگر خاموش باشد، نوار ادمین را در فرانت‌اند پنهان کن
    if ( $enabled ) {
        add_filter('show_admin_bar', '__return_false', 1000);
    } 
});


