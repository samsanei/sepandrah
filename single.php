<?php
get_header();
the_post();

/** ========== Helpers ========== */
if (!function_exists('app_reading_time')) {
    function app_reading_time($post = null, $wpm = 200)
    {
        $content = get_post_field('post_content', $post ?: get_the_ID());
        $words = str_word_count(wp_strip_all_tags($content));
        $mins = max(1, ceil($words / max(120, intval($wpm))));
        return $mins;
    }
}

// داده‌های داینامیک
$title     = get_the_title();
$permalink = get_permalink();
$author    = get_the_author();
$date_iso  = get_the_date('c');
$date_hmn  = get_the_date(get_option('date_format'));
$read_min  = app_reading_time();
$cats      = get_the_category();
$tags      = get_the_tags();

// لینک آرشیو بلاگ
$page_for_posts = intval(get_option('page_for_posts'));
$blog_link = $page_for_posts ? get_permalink($page_for_posts) : get_post_type_archive_link('post');

// Social share
$enc_url = urlencode($permalink);
$enc_title = urlencode($title);
$share = [
    'linkedin' => "https://www.linkedin.com/sharing/share-offsite/?url={$enc_url}",
    'twitter'  => "https://twitter.com/intent/tweet?url={$enc_url}&text={$enc_title}",
    'facebook' => "https://www.facebook.com/sharer/sharer.php?u={$enc_url}",
];

// تصویر هیرو (شاخص)
$hero_img_html = '';
if (has_post_thumbnail()) {
    $hero_img_html = get_the_post_thumbnail(
        get_the_ID(),
        'large',
        [
            'class' => 'w-full h-full object-cover',
            'alt' => esc_attr($title),
            'loading' => 'eager',
            'decoding' => 'async',
        ]
    );
} else {
    $fallback = get_template_directory_uri() . '/assets/banner.jpg';
    $hero_img_html = '<img src="' . esc_url($fallback) . '" class="w-full h-full object-cover" alt="' . esc_attr($title) . '">';
}
?>

<!-- ===== Hero: تصویر با Overlay ملایم ===== -->
<section id="post-hero" class="mx-auto relative">
  <div class="h-[50vh] w-full relative overflow-hidden">
    <div class="hero-media absolute inset-0">
      <?php echo $hero_img_html; // همان img شاخص که قبلا ساختیم (class و alt دارد) ?>
      <div class="hero-overlay" aria-hidden="true"></div>
    </div>

    <div class="absolute inset-0 container mx-auto max-w-7xl flex items-end px-5 pt-16">
      <div class="text-right pb-8">
        <!-- دسته‌بندی اصلی -->
        <?php if (!empty($cats)) : 
          $cat = $cats[0]; ?>
          <a href="<?php echo esc_url(get_category_link($cat)); ?>"
             class="inline-flex items-center px-3 py-1 rounded-full bg-white/20 text-white/90 text-[11px] backdrop-blur-sm mb-2">
            <?php echo esc_html($cat->name); ?>
          </a>
        <?php endif; ?>

        <!-- عنوان اصلی -->
        <h1 class="text-3xl sm:text-4xl font-extrabold text-white leading-tight">
          <?php echo esc_html($title); ?>
        </h1>

        <!-- متا: نویسنده + تاریخ + زمان مطالعه -->
        <div class="mt-3 flex flex-wrap items-center gap-3 text-xs text-white/80">
          <span><?php esc_html_e('نویسنده:','bamdad-studio'); ?> <strong class="text-white"><?php echo esc_html($author); ?></strong></span>
          <span>•</span>
          <time datetime="<?php echo esc_attr($date_iso); ?>"><?php echo esc_html($date_hmn); ?></time>
          <span>•</span>
          <span><?php printf(esc_html__('%d دقیقه مطالعه','bamdad-studio'), $read_min); ?></span>
        </div>

        <!-- Breadcrumb -->
        <nav class="mt-4 text-sm text-white/70" aria-label="Breadcrumb">
          <ol class="flex items-center gap-2 text-xs">
            <li><a href="<?php echo esc_url(home_url('/')); ?>" class="hover:underline text-white/60">خانه</a></li>
            <li class="text-white/40">›</li>
            <li><a href="<?php echo esc_url($blog_link); ?>" class="hover:underline text-white/60">دانشنامه</a></li>
            <li class="text-white/40">›</li>
            <li class="font-medium text-white line-clamp-1"><?php echo esc_html($title); ?></li>
          </ol>
        </nav>
      </div>
    </div>
  </div>
</section>

