<?php

/**
 * Template Name: Home Page TPL
 * Template Post Type: page
 *
 * Description: Home Page template
 * Author: Bamdad Studio
 * Author URI: https://www.bamdad.studio
 */
get_header(); ?>

<!-- ================= Hero / Swiper ================= -->
<section class="relative h-screen">
  <div class="swiper slider h-full">
    <div class="swiper-wrapper">
      <?php if (have_rows('hero_slider')): $i = 0; ?>
        <?php while (have_rows('hero_slider')): the_row();
          $i++;
          $img_d   = get_sub_field('slide_img_desktop'); // image array
          $starter = get_sub_field('starter_title');
          $title   = get_sub_field('main_title');
          $sub     = get_sub_field('sub_title');
          $main_l  = get_sub_field('main_link');        // ACF link array: url,title,target
          $sec_l   = get_sub_field('secondary_link');   // ACF link array (نه تصویر)
          $alt     = $img_d['alt'] ?? ($title ?: get_bloginfo('name'));
          $img_url = is_array($img_d) ? ($img_d['url'] ?? '') : '';
        ?>
          <!-- Slide -->
          <div class="swiper-slide">
            <div class="h-full hero-slide absolute inset-0">
              <?php if (is_array($img_d) && !empty($img_d['ID'])): ?>
                <?php echo wp_get_attachment_image(
                  $img_d['ID'],
                  'full',
                  false,
                  [
                    'class'         => 'h-full w-full object-cover',
                    'alt'           => $alt,
                    'loading'       => ($i === 1 ? 'eager' : 'lazy'),
                    'decoding'      => 'async',
                    'fetchpriority' => ($i === 1 ? 'high' : 'low'),
                  ]
                ); ?>
              <?php elseif (!empty($img_url)): ?>
                <img
                  src="<?php echo esc_url($img_url); ?>"
                  class="h-full w-full object-cover"
                  alt="<?php echo esc_attr($alt); ?>"
                  loading="<?php echo $i === 1 ? 'eager' : 'lazy'; ?>"
                  decoding="async"
                  fetchpriority="<?php echo $i === 1 ? 'high' : 'low'; ?>" />
              <?php endif; ?>
            </div>

            <div class="absolute inset-0 top-0 left-0 z-10 flex items-center">
              <div class="container mx-auto slide-content px-5">
                <?php if ($starter): ?>
                  <p class="text-white/85 text-sm mb-3"><?php echo esc_html($starter); ?></p>
                <?php endif; ?>

                <?php if ($title): ?>
                  <h1 class="text-3xl sm:text-5xl font-extrabold text-white leading-[1.2]">
                    <?php echo esc_html($title); ?>
                  </h1>
                <?php endif; ?>

                <?php if ($sub): ?>
                  <p class="mt-4 max-w-xl text-white/85"><?php echo esc_html($sub); ?></p>
                <?php endif; ?>

                <?php if ($main_l || $sec_l): ?>
                  <div class="mt-10 flex gap-3">
                    <?php if (is_array($main_l) && !empty($main_l['url'])): ?>
                      <a href="<?php echo esc_url($main_l['url']); ?>"
                        target="<?php echo esc_attr($main_l['target'] ?: '_self'); ?>" class="group inline-flex items-center gap-3 rounded-full bg-white/80 text-slate-900 px-1 py-1 text-sm font-semibold shadow-lg transition-all duration-300 hover:shadow-xl hover:-translate-y-[1px]">
                        <span class="ps-3"><?php echo esc_html($main_l['title'] ?: 'مشاوره رایگان'); ?></span>
                        <span class="w-8 h-8 rounded-full bg-slate-800 text-white flex items-center justify-center transition-transform duration-300 group-hover:scale-110">
                          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-3">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 19.5-15-15m0 0v11.25m0-11.25h11.25" />
                          </svg>

                        </span>
                      </a>
                    <?php endif; ?>

                    <!-- <?php if (is_array($sec_l) && !empty($sec_l['url']) && !isset($sec_l['mime_type'])): ?>
                      <a href="<?php echo esc_url($sec_l['url']); ?>"
                        target="<?php echo esc_attr($sec_l['target'] ?: '_self'); ?>"
                        class="group flex items-center justify-center gap-2 px-5 py-3 text-white/90 hover:text-blue-600 transition-colors duration-300">
                        <span><?php echo esc_html($sec_l['title'] ?: 'خدمات'); ?></span>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                          stroke-width="1.5" stroke="currentColor"
                          class="size-5 transition-transform duration-300 group-hover:-translate-x-1">
                          <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 15.75 3 12m0 0 3.75-3.75M3 12h18" />
                        </svg>
                      </a>
                    <?php endif; ?> -->
                  </div>
                <?php endif; ?>
              </div>
            </div>

            <div class="absolute inset-0 bg-linear-to-t from-slate-800/20 via-transparent to-slate-950/80"></div>
          </div>
        <?php endwhile; ?>

      <?php else: ?>
        <!-- Fallback: نمونه ثابت -->
        <div class="swiper-slide">
          <div class="h-full hero-slide absolute inset-0">
            <img
              src="<?php echo esc_url(get_template_directory_uri() . '/assets/slider_8.jpg'); ?>"
              class="h-full w-full object-cover"
              alt="<?php echo esc_attr(get_bloginfo('name')); ?>" />
          </div>
          <div class="absolute inset-0 top-0 left-0 z-10 flex items-center">
            <div class="container mx-auto slide-content">
              <p class="text-white/85 text-sm mb-3"><?php bloginfo('name'); ?></p>
              <h1 class="text-3xl sm:text-5xl font-extrabold text-white leading-[1.2]">مسیر امن صادرات و واردات</h1>
              <p class="mt-4 max-w-xl text-white/85">از تأمین تا حمل و ترخیص، با شبکه‌ای قابل اعتماد.</p>
              <div class="mt-10 flex gap-3">
                <a href="#consult" class="px-5 py-3 rounded-full bg-blue-600/90 hover:bg-blue-600 text-white text-sm font-semibold shadow-lg shadow-blue-500/20">مشاوره رایگان</a>
                <a href="#services" class="group flex items-center justify-center gap-2 px-5 py-3 text-white/90 hover:text-blue-600 transition-colors duration-300">
                  <span>خدمات</span>
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    stroke-width="1.5" stroke="currentColor" class="size-5 transition-transform duration-300 group-hover:-translate-x-1">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 15.75 3 12m0 0 3.75-3.75M3 12h18" />
                  </svg>
                </a>
              </div>
            </div>
          </div>
        </div>
      <?php endif; ?>
    </div>

    <!-- <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
        <div class="autoplay-progress">
          <svg viewBox="0 0 48 48">
            <circle cx="24" cy="24" r="20"></circle>
          </svg>
          <span></span>
        </div> -->
    <!-- Bottom control bar -->
    <div class="w-full px-5 md:px-0 absolute bottom-0 inset-x-0 z-30">
      <div class="container mx-auto">
        <div class="flex items-center justify-between py-5">
          <!-- 3) Autoplay progress -->
          <div class="autoplay-progress relative w-11 h-11 grid place-items-center text-white/90">
            <svg class="absolute inset-0" viewBox="0 0 48 48">
              <!-- حلقه پس‌زمینه -->
              <circle class="track" cx="24" cy="24" r="20" />
              <!-- حلقه پیشرفت -->
              <circle class="indicator" cx="24" cy="24" r="20" />
            </svg>
            <span class="text-[11px] font-semibold"></span>
          </div>

          <!-- 2) Center Scroll Button -->
          <div class="text-white/80">
            <button
              id="scrollDownBtn"
              class="relative w-10 h-10 rounded-full flex items-center justify-center overflow-visible"
              aria-label="Scroll to next section">
              <svg
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
                stroke-width="1.5"
                stroke="currentColor"
                class="w-4 h-4 text-white relative z-10">
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  d="M19.5 8.25 12 15.75 4.5 8.25" />
              </svg>
              <span
                class="pulse-ring absolute inset-0 rounded-full pointer-events-none"></span>
            </button>
          </div>

          <!-- 1) Arrows -->

          <div class="flex items-center gap-2">
            <button
              class="hero-prev w-11 h-11 grid place-items-center rounded-full bg-white/15 hover:bg-white/25 text-white transition">
              <!-- چپ -->
              <svg
                xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 24 24"
                class="w-5 h-5"
                fill="none"
                stroke="currentColor"
                stroke-width="1.5">
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
              </svg>
            </button>
            <button
              class="hero-next w-11 h-11 grid place-items-center rounded-full bg-white/15 hover:bg-white/25 text-white transition">
              <!-- راست -->
              <svg
                xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 24 24"
                class="w-5 h-5"
                fill="none"
                stroke="currentColor"
                stroke-width="1.5">
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" />
              </svg>
            </button>
          </div>

        </div>
      </div>
    </div>
  </div>

