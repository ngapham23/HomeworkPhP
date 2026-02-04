<?php

// Register CPT 
add_action('init', function () {
    $labels = [
        'name' => 'Location Post',
        'singular_name' => 'Location',
        'add_new_item' => 'Add New Location',
        'edit_item' => 'Edit Location'
    ];
    register_post_type('location', [
        'labels' => $labels,
        'public' => true,
        'has_archive' => true,
        'show_in_rest' => true,
        'supports' => ['title', 'editor', 'thumbnail', 'excerpt', 'page-attributes'],
        'menu_icon' => 'dashicons-location-alt',
    ]);

});