<!-- ===== Main ===== -->
<main class="container mx-auto max-w-7xl px-5 py-12">
  <div class="grid gap-8 md:grid-cols-3">
    <!-- Article -->
    <article class="md:col-span-2 space-y-8">

      <!-- محتوا -->
      <div class="wp-content-wrapper prose prose-slate max-w-none text-slate-700">
        <?php the_content(); ?>
      </div>

      <!-- دسته‌بندی‌ها و تگ‌ها -->
      <footer class="pt-6 border-t mt-6">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
          <div class="flex items-center gap-2 flex-wrap">
            <div class="text-sm text-slate-500"><?php esc_html_e('دسته‌بندی:','bamdad-studio'); ?></div>
            <?php if (!empty($cats)) :
              foreach ($cats as $c) : ?>
                <a href="<?php echo esc_url(get_category_link($c)); ?>"
                   class="px-3 py-1 rounded-full bg-slate-100 text-slate-800 text-sm hover:bg-slate-200 transition">
                  <?php echo esc_html($c->name); ?>
                </a>
            <?php endforeach; else: ?>
              <span class="text-sm text-slate-500">—</span>
            <?php endif; ?>
          </div>

          <div class="flex items-center gap-2 flex-wrap">
            <div class="text-sm text-slate-500"><?php esc_html_e('تگ‌ها:','bamdad-studio'); ?></div>
            <?php if (!empty($tags)) :
              foreach ($tags as $t) : ?>
                <a href="<?php echo esc_url(get_tag_link($t)); ?>"
                   class="text-sm text-blue-600 bg-blue-50 px-2 py-1 rounded hover:bg-blue-100 transition">
                  <?php echo esc_html($t->name); ?>
                </a>
            <?php endforeach; else: ?>
              <span class="text-sm text-slate-500">—</span>
            <?php endif; ?>
          </div>
        </div>

        <!-- اشتراک + قبلی/بعدی -->
        <div class="mt-4 flex items-center justify-between gap-4">
          <div class="flex items-center gap-2">
            <span class="text-sm text-slate-500">اشتراک:</span>
            <a class="w-9 h-9 grid place-items-center rounded-lg bg-blue-600 text-white hover:opacity-90"
               href="<?php echo esc_url($share['linkedin']); ?>" target="_blank" rel="noopener">in</a>
            <a class="w-9 h-9 grid place-items-center rounded-lg bg-sky-500 text-white hover:opacity-90"
               href="<?php echo esc_url($share['twitter']); ?>" target="_blank" rel="noopener">X</a>
            <a class="w-9 h-9 grid place-items-center rounded-lg bg-red-600 text-white hover:opacity-90"
               href="<?php echo esc_url($share['facebook']); ?>" target="_blank" rel="noopener">f</a>
          </div>

          <div class="text-sm text-slate-600 flex items-center gap-2">
            <?php $prev = get_previous_post(); $next = get_next_post(); ?>
            <?php if ($prev) : ?>
              <a href="<?php echo esc_url(get_permalink($prev)); ?>" class="hover:underline">← <?php echo esc_html(get_the_title($prev)); ?></a>
            <?php endif; ?>
            <?php if ($prev && $next) : ?><span>|</span><?php endif; ?>
            <?php if ($next) : ?>
              <a href="<?php echo esc_url(get_permalink($next)); ?>" class="hover:underline"><?php echo esc_html(get_the_title($next)); ?> →</a>
            <?php endif; ?>
          </div>
        </div>
      </footer>

      <!-- دیدگاه‌ها -->
      <?php if (comments_open() || get_comments_number()) : ?>
        <section class="mt-8">
          <?php comments_template(); ?>
        </section>
      <?php endif; ?>
    </article>

    <!-- Sidebar -->
    <aside class="md:col-span-1 space-y-6">
      <div class="rounded-2xl p-5 bg-white shadow-sm">
        <h4 class="font-semibold">مقالات اخیر</h4>
        <ul class="mt-3 space-y-3 text-sm">
          <?php
          $recent = new WP_Query(['post_type' => 'post', 'posts_per_page' => 5]);
          while ($recent->have_posts()) : $recent->the_post(); ?>
            <li><a href="<?php the_permalink(); ?>" class="hover:underline"><?php the_title(); ?></a></li>
          <?php endwhile; wp_reset_postdata(); ?>
        </ul>
      </div>

      <div class="rounded-2xl p-5 bg-white shadow-sm">
        <h4 class="font-semibold">دسته‌بندی‌ها</h4>
        <div class="mt-3 grid gap-2">
          <?php wp_list_categories(['title_li' => '', 'style' => 'none', 'separator' => '', 'show_count' => false, 'hide_empty' => true, 'walker' => new Walker_Category()]); ?>
        </div>
      </div>

      <div class="rounded-2xl p-5 bg-white shadow-sm text-sm">
        <h4 class="font-semibold">خبرنامه</h4>
        <p class="mt-2 text-slate-600">جدیدترین مقالات و نکات عملی را در ایمیل دریافت کنید.</p>
        <form class="mt-3 flex gap-2">
          <input class="flex-1 border rounded-lg px-3 py-2 text-sm" placeholder="ایمیل شما" />
          <button class="px-3 py-2 rounded-lg bg-blue-600 text-white text-sm">عضویت</button>
        </form>
      </div>
    </aside>
  </div>
</main>

<?php get_footer(); ?>
