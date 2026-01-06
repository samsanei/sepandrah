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
                        target="<?php echo esc_attr($main_l['target'] ?: '_self'); ?>" class="group inline-flex items-center gap-3 rounded-full bg-white/20 backdrop-blur-md text-white px-1 py-1 text-sm font-semibold shadow-lg transition-all duration-300 hover:shadow-xl hover:-translate-y-[1px]">
                        <span class="ps-3"><?php echo esc_html($main_l['title'] ?: 'مشاوره رایگان'); ?></span>
                        <span class="w-8 h-8 rounded-full bg-blue-900 text-white flex items-center justify-center transition-transform duration-300 group-hover:scale-110">
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

            <div class="absolute inset-0 bg-linear-to-t from-black/20 via-black/10 to-black/80"></div>
          </div>
        <?php endwhile; ?>
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

<!-- ============== Services / Carousel (Project Style) ============== -->
<section id="services" class="relative py-16 bg-slate-100 px-5 md:px-0">
  <div class="container mx-auto">

    <!-- Head -->
    <div class="flex items-center justify-between gap-4 mb-8">
      <div class="max-w-3xl">
        <h2 class="text-2xl sm:text-3xl font-extrabold text-slate-900">
          خدمات لجستیکی
        </h2>
        <p class="mt-3 text-sm sm:text-base text-slate-600">
          مجموعه‌ای یکپارچه از خدمات حمل‌ونقل، ترخیص و مشاوره بازرگانی؛
          متناسب با نیازهای زنجیره تأمین شما.
        </p>
      </div>
    </div>

    <!-- Carousel -->
    <div class="swiper services-swiper">
      <div class="swiper-wrapper">

        <?php
        $services = new WP_Query([
          'post_type'      => 'service',
          'post_status'    => 'publish',
          'posts_per_page' => -1,
          'orderby'        => ['menu_order' => 'ASC', 'date' => 'DESC'],
        ]);

        if ($services->have_posts()) :
          while ($services->have_posts()) : $services->the_post();
            $title = get_the_title();
            $link  = get_permalink();
            $thumb = has_post_thumbnail()
              ? get_the_post_thumbnail_url(get_the_ID(), 'large')
              : get_template_directory_uri() . '/assets/service_default.jpg';
        ?>

        <!-- Card -->
        <a href="<?php echo esc_url($link); ?>" class="swiper-slide group block">
          <article class="relative overflow-hidden rounded-2xl bg-slate-900 text-white min-h-[300px]">

            <img
              src="<?php echo esc_url($thumb); ?>"
              alt="<?php echo esc_attr($title); ?>"
              class="absolute inset-0 w-full h-full object-cover transition duration-500 group-hover:scale-105"
              loading="lazy"
              decoding="async"
            />

            <div class="absolute inset-0 bg-linear-to-t from-black/70 via-black/10 to-transparent"></div>

            <div class="absolute bottom-0 p-5">
              <h3 class="font-bold text-base sm:text-lg leading-snug">
                <?php echo esc_html($title); ?>
              </h3>
              <p class="mt-1 text-white/80 text-sm">
                خدمات لجستیکی و حمل‌ونقل
              </p>
            </div>

          </article>
        </a>

        <?php
          endwhile;
          wp_reset_postdata();
        else:
        ?>

        <!-- Fallback -->
        <div class="swiper-slide">
          <article class="relative overflow-hidden rounded-2xl bg-slate-900 text-white min-h-[300px] flex items-end p-5">
            <h3 class="font-bold">سرویس نمونه</h3>
          </article>
        </div>

        <?php endif; ?>

      </div>
    </div>

    <!-- Controls -->
    <div class="flex justify-between items-center gap-3 mt-10">
      <a href="/services" class="text-slate-800 hover:text-slate-900 underline">
        مشاهده همه خدمات
      </a>

      <div class="flex items-center gap-2">
        <button
          class="cursor-pointer serv-prev w-10 h-10 rounded-full bg-slate-900 text-white grid place-items-center hover:bg-slate-800"
          aria-label="قبلی">
          <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <path d="M9 6l6 6-6 6" />
          </svg>
        </button>

        <button
          class="cursor-pointer serv-next w-10 h-10 rounded-full bg-slate-900 text-white grid place-items-center hover:bg-slate-800"
          aria-label="بعدی">
          <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <path d="M15 18l-6-6 6-6" />
          </svg>
        </button>
      </div>
    </div>

  </div>
</section>



<!-- ============== Global Presence (SVG Placeholder) ============== -->

