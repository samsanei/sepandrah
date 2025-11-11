<?php if (! defined('ABSPATH')) {
  exit;
} ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php wp_head(); ?>
  <!-- Swiper -->
  <link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/swiper@12/swiper-bundle.min.css" />

</head>

<body class="font-display font-normal bg-white text-slate-800">
  <?php wp_body_open(); ?>
  <!-- ================= Header ================= -->
  <header class="topnav fixed top-0 inset-x-0 z-50">
    <div class="container mx-auto">
      <div class="flex h-20 items-center justify-between">
        <!-- Right: logo/name -->
        <div class="flex items-center gap-3">
          <div class="w-14 h-14 grid place-items-center text-white">
            <!-- <span class="text-sm font-extrabold tracking-widest">SRA</span> -->
            <img src="<?php echo esc_url(app_asset('assets/images/logo_sepand_rah_white.svg')); ?>" alt="سپند راه آگرین" />
          </div>
          <div class="hidden sm:flex flex-col text-xs text-white/80 gap-1">
            <span class="text-sm">سپند راه آگرین</span>
            <span>SEPAND RAH AGRIN</span>
          </div>
        </div>
        <!-- Center: nav (Desktop) -->
        <nav class="hidden md:flex items-center gap-6 text-sm text-white/80" aria-label="<?php esc_attr_e('Primary Menu', 'bamdad-studio'); ?>">
          <?php
          wp_nav_menu([
            'theme_location' => 'primary',
            'container'      => false,
            'menu_class'     => 'menu-desktop flex items-center gap-6',
            'fallback_cb'    => false,
            // submenus را وردپرس با کلاس‌های استاندارد می‌سازد: .menu-item-has-children > .sub-menu
          ]);
          ?>
        </nav>
        <!-- Left: CTAs -->
        <div class="flex items-center gap-2">
          <button class="px-3 py-2 text-xs text-white hover:bg-white/20">
            EN
          </button>
          <a
            href="#consult"
            class="hidden sm:inline-flex px-4 py-2 rounded-full bg-blue-600/90 hover:bg-blue-600 text-xs font-semibold text-white shadow-lg shadow-blue-500/20">مشاوره رایگان</a>
          <!-- Mobile menu button -->
          <button
            aria-label="باز کردن منو"
            aria-expanded="false"
            class="md:hidden ml-2 p-2 rounded-lg bg-white/10 text-white mobile-menu-btn">
            <svg
              width="20"
              height="20"
              viewBox="0 0 24 24"
              fill="none"
              stroke="currentColor"
              stroke-width="2">
              <path d="M3 6h18M3 12h18M3 18h18" />
            </svg>
          </button>
        </div>
      </div>
    </div>
  </header>
  <!-- Mobile nav drawer -->
  <div id="mobileNav" class="fixed inset-0 z-50 hidden" aria-hidden="true">
    <div class="absolute inset-0 overlay bg-black/60" style="opacity:0"></div>
    <aside id="mobileNavPanel" class="mobile-nav-panel absolute top-0 right-0 h-full w-[88%] max-w-[380px] bg-white text-slate-900 p-6 shadow-lg"
      role="dialog" aria-modal="true" aria-hidden="true">
      <div class="flex items-center justify-between mb-6">
        <div class="flex items-center gap-3">
          <div class="w-10 h-10 rounded-full bg-slate-900 text-white grid place-items-center">SRA</div>
          <div class="text-blue-700 font-semibold">سپند راه آگرین</div>
        </div>
        <button aria-label="بستن منو" class="close-mobile p-2 rounded-md text-slate-700">
          <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <path d="M6 6l12 12M6 18L18 6" />
          </svg>
        </button>
      </div>

      <nav class="text-sm" aria-label="<?php esc_attr_e('Primary Mobile Menu', 'bamdad-studio'); ?>">
        <?php
        wp_nav_menu([
          'theme_location' => 'primary',
          'container'      => false,
          'menu_id'        => 'mobile-primary',
          'menu_class'     => 'menu-mobile flex flex-col',
          'fallback_cb'    => false,
        ]);
        ?>
      </nav>
    </aside>
  </div>