</section>

<!-- ================= Services ================= -->
<section id="services" class="relative py-20 bg-slate-100" dir="rtl">
  <div class="text-gray-700 text-center max-w-3xl mx-auto mb-10">
    <h2 class="text-2xl sm:text-3xl font-extrabold">
      خدمات لجستیکی یکپارچه
    </h2>
    <p class="text-gray-500 mt-5 text-sm sm:text-base leading-relaxed">
      سپند راه آگرین با تکیه بر تجربه‌ی بین‌المللی، شبکه‌ای گسترده از
      مسیرهای حمل دریایی، هوایی و زمینی را پوشش می‌دهد. از برنامه‌ریزی حمل
      تا ترخیص و مشاوره‌ی بازرگانی، خدمات ما به‌گونه‌ای طراحی شده‌اند تا
      زنجیره‌ی تأمین شما را سریع‌تر، دقیق‌تر و مقرون‌به‌صرفه‌تر سازند.
    </p>
  </div>

  <!-- Swiper -->
  <div class="container mx-auto swiper services-swiper px-4 md:px-10">
    <div class="swiper-wrapper">
      <?php
      $q = new WP_Query([
        'post_type'      => 'service',
        'post_status'    => 'publish',
        'posts_per_page' => -1,
        'orderby'        => ['menu_order' => 'ASC', 'date' => 'DESC'], // اولویت با ترتیب دستی
      ]);

      if ($q->have_posts()) :
        while ($q->have_posts()) : $q->the_post();
          $title = get_the_title();
          $link  = get_permalink();

          // تصویر شاخص (سایز اختصاصی) یا fallback
          $thumb_html = '';
          if (has_post_thumbnail()) {
            $thumb_html = get_the_post_thumbnail(
              get_the_ID(),
              'service-card',
              [
                'class'    => 'absolute inset-0 w-full h-full object-cover transition-transform duration-700 ease-out will-change-transform group-hover:scale-105',
                'alt'      => $title,
                'loading'  => 'lazy',
                'decoding' => 'async',
              ]
            );
          }
          $fallback = get_template_directory_uri() . '/assets/service_default.jpg';
      ?>
          <!-- Slide -->
          <div class="swiper-slide group">
            <article class="relative h-[400px] rounded-2xl overflow-hidden">
              <!-- BG image: only this zooms on hover -->
              <?php if ($thumb_html) : ?>
                <?php echo $thumb_html; ?>
              <?php else: ?>
                <img
                  src="<?php echo esc_url($fallback); ?>"
                  class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 ease-out will-change-transform group-hover:scale-105"
                  alt="<?php echo esc_attr($title); ?>"
                  loading="lazy"
                  decoding="async" />
              <?php endif; ?>

              <div class="absolute inset-0 bg-linear-to-t from-black via-black/10 to-transparent"></div>

              <!-- Title (linked) -->
              <div class="absolute bottom-6 right-6 z-10 text-white">
                <span class="px-3 py-1 text-[11px] rounded-full bg-white/20 backdrop-blur-sm">
                  <?php echo esc_html($title); ?>
                </span>
                <h3 class="mt-2 text-xl font-bold drop-shadow">
                  <a href="<?php echo esc_url($link); ?>" class="hover:underline underline-offset-4">
                    <?php echo esc_html($title); ?>
                  </a>
                </h3>
              </div>

              <!-- Glass overlay with description + CTA -->
              <div class="absolute inset-0 z-10 p-6 flex flex-col justify-end bg-white/10 backdrop-blur-md opacity-0 translate-y-3 transition-all duration-500 group-hover:opacity-100 group-hover:translate-y-0 focus-within:opacity-100 focus-within:translate-y-0">
                <p class="text-white/90 text-sm text-center">
                  خدمات ارزش‌افزا برای زنجیره تأمین شما.
                </p>
                <a href="<?php echo esc_url($link); ?>"
                  class="mt-4 inline-flex justify-center items-center gap-2 text-sm text-white/90 hover:text-white rounded-full px-4 py-2 bg-white/15 hover:bg-blue-600 text-center transition-all duration-500 ease-in-out">
                  <?php echo esc_html($title); ?>
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 15.75 3 12m0 0 3.75-3.75M3 12h18" />
                  </svg>
                </a>
              </div>
            </article>
          </div>
        <?php
        endwhile;
        wp_reset_postdata();
      else:
        // اگر هنوز سرویسی نیست، یک اسلاید پیش‌فرض بگذار
        ?>
        <div class="swiper-slide group">
          <article class="relative h-[400px] rounded-2xl overflow-hidden">
            <img
              src="<?php echo esc_url(get_template_directory_uri() . '/assets/service_default.jpg'); ?>"
              class="absolute inset-0 w-full h-full object-cover"
              alt="<?php echo esc_attr(get_bloginfo('name')); ?>"
              loading="lazy"
              decoding="async" />
            <div class="absolute inset-0 bg-linear-to-t from-black via-black/10 to-transparent"></div>
            <div class="absolute bottom-6 right-6 z-10 text-white">
              <span class="px-3 py-1 text-[11px] rounded-full bg-white/20 backdrop-blur-sm">سرویس</span>
              <h3 class="mt-2 text-xl font-bold drop-shadow">
                <a href="#" class="hover:underline underline-offset-4">نمونه سرویس</a>
              </h3>
            </div>
            <div class="absolute inset-0 z-10 p-6 flex flex-col justify-end bg-white/10 backdrop-blur-md">
              <p class="text-white/90 text-sm text-center">خدمات ارزش‌افزا برای زنجیره تأمین شما.</p>
              <a href="#" class="mt-4 inline-flex justify-center items-center gap-2 text-sm text-white/90 hover:text-white rounded-full px-4 py-2 bg-white/15 hover:bg-blue-600">
                نمونه سرویس
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                  stroke-width="1.5" stroke="currentColor" class="size-6">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 15.75 3 12m0 0 3.75-3.75M3 12h18" />
                </svg>
              </a>
            </div>
          </article>
        </div>
      <?php endif; ?>
    </div>

    <div class="swiper-pagination mt-10"></div>
    <!-- Arrows (بدون تغییر) -->
    <!-- <div class="mt-8 flex items-center justify-between">
    <button class="service-prev proj-next w-10 h-10 rounded-full bg-slate-900 text-white grid place-items-center hover:bg-slate-800">
      <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
        <path stroke-linecap="round" stroke-linejoin="round" d="M9 4.5l7.5 7.5L9 19.5"/>
      </svg>
    </button>
    <button class="service-next proj-next w-10 h-10 rounded-full bg-slate-900 text-white grid place-items-center hover:bg-slate-800">
      <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
        <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.5L7.5 12 15 4.5"/>
      </svg>
    </button>
  </div> -->
  </div>
