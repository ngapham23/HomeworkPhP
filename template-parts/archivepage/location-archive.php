<?php
if (!defined('ABSPATH')) {
    exit;
}

$archive_location_background = get_field('archive-location_img', 'option');
$archive_location_background_mobile = get_field('archive-location_img_mobile', 'option');
?>

<section class="aps-hero"
    style="--hero-bg-desktop: url('<?php echo esc_url($archive_location_background['url']); ?>'); --hero-bg-mobile: url('<?php echo esc_url($archive_location_background_mobile['url']); ?>');">


</section><!-- end hero section -->
<section class="aps-section--cards">
    <div class="aps-container">
        <div class="aps-section__header">
            <div class="aps-section__title-wrapper">
                <h3 class="aps-section__title"><?php esc_html_e('All Featured Parks Nearby', 'aps-sa'); ?></h3>
                <p class="aps-subtitle">
                    <?php esc_html_e('Find parks with unique amenities easily near your location.', 'aps-sa'); ?>
                </p>
            </div>
            <div class="aps-section__button-wrapper">
                <a href="<?php echo esc_url(home_url('/')); ?>" class="aps-btn aps-btn--ghost" id="location-list">
                    <?php esc_html_e('Back To Home', 'aps-sa'); ?>
                    <img src="<?php echo esc_url(aps_img . 'featured-section/icon-button/backwards-arrow.svg'); ?>"
                        alt="<?php esc_attr_e('Arrow Equipment', 'aps-sa'); ?>">
                </a>
            </div>
        </div>

        <?php if (have_posts()): ?>
        <div class="aps-cards">
            <div class="aps-cards-inner">
                <?php while (have_posts()):
                        the_post(); ?>
                <?php
                        $location = get_post_meta(get_the_ID(), '_aps_location', true);
                        $amenities = get_the_terms(get_the_ID(), 'amenity');
                        $equipment_list = get_the_terms(get_the_ID(), 'equipment_item');
                        $tags = get_the_terms(get_the_ID(), 'location_tag');
                        ?>
                <article <?php post_class('aps_card'); ?> id="post-<?php the_ID(); ?> ">
                    <?php if (has_post_thumbnail()): ?>
                    <a href="<?php the_permalink(); ?>">
                        <?php the_post_thumbnail('medium', array('class' => 'aps_card__img', 'alt' => get_the_title())); ?>
                    </a>
                    <?php endif; ?>
                    <div class="aps_card__body">
                        <p class="aps_card__meta">
                            <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/image/featured-section/icon-location/location-icon.svg'); ?>"
                                alt="<?php esc_attr_e('Location', 'aps-sa'); ?>">
                            <?php
                                    $location = get_post_meta(get_the_ID(), '_aps_location', true);
                                    if (!$location) {
                                        $location = wp_trim_words(get_the_excerpt(), 20, '...');
                                    }
                                    echo esc_html($location);
                                    ?>
                        </p>    
                        

                        <h5 class="aps_card__title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        </h5>

                        <p class="aps_card__captionA">
                            <?php
                                    $amenities = get_the_terms(get_the_ID(), 'amentitis');
                                    if ($amenities && !is_wp_error($amenities)) {
                                        echo 'Amenities: ';
                                        $links = [];
                                        foreach ($amenities as $amenity) {
                                            $links[] = '<span class="aps-tag">' . esc_html($amenity->name) . '</span>';
                                        }
                                        echo implode(', ', $links);
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
                                            $links[] = '<span class="aps-tag">' . esc_html($eq->name) . '</span>';
                                        }
                                        echo implode(', ', $links);
                                    } 
                                    ?>
                        </p>
                        <hr class="aps_card__divider">
                        <a href="<?php the_permalink() . '#location-single'; ?>" class="aps_btn aps_btn--pill">
                            <?php esc_html_e('Explore Park', 'aps-sa'); ?>
                            <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/image/featured-section/icon-button/arrow-card.svg'); ?>"
                                alt="<?php esc_attr_e('Arrow Right', 'aps-sa'); ?>">
                        </a>
                    </div>
                </article>
                <?php endwhile; ?>
            </div>
        </div>

        <div class="archive-pagination"><?php the_posts_pagination(); ?></div>
        <?php else: ?>
        <p><?php esc_html_e('No locations found.', 'aps-sa'); ?></p>
        <?php endif; ?>
    </div>
</section>