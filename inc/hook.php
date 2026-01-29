<?php



//  menu class active
function aps_nav_link_attributes($atts, $item, $args, $depth)
{
    $classes = 'aps-nav__link';
    if (in_array('current-menu-item', $item->classes) || in_array('current-page-ancestor', $item->classes) || in_array('current_page_parent', $item->classes)) {
        $classes .= ' aps-nav__link--active';
    }
    $atts['class'] = isset($atts['class']) ? $atts['class'] . ' ' . $classes : $classes;
    return $atts;
}
add_filter('nav_menu_link_attributes', 'aps_nav_link_attributes', 10, 4);

function aps_nav_menu_li_classes($classes, $item, $args, $depth)
{
    $classes[] = 'aps-nav__item';
    if (in_array('current-menu-item', $classes) || in_array('current-page-ancestor', $classes) || in_array('current_page_parent', $classes)) {
        $classes[] = 'aps-nav__item--active';
    }
    return $classes;
}
add_filter('nav_menu_css_class', 'aps_nav_menu_li_classes', 10, 4);


// Footer menu link class
function aps_footer_link_class($atts, $item, $args)
{
    if ($args->theme_location === 'footer_menu') {
        $atts['class'] = 'aps-footer__link';
    }
    return $atts;
}
add_filter('nav_menu_link_attributes', 'aps_footer_link_class', 10, 3);