</section>


<!-- ============== Global Presence (SVG Placeholder) ============== -->

<section dir="rtl" class="container mx-auto px-6 md:px-10 py-20">
  <!-- Head -->
  <div class="text-center max-w-3xl mx-auto mb-10">
    <h2 class="text-gray-700 text-2xl sm:text-3xl font-extrabold">
      حضور فعال در بازارهای جهانی
    </h2>
    <p class="text-gray-500 mt-5 text-sm sm:text-base">
      حضور جهانی سپند راه آگرین بر پایه‌ی شبکه‌ای معتبر از نمایندگان و
      همکاری با فورواردِرهای بزرگ دنیاست. به‌عنوان عضو اتاق بازرگانی و با
      سابقه‌ی چارتری، بخش‌هایی از اروپا، CIS، ترکیه و عراق را پوشش
      می‌دهیم.
    </p>
  </div>

  <!-- نقشه + پین‌ها -->
  <div class="relative rounded-2xl overflow-hidden">
    <div class="relative aspect-[21/9]">
      <!-- نقشه -->
      <img
        src="<?php echo esc_url(app_asset('assets/images/map_slate.svg')); ?>"
        alt="نقشه سپند راه آگرین"
        class="absolute inset-0 w-full h-full object-fit select-none pointer-events-none"
        draggable="false" />

      <!-- پاپ‌اور -->
      <div id="mapPopover"
        class="absolute z-20 hidden max-w-[78vw] sm:max-w-64 rounded-xl bg-white shadow-xl ring-1 ring-black/5 p-4 text-sm leading-6 overflow-hidden">
        <div class="font-semibold text-slate-900" id="popoverTitle"></div>
        <div class="mt-1 text-slate-600 break-words" id="popoverBody"></div>
      </div>

      <!-- Pins (مختصات درصدی ثابت) -->
      <!-- اتحادیه اروپا -->
      <button class="map-pin" style="top: 36%; left: 56%;"
        aria-label="اتحادیه اروپا"
        data-title="اتحادیه اروپا"
        data-body="هاب‌های اصلی اروپا؛ پوشش عمده بنادر و کوریدورهای زمینی."></button>

      <!-- انگلیس -->
      <button class="map-pin" style="top: 33%; left: 51%;"
        aria-label="انگلیس"
        data-title="انگلیس"
        data-body="دریایی/هوایی به لندن، منچستر؛ ترخیص و تحویل سراسری."></button>

      <!-- دبی -->
      <button class="map-pin" style="top: 46%; left: 58%;"
        aria-label="دبی"
        data-title="دُبی"
        data-body="هاب خاورمیانه؛ تجمیع، ترخیص، ری‌اکسپورت و کراس‌استاف."></button>

      <!-- هند -->
      <button class="map-pin" style="top: 50%; left: 62%;"
        aria-label="هند"
        data-title="هند"
        data-body="FCL/LCL از بمبئی/نهاواشوا و چنای؛ زمان‌بندی منظم."></button>

      <!-- چین -->
      <button class="map-pin" style="top: 38%; left: 72%;"
        aria-label="چین"
        data-title="چین"
        data-body="شانگهای، نینگبو، شنژن و… به بنادر منطقه و ایران."></button>

      <!-- کره -->
      <button class="map-pin" style="top: 35%; left: 76%;"
        aria-label="کره"
        data-title="کره"
        data-body="بوسان/اینچئون؛ تخصص در قطعات صنعتی و الکترونیک."></button>
    </div>
    <!-- توضیحات پایین (گرید) -->
    <div class="mt-8 grid gap-4 grid-cols-2 lg:grid-cols-3">
      <article class="rounded-xl bg-slate-100 px-4 py-5">
        <h4 class="font-semibold text-slate-900">چین</h4>
        <p class="mt-1 text-slate-600 text-sm">ارسال منظم از شانگهای، نینگبو، شنژن؛ پوشش مسیرهای دریایی/هوایی.</p>
      </article>
      <article class="rounded-xl bg-slate-100 px-4 py-5">
        <h4 class="font-semibold text-slate-900">کره</h4>
        <p class="mt-1 text-slate-600 text-sm">بوسان و اینچئون؛ مناسب واردات قطعات دقیق و الکترونیک.</p>
      </article>
      <article class="rounded-xl bg-slate-100 px-4 py-5">
        <h4 class="font-semibold text-slate-900">هند</h4>
        <p class="mt-1 text-slate-600 text-sm">FCL/LCL منظم از بمبئی/نهاواشوا و چنای با ترانزیت رقابتی.</p>
      </article>
      <article class="rounded-xl bg-slate-100 px-4 py-5">
        <h4 class="font-semibold text-slate-900">دبی</h4>
        <p class="mt-1 text-slate-600 text-sm">هاب عملیاتی؛ تجمیع، ترخیص سریع، ری‌اکسپورت و کراس‌استاف.</p>
      </article>
      <article class="rounded-xl bg-slate-100 px-4 py-5">
        <h4 class="font-semibold text-slate-900">اتحادیه اروپا</h4>
        <p class="mt-1 text-slate-600 text-sm">پوشش بنادر بزرگ و مسیرهای زمینی؛ ترانزیت و تحویل Door-to-Door.</p>
      </article>
      <article class="rounded-xl bg-slate-100 px-4 py-5">
        <h4 class="font-semibold text-slate-900">انگلیس</h4>
        <p class="mt-1 text-slate-600 text-sm">راهکار دریایی/هوایی؛ هاب‌های لندن و منچستر با خدمات تکمیلی.</p>
      </article>
    </div>
  </div>


