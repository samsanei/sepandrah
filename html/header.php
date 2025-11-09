<?php if ( ! defined('ABSPATH') ) { exit; } ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo('charset'); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<header class="site-header" role="banner">
  <div class="container">
    <div class="branding">
      <?php if ( has_custom_logo() ) {
          the_custom_logo();
      } else { ?>
        <a class="site-title" href="<?php echo esc_url(home_url('/')); ?>">
          <?php bloginfo('name'); ?>
        </a>
        <p class="site-description"><?php bloginfo('description'); ?></p>
      <?php } ?>
    </div>

    <nav class="site-nav" role="navigation" aria-label="<?php esc_attr_e('Primary Menu','your-theme'); ?>">
      <?php
        wp_nav_menu([
          'theme_location' => 'primary',
          'container'      => false,
          'menu_class'     => 'menu',
          'fallback_cb'    => '__return_false',
        ]);
      ?>
    </nav>
  </div>
</header>

<main class="site-main" role="main">
