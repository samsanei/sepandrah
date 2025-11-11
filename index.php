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

function sr_read_time($id){
  $w = str_word_count( wp_strip_all_tags( get_post_field('post_content', $id) ) );
  return max(1, ceil($w/200)) . ' دقیقه';
}
?>

<section class="pt-20 pb-8 bg-white">
  <div class="container mx-auto max-w-7xl px-4">
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
      <div>
        <h1 class="text-3xl sm:text-4xl font-extrabold text-slate-900">مقالات دانشنامه</h1>
        <p class="mt-2 text-sm text-slate-600 max-w-xl">راهنماها، چک‌لیست‌ها و تحلیل‌های عملی برای بهینه‌سازی فرایندهای حمل‌ونقل بین‌المللی.</p>
      </div>

      <form role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>" class="flex items-center gap-3">
        <div class="relative">
          <input id="searchInput" type="search" name="s" value="<?php echo esc_attr(get_search_query()); ?>"
                 placeholder="جستجو در مقالات..."
                 class="w-64 pr-10 pl-4 py-2 rounded-lg border text-sm focus:outline-none focus:ring-1 focus:ring-blue-300" />
          <button type="button" aria-label="پاک کردن" class="absolute left-2 top-1/2 -translate-y-1/2 text-slate-500"
                  onclick="document.getElementById('searchInput').value=''">✕</button>
        </div>
        <a href="<?php echo esc_url( get_post_type_archive_link('post') ?: home_url('/blog') ); ?>"
           class="px-4 py-2 rounded-lg border border-slate-200 text-sm">مشاهده همه</a>
      </form>
    </div>

    <?php if ($cats): ?>
      <div class="mt-6">
        <div class="flex gap-2 overflow-x-auto py-2">
          <a href="<?php echo esc_url( get_post_type_archive_link('post') ?: home_url('/blog') ); ?>"
             class="px-3 py-2 rounded-full bg-slate-100 text-sm text-slate-800 whitespace-nowrap">همه</a>
          <?php foreach($cats as $c): ?>
            <a href="<?php echo esc_url( get_category_link($c->term_id) ); ?>"
               class="px-3 py-2 rounded-full border border-slate-200 text-sm text-slate-700 hover:bg-slate-50 whitespace-nowrap">
              <?php echo esc_html($c->name); ?>
            </a>
          <?php endforeach; ?>
        </div>
      </div>
    <?php endif; ?>
  </div>
</section>

