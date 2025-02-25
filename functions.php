<?php
// add_theme_support('disable-custom-colors');
// add_theme_support('disable-custom-font-sizes');
// add_theme_support('disable-custom-gradients');
// add_theme_support('editor-styles');

// Define text elements array
$text_elements = [
    'h1' => ['weight' => '100', 'size' => '6em', 'size_mobile' => '3em', 'weight_mobile' => '300'],
    'h2' => ['weight' => '200', 'size' => '3em', 'size_mobile' => '2.5em', 'weight_mobile' => '200'],
    'h3' => ['weight' => '300', 'size' => '2em', 'size_mobile' => '1.8em', 'weight_mobile' => '200'],
    'h4' => ['weight' => '300', 'size' => '1.5em', 'size_mobile' => '1.3em', 'weight_mobile' => '200'],
    'h5' => ['weight' => '300', 'size' => '1.2em', 'size_mobile' => '1em', 'weight_mobile' => '200'],
    'h6' => ['weight' => '500', 'size' => '1em', 'size_mobile' => '0.8em', 'weight_mobile' => '200'],
    'p' => ['weight' => '300', 'size_desktop' => '20px', 'size_mobile' => '18px', 'weight_mobile' => '300'],
    'button' => ['weight' => '400', 'size' => '1rem', 'size_mobile' => '0.9rem', 'weight_mobile' => '400']
];

// Theme setup
function my_portfolio_theme_setup() {
    // Add support for custom logo
    add_theme_support('custom-logo');

    // Add support for custom header
    add_theme_support('custom-header', [
        'default-image' => '',
        'width' => 2000,
        'height' => 1200,
        'flex-height' => true,
        'flex-width' => true,
    ]);

    // Add support for custom background
    add_theme_support('custom-background', [
        'default-color' => 'ffffff',
        'default-image' => '',
    ]);

    // Add support for post thumbnails
    add_theme_support('post-thumbnails');

    // Add support for HTML5 markup
    add_theme_support('html5', [
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
    ]);

    // Add support for title tag
    add_theme_support('title-tag');

    // Add support for automatic feed links
    add_theme_support('automatic-feed-links');

    // Add support for block styles
    add_theme_support('wp-block-styles');

    // Add support for wide alignment
    add_theme_support('align-wide');

    // Add support for editor styles
    add_theme_support('editor-styles');

    // Enqueue editor styles
    add_editor_style('editor-style.css');
}
add_action('after_setup_theme', 'my_portfolio_theme_setup');

// Register navigation menus
function my_portfolio_theme_register_menus() {
    register_nav_menus([
        'primary' => __('Primary Menu', 'my-portfolio-theme'),
    ]);
}
add_action('after_setup_theme', 'my_portfolio_theme_register_menus');

// Enqueue styles and scripts
function my_portfolio_theme_enqueue_styles() {
    wp_enqueue_style('my-portfolio-theme-style', get_stylesheet_uri());
    // Enqueue Montserrat
    wp_enqueue_style(
        'montserrat-font',
        'https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap',
        [],
        null
    );

    // Enqueue Poppins
    wp_enqueue_style(
        'poppins-font',
        'https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap',
        [],
        null
    );

    // Enqueue custom scripts
    wp_enqueue_script('my-portfolio-theme-scripts', get_template_directory_uri() . '/assets/js/scripts.js', ['jquery'], null, true);
}
add_action('wp_enqueue_scripts', 'my_portfolio_theme_enqueue_styles');

// Enqueue parallax script
function enqueue_parallax_script() {
    wp_enqueue_script('parallax', get_template_directory_uri() . '/assets/js/parallax.js', ['jquery'], null, true);
}
add_action('wp_enqueue_scripts', 'enqueue_parallax_script');

// Enqueue block styles for the front end
function my_portfolio_theme_enqueue_block_styles() {
    wp_enqueue_style('my-portfolio-theme-block-styles', get_template_directory_uri() . '/style.css', [], filemtime(get_template_directory() . '/style.css'));
}
add_action('enqueue_block_assets', 'my_portfolio_theme_enqueue_block_styles');

// Register widget areas
function my_portfolio_theme_widgets_init() {
    register_sidebar([
        'name' => __('Hero Area', 'my-portfolio-theme'),
        'id' => 'hero-area',
        'description' => __('Add widgets here to appear in the hero area.', 'my-portfolio-theme'),
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ]);

    register_sidebar([
        'name' => __('Below Hero Area', 'my-portfolio-theme'),
        'id' => 'below-hero-area',
        'description' => __('Add widgets here to appear below the hero area.', 'my-portfolio-theme'),
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ]);

    // Register new sidebars for the new parallax section
    register_sidebar([
        'name' => __('Bottom Parallax Mid Area', 'my-portfolio-theme'),
        'id' => 'bottom-parallax-mid-area',
        'description' => __('Add widgets here to appear in the bottom parallax mid area.', 'my-portfolio-theme'),
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ]);

    register_sidebar([
        'name' => __('Bottom Dark Area', 'my-portfolio-theme'),
        'id' => 'bottom-dark-area',
        'description' => __('Add widgets here to appear in the bottom dark area.', 'my-portfolio-theme'),
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ]);
}
add_action('widgets_init', 'my_portfolio_theme_widgets_init');

