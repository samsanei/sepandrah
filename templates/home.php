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
              <div class="container mx-auto slide-content">
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
                        target="<?php echo esc_attr($main_l['target'] ?: '_self'); ?>"
                        class="px-5 py-3 rounded-full bg-blue-600/90 hover:bg-blue-600 text-white text-sm font-semibold shadow-lg shadow-blue-500/20">
                        <?php echo esc_html($main_l['title'] ?: 'مشاوره رایگان'); ?>
                      </a>
                    <?php endif; ?>

                    <?php if (is_array($sec_l) && !empty($sec_l['url']) && !isset($sec_l['mime_type'])): ?>
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
                    <?php endif; ?>
                  </div>
                <?php endif; ?>
              </div>
            </div>

            <div class="absolute inset-0 bg-gradient-to-t from-transparent via-black/20 to-black/50"></div>
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
          <div class="absolute inset-0 bg-gradient-to-t from-transparent via-black/20 to-black/50"></div>
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
    <div class="w-full absolute bottom-0 inset-x-0 z-30">
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

  <!-- white overlay under hero for smooth transition to services  -->
  <div
    class="absolute -bottom-24 left-0 right-0 h-24 bg-gradient-to-b from-transparent to-white pointer-events-none"></div>
</section>

<!-- ================= Services ================= -->
<section id="services" class="relative py-16 mt-10" dir="rtl">
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
<section id="global-presence" class="py-16 bg-gray-100" dir="rtl">
  <div class="container mx-auto max-w-7xl">
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

    <!-- Map Wrapper -->
    <div class="relative">
      <!-- جایگزین کن: SVG نقشه‌ات را اینجا قرار بده -->
      <div
        class="aspect-[21/9] grid place-items-center text-slate-500 text-sm">
        <img src="assets/map_blue.svg" alt="" />
      </div>

      <!-- نمونه پین‌ها (اختیاری)؛ بعد از گذاشتن SVG، مختصات را تغییر بده یا حذف کن -->
      <span class="map-pin" style="top: 38%; left: 49%"></span>
      <!-- اروپا -->
      <span class="map-pin" style="top: 46%; left: 56%"></span>
      <!-- خاورمیانه -->
      <span class="map-pin" style="top: 41%; left: 63%"></span>
      <!-- آسیای میانه -->
      <span class="map-pin" style="top: 33%; left: 72%"></span>
      <!-- شرق آسیا -->
    </div>
  </div>
</section>

<!-- استایل کمکی برای پین‌ها (Tailwind با کلاس‌های @apply اگر خواستی انتقال بده) -->
<style>
  .map-pin {
    position: absolute;
    width: 14px;
    height: 14px;
    border-radius: 9999px;
    background: #2563eb;
    box-shadow: 0 0 0 4px rgb(37 99 235 / 0.25);
    transform: translate(-50%, -50%);
  }
</style>

<!-- ============== Projects / Carousel ============== -->
<section id="projects" class="relative py-16 bg-slate-100">
  <div class="container mx-auto max-w-7xl">
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

      <!-- Controls on ONE side -->
      <div class="flex items-center gap-3">
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
            <div class="relative p-5 mt-36">
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
            <div class="relative p-5 mt-36">
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
            <div class="relative p-5 mt-36">
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
            <div class="relative p-5 mt-36">
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
            <div class="relative p-5 mt-36">
              <h3 class="font-bold">
                اکسپرس هوایی قطعات حساس از دبی به تبریز
              </h3>
              <p class="mt-1 text-white/80 text-sm">هوایی اکسپرس</p>
            </div>
          </article>
        </a>
      </div>
    </div>
  </div>
</section>



