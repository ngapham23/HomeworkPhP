<?php
$location_id = isset($post_id) ? $post_id : get_the_ID();
$default_image = get_template_directory_uri() . '/assets/image/logo.png';
?>

<article <?php post_class('aps_card', $location_id); ?> id="post-<?php echo $location_id; ?>">
    <a href="<?php echo esc_url(get_permalink($location_id)); ?>">
        <?php if (has_post_thumbnail($location_id)): ?>
            <?php echo get_the_post_thumbnail($location_id, 'medium', array('class' => 'aps_card__img', 'alt' => get_the_title($location_id))); ?>
        <?php else: ?>
            <img class="aps_card__img" src="<?php echo esc_url($default_image); ?>" alt="<?php esc_attr_e('Default Image', 'aps-sa'); ?>" />
        <?php endif; ?>

        <div class="aps_card__body">
            <p class="aps_card__meta">
                <img src="<?php echo esc_url(aps_img . '/featured-section/icon-location/location-icon.svg'); ?>" alt="<?php esc_attr_e('Location', 'aps-sa'); ?>">
                <?php
                $address = get_field('featured_location', $location_id);
                if ($address) {
                    echo esc_html($address);
                } else {
                    esc_html_e('No Location', 'aps-sa');
                }
                ?>
            </p>

            <h5 class="aps_card__title">
                <?php echo esc_html(get_the_title($location_id)); ?>
            </h5>

            <p class="aps_card__captionA">
                <?php
                $amenities = get_the_terms($location_id, 'amentitis');
                if ($amenities && !is_wp_error($amenities)) {
                    echo 'Amenities: ';
                    $links = [];
                    foreach ($amenities as $amenity) {
                        $links[] = '<a class="aps-tag" href="' . esc_url(get_term_link($amenity)) . '">' . esc_html($amenity->name) . '</a>';
                    }
                    echo implode(', ', $links);
                } else {
                    echo esc_html(wp_trim_words(get_post_field('post_excerpt', $location_id), 20, '...'));
                }
                ?>
            </p>

            <p class="aps_card__captionE">
                <?php
                $featured_equipments = get_field('featured_equipment', $location_id);
                if ($featured_equipments) {
                    echo 'Equipment: ';
                    $eq_links = [];
                    $items = is_array($featured_equipments) ? $featured_equipments : array($featured_equipments);
                    foreach ($items as $eq_post) {
                        $eq_id = is_object($eq_post) ? $eq_post->ID : $eq_post;
                        $permalink = get_permalink($eq_id);
                        $title = get_the_title($eq_id);
                        $eq_links[] = '<a class="aps-tag" href="' . esc_url($permalink) . '">' . esc_html($title) . '</a>';
                    }
                    echo implode(', ', $eq_links);
                } else {
                    echo esc_html(wp_trim_words(get_post_field('post_excerpt', $location_id), 20, '...'));
                }
                ?>
            </p>

            <hr class="aps_card__divider">
            <a href="<?php echo esc_url(get_permalink($location_id)); ?>" class="aps_btn aps_btn--pill">
                <?php esc_html_e('Explore Park', 'aps-sa'); ?>
                <img src="<?php echo esc_url(aps_img . '/featured-section/icon-button/arrow-card.svg'); ?>" alt="<?php esc_attr_e('Arrow Right', 'aps-sa'); ?>">
            </a>
        </div>
    </a>
</article>