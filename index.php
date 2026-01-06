<?php

/**
 * Template Name: Blog (Posts Index)
 */
get_header();

$paged = max(1, (int) get_query_var('paged'));
$q = new WP_Query([
  'post_type' => 'post',
  'posts_per_page' => 10,
  'paged' => $paged,
  'ignore_sticky_posts' => true,
]);

$cats = get_categories(['hide_empty' => true, 'orderby' => 'name', 'order' => 'ASC']);

function sr_read_time($id)
{
  $w = str_word_count(wp_strip_all_tags(get_post_field('post_content', $id)));
  return max(1, ceil($w / 200)) . ' دقیقه مطالعه';
}
?>

<!-- Header -->
<section class="pt-40 pb-10 bg-slate-900">
  <div class="container mx-auto max-w-7xl px-4">
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
      <div>
        <h1 class="text-3xl sm:text-4xl font-extrabold text-white">مقالات دانشنامه</h1>
        <p class="mt-2 text-sm text-slate-300 max-w-xl">
          راهنماها، چک‌لیست‌ها و تحلیل‌های عملی برای بهینه‌سازی فرایندهای حمل‌ونقل بین‌المللی.
        </p>
      </div>

      <form role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>" class="flex items-center gap-3">
        <div class="relative">
          <input
            id="searchInput"
            type="search"
            name="s"
            value="<?php echo esc_attr(get_search_query()); ?>"
            placeholder="جستجو در مقالات..."
            class="w-64 pr-10 pl-4 py-2 rounded-lg border border-slate-700 bg-slate-800 text-sm text-slate-100 placeholder:text-slate-400 focus:outline-none focus:ring-1 focus:ring-blue-400" />
          <button
            type="button"
            aria-label="پاک کردن"
            class="absolute left-2 top-1/2 -translate-y-1/2 text-slate-400"
            onclick="document.getElementById('searchInput').value=''">✕</button>
        </div>
        <a
          href="<?php echo esc_url(get_post_type_archive_link('post') ?: home_url('/blog')); ?>"
          class="px-4 py-2 rounded-lg border border-slate-700 text-sm text-slate-100 bg-slate-800 hover:bg-slate-700 transition">
          مشاهده همه
        </a>
      </form>
    </div>

    <?php if ($cats): ?>
      <div class="mt-6">
        <div class="flex gap-2 overflow-x-auto py-2">
          <a
            href="<?php echo esc_url(get_post_type_archive_link('post') ?: home_url('/blog')); ?>"
            class="px-3 py-2 rounded-full bg-slate-800 text-sm text-slate-100 whitespace-nowrap hover:bg-slate-700 transition">
            همه
          </a>
          <?php foreach ($cats as $c): ?>
            <a
              href="<?php echo esc_url(get_category_link($c->term_id)); ?>"
              class="px-3 py-2 rounded-full border border-slate-700 text-sm text-slate-200 hover:bg-slate-800 whitespace-nowrap transition">
              <?php echo esc_html($c->name); ?>
            </a>
          <?php endforeach; ?>
        </div>
      </div>
    <?php endif; ?>
  </div>
</section>

<main class="container mx-auto max-w-7xl px-4 py-12">
  <?php if ($q->have_posts()): ?>

    <section class="grid gap-10 sm:grid-cols-2 lg:grid-cols-3" aria-live="polite">
      <?php
      while ($q->have_posts()):
        $q->the_post();

        $permalink = get_permalink();
        $title     = get_the_title();
        $date_h    = get_the_date();
        $read_time = sr_read_time(get_the_ID());

        $thumb_id  = get_post_thumbnail_id();
        $thumb_url = $thumb_id
          ? wp_get_attachment_image_url($thumb_id, 'large')
          : get_template_directory_uri() . '/assets/placeholder-1200x800.jpg';

        $thumb_alt = $thumb_id
          ? get_post_meta($thumb_id, '_wp_attachment_image_alt', true)
          : $title;
      ?>
        <!-- Card: استایل مشابه صفحه‌ی نخست -->
        <a href="<?php echo esc_url($permalink); ?>" class="group block rounded-2xl">
          <div class="overflow-hidden rounded-2xl bg-slate-100">
            <img
              src="<?php echo esc_url($thumb_url); ?>"
              alt="<?php echo esc_attr($thumb_alt); ?>"
              class="w-full h-[260px] object-cover transition-transform duration-700 ease-out group-hover:scale-105" />
          </div>
          <div class="mt-4 space-y-2">
            <div class="flex items-center gap-2 text-sm text-slate-500">
              <span><?php echo esc_html($date_h); ?></span>
              <span class="w-1 h-1 rounded-full bg-slate-400"></span>
              <span><?php echo esc_html($read_time); ?></span>
            </div>
            <h3 class="text-lg font-semibold text-slate-900 leading-snug transition-colors group-hover:text-slate-700">
              <?php echo esc_html($title); ?>
            </h3>
          </div>
        </a>
      <?php endwhile; wp_reset_postdata(); ?>
    </section>

    <!-- Pagination -->
    <?php
    $links = paginate_links([
      'base'      => str_replace(999999999, '%#%', esc_url(get_pagenum_link(999999999))),
      'format'    => '?paged=%#%',
      'current'   => max(1, $paged),
      'total'     => $q->max_num_pages,
      'type'      => 'array',
      'prev_text' => '« قبلی',
      'next_text' => 'بعدی »',
    ]);

    if (is_array($links)): ?>
      <nav class="mt-10">
        <ul class="flex flex-wrap items-center justify-center gap-2">
          <?php foreach ($links as $link): ?>
            <li class="text-sm">
              <?php
              $link = preg_replace(
                '/class=\'page-numbers current\'/',
                'class="page-numbers px-3 py-1.5 rounded-lg bg-blue-600 text-white"',
                $link
              );
              $link = str_replace(
                'page-numbers',
                'page-numbers px-3 py-1.5 rounded-lg border border-slate-200',
                $link
              );
              echo $link; // WordPress outputs sanitized HTML for pagination
              ?>
            </li>
          <?php endforeach; ?>
        </ul>
      </nav>
    <?php endif; ?>

  <?php else: ?>
    <p class="text-slate-600 text-center">هنوز مقاله‌ای منتشر نشده است.</p>
  <?php endif; ?>
</main>

<?php get_footer(); ?>
