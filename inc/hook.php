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
















function aps_search_acf_fields($search, $query)
{
    global $wpdb;

    if (!$query->is_search() || !$query->is_main_query()) {
        return $search;
    }

    $search_term = $query->get('s');
    if (empty($search_term)) {
        return $search;
    }

    // Add ACF meta fields to search
    $search_meta = " OR (
        {$wpdb->postmeta}.meta_key = '_aps_location' 
        AND {$wpdb->postmeta}.meta_value LIKE '%" . esc_sql($wpdb->esc_like($search_term)) . "%'
    )";

    $search = preg_replace(
        "/\(\s*{$wpdb->posts}.post_title\s+LIKE\s*(\'[^\']+\')\s*\)/",
        "({$wpdb->posts}.post_title LIKE $1) OR ({$wpdb->posts}.post_content LIKE $1) {$search_meta}",
        $search
    );

    return $search;
}

function aps_search_acf_join($join, $query)
{
    global $wpdb;

    if (!$query->is_search() || !$query->is_main_query()) {
        return $join;
    }

    $join .= " LEFT JOIN {$wpdb->postmeta} ON {$wpdb->posts}.ID = {$wpdb->postmeta}.post_id ";
    return $join;
}

function aps_search_acf_groupby($groupby, $query)
{
    global $wpdb;

    if (!$query->is_search() || !$query->is_main_query()) {
        return $groupby;
    }

    $groupby = "{$wpdb->posts}.ID";
    return $groupby;
}

/**
 * Filter Search by Post Type
 */
function aps_search_filter_post_type($query)
{
    if (!is_admin() && $query->is_search() && $query->is_main_query()) {
        $post_type = isset($_GET['post_type']) ? sanitize_text_field($_GET['post_type']) : 'all';

        if ($post_type !== 'all') {
            $query->set('post_type', $post_type);
        } else {
            $query->set('post_type', ['location', 'equipment', 'post', 'page']);
        }
    }
}
add_action('pre_get_posts', 'aps_search_filter_post_type');
