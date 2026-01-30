<?php

$post_type = post_type_exists('location') ? 'location' : 'post';

$view_all_link = post_type_exists('location') ? get_post_type_archive_link('location') : get_post_type_archive_link('post');

$query_locationpost = new WP_Query([
    'post_type' => $post_type,
    'posts_per_page' => 6,
    'post_status' => 'publish',
    'orderby' => 'menu_order',
    'order' => 'ASC',
    'no_found_rows' => true,
]);
?>


<!-- Featured Parks Nearby Section -->
<section class="aps-section--cards">
    <div class="aps-container ">
        <div class="aps-section__header">
            <div class="aps-section__title-wrapper">
                <h3 class="aps-section__title">
                    <?php esc_html_e('Featured Parks Nearby', 'aps-sa'); ?>
                </h3>
                <p class="aps-subtitle">
                    <?php esc_html_e('Find parks with unique amenities easily near your location.', 'aps-sa'); ?>
                </p>
            </div>
            <div class="aps-section__button-wrapper">
                <a href="<?php echo esc_url($view_all_link ?: home_url('/')) ?>" class="aps-btn aps-btn--ghost">
                    <?php esc_html_e('View All Equipment', 'aps-sa'); ?>
                    <img src="<?php echo esc_url(aps_img . '/featured-section/icon-button/arrow-equiment.svg'); ?>"
                        alt="Arrow Equipment">
                </a>
            </div>
        </div>

        <div class="aps-cards">
            <div class="aps-cards-inner">
                <?php if ($query_locationpost->have_posts()): ?>
                    <?php while ($query_locationpost->have_posts()):
                        $query_locationpost->the_post(); ?>
                        <article <?php post_class('aps_card'); ?> id="post- <?php the_ID(); ?>">
                            <?php if (has_post_thumbnail()): ?>
                                <?php the_post_thumbnail('medium', array('class' => 'aps_card__img', 'alt' => get_the_title())); ?>
                            <?php else: ?>
                                <img class="aps_card__img" src="<?php echo esc_url($default_image); ?>"
                                    alt="<?php esc_attr_e('Default Image', 'aps-sa'); ?>" />
                            <?php endif; ?>
                            <div class="aps_card__body">
                                <p class="aps_card__meta">
                                    <img src="<?php echo esc_url(aps_img . '/featured-section/icon-location/location-icon.svg'); ?>"
                                        alt="<?php esc_attr_e('Location', 'aps-sa'); ?>">
                                    <?php
                                    $address = get_post_meta(get_the_ID(), '_aps_location', true);
                                    if ($address) {
                                        esc_html_e($address);
                                    }
                                    ?>
                                </p>

                                <h5 class="aps_card__title">
                                    <?php the_title(); ?>
                                </h5>

                                <p class="aps_card__captionA">
                                    <?php
                                    $amenities = get_the_terms(get_the_ID(), 'amentitis');
                                    if ($amenities && !is_wp_error($amenities)) {
                                        echo 'Amenities: ';
                                        $links = [];
                                        foreach ($amenities as $amenity) {
                                            $links[] = '<a class="aps-tag" href="' . esc_url(get_term_link($amenity)) . '">' . esc_html($amenity->name) . '</a>';
                                        }
                                        echo implode(', ', $links);
                                    } else {
                                        esc_html_e(wp_trim_words(get_the_excerpt(), 20, '...'));
                                    }
                                    ?>
                                </p>
                                <p class="aps_card__captionE">
                                    <?php
                                    $equipment = get_the_terms(get_the_ID(), 'equipment');
                                    if ($equipment && !is_wp_error($equipment)) {
                                        echo 'Equipment: ';
                                        $links = [];
                                        foreach ($equipment as $eq) {
                                            $links[] = '<a class="aps-tag" href="' . esc_url(get_term_link($eq)) . '">' . esc_html($eq->name) . '</a>';
                                        }
                                        echo implode(', ', $links);
                                    } else {
                                        esc_html_e(wp_trim_words(get_the_excerpt(), 20, '...'));
                                    }
                                    ?>
                                </p>
                                <hr class="aps_card__divider">
                                <a href="<?php the_permalink() . '#location-single'; ?>" class="aps_btn aps_btn--pill">
                                    <?php esc_html_e('Explore Park', 'aps-sa'); ?>
                                    <img src="<?php echo esc_url(aps_img . '/featured-section/icon-button/arrow-card.svg'); ?>"
                                        alt="<?php esc_attr_e('Arrow Right', 'aps-sa'); ?>">
                                </a>
                            </div>
                        </article>
                    <?php endwhile;
                    wp_reset_postdata(); ?>
                <?php else: ?>
                    <p class="aps-no-items">
                        <?php esc_html_e('No featured items found.', 'aps-sa'); ?>
                    </p>
                <?php endif; ?>
            </div>
        </div>
        <div class="aps-slider-dots" aria-hidden="true">
            <svg xmlns="http://www.w3.org/2000/svg" width="80" height="20" viewBox="0 0 62 20" fill="none">
                <circle class="aps-dot-circle" data-slide="0" cx="10" cy="10" r="9.5" stroke="#140F50" />
                <circle class="aps-dot-inner" data-slide="0" cx="10" cy="10" r="4" fill="#140F50" />
                <circle class="aps-dot-circle" data-slide="1" cx="34" cy="10" r="3.5" stroke="#140F50" />
                <circle class="aps-dot-inner" data-slide="1" cx="34" cy="10" r="4" fill="#140F50" opacity="0" />
                <circle class="aps-dot-circle" data-slide="2" cx="58" cy="10" r="3.5" stroke="#140F50" />
            </svg>
        </div>

        <div class="aps-section__button-wrapper--mobile">
            <a href="<?php echo esc_url($view_all_link ?: home_url('/')) ?>" class="aps-btn aps-btn--ghost">
                <?php esc_html_e('View All Equipment', 'aps-sa'); ?>
                <img src="<?php echo esc_url(aps_img . '/featured-section/icon-button/arrow-equiment.svg'); ?>"
                    alt="Arrow Equipment">
            </a>
        </div>
    </div>
</section>