<main class="container mx-auto max-w-7xl px-4 py-8">
  <div class="grid gap-8 md:grid-cols-3">
    <section class="md:col-span-2 grid gap-6 sm:grid-cols-1 lg:grid-cols-2" aria-live="polite">
      <?php if($q->have_posts()): while($q->have_posts()): $q->the_post();
        $permalink = get_permalink();
        $title = get_the_title();
        $excerpt = get_the_excerpt();
        $thumb_id = get_post_thumbnail_id();
        $thumb_url = $thumb_id ? wp_get_attachment_image_url($thumb_id, 'large') : get_template_directory_uri().'/assets/placeholder-1200x800.jpg';
        $thumb_alt = $thumb_id ? get_post_meta($thumb_id, '_wp_attachment_image_alt', true) : $title;
        $cat = get_the_category();
        $cat_name = $cat ? $cat[0]->name : '';
        $cat_link = $cat ? get_category_link($cat[0]->term_id) : '#';
        $date_h = get_the_date();
        $read_time = sr_read_time(get_the_ID());
      ?>
      <article class="rounded-2xl bg-white shadow-sm overflow-hidden">
        <a href="<?php echo esc_url($permalink); ?>" class="block">
          <div class="relative h-44">
            <img src="<?php echo esc_url($thumb_url); ?>" alt="<?php echo esc_attr($thumb_alt); ?>" class="w-full h-full object-cover" />
            <div class="absolute inset-0 bg-gradient-to-t from-black/35 to-transparent"></div>
            <div class="absolute bottom-3 left-3 flex items-center gap-2">
              <?php if($cat_name): ?>
                <a href="<?php echo esc_url($cat_link); ?>" class="bg-white/10 text-white text-xs px-2 py-1 rounded hover:bg-white/20 transition">
                  <?php echo esc_html($cat_name); ?>
                </a>
              <?php endif; ?>
              <span class="text-xs text-white/80"><?php echo esc_html($date_h); ?> • <?php echo esc_html($read_time); ?></span>
            </div>
          </div>
          <div class="p-4">
            <h3 class="text-slate-900 font-semibold hover:text-blue-600 transition"><?php echo esc_html($title); ?></h3>
            <?php if($excerpt): ?><p class="mt-2 text-sm text-slate-600"><?php echo esc_html($excerpt); ?></p><?php endif; ?>
          </div>
        </a>
      </article>
      <?php endwhile; wp_reset_postdata(); else: ?>
        <p class="text-slate-600">هنوز مقاله‌ای منتشر نشده است.</p>
      <?php endif; ?>

      <!-- Pagination -->
      <div class="lg:col-span-2">
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
          if(is_array($links)): ?>
          <nav class="mt-6">
            <ul class="flex flex-wrap items-center gap-2">
              <?php foreach($links as $link): ?>
                <li class="text-sm">
                  <?php
                    $link = preg_replace('/class=\'page-numbers current\'/', 'class="page-numbers px-3 py-1.5 rounded-lg bg-blue-600 text-white"', $link);
                    $link = str_replace('page-numbers', 'page-numbers px-3 py-1.5 rounded-lg border border-slate-200', $link);
                    echo $link; // WordPress outputs sanitized HTML for pagination
                  ?>
                </li>
              <?php endforeach; ?>
            </ul>
          </nav>
        <?php endif; ?>
      </div>
    </section>

    <!-- Sidebar -->
    <aside class="md:col-span-1 space-y-6">
      <div class="rounded-2xl p-5 bg-white shadow-sm">
        <h4 class="font-semibold">فیلترها</h4>
        <p class="text-sm text-slate-600 mt-2">برای مشاهده مقالات مرتبط، دسته‌ها را انتخاب کنید یا از جستجو استفاده کنید.</p>
        <?php if($cats): ?>
          <div class="mt-3 grid grid-cols-2 gap-2">
            <?php foreach($cats as $c): ?>
              <a href="<?php echo esc_url( get_category_link($c->term_id) ); ?>"
                 class="px-3 py-2 rounded-lg border border-slate-200 text-sm hover:bg-slate-50">
                <?php echo esc_html($c->name); ?>
              </a>
            <?php endforeach; ?>
          </div>
        <?php endif; ?>
      </div>

      <div class="rounded-2xl p-5 bg-white shadow-sm">
        <h4 class="font-semibold">پر بازدیدها</h4>
        <ul class="mt-3 space-y-3 text-sm">
          <?php
          $popular = new WP_Query([
            'post_type' => 'post',
            'posts_per_page' => 5,
            'orderby' => 'comment_count',
            'order' => 'DESC',
            'no_found_rows' => true,
          ]);
          if($popular->have_posts()):
            while($popular->have_posts()): $popular->the_post(); ?>
              <li><a href="<?php the_permalink(); ?>" class="hover:underline"><?php the_title(); ?></a></li>
            <?php endwhile; wp_reset_postdata();
          else: ?>
            <li class="text-slate-500">موردی یافت نشد.</li>
          <?php endif; ?>
        </ul>
      </div>

      <div class="rounded-2xl p-5 bg-white shadow-sm text-sm">
        <h4 class="font-semibold">عضویت در خبرنامه</h4>
        <p class="mt-2 text-slate-600">مقالات جدید را مستقیم در ایمیل دریافت کنید.</p>
        <form class="mt-3 flex gap-2" action="#" method="post">
          <input class="flex-1 border rounded-lg px-3 py-2 text-sm" placeholder="ایمیل شما" />
          <button class="px-3 py-2 rounded-lg bg-blue-600 text-white text-sm">عضویت</button>
        </form>
      </div>
    </aside>
  </div>
</main>

<?php get_footer(); ?>