</section>

<style>
  .map-pin {
    position: absolute;
    width: 14px;
    height: 14px;
    border-radius: 9999px;
    background: #2563eb;
    /* blue-600 */
    transform: translate(-50%, -50%);
    box-shadow: 0 0 0 4px rgb(37 99 235 / 0.25);
    outline: none;
    border: 0;
    cursor: pointer;
    animation: mapPulse 2.2s ease-out infinite;
    will-change: transform, box-shadow;
    touch-action: manipulation;
  }

  .map-pin::after {
    content: '';
    position: absolute;
    inset: 0;
    border-radius: inherit;
    background: rgba(255, 255, 255, .9);
    transform: scale(.35);
  }

  @keyframes mapPulse {
    0% {
      box-shadow: 0 0 0 4px rgb(37 99 235 / 0.25);
    }

    60% {
      box-shadow: 0 0 0 14px rgb(37 99 235 / 0.00);
    }

    100% {
      box-shadow: 0 0 0 4px rgb(37 99 235 / 0.25);
    }
  }
</style>

<script>
  (function() {
    const pop = document.getElementById('mapPopover');
    const pTit = document.getElementById('popoverTitle');
    const pBody = document.getElementById('popoverBody');
    const pins = Array.from(document.querySelectorAll('.map-pin'));
    const root = pins[0]?.closest('.relative'); // ظرفی که aspect دارد
    let shownFor = null; // id دکمه‌ی فعال

    function positionPopover(pin) {
      const pinRect = pin.getBoundingClientRect();
      const contRect = root.getBoundingClientRect();

      // محاسبه موقعیت مطلوب
      let top = (pinRect.top - contRect.top) - 12; // پیش‌فرض: بالای پین
      let left = (pinRect.left - contRect.left) + 16;

      // ابتدا نمایش بدیم تا ابعاد واقعی رو بگیریم
      pop.classList.remove('hidden');
      const popRect = pop.getBoundingClientRect();

      // اگر بالای پین جا نشد، زیر پین نمایش بده
      if (top - popRect.height < 8) {
        top = (pinRect.top - contRect.top) + 18; // زیر پین
      } else {
        top = top - popRect.height; // بالای پین
      }

      // کلمپ افقی برای جلوگیری ازOverflow
      const minL = 8;
      const maxL = contRect.width - popRect.width - 8;
      left = Math.max(minL, Math.min(left, maxL));

      pop.style.top = `${Math.round(top)}px`;
      pop.style.left = `${Math.round(left)}px`;
    }

    function showPopover(pin) {
      pTit.textContent = pin.dataset.title || '';
      pBody.textContent = pin.dataset.body || '';
      positionPopover(pin);
      pop.dataset.for = pin.dataset.title || '';
      shownFor = pin;
    }

    function hidePopover() {
      pop.classList.add('hidden');
      shownFor = null;
    }

    // Hover برای دسکتاپ
    pins.forEach(pin => {
      pin.addEventListener('mouseenter', () => showPopover(pin));
      pin.addEventListener('mouseleave', (e) => {
        // اگر موس از پین خارج شد ولی روی خود پاپ‌اور رفت، بسته نشه
        const related = e.relatedTarget;
        if (!pop.contains(related)) hidePopover();
      });
      // Tap/Click برای موبایل و دسکتاپ
      pin.addEventListener('click', (e) => {
        e.stopPropagation();
        if (shownFor === pin) {
          hidePopover();
        } else {
          showPopover(pin);
        }
      });
    });

    // خروج از پاپ‌اور/کلیک بیرون برای بستن
    document.addEventListener('click', (e) => {
      if (!pop.contains(e.target) && !pins.includes(e.target)) hidePopover();
    });

    // اگر موس وارد پاپ‌اور شد، خروجی ازش بستن رو مدیریت کن
    pop.addEventListener('mouseleave', hidePopover);
    pop.addEventListener('click', (e) => e.stopPropagation());

    // ریسایز/اسکرین چنج: اگر بازه، دوباره جای‌گذاری کن
    window.addEventListener('resize', () => {
      if (shownFor) positionPopover(shownFor);
    });
  })();
</script>



