<?php
/*
Template Name: Home Page
*/
get_header();
$sections = [
    'hero-section',
    'featured-section',
    'map-section',
    'benefit-section',
    'brand-section',
    'partners-section',
];
foreach ($sections as $section) {
    get_template_part('template-parts/homepage/' . $section);
}
get_footer();
