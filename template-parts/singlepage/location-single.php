<?php
$hero_background = get_field('hero_background');
$hero_background_mobile = get_field('hero_background_mobile');
?>
<style>
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
.equipment-list-title{
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
.location-equipment-subtitle,
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

@media (max-width: 576px) {
    .aps-section--singlepage {
        padding: 40px 20px;
    }

    .location-title {
        font-size: 28px;
        line-height: 36px;
        text-align: left;
    }

    .location-content-grid {
        grid-template-columns: 1fr;
        gap: 24px;
        padding: 0;
    }

    .location-content--box,
    .location-overview-col,
    .location-fulldes-col,
    .location-quickfact-col {
        gap: 24px;
        padding: 0;
        margin: 0;
    }

    .location-quickfact-col {
        grid-column: 1 / -1;
        padding: 16px 0 0 0;
        min-width: 0;
        max-width: 100%;
    }

    .location-quickfacts-box {
        padding: 0;
        display: flex;
        flex-direction: column;
        gap: 16px;
    }

    .location-type {
        flex-direction: column;
        gap: 8px;
    }

    .location-amenities,
    .location-equipment {
        padding: 0;
        text-align: left;
    }

    .location-amenities-row {
        flex-direction: column;
        gap: 12px;
        margin-top: 24px;
    }

    .location-amenities--title {
        font-size: 20px;
        padding-bottom: 12px;
        margin-bottom: 0px;
        border-width: 2px;
        border-top: 1px solid #140F50;
        padding-top: 24px;
        line-height: normal;
    }

    .location-amenities-box {
        flex-direction: column;
        gap: 8px;
        align-items: flex-start;
    }

    .location-amenities--subtitle {
        font-size: 15px;
        gap: 6px;
    }

    .location-amenities--subtitle img {
        width: 18px;
        height: 18px;
    }

    .location-overview--title,
    .location-fulldes--title,
    .location-quickfact--title {
        font-size: 18px; /* Giảm chút cho vừa mắt mobile */
        line-height: 24px;
        margin-bottom: 8px; /* Thêm khoảng cách với nội dung dưới */
    }

    .location-overview--subtitle,
    .location-fulldes--subtitle {
        font-size: 15px;
        line-height: 22px;
        padding: 12px 0 0 0;
    }

    /* Mobile Gallery */
    .location-gallery-grid {
        grid-template-columns: 1fr;
        height: auto;
        gap: 12px;
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

    /* Mobile Equipment */
    .equipment-grid {
        grid-template-columns: 1fr;
    }
}

/* Equipment List */

.aps-blog__cards{
    padding: 20px 0 48px 0;
}
.equipment-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    column-gap: 20px;
    row-gap: 40px;
  
}
.aps-blog__card {
    padding: 12px;
    display: flex;
    flex-direction: row;
    align-items: center;
    gap: 12px;
    border-radius: 8px;
    background: #F4F6F8;
    cursor: pointer;
    text-decoration: none;
    transition: background 0.3s;
}
.aps-blog__card:hover {
    background: #e3e8ed;
}
.aps-blog__card-img {
    width: 80px;
    height: 80px;
    border-radius: 8px;
    object-fit: cover;
    flex-shrink: 0;
}
.aps-blog__card-content {
    display: flex;
    flex-direction: column;
    gap: 4px;
}
.aps-blog__card-title {
    color: var(--Text-Primary, #140F50);
    font-size: 16px;
    font-weight: 700;
    line-height: 24px;
    margin: 0;
    text-transform: capitalize;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}
.aps-blog__card-btn {
    color: var(--Text-Secondary, #4C4C4C);
    font-size: 14px;
    font-weight: 400;
    line-height: 20px;
    text-decoration: underline;
    display: inline-block;
}


}
</style>

<section class="aps-hero" style="--hero-bg-desktop: url('<?php echo esc_url($hero_background['url']); ?>');
    --hero-bg-mobile: url('<?php echo esc_url($hero_background_mobile['url']); ?>');">

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
            $amen_list = array_slice($amen_list, 0, 3);
            ?>
            <h4 class="location-amenities--title">
                <?php echo esc_html($amen_title); ?>
            </h4>
            <div class="location-amenities-box">
                <?php
                if (!empty($amen_list) && is_array($amen_list)) {
                    foreach ($amen_list as $item) {
                        $subtitle = $item['amentitie_subtitle'] ?? '';
                        $amenimg = $item['amentitie_img'] ?? '';
                        ?>
                <p class="location-amenities--subtitle">
                    <?php
                            if (!empty($amenimg)) {
                                echo $amenimg;
                            }
                            if (!empty($subtitle)) {
                                $term_id = $subtitle;
                                if(is_array($subtitle)) {
                                    $term_id = $subtitle[0];
                                }
                                
                                $term = get_term($term_id);
                                if ($term && !is_wp_error($term)) {
                                    echo esc_html($term->name);
                                }
                            }
                            ?>
                </p>
                <?php
                    }
                }
                ?>
            </div>
        </div>

        <!-- Gallery Section -->
        <?php
        $gallery = get_field('location_gallery');
        if ($gallery):
            ?>
        <div class="location-gallery-wrapper">
            <h4 class="location-gallery-title">Gallery</h4>
            <div class="location-gallery-grid">
                <!-- Main Image (First Image) -->
                <div class="gallery-main-img">
                    <?php if (isset($gallery[0])): ?>
                    <a href="<?php echo esc_url($gallery[0]['url']); ?>" class="glightbox" data-gallery="location-gallery">
                        <img src="<?php echo esc_url($gallery[0]['url']); ?>"
                            alt="<?php echo esc_attr($gallery[0]['alt']); ?>">
                    </a>
                    <?php endif; ?>
                    <button class="btn-view-all-photo" onclick="document.querySelector('.glightbox').click();">
                        <img class="image-icon" src="<?php echo get_template_directory_uri(); ?>/assets/image/singlepage/Image.svg"
                            alt="">
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
                        if( !empty($remaining_images) ):
                            foreach($remaining_images as $img):
                    ?>
                        <a href="<?php echo esc_url($img['url']); ?>" class="glightbox" data-gallery="location-gallery" style="display: none;"></a>
                    <?php 
                            endforeach;
                        endif;
                    ?>
                </div>
            </div>
        </div>
        <?php endif; ?>

        <!-- Equipment List Section -->
        <?php 
        $equipments = get_field('location_equipments'); 
        if( $equipments ): ?>
        <div class="equipment-list-section">
            <h4 class="equipment-list-title">Equipment List</h4>
            <div class="aps-blog__cards">
                <?php 
                $equipments_display = array_slice($equipments, 0, 11);
                foreach( $equipments_display as $p ): 
                    $post_id = is_object($p) ? $p->ID : $p;
                    $permalink = get_permalink($post_id);
                    $title = get_the_title($post_id);
                    $thumb = get_the_post_thumbnail_url($post_id, 'thumbnail');
                    if(!$thumb) $thumb = get_template_directory_uri() . '/assets/image/placeholder.png'; 
                ?>
                <article class="aps-blog__card" onclick="window.location.href='<?php echo esc_url($permalink); ?>'">
                    <img class="aps-blog__card-img" style="width: 80px; height: 80px; object-fit: cover;" src="<?php echo esc_url($thumb); ?>" alt="<?php echo esc_attr($title); ?>">
                    <div class="aps-blog__card-content">
                        <h6 class="aps-blog__card-title" style="font-size: 16px; margin: 0;"><?php echo esc_html($title); ?></h6>
                        <p class="aps-blog__card-text">
                            <span style="font-size: 14px;">View Details</span>
                        </p>
                    </div>
                </article>
                <?php endforeach; ?>
            </div>
        </div>
        <?php endif; ?>
    </div>



</section>
