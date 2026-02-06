<?php
$posts_per_page = wp_is_mobile() ? 8 : 25;
$equipment_query = new WP_Query([
    'post_type' => 'equipment',
    'posts_per_page' => $posts_per_page,
    'post_status' => 'publish',
    'orderby' => 'menu_order',
    'order' => 'ASC',
    'no_found_rows' => true,
]);
$post_type = post_type_exists('equipment') ? 'equipment' : 'post';

$view_all_link = post_type_exists('equipment') ? get_post_type_archive_link('equipment') : get_post_type_archive_link('post');

?>


<!-- Brand Section -->
<section class="aps-blog">
    <div class="aps-container">
        <div class="aps-blog__header">
            <h3 class="aps-blog__title">
                <?php esc_html_e('Explore Equipment Directory', 'aps-sa'); ?>
            </h3>
            <div class="aps-section__button-wrapper">
                <a href="<?php echo esc_url($view_all_link ?: home_url('/')) ?>" class="aps-btn aps-btn--ghost">
                    <?php esc_html_e('View All Equipment', 'aps-sa'); ?>
                    <img src="<?php echo esc_url(aps_img . '/featured-section/icon-button/arrow-equiment.svg'); ?>"
                        alt="Arrow Equipment">
                </a>
            </div>
        </div>


        <div class="aps-blog__cards">
            <?php if ($equipment_query->have_posts()): ?>
                <?php while ($equipment_query->have_posts()):
                    $equipment_query->the_post(); ?>
                    <?php
                    $thumbnail = has_post_thumbnail() ? get_the_post_thumbnail_url(get_the_ID(), 'medium') : get_template_directory_uri() . '/assets/image/logo.png';

                    ?>
                    <article class="aps-blog__card">
                        <a href="<?php the_permalink(); ?>">
                            <img class="aps-blog__card-img" src="<?php echo esc_url($thumbnail); ?>"
                                alt="<?php the_title_attribute(); ?>">
                            </img>
                            <div class="aps-blog__card-content">
                                <h6 class="aps-blog__card-title"><?php the_title(); ?></h6>
                                <p class="aps-blog__card-text">
                                    <a href="<?php the_permalink(); ?>" class="aps-blog__card-btn">
                                        <?php esc_html_e('View Details', 'aps-sa'); ?>
                                    </a>
                                </p>
                            </div>
                        </a>
                    </article>
                <?php endwhile;
                wp_reset_postdata(); ?>
            <?php else: ?>
                <p class="aps-no-items"><?php esc_html_e('No equipment items found.', 'aps-sa'); ?></p>
            <?php endif; ?>
        </div>
        <div class="aps-section__button-wrapper--mobile">
            <a href="<?php echo esc_url($view_all_link ?: home_url('/')) ?>" class="aps-btn aps-btn--ghost">
                <?php esc_html_e('View All Equipment', 'aps-sa'); ?>
                <img src="<?php echo esc_url(aps_img . '/featured-section/icon-button/arrow-equiment.svg'); ?>"
                    alt="Arrow Equipment">
            </a>
        </div>
    </div>
</section> <!-- end brand -->