<!-- ============== Projects / Carousel ============== -->
<section id="projects" class="relative py-16 bg-slate-100">
  <div class="container mx-auto">
    <!-- Head -->
    <div class="flex items-center justify-between gap-4 mb-8">
      <div class="max-w-3xl">
        <h2 class="text-2xl sm:text-3xl font-extrabold text-slate-900">
          پروژه‌ها و فعالیت‌ها
        </h2>
        <p class="mt-3 text-sm sm:text-base text-slate-600">
          نمونه‌هایی واقعی از مسیرهای انجام‌شده؛ از OOG اروپا تا پروژه‌های
          دمای کنترل‌شده‌ی ایران.
        </p>
      </div>

    </div>

    <!-- Carousel -->
    <div class="swiper projects-swiper">
      <div class="swiper-wrapper">
        <!-- Card 1 -->
        <a class="swiper-slide group block">
          <article
            class="relative overflow-hidden rounded-2xl bg-slate-900 text-white min-h-[300px]">
            <img
              class="absolute inset-0 w-full h-full object-cover group-hover:scale-105 transition duration-500"
              src="https://images.unsplash.com/photo-1581092795360-fd1ca04f0952?q=80&w=1600&auto=format&fit=crop"
              alt="" />
            <div
              class="absolute inset-0 bg-linear-to-t from-black/70 via-black/10 to-transparent"></div>
            <div class="absolute bottom-0 p-5">
              <h3 class="font-bold">
                حمل‌های دمای‌ کنترل‌شده فارما از فرانکفورت به تهران
              </h3>
              <p class="mt-1 text-white/80 text-sm">سرویس اکسپرس</p>
            </div>
          </article>
        </a>

        <!-- Card 2 -->
        <a class="swiper-slide group block">
          <article
            class="relative overflow-hidden rounded-2xl bg-slate-900 text-white min-h-[300px]">
            <img
              class="absolute inset-0 w-full h-full object-cover group-hover:scale-105 transition duration-500"
              src="https://images.unsplash.com/photo-1503376780353-7e6692767b70?q=80&w=1600&auto=format&fit=crop"
              alt="" />
            <div
              class="absolute inset-0 bg-linear-to-t from-black/70 via-black/10 to-transparent"></div>
            <div class="absolute bottom-0 p-5">
              <h3 class="font-bold">
                گروپاژ دریایی قطعات یدکی از شنژن به گمرک شهیدرجایی
              </h3>
              <p class="mt-1 text-white/80 text-sm">دریایی LCL</p>
            </div>
          </article>
        </a>

        <!-- Card 3 -->
        <a class="swiper-slide group block">
          <article
            class="relative overflow-hidden rounded-2xl bg-slate-900 text-white min-h-[300px]">
            <img
              class="absolute inset-0 w-full h-full object-cover group-hover:scale-105 transition duration-500"
              src="https://images.unsplash.com/photo-1517511620798-cec17d428bc0?q=80&w=1600&auto=format&fit=crop"
              alt="" />
            <div
              class="absolute inset-0 bg-linear-to-t from-black/70 via-black/10 to-transparent"></div>
            <div class="absolute bottom-0 p-5">
              <h3 class="font-bold">
                حمل تجهیزات فوق‌ابعاد (OOG) از آنتورپ به عسلوایه
              </h3>
              <p class="mt-1 text-white/80 text-sm">ترکیبی جاده/دریا</p>
            </div>
          </article>
        </a>

        <!-- Card 4 -->
        <a class="swiper-slide group block">
          <article
            class="relative overflow-hidden rounded-2xl bg-slate-900 text-white min-h-[300px]">
            <img
              class="absolute inset-0 w-full h-full object-cover group-hover:scale-105 transition duration-500"
              src="https://images.unsplash.com/photo-1529078155058-5d716f45d604?q=80&w=1600&auto=format&fit=crop"
              alt="" />
            <div
              class="absolute inset-0 bg-linear-to-t from-black/70 via-black/10 to-transparent"></div>
            <div class="absolute bottom-0 p-5">
              <h3 class="font-bold">
                اکسپرس هوایی قطعات حساس از دبی به تبریز
              </h3>
              <p class="mt-1 text-white/80 text-sm">هوایی اکسپرس</p>
            </div>
          </article>
        </a>

        <!-- Card 5 -->
        <a class="swiper-slide group block">
          <article
            class="relative overflow-hidden rounded-2xl bg-slate-900 text-white min-h-[300px]">
            <img
              class="absolute inset-0 w-full h-full object-cover group-hover:scale-105 transition duration-500"
              src="https://images.unsplash.com/photo-1529078155058-5d716f45d604?q=80&w=1600&auto=format&fit=crop"
              alt="" />
            <div
              class="absolute inset-0 bg-linear-to-t from-black/70 via-black/10 to-transparent"></div>
            <div class="absolute bottom-0 p-5">
              <h3 class="font-bold">
                اکسپرس هوایی قطعات حساس از دبی به تبریز
              </h3>
              <p class="mt-1 text-white/80 text-sm">هوایی اکسپرس</p>
            </div>
          </article>
        </a>
      </div>
    </div>
          <!-- Controls on ONE side -->
      <div class="flex justify-between items-center gap-3 mt-10 px">
        <a
          href="/projects"
          class="hidden sm:inline text-sm text-slate-700 hover:text-slate-900">مشاهده همه پروژه‌ها</a>
        <div class="flex items-center gap-2">
          <button
            class="proj-prev w-10 h-10 rounded-full bg-slate-900 text-white grid place-items-center hover:bg-slate-800"
            aria-label="قبلی">
            <svg
              width="18"
              height="18"
              viewBox="0 0 24 24"
              fill="none"
              stroke="currentColor"
              stroke-width="2">
              <path d="M9 6l6 6-6 6" />
            </svg>
          </button>
          <button
            class="proj-next w-10 h-10 rounded-full bg-slate-900 text-white grid place-items-center hover:bg-slate-800"
            aria-label="بعدی">
            <!-- chevron-left (RTL) -->
            <svg
              width="18"
              height="18"
              viewBox="0 0 24 24"
              fill="none"
              stroke="currentColor"
              stroke-width="2">
              <path d="M15 18l-6-6 6-6" />
            </svg>
          </button>
        </div>
      </div>
  </div>
</section>





