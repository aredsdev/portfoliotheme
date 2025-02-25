<?php
/* Header Template for My Portfolio Theme */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<!-- dynamic header -->
<header class="site-header">
    <div class="container header-content">
        <div class="logo">
            <a href="<?php echo esc_url(home_url('/')); ?>">
                <?php if (has_custom_logo()) : ?>
                    <?php the_custom_logo(); ?>
                <?php else : ?>
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/aeredsdev.png" alt="<?php bloginfo('name'); ?>">
                <?php endif; ?>
            </a>
        </div>
        <nav class="main-navigation">
            <?php
            wp_nav_menu(array(
                'theme_location' => 'primary',
                'container' => 'ul',
                'menu_class' => 'nav-menu'
            ));
            ?>
        </nav>
    </div>
</header>

<!-- hamburger button menu -->
<button class="hamburger-menu" aria-label="Toggle navigation">
    <span class="bar"></span>
    <span class="bar"></span>
    <span class="bar"></span>
</button>

<!-- modal nav -->
<nav class="mobile-nav" aria-hidden="true">
        <?php
        wp_nav_menu(array(
            'theme_location' => 'primary',
            'container' => 'ul',
            'menu_class' => 'nav-menu'
        ));
        ?>
</nav>