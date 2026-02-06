<?php
function aps_theme_setup()
{
    // title tag
    add_theme_support('title-tag');

    // support thumbnail                                                                                   
    add_theme_support('post-thumbnails');

    // html5 support
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
    ));

    // menus
    register_nav_menus(array(
        'primary' => __('HeaderMenu', 'aps-park'),
        'footer_menu' => __('FooterMenu', 'aps-park'),
    ));

    // custom logo
    add_theme_support('custom-logo', array(
        'height' => 60,
        'width' => 200,
        'flex-height' => true,
        'flex-width' => true,
    ));
}
add_action('after_setup_theme', 'aps_theme_setup');

// Allow SVG upload
function aps_allow_svg_upload($mimes)
{
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}
add_filter('upload_mimes', 'aps_allow_svg_upload');

// Register Sidebar/Widget Areas
function aps_register_sidebars()
{
    register_sidebar(array(
        'name' => __('Primary Sidebar', 'aps-park'),
        'id' => 'sidebar-1',
        'description' => __('Main sidebar that appears on the right.', 'aps-park'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ));

    register_sidebar(array(
        'name' => __('Footer Sidebar', 'aps-park'),
        'id' => 'footer-sidebar',
        'description' => __('Appears in the footer section.', 'aps-park'),
        'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h4 class="footer-widget-title">',
        'after_title' => '</h4>',
    ));
}
add_action('widgets_init', 'aps_register_sidebars');