<section dir="rtl" class="container mx-auto px-6 md:px-10 py-24">
  <!-- Head -->
  <div class="text-center max-w-3xl mx-auto mb-10">
    <h2 class="text-2xl sm:text-3xl font-extrabold text-slate-900">
      مرکز دانش و بلاگ
    </h2>
    <p class="mt-3 text-slate-600 text-sm sm:text-base">
      راهنمای عملی حمل‌ونقل بین‌الملل؛ از انتخاب شیوه‌ی حمل تا اینکوترمز،
      بیمه، ترخیص و نکات کاهش زمان و هزینه.
    </p>
    <a
      href="/knowledge"
      class="inline-flex items-center gap-2 mt-4 text-sm font-semibold text-blue-700 hover:text-blue-800">
      رفتن به صفحه‌ی اصلی دانش‌نامه
      <svg
        width="16"
        height="16"
        viewBox="0 0 24 24"
        fill="none"
        stroke="currentColor"
        stroke-width="2">
        <path d="M9 18l6-6-6-6" />
      </svg>
    </a>
  </div>
  <div class="grid gap-10 sm:grid-cols-2 lg:grid-cols-3">
    <!-- Card -->
    <a href="/blog/signs-of-infestation" class="group block rounded-2xl">
      <div class="overflow-hidden rounded-2xl bg-slate-100">
        <img
          src="https://images.unsplash.com/photo-1504196606672-aef5c9cefc92?q=80&w=1200&auto=format&fit=crop"
          alt="نشانه‌های آلودگی آفت"
          class="w-full h-[260px] object-cover transition-transform duration-700 ease-out group-hover:scale-105" />
      </div>
      <div class="mt-4 space-y-2">
        <div class="flex items-center gap-2 text-sm text-slate-500">
          <span>۱۵ بهمن ۱۴۰۳</span>
          <span class="w-1 h-1 rounded-full bg-slate-400"></span>
          <span>۴ دقیقه مطالعه</span>
        </div>
        <h3 class="text-lg font-semibold text-slate-900 leading-snug transition-colors group-hover:text-slate-700">
          نشانه‌هایی از آلودگی آفات که نباید نادیده بگیرید
        </h3>
      </div>
    </a>

    <!-- Card -->
    <a href="/blog/best-solutions" class="group block rounded-2xl">
      <div class="overflow-hidden rounded-2xl bg-slate-100">
        <img
          src="https://images.unsplash.com/photo-1517511620798-cec17d428bc0?q=80&w=1200&auto=format&fit=crop"
          alt="بهترین راهکارهای کنترل آفات"
          class="w-full h-[260px] object-cover transition-transform duration-700 ease-out group-hover:scale-105" />
      </div>
      <div class="mt-4 space-y-2">
        <div class="flex items-center gap-2 text-sm text-slate-500">
          <span>۹ بهمن ۱۴۰۳</span>
          <span class="w-1 h-1 rounded-full bg-slate-400"></span>
          <span>۵ دقیقه مطالعه</span>
        </div>
        <h3 class="text-lg font-semibold text-slate-900 leading-snug transition-colors group-hover:text-slate-700">
          بهترین راهکارهای کنترل آفات برای کسب‌وکار شما
        </h3>
      </div>
    </a>

    <!-- Card -->
    <a href="/blog/keep-home-pest-free" class="group block rounded-2xl">
      <div class="overflow-hidden rounded-2xl bg-slate-100">
        <img
          src="https://images.unsplash.com/photo-1581092795360-fd1ca04f0952?q=80&w=1200&auto=format&fit=crop"
          alt="خانه بدون آفت"
          class="w-full h-[260px] object-cover transition-transform duration-700 ease-out group-hover:scale-105" />
      </div>
      <div class="mt-4 space-y-2">
        <div class="flex items-center gap-2 text-sm text-slate-500">
          <span>۶ بهمن ۱۴۰۳</span>
          <span class="w-1 h-1 rounded-full bg-slate-400"></span>
          <span>۳ دقیقه مطالعه</span>
        </div>
        <h3 class="text-lg font-semibold text-slate-900 leading-snug transition-colors group-hover:text-slate-700">
          چگونه در تمام سال خانه‌ای بدون آفت داشته باشیم
        </h3>
      </div>
    </a>
  </div>
</section>