<!-- ============== Featured Knowledge / Blog ============== -->
<section id="knowledge" class="py-16 bg-slate-100" dir="rtl">
  <div class="container mx-auto max-w-7xl">
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

    <!-- Grid -->
    <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-4">
      <!-- Card 1 -->
      <a
        href="/knowledge/incoterms-2020-basics"
        class="group block rounded-2xl overflow-hidden bg-white shadow-sm hover:shadow-md transition">
        <div class="relative">
          <img
            class="w-full aspect-[4/3] object-cover"
            src="https://images.unsplash.com/photo-1517511620798-cec17d428bc0?q=80&w=1200&auto=format&fit=crop"
            alt="Incoterms 2020" />
          <span
            class="absolute top-3 right-3 text-[11px] px-2.5 py-1 rounded-full bg-black/70 text-white">اینکوترمز</span>
        </div>
        <div class="p-4">
          <h3 class="font-bold text-slate-900 group-hover:text-slate-700">
            اینکوترمز ۲۰۲۰ به زبان ساده: مسئولیت‌ها، هزینه‌ها و ریسک‌ها
          </h3>
          <p class="mt-2 text-slate-600 text-sm">
            راهنمای فشرده برای انتخاب قاعده مناسب (از EXW تا DDP) با
            مثال‌های واردات/صادرات…
          </p>
        </div>
      </a>

      <!-- Card 2 -->
      <a
        href="/knowledge/lcl-vs-fcl"
        class="group block rounded-2xl overflow-hidden bg-white shadow-sm hover:shadow-md transition">
        <div class="relative">
          <img
            class="w-full aspect-[4/3] object-cover"
            src="https://images.unsplash.com/photo-1529078155058-5d716f45d604?q=80&w=1200&auto=format&fit=crop"
            alt="LCL vs FCL" />
          <span
            class="absolute top-3 right-3 text-[11px] px-2.5 py-1 rounded-full bg-black/70 text-white">دریایی</span>
        </div>
        <div class="p-4">
          <h3 class="font-bold text-slate-900 group-hover:text-slate-700">
            راهنمای انتخاب حمل FCL یا LCL؛ دریایی مقرون‌به‌صرفه
          </h3>
          <p class="mt-2 text-slate-600 text-sm">
            کِی اشتراک کانتینر به‌صرفه‌تر است؟ چک‌لیست تصمیم‌گیری + جدول
            هزینه/زمان…
          </p>
        </div>
      </a>

      <!-- Card 3 -->
      <a
        href="/knowledge/cmr-vs-fbl-insurance"
        class="group block rounded-2xl overflow-hidden bg-white shadow-sm hover:shadow-md transition">
        <div class="relative">
          <img
            class="w-full aspect-[4/3] object-cover"
            src="https://images.unsplash.com/photo-1504196606672-aef5c9cefc92?q=80&w=1200&auto=format&fit=crop"
            alt="CMR vs FBL" />
          <span
            class="absolute top-3 right-3 text-[11px] px-2.5 py-1 rounded-full bg-black/70 text-white">بیمه</span>
        </div>
        <div class="p-4">
          <h3 class="font-bold text-slate-900 group-hover:text-slate-700">
            بیمه‌های حمل بین‌الملل: CMR و FBL چه تفاوتی دارند؟
          </h3>
          <p class="mt-2 text-slate-600 text-sm">
            پوشش‌ها، استثناها، سقف مسئولیت و مدارک لازم به زبان ساده…
          </p>
        </div>
      </a>

      <!-- Card 4 -->
      <a
        href="/knowledge/customs-hs-checklist"
        class="group block rounded-2xl overflow-hidden bg-white shadow-sm hover:shadow-md transition">
        <div class="relative">
          <img
            class="w-full aspect-[4/3] object-cover"
            src="https://images.unsplash.com/photo-1581092795360-fd1ca04f0952?q=80&w=1200&auto=format&fit=crop"
            alt="HS & Clearance" />
          <span
            class="absolute top-3 right-3 text-[11px] px-2.5 py-1 rounded-full bg-black/70 text-white">ترخیص</span>
        </div>
        <div class="p-4">
          <h3 class="font-bold text-slate-900 group-hover:text-slate-700">
            چک‌لیست ترخیص و ترانزیت: از HS Code تا مجوزها
          </h3>
          <p class="mt-2 text-slate-600 text-sm">
            مسیر استاندارد مستندسازی، خطاهای رایج و نحوه تسریع تشریفات…
          </p>
        </div>
      </a>
    </div>
  </div>
</section>
<?php $enabled = (bool) app_opt('bs_admin_bar_enable', true);

echo $enabled; ?>
<?php
get_footer();