<section class="bg-slate-950  px-5 md:px-0">
  <div class="container mx-auto px-6 md:px-10 py-20">
    <!-- Head -->
    <div class="text-center max-w-3xl mx-auto mb-10">
      <h2 class="text-gray-100 text-2xl sm:text-3xl font-extrabold">
        حضور فعال در بازارهای جهانی
      </h2>
      <p class="text-gray-100 mt-5 text-sm sm:text-base">
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
        <button class="map-pin" style="top: 20%; left: 46%;"
          aria-label="انگلیس"
          data-title="انگلیس"
          data-body="دریایی/هوایی به لندن، منچستر؛ ترخیص و تحویل سراسری."></button>
  
        <!-- دبی -->
        <button class="map-pin" style="top: 40%; left: 60%;"
          aria-label="دبی"
          data-title="دُبی"
          data-body="هاب خاورمیانه؛ تجمیع، ترخیص، ری‌اکسپورت و کراس‌استاف."></button>
  
        <!-- هند -->
        <button class="map-pin" style="top: 46%; left: 66%;"
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
        <article class="rounded-xl bg-slate-500/50 px-4 py-5">
          <h4 class="font-semibold text-gray-100">چین</h4>
          <p class="mt-1 text-gray-100 text-sm">ارسال منظم از شانگهای، نینگبو، شنژن؛ پوشش مسیرهای دریایی/هوایی.</p>
        </article>
        <article class="rounded-xl bg-slate-500/50 px-4 py-5">
          <h4 class="font-semibold text-gray-100">کره</h4>
          <p class="mt-1 text-gray-100 text-sm">بوسان و اینچئون؛ مناسب واردات قطعات دقیق و الکترونیک.</p>
        </article>
        <article class="rounded-xl bg-slate-500/50 px-4 py-5">
          <h4 class="font-semibold text-gray-100">هند</h4>
          <p class="mt-1 text-gray-100 text-sm">FCL/LCL منظم از بمبئی/نهاواشوا و چنای با ترانزیت رقابتی.</p>
        </article>
        <article class="rounded-xl bg-slate-500/50 px-4 py-5">
          <h4 class="font-semibold text-gray-100">دبی</h4>
          <p class="mt-1 text-gray-100 text-sm">هاب عملیاتی؛ تجمیع، ترخیص سریع، ری‌اکسپورت و کراس‌استاف.</p>
        </article>
        <article class="rounded-xl bg-slate-500/50 px-4 py-5">
          <h4 class="font-semibold text-gray-100">اتحادیه اروپا</h4>
          <p class="mt-1 text-gray-100 text-sm">پوشش بنادر بزرگ و مسیرهای زمینی؛ ترانزیت و تحویل Door-to-Door.</p>
        </article>
        <article class="rounded-xl bg-slate-500/50 px-4 py-5">
          <h4 class="font-semibold text-gray-100">انگلیس</h4>
          <p class="mt-1 text-gray-100 text-sm">راهکار دریایی/هوایی؛ هاب‌های لندن و منچستر با خدمات تکمیلی.</p>
        </article>
      </div>
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





<?php
// کوئری آخرین مقالات بلاگ
$sr_blog_query = new WP_Query([
  'post_type'      => 'post',
  'posts_per_page' => 3,
  'ignore_sticky_posts' => true,
]);

// تابع زمان مطالعه (در صورت نیاز)
if ( ! function_exists('sr_read_time') ) {
  function sr_read_time($id){
    $w = str_word_count( wp_strip_all_tags( get_post_field('post_content', $id) ) );
    return max(1, ceil($w/200)) . ' دقیقه مطالعه';
  }
}
?>

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
      href="<?php echo esc_url( home_url('/knowledge') ); ?>"
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
    <?php if ( $sr_blog_query->have_posts() ) : ?>
      <?php while ( $sr_blog_query->have_posts() ) : $sr_blog_query->the_post(); ?>
        <?php
          $permalink = get_permalink();
          $title     = get_the_title();
          $date_h    = get_the_date(); // اگر جلالی نصب باشه، خودش جلالی نشون می‌ده
          $read_time = sr_read_time( get_the_ID() );

          $thumb_id  = get_post_thumbnail_id();
          $thumb_url = $thumb_id
            ? wp_get_attachment_image_url( $thumb_id, 'large' )
            : get_template_directory_uri() . '/assets/placeholder-1200x800.jpg';

          $thumb_alt = $thumb_id
            ? get_post_meta( $thumb_id, '_wp_attachment_image_alt', true )
            : $title;
        ?>

        <!-- Card -->
        <a href="<?php echo esc_url( $permalink ); ?>" class="group block rounded-2xl">
          <div class="overflow-hidden rounded-2xl bg-slate-100">
            <img
              src="<?php echo esc_url( $thumb_url ); ?>"
              alt="<?php echo esc_attr( $thumb_alt ); ?>"
              class="w-full h-[260px] object-cover transition-transform duration-700 ease-out group-hover:scale-105" />
          </div>
          <div class="mt-4 space-y-2">
            <div class="flex items-center gap-2 text-sm text-slate-500">
              <span><?php echo esc_html( $date_h ); ?></span>
              <span class="w-1 h-1 rounded-full bg-slate-400"></span>
              <span><?php echo esc_html( $read_time ); ?></span>
            </div>
            <h3 class="text-lg font-semibold text-slate-900 leading-snug transition-colors group-hover:text-slate-700">
              <?php echo esc_html( $title ); ?>
            </h3>
          </div>
        </a>
      <?php endwhile; wp_reset_postdata(); ?>
    <?php else : ?>
      <p class="text-sm text-slate-500 col-span-full text-center">
        هنوز مقاله‌ای منتشر نشده است.
      </p>
    <?php endif; ?>
  </div>
