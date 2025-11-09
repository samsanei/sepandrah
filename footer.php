<?php if ( ! defined('ABSPATH') ) { exit; } ?>
</main>

<footer class="site-footer" role="contentinfo">
  <div class="container">
    <nav class="footer-nav" aria-label="<?php esc_attr_e('Footer Menu','your-theme'); ?>">
      <?php
        wp_nav_menu([
          'theme_location' => 'footer',
          'container'      => false,
          'menu_class'     => 'menu',
          'fallback_cb'    => '__return_false',
        ]);
      ?>
    </nav>
    <p>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?></p>
  </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
