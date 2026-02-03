<?php
$background = get_field('background_location') ?: [];
$bg_desk = $background['background_desktop'] ?: [];
$bg_mobile = $background['background_mobile'] ?: [];
$url_desk = $bg_desk['url'] ?? '';
$url_mobile = $bg_mobile['url'] ?? '';
?>


<section class="location_hero" style="--hero-bg-desktop: url('<?php echo esc_url($bg_desk['url']); ?>');
    --hero-bg-mobile: url('<?php echo esc_url($bg_mobile['url']); ?>');">
</section>

<section class="aps-section--singlepage">
    <div class="aps-container">
        <div class="page-header-area">
            <div class="location-address">
                <img src="<?php echo esc_url(aps_img . '/featured-section/icon-location/location-icon.svg'); ?>"
                    alt="<?php esc_attr_e('Location', 'aps-sa'); ?>">
                <?php
                $address = get_post_meta(get_the_ID(), '_aps_location', true);
                if ($address) {
                    esc_html_e($address);
                }
                ?>
            </div>
            <h2 class="location-title">
                <?php the_title(); ?>
            </h2>
        </div>

        <div class="location-content-grid">
            <div class="location-content--box">
                <div class="location-overview-col">
                    <?php
                    $overview_group = get_field('overview_location');
                    $overview_title = $overview_group['overview_title'] ?? '';
                    $overview_subtitle = $overview_group['overview_subtitle'] ?? '';
                    ?>
                    <h4 class="location-overview--title">
                        <?php
                        esc_html_e($overview_title);
                        ?>
                    </h4>
                    <p class="location-overview--subtitle">
                        <?php esc_html_e($overview_subtitle); ?>
                    </p>
                </div>
                <div class="location-fulldes-col">
                    <?php
                    $full_description = get_field('fuldes_location');
                    $full_description_title = $full_description['fuldes_title'] ?? '';
                    $full_description_subtitle = $full_description['fuldes_subtitle'] ?? '';
                    ?>
                    <h4 class="location-fulldes--title">
                        <?php echo esc_html($full_description_title); ?>
                    </h4>
                    <p class="location-fulldes--subtitle">
                        <?php echo esc_html($full_description_subtitle); ?>
                    </p>
                </div>
            </div>

            <div class="location-quickfact-col">
                <?php
                $quickfacts_location = get_field('quickfacts_location');
                $quickfacts_title = $quickfacts_location['quickfacts_title'] ?? '';
                $quickfacts_region = $quickfacts_location['quickfacts_region'] ?? '';
                $quickfacts_coordinates = $quickfacts_location['quickfacts_coordinates'] ?? '';

                // Get amenities and equipment counts
                $quickfacts_type = $quickfacts_location['quickfacts_type'] ?? [];
                $quickfacts_amenities = $quickfacts_type['type_animenties'] ?? [];
                $quickfacts_equipment = $quickfacts_type['type_equipments'] ?? [];
                $amenities_count = is_array($quickfacts_amenities) ? count($quickfacts_amenities) : 0;
                $equipment_count = is_array($quickfacts_equipment) ? count($quickfacts_equipment) : 0;
                ?>
                <h4 class="location-quickfact--title">
                    <?php echo esc_html($quickfacts_title); ?>
                </h4>
                <div class="location-quickfacts-box">
                    <div class="location-region">
                        <p class="location-quickfacts--title">Region / Council: </p>
                        <a href="">
                            <p class="location-quickfacts--subtitle">
                                <?php echo esc_html($quickfacts_region); ?>
                            </p>
                        </a>
                    </div>
                    <div class="location-coordinates">
                        <p class="location-quickfacts--title">Coordinates</p>
                        <a href="">
                            <p class="location-quickfacts--subtitle">
                                <?php echo esc_html($quickfacts_coordinates); ?>
                            </p>
                        </a>
                    </div>
                    <div class="location-type">
                        <div class="location-amenities">
                            <p class="location-amenities-title">Amenities:</p>
                            <a href="">
                                <p class="location-amenities-subtitle">

                                    <?php echo $amenities_count; ?> Available
                                </p>
                            </a>
                        </div>
                        <div class="location-equipment">
                            <p class="location-equipment-title">Equipment:</p>
                            <a href="">
                                <p class="location-equipment-subtitle">
                                    <?php echo $equipment_count; ?> Types
                                </p>
                            </a>
                        </div>
                    </div>


                </div>
            </div>

        </div>
        <div class="location-amenities-row">
            <?php
            $amentites_box = get_field('amentites_box');
            $amen_title = $amentites_box['amenties_title'] ?? '';
            $amen_list = $amentites_box['amentities_subtitle'] ?? [];


            if (is_array($amen_list)) {
                $amen_list = array_slice($amen_list, 0, 3);
            } else {
                $amen_list = [];
            }
            ?>
            <h4 class="location-amenities--title">
                <?php echo esc_html($amen_title); ?>
            </h4>
            <div class="location-amenities-box">
                <?php if (!empty($amen_list)): ?>
                <?php foreach ($amen_list as $row): ?>
                <?php
                        $tax_field = $row['amen_subtitle'] ?? '';
                        $img_html = $row['amentitie_img'] ?? '';
                        ?>
                <p class="location-amenities--subtitle">
                    <?php
                            if (!empty($img_html)) {
                                echo $img_html;
                            }
                            if (!empty($tax_field)) {
                                $term_obj = null;

                                if (is_array($tax_field)) {
                                    $first = reset($tax_field);
                                    if (is_object($first)) {
                                        $term_obj = $first;
                                    } elseif (is_numeric($first)) {
                                        $term_obj = get_term($first);
                                    }
                                } elseif (is_object($tax_field)) {
                                    $term_obj = $tax_field;
                                } elseif (is_numeric($tax_field)) {
                                    $term_obj = get_term($tax_field);
                                }

                                if ($term_obj && !is_wp_error($term_obj)) {
                                    echo esc_html($term_obj->name);
                                }
                            }
                            ?>
                </p>
                <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>

        <!-- Gallery Section -->
        <?php
        $gallery = get_field('location_gallery');
        if ($gallery):
            ?>
        <div class="location-gallery-wrapper">
            <h4 class="location-gallery-title">Gallery</h4>
            <!-- Mobile Gallery Slider -->
            <div class="location-gallery-slider-mobile">
                <?php foreach ($gallery as $img): ?>
                <div class="gallery-item-mobile">
                    <a href="<?php echo esc_url($img['url']); ?>" class="glightbox"
                        data-gallery="location-gallery-mobile">
                        <img src="<?php echo esc_url($img['url']); ?>" alt="<?php echo esc_attr($img['alt']); ?>">
                    </a>
                </div>
                <?php endforeach; ?>
            </div>

            <!-- Desktop Gallery Grid -->
            <div class="location-gallery-grid desktop-only">
                <!-- Main Image (First Image) -->
                <div class="gallery-main-img">
                    <?php if (isset($gallery[0])): ?>
                    <a href="<?php echo esc_url($gallery[0]['url']); ?>" class="glightbox"
                        data-gallery="location-gallery">
                        <img src="<?php echo esc_url($gallery[0]['url']); ?>"
                            alt="<?php echo esc_attr($gallery[0]['alt']); ?>">
                    </a>
                    <?php endif; ?>
                    <button class="btn-view-all-photo" onclick="document.querySelector('.glightbox').click();">
                        <img class="image-icon"
                            src="<?php echo get_template_directory_uri(); ?>/assets/image/singlepage/Image.svg" alt="">
                        <span class="view-all-photo">View All Photo</span>
                    </button>
                </div>

                <!-- Sub Images  -->
                <div class="gallery-sub-grid">
                    <?php
                        // First 4 images are shown in grid (skipping the main one)
                        $sub_images = array_slice($gallery, 1, 4);
                        foreach ($sub_images as $img):
                            ?>
                    <div class="gallery-sub-item">
                        <a href="<?php echo esc_url($img['url']); ?>" class="glightbox" data-gallery="location-gallery">
                            <img src="<?php echo esc_url($img['url']); ?>" alt="<?php echo esc_attr($img['alt']); ?>">
                        </a>
                    </div>
                    <?php endforeach; ?>

                    <?php
                        // Hidden links for the rest of the images
                        $remaining_images = array_slice($gallery, 5);
                        if (!empty($remaining_images)):
                            foreach ($remaining_images as $img):
                                ?>
                    <a href="<?php echo esc_url($img['url']); ?>" class="glightbox" data-gallery="location-gallery"
                        style="display: none;"></a>
                    <?php
                            endforeach;
                        endif;
                        ?>
                </div>
            </div>
            <div class="location-slider-dots" aria-hidden="true">
                <svg xmlns="http://www.w3.org/2000/svg" width="80" height="20" viewBox="0 0 62 20" fill="none">
                    <circle class="location-dot-circle" data-slide="0" cx="10" cy="10" r="9.5" stroke="#140F50" />
                    <circle class="location-dot-inner" data-slide="0" cx="10" cy="10" r="4" fill="#140F50" />
                    <circle class="location-dot-circle" data-slide="1" cx="34" cy="10" r="3.5" stroke="#140F50" />
                    <circle class="location-dot-inner" data-slide="1" cx="34" cy="10" r="4" fill="#140F50"
                        opacity="0" />
                    <circle class="location-dot-circle" data-slide="2" cx="58" cy="10" r="3.5" stroke="#140F50" />
                    <circle class="location-dot-inner" data-slide="2" cx="58" cy="10" r="4" fill="#140F50"
                        opacity="0" />
                </svg>
            </div>
        </div>
        <?php endif; ?>


        <!-- Equipment List Section -->
        <?php
        $equipments = get_field('location_equipments');
        if ($equipments && is_array($equipments)): ?>
        <div class="equipment-list-section">
            <h4 class="equipment-list-title">Equipment List</h4>
            <div class="location-equipment-listing">
                <?php
                    $equipments_display = array_slice($equipments, 0, 11);
                    foreach ($equipments_display as $p):
                        $post_id = is_object($p) ? $p->ID : $p;

                        $permalink = get_permalink($post_id);
                        $title = get_the_title($post_id);
                        $thumb = get_the_post_thumbnail_url($post_id, 'thumbnail');

                        if (!$thumb) {
                            $thumb = get_template_directory_uri() . '/assets/image/logo.png';
                        }
                        ?>
                <article class="location-equipment-card"
                    onclick="window.location.href='<?php echo esc_url($permalink); ?>'" style="cursor: pointer;">
                    <img class="location-equipment-card-img" src="<?php echo esc_url($thumb); ?>"
                        alt="<?php echo esc_attr($title); ?>">
                    <div class="location-equipment-card-content">
                        <h6 class="location-equipment-card-title"><?php echo esc_html($title); ?></h6>
                        <p class="location-equipment-card-text">
                            <span><?php esc_html_e('View Details', 'aps-sa'); ?></span>
                        </p>
                    </div>
                </article>
                <?php endforeach; ?>
            </div>
        </div>
        <?php endif; ?>

    </div>
</section>