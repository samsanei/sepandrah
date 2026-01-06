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

<body class="font-modam font-normal bg-white text-slate-800">
  <?php
  // اگر از wp_body_open استفاده می‌کنی:
  if (function_exists('wp_body_open')) {
    wp_body_open();
  }
  ?>

<!-- Preloader Overlay -->
<div
  id="site-preloader"
  class="fixed inset-0 z-[9999] bg-slate-900 text-white flex items-center justify-center pointer-events-auto">
  <div class="relative w-full h-full overflow-hidden flex items-center justify-center">

    <!-- پنل تیره -->
    <div class="absolute inset-0">
      <div class="js-preloader-panel w-full h-full bg-slate-900"></div>
    </div>

    <!-- لوگو + متن وسط صفحه -->
    <div class="relative z-10 flex flex-col items-center justify-center text-center px-4">
      <div class="js-preloader-logo mb-2 md:mb-3">
        <img
          src="<?php echo esc_url(app_asset('assets/images/logo_sepand_rah_white.svg')); ?>"
          alt="<?php bloginfo('name'); ?>"
          class="w-32 h-auto md:w-40 select-none" />
      </div>

      <div class="js-preloader-text uppercase mt-3 text-slate-200">
        SEPAND RAH AGRIN
      </div>
    </div>

  </div>
</div>


  <!-- ================= Header ================= -->
  <header class="topnav fixed top-0 inset-x-0 z-50">
    <div class="container mx-auto px-5 sm:px-0">
      <div class="flex h-20 items-center justify-between">
        <!-- Mobile menu button -->
        <div class="flex sm:hidden items-center gap-2">
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
          <button class="px-3 py-2 text-xs text-white hover:bg-white/20">
            EN
          </button>

        </div>
        <!-- Right: logo/name -->
        <a href="<?php echo esc_url(home_url('/')); ?>" class="flex items-center gap-3">
          <div class="w-14 h-14 grid place-items-center text-white">
            <!-- <span class="text-sm font-extrabold tracking-widest">SRA</span> -->
            <img src="<?php echo esc_url(app_asset('assets/images/logo_sepand_rah_white.svg')); ?>" alt="سپند راه آگرین" />
          </div>
          <div class="flex flex-col text-xs text-white gap-1">
            <span class="text-sm">سپند راه آگرین</span>
            <span>SEPAND RAH AGRIN</span>
          </div>
        </a>
        <!-- Center: nav (Desktop) -->
        <nav class="hidden md:flex items-center gap-6 text-sm text-white" aria-label="<?php esc_attr_e('Primary Menu', 'bamdad-studio'); ?>">
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
        <div class="hidden sm:flex items-center gap-2">
          <button class="px-3 py-2 text-xs text-white hover:bg-white/20">
            EN
          </button>
          <a
            href="https://www.sepandrah.com/%d8%aa%d9%85%d8%a7%d8%b3/"
            class="sm:inline-flex px-4 py-2 rounded-md bg-blue-900/80 hover:bg-blue-800 text-xs font-semibold text-white">مشاوره رایگان</a>

        </div>
      </div>
    </div>
  </header>
  <!-- Mobile nav drawer -->
  <div id="mobileNav" class="fixed inset-0 z-50 hidden" aria-hidden="true">
    <div class="absolute inset-0 overlay bg-black/60" style="opacity:0"></div>
    <aside id="mobileNavPanel" class="mobile-nav-panel absolute top-0 right-0 h-full w-[88%] max-w-[380px] bg-slate-950/90 backdrop-blur-md text-white p-6 shadow-lg"
      role="dialog" aria-modal="true" aria-hidden="true">
      <div class="flex items-center justify-between mb-6">
        <a href="<?php echo esc_url(home_url('/')); ?>" class="flex items-center gap-3">
          <div class="w-18 h-18 grid place-items-center text-white">
            <!-- <span class="text-sm font-extrabold tracking-widest">SRA</span> -->
            <img src="<?php echo esc_url(app_asset('assets/images/logo_sepand_rah_white.svg')); ?>" alt="سپند راه آگرین" />
          </div>
          <div class="flex flex-col text-xs gap-1">
            <span class="text-base">سپند راه آگرین</span>
            <span>SEPAND RAH AGRIN</span>
          </div>
        </a>

        <button aria-label="بستن منو" class="close-mobile p-2 rounded-md text-slate-700">
          <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <path d="M6 6l12 12M6 18L18 6" />
          </svg>
        </button>
      </div>

      <nav class="text-base" aria-label="<?php esc_attr_e('Primary Mobile Menu', 'bamdad-studio'); ?>">
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
      <!-- ================= Emergency Call (Mobile Menu) ================= -->
