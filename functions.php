<?php
function theme_enqueue_styles()
{
    // CSS styles
    wp_enqueue_style('theme-style', get_template_directory_uri() . '/assets/styles/style.css');

    // Mobile menu
    wp_enqueue_script('mobile-menu', get_template_directory_uri() . '/assets/scripts/mobile-menu.js', array('jquery'), null, true);

    // Homepage script
    if (is_front_page()) {
        wp_enqueue_script('homepage-toggle', get_template_directory_uri() . '/assets/scripts/homepage-toggle.js', array('jquery'), null, true);
    }

    // "O mnie" Page script
    if (is_page('o-mnie')) {
        wp_enqueue_script('about-page', get_template_directory_uri() . '/assets/scripts/about-page.js', array('jquery'), null, true);
    }
}
add_action('wp_enqueue_scripts', 'theme_enqueue_styles');

// Enable featured images
add_theme_support('post-thumbnails');

// Register menu
function mytheme_register_menus()
{
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'ksawery-kontz-motyw'),
        'primary-mobile' => __('Primary Menu Mobile', 'ksawery-kontz-motyw'),
        'footer-menu-1' => __('Footer', 'ksawery-kontz-motyw'),
        'footer-menu-2' => __('Warto', 'ksawery-kontz-motyw'),
    ));
}
add_action('after_setup_theme', 'mytheme_register_menus');


function remove_excerpt_box_for_pages()
{
    remove_post_type_support('page', 'editor');
}
add_action('init', 'remove_excerpt_box_for_pages');
