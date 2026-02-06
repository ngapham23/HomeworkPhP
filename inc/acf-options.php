<?php

/**
 * Options Page
 */
if (function_exists('acf_add_options_page')) {
    acf_add_options_page([
        'page_title' => 'Theme Options',
        'menu_title' => 'Theme Options',
        'menu_slug' => 'theme-options',
        'capability' => 'edit_theme_options',
        'redirect' => false
    ]);
}
// ACF JSON Save Point
function aps_acf_json_save_point($path)
{
    $path = get_template_directory() . '/framework/acf-options';
    return $path;
}
add_filter('acf/settings/save_json', 'aps_acf_json_save_point');
// ACF JSON Load Point
function aps_acf_json_load_point($paths)
{
    unset($paths[0]);
    $paths[] = get_template_directory() . '/framework/acf-options';
    return $paths;
}
add_filter('acf/settings/load_json', 'aps_acf_json_load_point');