</section>



<!-- FAQ Section – Tailwind + Vanilla JS | RTL -->
<section id="faq" class="bg-slate-100">
  <div class="container mx-auto max-w-4xl px-4 md:px-6 py-12">
    <!-- Heading -->
    <header class="mb-8 text-center">
      <h2 class="text-2xl md:text-3xl font-bold tracking-tight text-slate-800">
        سوالات متداول
      </h2>
      <p class="mt-2 text-slate-600 dark:text-slate-300 text-sm md:text-base">
        پاسخ سریع به پرتکرارترین پرسش‌ها؛ برای جزئیات بیشتر روی هر مورد بزنید.
      </p>
    </header>
  
    <!-- Accordion container -->
    <div class="space-y-3">
  
      <!-- Item -->
      <article class="rounded-xl bg-slate-400/40 shadow-sm">
        <h3>
          <button
            type="button"
            class="faq-trigger w-full flex items-center justify-between gap-4 px-4 md:px-6 py-6 text-right"
            aria-expanded="false"
            aria-controls="faq-1"
          >
            <span class="text-sm font-semibold text-slate-800">
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
            <div class="px-4 md:px-6 pb-5 pt-0 text-slate-700 text-sm md:text-[15px] leading-6">
              کرایه بر اساس مود حمل (هوایی/دریایی/زمینی)، مبدأ/مقصد و
              <strong>وزن واقعی یا حجمی</strong> (بزرگ‌تر ملاک) محاسبه می‌شود. در گروپاژ زمینی امکان محاسبه بر اساس
              <strong>m³ یا لودینگ‌متر (LDM)</strong> هم وجود دارد.
              <a href="/blog/what-is-chargeable-weight-and-how-to-calculate" class="underline decoration-slate-300 hover:decoration-slate-700">بیشتر بخوانید</a>.
            </div>
          </div>
        </div>
      </article>
  
      <!-- Item -->
      <article class="rounded-xl bg-slate-400/40 shadow-sm">
        <h3>
          <button type="button" class="faq-trigger w-full flex items-center justify-between gap-4 px-4 md:px-6 py-6"
            aria-expanded="false" aria-controls="faq-2">
            <span class="text-sm font-semibold text-slate-800">
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
            <div class="px-4 md:px-6 pb-5 text-slate-700 text-sm md:text-[15px] leading-6">
              حداقل <strong>Commercial Invoice</strong> و <strong>Packing List</strong>. بسته به کالا/مسیر ممکن است
              <strong>HS Code، گواهی مبدأ (CO)، استاندارد/بهداشت، MSDS</strong> لازم باشد.
              <a href="/blog/checklist-invoice-packinglist-co" class="underline decoration-slate-300 hover:decoration-slate-700">چک‌لیست اسناد</a>.
            </div>
          </div>
        </div>
      </article>
  
      <!-- Item -->
      <article class="rounded-xl bg-slate-400/40 shadow-sm">
        <h3>
          <button type="button" class="faq-trigger w-full flex items-center justify-between gap-4 px-4 md:px-6 py-6"
            aria-expanded="false" aria-controls="faq-3">
            <span class="text-sm font-semibold text-slate-800">
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
            <div class="px-4 md:px-6 pb-5 text-slate-700 text-sm md:text-[15px] leading-6">
              برای حجم‌های کم یا ارسال‌های آزمایشی، معمولاً <strong>LCL/LTL</strong> اقتصادی‌تر است. نزدیک
              <strong>۷۰–۸۰٪ ظرفیت</strong>، <strong>FCL/FTL</strong> سریع‌تر و مقرون‌به‌صرفه‌تر می‌شود.
              <a href="/blog/lcl-vs-fcl-which-is-cheaper" class="underline">راهنمای LCL/FCL</a> ·
              <a href="/blog/ftl-vs-ltl-road-freight-guide" class="underline">راهنمای FTL/LTL</a>
            </div>
          </div>
        </div>
      </article>
  
      <!-- Item -->
      <article class="rounded-xl bg-slate-400/40 shadow-sm">
        <h3>
          <button type="button" class="faq-trigger w-full flex items-center justify-between gap-4 px-4 md:px-6 py-6"
            aria-expanded="false" aria-controls="faq-4">
            <span class="text-sm font-semibold text-slate-800">
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
            <div class="px-4 md:px-6 pb-5 text-slate-700 text-sm md:text-[15px] leading-6">
              دموراژ = ماندگاری کانتینر <strong>پر</strong> در بندر بعد از <strong>Free Time</strong>. دتنتشن = نگهداری
              کانتینر <strong>خالی</strong> خارج از بندر بیش از حد مجاز. راهکار: آماده‌سازی اسناد قبل از ETA، رزرو حمل
              داخلی، <strong>Cross-Dock</strong> سریع.
            </div>
          </div>
        </div>
      </article>
  
      <!-- Item -->
      <article class="rounded-xl bg-slate-400/40 shadow-sm">
        <h3>
          <button type="button" class="faq-trigger w-full flex items-center justify-between gap-4 px-4 md:px-6 py-6"
            aria-expanded="false" aria-controls="faq-5">
            <span class="text-sm font-semibold text-slate-800">
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
            <div class="px-4 md:px-6 pb-5 text-slate-700 text-sm md:text-[15px] leading-6">
              اصطلاحاتی مثل <strong>CIP/CIF</strong> فروشنده را ملزم به بیمه می‌کند؛ در <strong>DAP/DPU</strong> کرایه تا
              مقصد با فروشنده ولی حقوق و عوارض واردات با خریدار است. نوشتن غلط، منشأ اختلاف و تأخیر می‌شود.
              <a href="/blog/incoterms-2020-exw-to-ddp-guide" class="underline">راهنمای اینکوترمز</a>.
            </div>
          </div>
        </div>
      </article>
  
      <!-- Item -->
      <article class="rounded-xl bg-slate-400/40 shadow-sm">
        <h3>
          <button type="button" class="faq-trigger w-full flex items-center justify-between gap-4 px-4 md:px-6 py-6"
            aria-expanded="false" aria-controls="faq-6">
            <span class="text-sm font-semibold text-slate-800">
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
            <div class="px-4 md:px-6 pb-5 text-slate-700 text-sm md:text-[15px] leading-6">
              بله. برای ADR: اعلام <strong>UN Number، کلاس/گروه بسته‌بندی، بسته‌بندی UN-Approved و لیبلینگ</strong> الزامی است.
              برای یخچالی: <strong>Pre-Cool، Set-Point، Logger</strong> و تحویل زمان‌بندی‌شده انجام می‌شود.
              <a href="/services/adr" class="underline">حمل ADR</a> ·
              <a href="/services/cold-chain" class="underline">حمل یخچالی</a>
            </div>
          </div>
        </div>
      </article>
  
      <!-- Item -->
      <article class="rounded-xl bg-slate-400/40 shadow-sm">
        <h3>
          <button type="button" class="faq-trigger w-full flex items-center justify-between gap-4 px-4 md:px-6 py-6"
            aria-expanded="false" aria-controls="faq-7">
            <span class="text-sm font-semibold text-slate-800">
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
            <div class="px-4 md:px-6 pb-5 text-slate-700 text-sm md:text-[15px] leading-6">
              بله؛ با شبکهٔ داخلی، <strong>Door Delivery چندنقطه‌ای</strong> و
              <strong>POD دیجیتال</strong> (رسید تحویل) ارائه می‌شود. برای کاهش هزینه، مسیرها را بهینه و Slot تحویل رزرو می‌کنیم.
              <a href="/services/domestic-distribution" class="underline">توزیع داخلی</a>.
            </div>
          </div>
        </div>
      </article>
  
      <!-- Item -->
      <article class="rounded-xl bg-slate-400/40 shadow-sm">
        <h3>
          <button type="button" class="faq-trigger w-full flex items-center justify-between gap-4 px-4 md:px-6 py-6"
            aria-expanded="false" aria-controls="faq-8">
            <span class="text-sm font-semibold text-slate-800">
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
            <div class="px-4 md:px-6 pb-5 text-slate-700 text-sm md:text-[15px] leading-6">
              از طریق داشبورد رهگیری ما که <strong>Milestone</strong>‌ها (بارگیری، خروج، مرز، ورود، تحویل) و
              <strong>ETA پویا</strong> را نشان می‌دهد. امکان لینک اشتراکی بدون ورود هم هست.
              <a href="/features/track-and-trace" class="underline">جزئیات سامانه رهگیری</a>.
            </div>
          </div>
        </div>
      </article>
  
    </div>
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
