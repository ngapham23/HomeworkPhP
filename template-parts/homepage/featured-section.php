<?php

$post_type = post_type_exists('location') ? 'location' : 'post';

$view_all_link = post_type_exists('location') ? get_post_type_archive_link('location') : get_post_type_archive_link('post');

$query_locationpost = new WP_Query([
    'post_type' => $post_type,
    'posts_per_page' => 4,
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
                    <?php esc_html_e('View All Location', 'aps-sa'); ?>
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
                        <?php get_template_part('template-parts/components/location-card'); ?>
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
                <circle class="aps-dot-inner" data-slide="2" cx="58" cy="10" r="4" fill="#140F50" opacity="0" />
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