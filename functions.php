<?php
// Enqueue
require get_template_directory() . '/inc/enqueue.php';

//acf options page
require get_template_directory() . '/inc/acf-options.php';

//  hook
require get_template_directory() . '/inc/hook.php';

//theme support
require get_template_directory() . '/inc/setup.php';





// Define constants
define('aps_img', get_template_directory_uri() . '/assets/image');





// // Register CPT "location"
require get_template_directory() . '/template-parts/partials/location-post.php';


// Register CPT "equipment"
require get_template_directory() . '/template-parts/partials/equipment-post.php';
