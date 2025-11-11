<?php get_header();
$term = get_queried_object();
$paged = max(1, (int)get_query_var('paged')); ?>

<section class="pt-20 pb-8 bg-white">
  <div class="container mx-auto max-w-7xl px-4">
    <h1 class="text-3xl sm:text-4xl font-extrabold text-slate-900"><?php echo esc_html($term->name); ?></h1>
    <?php if (!empty($term->description)): ?>
      <p class="mt-2 text-sm text-slate-600 max-w-xl"><?php echo esc_html($term->description); ?></p>
    <?php endif; ?>
  </div>
</section>

<main class="container mx-auto max-w-7xl px-4 py-8">
  <div class="grid gap-8 md:grid-cols-3">
    <section class="md:col-span-2 grid gap-6 sm:grid-cols-1 lg:grid-cols-2">
      <?php if(have_posts()): while(have_posts()): the_post();
        $thumb_id = get_post_thumbnail_id();
        $thumb_url = $thumb_id ? wp_get_attachment_image_url($thumb_id, 'large') : get_template_directory_uri().'/assets/placeholder-1200x800.jpg';
        $thumb_alt = $thumb_id ? get_post_meta($thumb_id, '_wp_attachment_image_alt', true) : get_the_title();
      ?>
        <article class="rounded-2xl bg-white shadow-sm overflow-hidden">
          <a href="<?php the_permalink(); ?>" class="block">
            <div class="relative h-44">
              <img src="<?php echo esc_url($thumb_url); ?>" alt="<?php echo esc_attr($thumb_alt); ?>" class="w-full h-full object-cover" />
              <div class="absolute inset-0 bg-gradient-to-t from-black/35 to-transparent"></div>
              <div class="absolute bottom-3 left-3 text-xs text-white/80"><?php echo esc_html( get_the_date() ); ?></div>
            </div>
            <div class="p-4">
              <h3 class="text-slate-900 font-semibold hover:text-blue-600 transition"><?php the_title(); ?></h3>
              <p class="mt-2 text-sm text-slate-600"><?php echo esc_html( get_the_excerpt() ); ?></p>
            </div>
          </a>
        </article>
      <?php endwhile; else: ?>
        <p class="text-slate-600">موردی یافت نشد.</p>
      <?php endif; ?>
      <div class="lg:col-span-2">
        <?php the_posts_pagination([
          'mid_size'  => 1,
          'prev_text' => '« قبلی',
          'next_text' => 'بعدی »',
          'screen_reader_text' => '',
        ]); ?>
      </div>
    </section>

    <aside class="md:col-span-1 space-y-6">
      <?php get_search_form(); ?>
    </aside>
  </div>
</main>

<?php get_footer(); ?>
