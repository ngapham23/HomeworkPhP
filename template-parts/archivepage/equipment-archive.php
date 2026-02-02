<?php
if (!defined('ABSPATH')) {
    exit;
}


$archive_location_background = get_field('archive-location_img', 'option');
$archive_location_background_mobile = get_field('archive-location_img_mobile', 'option');

$bg_desktop = $archive_location_background['url'] ?? '';
$bg_mobile = $archive_location_background_mobile['url'] ?? '';
?>

<section class="aps-hero"
    style="--hero-bg-desktop: url('<?php echo esc_url($bg_desktop); ?>'); --hero-bg-mobile: url('<?php echo esc_url($bg_mobile); ?>');">


</section><!-- end hero section -->

<section class="aps-blog">
    <div class="aps-container">
        <div class="aps-blog__header">
            <h3 class="aps-blog__title"><?php post_type_archive_title(); ?></h3>
            <div class="aps-section__button-wrapper">
                <a href="<?php echo esc_url(home_url('/')); ?>" class="aps-btn aps-btn--ghost">
                    <?php esc_html_e('Back To Home', 'aps-sa'); ?>
                    <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/image/featured-section/icon-button/backwards-arrow.svg'); ?>"
                        alt="Back Arrow">
                </a>
            </div>
        </div>

        <?php if (have_posts()): ?>
        <div class="aps-blog__cards">
            <?php while (have_posts()): the_post(); 
                    $thumbnail = has_post_thumbnail() ? get_the_post_thumbnail_url(get_the_ID(), 'medium') : get_template_directory_uri() . '/assets/image/logo.png';
                ?>
            <article class="aps-blog__card">
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
            </article>
            <?php endwhile; ?>
        </div>

        <div class="archive-pagination">
            <?php
                the_posts_pagination(array(
                    'mid_size'  => 2,
                    'prev_text' => __('&laquo; Previous', 'aps-sa'),
                    'next_text' => __('Next &raquo;', 'aps-sa'),
                ));
                ?>
        </div>

        <?php else: ?>
        <p class="aps-no-items"><?php esc_html_e('No equipment found.', 'aps-sa'); ?></p>
        <?php endif; ?>
    </div>
</section>

<style>


@media (max-width: 576px) {
    .aps-blog__cards {
        grid-template-columns: 1fr !important;
        gap: 12px !important;
    }
}

/* Pagination Styles */
.archive-pagination {
    margin-top: 48px;
    display: flex;
    justify-content: center;
}

.archive-pagination .nav-links {
    display: flex;
    gap: 8px;
    align-items: center;
    flex-wrap: wrap;
    justify-content: center;
}

.archive-pagination .page-numbers {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    min-width: 40px;
    height: 40px;
    padding: 0 12px;
    font-size: 14px;
    font-weight: 600;
    color: var(--color-primary-blue-dark, #140F50);
    background: #FFFEF3;
    border: 1px solid #E0E0E0;
    border-radius: 8px;
    text-decoration: none;
    transition: all 0.3s ease;
}

.archive-pagination .page-numbers.current,
.archive-pagination .page-numbers:hover {
    background: var(--color-primary-blue, #2447f5);
    color: #fff;
    border-color: var(--color-primary-blue, #2447f5);
}

.archive-pagination .page-numbers.dots {
    border: none;
    background: transparent;
    cursor: default;
}

.archive-pagination .prev, 
.archive-pagination .next {
    font-weight: 700;
}
</style>