<div class="mt-6 pt-5 border-t border-slate-700 w-full">

  <!-- Label -->
  <!-- <div class="mb-3 text-center">
    <span class="inline-block px-4 py-1 rounded-full bg-red-600/20 text-red-400 text-xs font-semibold tracking-wide">
      تماس فوری
    </span>
  </div> -->

  <!-- Phone Numbers -->
  <div class="flex flex-col gap-3 w-full items-center">

    <!-- Mobile -->
    <a href="tel:+989122895673"
       class="flex items-center gap-3 px-4 py-2 rounded-xl bg-slate-800/70 hover:bg-red-600 transition-colors group w-full justify-center">
      <span class="text-red-400 group-hover:text-white transition-colors">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none"
             viewBox="0 0 24 24" stroke-width="1.5"
             stroke="currentColor" class="w-5 h-5">
          <path stroke-linecap="round" stroke-linejoin="round"
                d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25
                0 0 0 2.25-2.25v-1.372c0-.516-.351-.966-.852-1.091
                l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97
                1.293c-.282.376-.769.542-1.21.38a12.035
                12.035 0 0 1-7.143-7.143c-.162-.441.004-.928.38-1.21
                l1.293-.97c.363-.271.527-.734.417-1.173L6.963
                3.102a1.125 1.125 0 0 0-1.091-.852H4.5A2.25
                2.25 0 0 0 2.25 4.5v2.25Z" />
        </svg>
      </span>
      <span class="text-sm font-semibold tracking-wider text-white">
        ۰۹۱۲۲۸۹۵۶۷۳
      </span>
    </a>

    <!-- Office -->
    <a href="tel:+982188703035"
       class="flex items-center gap-3 px-4 py-2 rounded-xl bg-slate-800/70 hover:bg-red-600 transition-colors group w-full justify-center">
      <span class="text-red-400 group-hover:text-white transition-colors">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none"
             viewBox="0 0 24 24" stroke-width="1.5"
             stroke="currentColor" class="w-5 h-5">
          <path stroke-linecap="round" stroke-linejoin="round"
                d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25
                a2.25 2.25 0 0 0 2.25-2.25v-1.372c0-.516
                -.351-.966-.852-1.091l-4.423-1.106
                c-.44-.11-.902.055-1.173.417l-.97
                1.293c-.282.376-.769.542-1.21.38
                a12.035 12.035 0 0 1-7.143-7.143
                c-.162-.441.004-.928.38-1.21l1.293
                -.97c.363-.271.527-.734.417
                -1.173L6.963 3.102a1.125 1.125
                0 0 0-1.091-.852H4.5A2.25
                2.25 0 0 0 2.25 4.5v2.25Z" />
        </svg>
      </span>
      <span class="text-sm font-medium tracking-wider text-white">
        ۰۲۱-۸۸۷۰۳۰۳۵
      </span>
    </a>

    <!-- Office 2 -->
    <a href="tel:+982188703036"
       class="flex items-center gap-3 px-4 py-2 rounded-xl bg-slate-800/70 hover:bg-red-600 transition-colors group w-full justify-center">
      <span class="text-red-400 group-hover:text-white transition-colors">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none"
             viewBox="0 0 24 24" stroke-width="1.5"
             stroke="currentColor" class="w-5 h-5">
          <path stroke-linecap="round" stroke-linejoin="round"
                d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25
                a2.25 2.25 0 0 0 2.25-2.25v-1.372c0-.516
                -.351-.966-.852-1.091l-4.423-1.106
                c-.44-.11-.902.055-1.173.417l-.97
                1.293c-.282.376-.769.542-1.21.38
                a12.035 12.035 0 0 1-7.143-7.143
                c-.162-.441.004-.928.38-1.21l1.293
                -.97c.363-.271.527-.734.417
                -1.173L6.963 3.102a1.125 1.125
                0 0 0-1.091-.852H4.5A2.25
                2.25 0 0 0 2.25 4.5v2.25Z" />
        </svg>
      </span>
      <span class="text-sm font-medium tracking-wider text-white">
        ۰۲۱-۸۸۷۰۳۰۳۶
      </span>
    </a>

  </div>
</div>

    </aside>
  </div>