<?php
$background = get_field('background_location') ?: [];
$bg_desk = $background['background_desktop'] ?: [];
$bg_mobile = $background['background_mobile'] ?: [];
$url_desk = $bg_desk['url'] ?? '';
$url_mobile = $bg_mobile['url'] ?? '';
?>
<style>
    .location_hero {
        margin-top: 68px;
        background-image: url('<?php echo esc_url($url_desk); ?>');
        background-repeat: no-repeat;
        background-size: cover;
        height: 573px;
        display: flex;
        align-items: center;
        background-position: center center;
        width: 100%;
    }

    .aps-section--singlepage {
        padding: 100px 0;
    }

    /* page-header  */
    .location-address {
        display: flex;
        font-size: 18px;
        font-style: normal;
        font-weight: 400;
        line-height: 28px;
        color: var(--Text-Primary, #140F50);
        gap: 4px;
        padding-bottom: 8px;

    }

    .location-title {
        font-size: 56px;
        font-style: normal;
        font-weight: 700;
        line-height: 68px;
        text-transform: capitalize;
        color: var(--Text-Primary, #140F50);
    }



    /* location contentgrid */
    .location-overview--title,
    .location-fulldes--title,
    .location-quickfact--title,
    .location-amenities--title,
    .location-gallery-title,
    .equipment-list-title {
        font-size: 32px;
        font-style: normal;
        font-weight: 700;
        line-height: 40px;
        text-transform: capitalize;
        color: var(--Text-Primary, #140F50);
    }


    .location-overview--subtitle,
    .location-fulldes--subtitle,
    .location-quickfact--subtitle,
    .location-amenities--subtitle {
        font-size: 18px;
        font-style: normal;
        font-weight: 400;
        line-height: 28px;
        color: var(--Text-Secondary, #4C4C4C);
    }

    .location-overview--subtitle {
        padding: 20px 0 40px 0;
    }

    .location-fulldes--subtitle {
        padding: 20px 0 0 0;
    }

    .location-amenities-title,
    .location-equipment-title,
    .location-quickfacts--title {
        font-size: 16px;
        font-style: normal;
        font-weight: 400;
        line-height: 26px;
        color: var(--Text-Secondary, #4C4C4C);
    }

    .location-amenities-subtitle,
    .location-quickfacts--subtitle {
        color: var(--Text-Primary, #140F50);
        font-size: 16px;
        font-style: normal;
        font-weight: 600;
        line-height: 26px;
        text-transform: capitalize;
    }

    .location-region,
    .location-coordinates,
    .location-type {
        padding-top: 20px;
    }

    .location-content-grid {
        display: grid;
        grid-template-columns: 2fr 1fr;
        padding: 48px 0;
        align-items: start;
        gap: 48px;
    }


    .location-overview-col,
    .location-fulldes-col {
        grid-column: 1 / 2;
    }

    .location-overview-col,
    .location-fulldes-col,
    .location-quickfact-col {
        gap: 80px;
    }

    .location-quickfact-col {
        grid-column: 2 / 3;
    }



    .location-type {
        display: flex;

    }

    .location-amenities,
    .location-equipment {
        flex: 1 0 0;
    }



    /* lcoation animentis row */


    .location-amenities--title {
        padding-bottom: 20px;
    }

    .location-amenities-box {
        display: flex;
        gap: 80px;
        align-items: center;
    }

    .location-amenities--subtitle {
        display: flex;
        align-items: center;
        gap: 8px;

    }

    .location-amenities--subtitle img {

        object-fit: contain;
    }



    /* Gallery Section */
    .location-gallery-wrapper {
        padding-top: 48px;
    }


    .location-gallery-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 20px;
        padding: 28px 0 48px 0;
    }

    .gallery-main-img {
        position: relative;
        border-radius: 12px;
        overflow: hidden;
        height: 100%;
    }

    .gallery-main-img img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .gallery-sub-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        grid-template-rows: repeat(2, 1fr);
        gap: 16px;
        height: 100%;
    }

    .gallery-sub-item {
        border-radius: 12px;
        overflow: hidden;
        height: 100%;
    }

    .gallery-sub-item img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .btn-view-all-photo {
        position: absolute;
        bottom: 20px;
        left: 20px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 8px;
        background-color: #2447f5;
        padding: 12px 20px;
        box-sizing: border-box;
        gap: 8px;
        text-align: center;
        font-size: 14px;
        color: #fff;
        border: none;
        cursor: pointer;
        transition: background 0.3s;
        z-index: 2;
    }

    .btn-view-all-photo:hover {
        background-color: #1a38c4;
    }

    .btn-view-all-photo .image-icon {
        width: 24px;
        position: relative;
        max-height: 100%;
    }

    .btn-view-all-photo .view-all-photo {
        position: relative;
        line-height: 22px;
        text-transform: capitalize;
        font-weight: 600;
    }


    /* Default: Hide Mobile Slider, Show Desktop Grid */
    .location-gallery-slider-mobile {
        display: none;
    }

    .location-slider-dots {
        display: none;
    }

    .location-slider-dots svg {
        cursor: pointer;
    }

    .location-dot-circle {
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .location-dot-inner {
        transition: opacity 0.3s ease;
    }

    .location-dot-circle:hover {
        stroke: #8EA1E1;
    }


    /* list equiment */
    .location-equipment-listing {
        display: grid;
        grid-template-columns: repeat(5, 1fr);
        grid-template-rows: repeat(5, auto);
        gap: 20px;
    }

    .location-equipment-card-content {
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        gap: 4px;
        flex: 1;
    }

    .location-equipment-card {
        padding: 12px;
        display: flex;
        flex-direction: row;
        align-items: center;
        gap: 16px;
        border-radius: 12px;
        background: #F3F3F6;

    }

    .location-equipment-card-img {
        border-radius: 12px;
    }

    .location-equipment-card-title {
        color: var(--color-primary-blue-dark);
        text-align: center;
        font-size: var(--font-lg);
        font-style: bold;
        font-weight: 700;
        line-height: 28px;
        text-transform: capitalize;
    }

    .location-equipment-card-text {
        color: var(--color-text-muted);
        font-size: var(--font-xs);
        font-style: regular;
        font-weight: 400;
        line-height: 22px;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .location-equipment-card-text:hover {
        color: var(--color-primary-blue-dark);
        text-decoration-line: underline;
        text-decoration-style: solid;
        text-decoration-skip-ink: auto;
        text-decoration-thickness: auto;
        text-underline-offset: auto;
    }

    @media (max-width: 576px) {
        .location_hero {
            max-height: 326px;
            background-image: url('<?php echo esc_url($url_mobile); ?>');

            margin-top: 0;
        }

        .aps-section--singlepage {
            padding: 40px 20px;
        }

        .location-title {
            font-size: 32px;
            line-height: 40px;

        }

        .location-overview--title,
        .location-fulldes--title,
        .location-quickfact--title,
        .location-amenities--title,
        .location-gallery-title,
        .equipment-list-title {
            font-size: 24px;
            line-height: 32px;
        }

        .location-overview--subtitle,
        .location-fulldes--subtitle,
        .location-quickfact--subtitle {
            font-size: 16px;
            line-height: 26px;

        }

        .location-content-grid {
            grid-template-columns: 1fr;
            padding: 28px 0;
            gap: 0;
        }

        .location-overview--subtitle {
            padding: 12px 0 28px 0;
        }

        .location-fulldes--subtitle {
            padding: 12px 0 0 0;
        }


        .location-quickfact-col {
            grid-column: 1 / -1;
            padding: 28px 0 0 0;
        }

        .location-quickfacts-box {
            padding: 0;
            display: flex;
            flex-direction: column;

        }

        .location-region,
        .location-coordinates,
        .location-type {
            padding-top: 12px;
        }

        .location-type {
            flex-direction: column;
            gap: 12px;
        }




        .location-amenities-row {
            padding: 0 0 28px 0;
        }

        .location-amenities--title {
            padding-bottom: 12px;
        }

        .location-amenities-box {
            flex-direction: column;
            gap: 8px;
            align-items: flex-start;
        }

        /* Mobile Gallery */
        .location-gallery-wrapper {
            padding-top: 0;
        }

        .desktop-only {
            display: none;
        }

        .location-gallery-slider-mobile {
            display: block;
            margin-bottom: 20px;
        }

        .gallery-item-mobile {
            height: 280px;
            border-radius: 12px;
            overflow: hidden;
            margin-right: 12px;
        }

        .gallery-item-mobile img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .location-slider-dots {
            display: flex;
        }

        .location-gallery-grid {
            grid-template-columns: 1fr;
            height: auto;
            gap: 12px;
            padding: 12px 0 28px 0;
        }

        .gallery-main-img {
            height: 280px;
        }

        .gallery-sub-grid {
            grid-template-columns: repeat(2, 1fr);
            gap: 12px;
        }

        .gallery-sub-item {
            height: 120px;
        }

        .location-gallery-title {
            font-size: 24px;
            line-height: 32px;
        }





        /* list equiment */

        .location-equipment-listing {
            grid-template-columns: repeat(2, 1fr);
            grid-template-rows: repeat(5, auto);
        }


        .location-equipment-card {
            display: flex;
            width: 165px;
            padding: 20px 12px 16px 12px;
            flex-direction: column;
            align-items: center;
            gap: 12px;
        }

        .location-equipment-card-content {
            display: flex;
            align-items: center;
        }


        .location-equipment-card-title {
            font-size: 20px;
            line-height: 28px;
        }

        .location-equipment-card-text {
            font-size: 14px;
            font-weight: 400;
            line-height: 22px;
        }


    }
</style>

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