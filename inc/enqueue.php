<?php
$theme_version = '1.0.0';
// Enqueue scripts and styles
function aps_enqueue_assets()
{
    global $theme_version;
    if (!is_admin()) {
        wp_deregister_script('jquery');
        wp_register_script(
            'jquery',
            get_template_directory_uri() . '/assets/js/libs/jquery.min.js',
            array(),
            '3.7.1',
            true
        );
        wp_enqueue_script('jquery');
    }
    // Main jquery + slick 
    wp_enqueue_script('aps-main-js', get_template_directory_uri() . '/assets/js/main.js', array('jquery', 'aps-slick-js'), $theme_version, true);
    // Slick carousel (JS + CSS)
    wp_enqueue_script('aps-slick-js', get_template_directory_uri() . '/assets/js/libs/slick-1.8.1/slick/slick.min.js', array('jquery'), '1.8.1', true);
    wp_enqueue_style('aps-slick-css', get_template_directory_uri() . '/assets/js/libs/slick-1.8.1/slick/slick.css', array(), '1.8.1');
    wp_enqueue_style('aps-slick-theme', get_template_directory_uri() . '/assets/js/libs/slick-1.8.1/slick/slick-theme.css', array('aps-slick-css'), '1.8.1');

    // GLightbox (CDN)
    wp_enqueue_style('glightbox-css', 'https://cdn.jsdelivr.net/npm/glightbox/dist/css/glightbox.min.css', array(), '3.3.0');
    wp_enqueue_script('glightbox-js', 'https://cdn.jsdelivr.net/npm/glightbox/dist/js/glightbox.min.js', array(), '3.3.0', true);


    // Main CSS (Auto-versioning to prevent cache)
    $css_file = get_template_directory() . '/assets/css/main.css';
    $css_version = file_exists($css_file) ? filemtime($css_file) : $theme_version;
    wp_enqueue_style('aps-main', get_template_directory_uri() . '/assets/css/main.css', array(), $css_version, 'all');
}
add_action('wp_enqueue_scripts', 'aps_enqueue_assets');