<!-- FAQ Section – Tailwind + Vanilla JS | RTL -->
<section id="faq" dir="rtl" class="mx-auto max-w-4xl px-4 md:px-6 py-12">
  <!-- Heading -->
  <header class="mb-8 text-center">
    <h2 class="text-2xl md:text-3xl font-bold tracking-tight text-slate-900 dark:text-slate-50">
      سوالات متداول
    </h2>
    <p class="mt-2 text-slate-600 dark:text-slate-300 text-sm md:text-base">
      پاسخ سریع به پرتکرارترین پرسش‌ها؛ برای جزئیات بیشتر روی هر مورد بزنید.
    </p>
  </header>

  <!-- Accordion container -->
  <div class="space-y-3">

    <!-- Item -->
    <article class="rounded-xl border border-slate-200 dark:border-slate-700 bg-white/70 dark:bg-slate-900/50 shadow-sm">
      <h3>
        <button
          type="button"
          class="faq-trigger w-full flex items-center justify-between gap-4 px-4 md:px-6 py-4 text-right"
          aria-expanded="false"
          aria-controls="faq-1"
        >
          <span class="text-sm md:text-base font-semibold text-slate-900 dark:text-slate-100">
            هزینه حمل چطور محاسبه می‌شود؟
          </span>
          <span class="faq-icon inline-flex h-6 w-6 shrink-0 items-center justify-center rounded-full border border-slate-300 dark:border-slate-600">
            <svg class="h-3.5 w-3.5 transition-transform" viewBox="0 0 24 24" fill="none" stroke="currentColor">
              <path d="M6 9l6 6 6-6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
          </span>
        </button>
      </h3>
      <div id="faq-1" class="faq-panel grid grid-rows-[0fr] transition-[grid-template-rows] duration-300 ease-out">
        <div class="overflow-hidden">
          <div class="px-4 md:px-6 pb-5 pt-0 text-slate-700 dark:text-slate-300 text-sm md:text-[15px] leading-6">
            کرایه بر اساس مود حمل (هوایی/دریایی/زمینی)، مبدأ/مقصد و
            <strong>وزن واقعی یا حجمی</strong> (بزرگ‌تر ملاک) محاسبه می‌شود. در گروپاژ زمینی امکان محاسبه بر اساس
            <strong>m³ یا لودینگ‌متر (LDM)</strong> هم وجود دارد.
            <a href="/blog/what-is-chargeable-weight-and-how-to-calculate" class="underline decoration-slate-300 hover:decoration-slate-700">بیشتر بخوانید</a>.
          </div>
        </div>
      </div>
    </article>

    <!-- Item -->
    <article class="rounded-xl border border-slate-200 dark:border-slate-700 bg-white/70 dark:bg-slate-900/50 shadow-sm">
      <h3>
        <button type="button" class="faq-trigger w-full flex items-center justify-between gap-4 px-4 md:px-6 py-4"
          aria-expanded="false" aria-controls="faq-2">
          <span class="text-sm md:text-base font-semibold text-slate-900 dark:text-slate-100">
            چه مدارکی برای شروع لازم است؟
          </span>
          <span class="faq-icon inline-flex h-6 w-6 shrink-0 items-center justify-center rounded-full border border-slate-300 dark:border-slate-600">
            <svg class="h-3.5 w-3.5 transition-transform" viewBox="0 0 24 24" fill="none" stroke="currentColor">
              <path d="M6 9l6 6 6-6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
          </span>
        </button>
      </h3>
      <div id="faq-2" class="faq-panel grid grid-rows-[0fr] transition-[grid-template-rows] duration-300 ease-out">
        <div class="overflow-hidden">
          <div class="px-4 md:px-6 pb-5 text-slate-700 dark:text-slate-300 text-sm md:text-[15px] leading-6">
            حداقل <strong>Commercial Invoice</strong> و <strong>Packing List</strong>. بسته به کالا/مسیر ممکن است
            <strong>HS Code، گواهی مبدأ (CO)، استاندارد/بهداشت، MSDS</strong> لازم باشد.
            <a href="/blog/checklist-invoice-packinglist-co" class="underline decoration-slate-300 hover:decoration-slate-700">چک‌لیست اسناد</a>.
          </div>
        </div>
      </div>
    </article>

    <!-- Item -->
    <article class="rounded-xl border border-slate-200 dark:border-slate-700 bg-white/70 dark:bg-slate-900/50 shadow-sm">
      <h3>
        <button type="button" class="faq-trigger w-full flex items-center justify-between gap-4 px-4 md:px-6 py-4"
          aria-expanded="false" aria-controls="faq-3">
          <span class="text-sm md:text-base font-semibold text-slate-900 dark:text-slate-100">
            LCL/LTL بهتر است یا FCL/FTL؟
          </span>
          <span class="faq-icon inline-flex h-6 w-6 shrink-0 items-center justify-center rounded-full border border-slate-300 dark:border-slate-600">
            <svg class="h-3.5 w-3.5 transition-transform" viewBox="0 0 24 24" fill="none" stroke="currentColor">
              <path d="M6 9l6 6 6-6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
          </span>
        </button>
      </h3>
      <div id="faq-3" class="faq-panel grid grid-rows-[0fr] transition-[grid-template-rows] duration-300 ease-out">
        <div class="overflow-hidden">
          <div class="px-4 md:px-6 pb-5 text-slate-700 dark:text-slate-300 text-sm md:text-[15px] leading-6">
            برای حجم‌های کم یا ارسال‌های آزمایشی، معمولاً <strong>LCL/LTL</strong> اقتصادی‌تر است. نزدیک
            <strong>۷۰–۸۰٪ ظرفیت</strong>، <strong>FCL/FTL</strong> سریع‌تر و مقرون‌به‌صرفه‌تر می‌شود.
            <a href="/blog/lcl-vs-fcl-which-is-cheaper" class="underline">راهنمای LCL/FCL</a> ·
            <a href="/blog/ftl-vs-ltl-road-freight-guide" class="underline">راهنمای FTL/LTL</a>
          </div>
        </div>
      </div>
    </article>

    <!-- Item -->
    <article class="rounded-xl border border-slate-200 dark:border-slate-700 bg-white/70 dark:bg-slate-900/50 shadow-sm">
      <h3>
        <button type="button" class="faq-trigger w-full flex items-center justify-between gap-4 px-4 md:px-6 py-4"
          aria-expanded="false" aria-controls="faq-4">
          <span class="text-sm md:text-base font-semibold text-slate-900 dark:text-slate-100">
            دموراژ/دتنتشن چیست و چگونه از آن جلوگیری کنیم؟
          </span>
          <span class="faq-icon inline-flex h-6 w-6 shrink-0 items-center justify-center rounded-full border border-slate-300 dark:border-slate-600">
            <svg class="h-3.5 w-3.5 transition-transform" viewBox="0 0 24 24" fill="none" stroke="currentColor">
              <path d="M6 9l6 6 6-6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
          </span>
        </button>
      </h3>
      <div id="faq-4" class="faq-panel grid grid-rows-[0fr] transition-[grid-template-rows] duration-300 ease-out">
        <div class="overflow-hidden">
          <div class="px-4 md:px-6 pb-5 text-slate-700 dark:text-slate-300 text-sm md:text-[15px] leading-6">
            دموراژ = ماندگاری کانتینر <strong>پر</strong> در بندر بعد از <strong>Free Time</strong>. دتنتشن = نگهداری
            کانتینر <strong>خالی</strong> خارج از بندر بیش از حد مجاز. راهکار: آماده‌سازی اسناد قبل از ETA، رزرو حمل
            داخلی، <strong>Cross-Dock</strong> سریع.
          </div>
        </div>
      </div>
    </article>

    <!-- Item -->
    <article class="rounded-xl border border-slate-200 dark:border-slate-700 bg-white/70 dark:bg-slate-900/50 shadow-sm">
      <h3>
        <button type="button" class="faq-trigger w-full flex items-center justify-between gap-4 px-4 md:px-6 py-4"
          aria-expanded="false" aria-controls="faq-5">
          <span class="text-sm md:text-base font-semibold text-slate-900 dark:text-slate-100">
            اینکوترمز روی هزینه و ریسک چه اثری دارد؟
          </span>
          <span class="faq-icon inline-flex h-6 w-6 shrink-0 items-center justify-center rounded-full border border-slate-300 dark:border-slate-600">
            <svg class="h-3.5 w-3.5 transition-transform" viewBox="0 0 24 24" fill="none" stroke="currentColor">
              <path d="M6 9l6 6 6-6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
          </span>
        </button>
      </h3>
      <div id="faq-5" class="faq-panel grid grid-rows-[0fr] transition-[grid-template-rows] duration-300 ease-out">
        <div class="overflow-hidden">
          <div class="px-4 md:px-6 pb-5 text-slate-700 dark:text-slate-300 text-sm md:text-[15px] leading-6">
            اصطلاحاتی مثل <strong>CIP/CIF</strong> فروشنده را ملزم به بیمه می‌کند؛ در <strong>DAP/DPU</strong> کرایه تا
            مقصد با فروشنده ولی حقوق و عوارض واردات با خریدار است. نوشتن غلط، منشأ اختلاف و تأخیر می‌شود.
            <a href="/blog/incoterms-2020-exw-to-ddp-guide" class="underline">راهنمای اینکوترمز</a>.
          </div>
        </div>
      </div>
    </article>

    <!-- Item -->
    <article class="rounded-xl border border-slate-200 dark:border-slate-700 bg-white/70 dark:bg-slate-900/50 shadow-sm">
      <h3>
        <button type="button" class="faq-trigger w-full flex items-center justify-between gap-4 px-4 md:px-6 py-4"
          aria-expanded="false" aria-controls="faq-6">
          <span class="text-sm md:text-base font-semibold text-slate-900 dark:text-slate-100">
            کالای خطرناک (ADR) و یخچالی را پوشش می‌دهید؟
          </span>
          <span class="faq-icon inline-flex h-6 w-6 shrink-0 items-center justify-center rounded-full border border-slate-300 dark:border-slate-600">
            <svg class="h-3.5 w-3.5 transition-transform" viewBox="0 0 24 24" fill="none" stroke="currentColor">
              <path d="M6 9l6 6 6-6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
          </span>
        </button>
      </h3>
      <div id="faq-6" class="faq-panel grid grid-rows-[0fr] transition-[grid-template-rows] duration-300 ease-out">
        <div class="overflow-hidden">
          <div class="px-4 md:px-6 pb-5 text-slate-700 dark:text-slate-300 text-sm md:text-[15px] leading-6">
            بله. برای ADR: اعلام <strong>UN Number، کلاس/گروه بسته‌بندی، بسته‌بندی UN-Approved و لیبلینگ</strong> الزامی است.
            برای یخچالی: <strong>Pre-Cool، Set-Point، Logger</strong> و تحویل زمان‌بندی‌شده انجام می‌شود.
            <a href="/services/adr" class="underline">حمل ADR</a> ·
            <a href="/services/cold-chain" class="underline">حمل یخچالی</a>
          </div>
        </div>
      </div>
    </article>

    <!-- Item -->
    <article class="rounded-xl border border-slate-200 dark:border-slate-700 bg-white/70 dark:bg-slate-900/50 shadow-sm">
      <h3>
        <button type="button" class="faq-trigger w-full flex items-center justify-between gap-4 px-4 md:px-6 py-4"
          aria-expanded="false" aria-controls="faq-7">
          <span class="text-sm md:text-base font-semibold text-slate-900 dark:text-slate-100">
            ترخیص و تحویل چندمقصدی داخل ایران را هم انجام می‌دهید؟
          </span>
          <span class="faq-icon inline-flex h-6 w-6 shrink-0 items-center justify-center rounded-full border border-slate-300 dark:border-slate-600">
            <svg class="h-3.5 w-3.5 transition-transform" viewBox="0 0 24 24" fill="none" stroke="currentColor">
              <path d="M6 9l6 6 6-6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
          </span>
        </button>
      </h3>
      <div id="faq-7" class="faq-panel grid grid-rows-[0fr] transition-[grid-template-rows] duration-300 ease-out">
        <div class="overflow-hidden">
          <div class="px-4 md:px-6 pb-5 text-slate-700 dark:text-slate-300 text-sm md:text-[15px] leading-6">
            بله؛ با شبکهٔ داخلی، <strong>Door Delivery چندنقطه‌ای</strong> و
            <strong>POD دیجیتال</strong> (رسید تحویل) ارائه می‌شود. برای کاهش هزینه، مسیرها را بهینه و Slot تحویل رزرو می‌کنیم.
            <a href="/services/domestic-distribution" class="underline">توزیع داخلی</a>.
          </div>
        </div>
      </div>
    </article>

    <!-- Item -->
    <article class="rounded-xl border border-slate-200 dark:border-slate-700 bg-white/70 dark:bg-slate-900/50 shadow-sm">
      <h3>
        <button type="button" class="faq-trigger w-full flex items-center justify-between gap-4 px-4 md:px-6 py-4"
          aria-expanded="false" aria-controls="faq-8">
          <span class="text-sm md:text-base font-semibold text-slate-900 dark:text-slate-100">
            چگونه محموله‌ام را رهگیری کنم؟
          </span>
          <span class="faq-icon inline-flex h-6 w-6 shrink-0 items-center justify-center rounded-full border border-slate-300 dark:border-slate-600">
            <svg class="h-3.5 w-3.5 transition-transform" viewBox="0 0 24 24" fill="none" stroke="currentColor">
              <path d="M6 9l6 6 6-6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
          </span>
        </button>
      </h3>
      <div id="faq-8" class="faq-panel grid grid-rows-[0fr] transition-[grid-template-rows] duration-300 ease-out">
        <div class="overflow-hidden">
          <div class="px-4 md:px-6 pb-5 text-slate-700 dark:text-slate-300 text-sm md:text-[15px] leading-6">
            از طریق داشبورد رهگیری ما که <strong>Milestone</strong>‌ها (بارگیری، خروج، مرز، ورود، تحویل) و
            <strong>ETA پویا</strong> را نشان می‌دهد. امکان لینک اشتراکی بدون ورود هم هست.
            <a href="/features/track-and-trace" class="underline">جزئیات سامانه رهگیری</a>.
          </div>
        </div>
      </div>
    </article>

  </div>