// Customizer settings and controls
function portfoliotheme_customize_register($wp_customize) {
    global $text_elements;

    // Add top-level sections
    $sections = [
        'portfoliotheme_site_identity' => ['title' => __('Site Identity', 'portfoliotheme'), 'priority' => 10],
        'portfoliotheme_header' => ['title' => __('Header', 'portfoliotheme'), 'priority' => 20],
        'portfoliotheme_hero' => ['title' => __('Hero Section', 'portfoliotheme'), 'priority' => 30],
        'portfoliotheme_typography' => ['title' => __('Typography', 'portfoliotheme'), 'priority' => 40],
        'portfoliotheme_colors' => ['title' => __('Colors', 'portfoliotheme'), 'priority' => 50],
        'portfoliotheme_footer' => ['title' => __('Footer', 'portfoliotheme'), 'priority' => 60],
    ];

    foreach ($sections as $section_id => $section) {
        $wp_customize->add_section($section_id, $section);
    }

    // Add settings and controls for colors
    $color_settings = [
        'site_bg_color' => '#fff',
        'primary_color' => '#333',
        'accent_color' => '#A6C4EB',
    ];

    foreach ($color_settings as $setting => $default) {
        $wp_customize->add_setting($setting, [
            'default' => $default,
            'transport' => 'refresh',
        ]);

        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, "{$setting}_control", [
            'label' => __(ucwords(str_replace('_', ' ', $setting)), 'portfoliotheme'),
            'section' => 'portfoliotheme_colors',
            'settings' => $setting,
        ]));
    }

    // Add settings and controls for typography
    $typography_settings = [
        'heading_font' => 'Poppins',
        'body_font' => 'Montserrat',
        'heading_font_weight' => '700',
        'body_font_weight' => '400',
    ];

    foreach ($typography_settings as $setting => $default) {
        $wp_customize->add_setting($setting, [
            'default' => $default,
            'transport' => 'refresh',
        ]);

        $wp_customize->add_control("{$setting}_control", [
            'label' => __(ucwords(str_replace('_', ' ', $setting)), 'portfoliotheme'),
            'section' => 'portfoliotheme_typography',
            'settings' => $setting,
            'type' => is_numeric($default) ? 'number' : 'text',
        ]);
    }

    // Add settings and controls for heading and paragraph font weights and sizes
    foreach ($text_elements as $element => $defaults) {
        $wp_customize->add_setting("{$element}_font_weight", [
            'default' => $defaults['weight'],
            'transport' => 'refresh',
        ]);
        $wp_customize->add_control("{$element}_font_weight_control", [
            'label' => __("{$element} Font Weight", 'portfoliotheme'),
            'section' => 'portfoliotheme_typography',
            'settings' => "{$element}_font_weight",
            'type' => 'number',
        ]);

        $wp_customize->add_setting("{$element}_font_size", [
            'default' => $defaults['size'],
            'transport' => 'refresh',
        ]);
        $wp_customize->add_control("{$element}_font_size_control", [
            'label' => __("{$element} Font Size", 'portfoliotheme'),
            'section' => 'portfoliotheme_typography',
            'settings' => "{$element}_font_size",
            'type' => 'text',
        ]);

        $wp_customize->add_setting("{$element}_font_size_mobile", [
            'default' => $defaults['size_mobile'],
            'transport' => 'refresh',
        ]);
        $wp_customize->add_control("{$element}_font_size_mobile_control", [
            'label' => __("{$element} Font Size (Mobile)", 'portfoliotheme'),
            'section' => 'portfoliotheme_typography',
            'settings' => "{$element}_font_size_mobile",
            'type' => 'text',
        ]);

        $wp_customize->add_setting("{$element}_font_weight_mobile", [
            'default' => $defaults['weight_mobile'],
            'transport' => 'refresh',
        ]);
        $wp_customize->add_control("{$element}_font_weight_mobile_control", [
            'label' => __("{$element} Font Weight (Mobile)", 'portfoliotheme'),
            'section' => 'portfoliotheme_typography',
            'settings' => "{$element}_font_weight_mobile",
            'type' => 'number',
        ]);
    }
}
add_action('customize_register', 'portfoliotheme_customize_register');

// Generate root CSS variables
function generate_root_css_variables() {
    global $text_elements;

    $css = ":root {\n";

    // Loop through text elements and dynamically set CSS variables
    foreach ($text_elements as $element => $properties) {
        foreach ($properties as $property => $default_value) {
            // Pull from Customizer if set, otherwise use the default value from the array
            $stored_value = get_theme_mod("{$element}_{$property}", $default_value);
            $css .= "--{$element}-{$property}: {$stored_value};\n";
        }
    }

    $css .= "--heading-font: '" . get_theme_mod('heading_font', 'Poppins') . "', sans-serif;\n";
    $css .= "--body-font: '" . get_theme_mod('body_font', 'Montserrat') . "', sans-serif;\n";
    $css .= "--site-bg-color: " . get_theme_mod('site_bg_color', '#fff') . ";\n";
    $css .= "--primary-color: " . get_theme_mod('primary_color', '#333') . ";\n";
    $css .= "--accent-color: " . get_theme_mod('accent_color', '#A6C4EB') . ";\n";

    $css .= "}\n";

    return $css;
}

// Output Customizer CSS
function portfoliotheme_customize_css() {
    echo "<style type='text/css'>\n";
    echo generate_root_css_variables();
    echo "</style>\n";
}
add_action('wp_head', 'portfoliotheme_customize_css');