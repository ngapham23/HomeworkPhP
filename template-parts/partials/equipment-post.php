<?php

// Register CPT 
add_action('init', function () {
    $labels = [
        'name' => 'Equipment Post',
        'singular_name' => 'Equipment',
        'add_new_item' => 'Add New Equipment',
        'edit_item' => 'Edit Equipment'
    ];
    register_post_type('equipment', [
        'labels' => $labels,
        'public' => true,
        'has_archive' => true,
        'show_in_rest' => true,
        'supports' => ['title', 'editor', 'thumbnail', 'excerpt', 'page-attributes'],
        'menu_icon' => 'dashicons-hammer',
    ]);


});