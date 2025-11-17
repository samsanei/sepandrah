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
  <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
  <style>
    @import url(<?php echo esc_url(app_asset('assets/fonts/fonts.css')) ?>);

    body,
    a,
    h1,
    h2,
    h3,
    h4,
    h5,
    h6,
    span {
      font-family: 'modamWeb';
    }

    .hero-slide {
      position: relative;
    }

    .hero-slide::after {
      content: "";
      position: absolute;
      inset: 0;
      background: linear-gradient(to top,
          rgba(0, 0, 0, 0.7),
          rgba(0, 0, 0, 0.35) 45%,
          rgba(0, 0, 0, 0.25) 60%,
          rgba(0, 0, 0, 0.15) 80%,
          transparent);
    }

    .bottom-fade {
      position: absolute;
      left: 0;
      right: 0;
      bottom: 0;
      height: 180px;
      background: linear-gradient(to bottom, rgba(255, 255, 255, 0), #fff);
    }

    /* Header blur when scrolled */
    .topnav {
      transition: background 0.25s, backdrop-filter 0.25s, box-shadow 0.25s;
    }

    .topnav.scrolled {
      background: rgb(18 18 18 / 46%);
      backdrop-filter: blur(6px);
      box-shadow: 0 6px 20px rgba(2, 6, 23, 0.35);
    }

    /* Desktop dropdown (پیش‌فرض مخفی) */
    .menu-desktop .sub-menu {
      position: absolute;
      inset-inline-start: 0;
      margin-top: 0.5rem;
      min-width: 14rem;
      background: rgba(15, 23, 42, 0.98);
      /* slate-900 */
      color: #fff;
      border: 1px solid rgba(148, 163, 184, 0.2);
      border-radius: 0.75rem;
      padding: 0.5rem;
      opacity: 0;
      visibility: hidden;
      transform: translateY(0.5rem);
      transition: opacity 0.18s ease, transform 0.18s ease, visibility 0.18s;
      z-index: 50;
    }

    .menu-desktop li.menu-item-has-children {
      position: relative;
    }

    .menu-desktop .sub-menu.open {
      opacity: 1;
      visibility: visible;
      transform: translateY(0);
    }

    /* Mobile: زیرمنوها پیش‌فرض بسته */
    .menu-mobile .sub-menu {
      display: none;
      padding-inline-start: 0.75rem;
      margin-top: 0.5rem;
      border-inline-start: 2px solid #e5e7eb;
      /* slate-200 */
    }

    .menu-mobile .sub-menu[data-open="true"] {
      display: block;
    }

    /* Mobile: دکمه Parent */
    .menu-mobile .parent-toggle {
      display: inline-flex;
      align-items: center;
      justify-content: space-between;
      width: 100%;
      /* padding: 0.625rem 0.25rem; */
    }

    .menu-mobile .parent-toggle svg {
      transition: transform 0.18s ease;
    }

    .menu-mobile .parent-toggle[aria-expanded="true"] svg {
      transform: rotate(180deg);
    }

    .caret-rot {
      transition: transform 0.25s ease;
    }

    .caret-open {
      transform: rotate(180deg);
    }

    /* موقعیت والد برای دراپ‌داون */
    .menu-desktop li.menu-item-has-children {
      position: relative;
    }

    /* زیرمنو: پنهان به‌صورت پیش‌فرض */
    .menu-desktop .sub-menu {
      display: none;
      position: absolute;
      top: 100%;
      right: 0;
      margin-top: 0.5rem;
      background: #fff;
      color: #0f172a;
      border-radius: 12px;
      box-shadow: 0 10px 25px rgba(2, 6, 23, 0.12);
      padding: 0.75rem;
      min-width: 16rem;
      /* 256px */
      z-index: 50;
    }

    /* وقتی باز است */
    .menu-desktop .sub-menu.open {
      display: grid;
      grid-template-columns: 1fr;
      /* پیش‌فرض یک ستون */
      gap: 0.5rem;
    }

    /* اگر آیتم‌ها > 6 باشند، دو ستونه */
    .menu-desktop .sub-menu.two-cols {
      grid-template-columns: 1fr 1fr;
      width: 32rem;
      /* 512px */
    }

    /* لینک‌های داخل زیرمنو */
    .menu-desktop .sub-menu>li>a {
      display: block;
      padding: 0.5rem 0.75rem;
      border-radius: 0.5rem;
      color: #334155;
      /* slate-700 */
      font-size: 0.875rem;
      /* text-sm */
      line-height: 1.25rem;
    }

    .menu-desktop .sub-menu>li>a:hover {
      background: #f8fafc;
    }

    /* slate-50 */

    /* فلش کنار والد در دسکتاپ */
    .menu-desktop a .caret {
      margin-inline-start: 0.25rem;
      transition: transform 0.2s ease;
    }

    .menu-desktop a[aria-expanded="true"] .caret {
      transform: rotate(180deg);
    }

    @media only screen and (max-width: 768px) {
      li.menu-item {
        padding: 10px 0;
      }
    }

    .autoplay-progress {
      position: relative;
      z-index: 10;
      width: 48px;
      height: 48px;
      display: flex;
      align-items: center;
      justify-content: center;
      color: rgba(255, 255, 255, 0.417);
    }

    .autoplay-progress svg {
      --progress: 0;
      position: absolute;
      left: 0;
      top: 0px;
      z-index: 10;
      width: 100%;
      height: 100%;
      stroke-width: 2px;
      stroke: rgba(255, 255, 255, 0.417);
      fill: none;
      stroke-dashoffset: calc(125.6px * (1 - var(--progress)));
      stroke-dasharray: 125.6;
      transform: rotate(-90deg);
    }

    @keyframes pulseRing {
      0% {
        transform: scale(1);
        opacity: 0.4;
      }

      70% {
        transform: scale(1.8);
        opacity: 0;
      }

      100% {
        transform: scale(2);
        opacity: 0;
      }
    }

    .pulse-ring {
      background: rgba(255, 255, 255, 0.25);
      transform-origin: center;
      will-change: transform, opacity;
      animation: pulseRing 3.4s cubic-bezier(0.22, 0.36, 0.36, 1) infinite;
      backface-visibility: hidden;
    }

    .swiper-pagination {
      position: unset !important;
    }

    .swiper-pagination-bullet {
      border-radius: 10px;
    }

    .swiper-pagination-bullet-active {
      transition: all 0.3s ease-out;
      background: #374151;
      width: 2rem;
    }

    /* کانتینر تصویر */
    #post-hero .hero-media {
      position: relative;
      width: 100%;
      height: 100%;
    }

    /* خود تصویر: اجازه‌ی زوم نرم */
    #post-hero .hero-media img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      transform: scale(1);
      /* نقطه آغاز */
      will-change: transform, filter;
      /* برای عملکرد بهتر */
      transition: transform 0.3s ease;
      /* fallback اگر GSAP نبود */
    }

    /* لایه‌ی خوانایی: ترکیبی از گرادینت و لایه‌ی تیره */
    #post-hero .hero-overlay {
      position: absolute;
      inset: 0;
      pointer-events: none;
      /* دو لایه: ۱) گرادینت بالا، ۲) لایه‌ تیره یکنواخت */
      background: linear-gradient(to top,
          rgba(0, 0, 0, 0.55),
          rgba(0, 0, 0, 0.25) 45%,
          rgba(0, 0, 0, 0.15) 70%,
          rgba(0, 0, 0, 0)),
        rgba(0, 0, 0, 0.25);
      opacity: 1;
      transition: opacity 0.25s ease, background-color 0.25s ease;
    }

    /* اگر عکس روشن بود، overlay را کمی پررنگ‌تر کن (JS این کلاس را می‌گذارد) */
    #post-hero.is-bright .hero-overlay {
      background: linear-gradient(to top,
          rgba(0, 0, 0, 0.65),
          rgba(0, 0, 0, 0.35) 45%,
          rgba(0, 0, 0, 0.2) 70%,
          rgba(0, 0, 0, 0)),
        rgba(0, 0, 0, 0.35);
    }

    /* در حالت اسکرول، overlay کمی قوی‌تر می‌شود (با کلاس که JS ست می‌کند) */
    #post-hero.overlay-boost .hero-overlay {
      opacity: 1;
      /* می‌تونی اگر خواستی تا 1 نگه داری */
    }

    .wp-content-wrapper p {
      padding: 1rem 0;
    }

    @media only screen and (max-width: 768px) {
      .wp-content-wrapper p {
        text-align: justify;
      }
    }

    .wp-content-wrapper h1,
    .wp-content-wrapper h2,
    .wp-content-wrapper h3,
    .wp-content-wrapper h4,
    .wp-content-wrapper h5,
    .wp-content-wrapper h6 {
      font-weight: bold;
      padding: 2rem 0;
    }

    .wp-content-wrapper h3 {
      font-size: 1.25rem;
    }

    .wp-content-wrapper h2 {
      font-size: 1.5rem;
    }

    .wp-content-wrapper ul.wp-block-list {
      list-style: circle;
      padding: 0 2rem 0 0;
    }
  </style>
</head>

<body class="font-display font-normal bg-white text-slate-800">
  <?php wp_body_open(); ?>
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
          <div class="flex flex-col text-xs text-white/80 gap-1">
            <span class="text-sm">سپند راه آگرین</span>
            <span>SEPAND RAH AGRIN</span>
          </div>
        </a>
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
        <div class="hidden sm:flex items-center gap-2">
          <button class="px-3 py-2 text-xs text-white hover:bg-white/20">
            EN
          </button>
          <a
            href="#consult"
            class="sm:inline-flex px-4 py-2 rounded-full bg-blue-800/90 hover:bg-blue-800 text-xs font-semibold text-white shadow-lg shadow-blue-700/20">مشاوره رایگان</a>

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
    </aside>
  </div>