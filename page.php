<?php get_header(); ?>

<!-- Page Hero Section -->
<section class="relative w-full bg-gray-100 dark:bg-neutral-900 py-16 md:py-24">
  <div class="container mx-auto px-4 text-center">
    
    <!-- Breadcrumb -->
    <nav class="mb-4 text-sm text-gray-500 dark:text-gray-400">
      <a href="<?php echo home_url(); ?>" class="hover:text-primary-600 transition">
        خانه
      </a>
      <span class="mx-2 text-gray-400">/</span>
      <span class="text-gray-600 dark:text-gray-300">
        <?php the_title(); ?>
      </span>
    </nav>

    <!-- Page Title -->
    <h1 class="text-3xl md:text-5xl font-bold text-gray-900 dark:text-white leading-tight">
      <?php the_title(); ?>
    </h1>
  </div>
</section>

<!-- Page Content -->
<section class="py-12 md:py-20">
  <div class="wp-content-wrapper container mx-auto px-4 max-w-4xl prose prose-lg dark:prose-invert">
    <?php
      if (have_posts()) :
        while (have_posts()) : the_post();
          the_content();
        endwhile;
      else :
        echo '<p>محتوایی یافت نشد.</p>';
      endif;
    ?>
  </div>
</section>

<?php get_footer(); ?>