</section>

<script>
  // Accessible Accordion (no external deps)
  document.querySelectorAll('.faq-trigger').forEach(btn => {
    btn.addEventListener('click', () => togglePanel(btn));
    btn.addEventListener('keydown', (e) => {
      if (e.key === 'Enter' || e.key === ' ') { e.preventDefault(); togglePanel(btn); }
    });
  });

  function togglePanel(btn) {
    const expanded = btn.getAttribute('aria-expanded') === 'true';
    const panel = document.getElementById(btn.getAttribute('aria-controls'));
    // collapse all siblings (optional: comment out to allow multiple open)
    document.querySelectorAll('.faq-trigger[aria-expanded="true"]').forEach(openBtn => {
      if (openBtn !== btn) {
        openBtn.setAttribute('aria-expanded', 'false');
        const p = document.getElementById(openBtn.getAttribute('aria-controls'));
        p.style.gridTemplateRows = '0fr';
        openBtn.querySelector('.faq-icon svg').style.transform = 'rotate(0deg)';
      }
    });
    // toggle current
    btn.setAttribute('aria-expanded', String(!expanded));
    panel.style.gridTemplateRows = expanded ? '0fr' : '1fr';
    btn.querySelector('.faq-icon svg').style.transform = expanded ? 'rotate(0deg)' : 'rotate(180deg)';
  }
</script>


<?php
get_footer();
