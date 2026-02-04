<?php

/**
 * Search Results Page
 * 
 * Displays search results with filters for Location and Equipment post types
 * Searches in: Title, Content, ACF fields (address, amenities, equipment)
 */

get_header();

$search_query = get_search_query();
$post_type_filter = isset($_GET['post_type']) ? sanitize_text_field($_GET['post_type']) : 'all';

// Modify query to search in ACF fields
add_filter('posts_search', 'aps_search_acf_fields', 10, 2);
add_filter('posts_join', 'aps_search_acf_join', 10, 2);
add_filter('posts_groupby', 'aps_search_acf_groupby', 10, 2);

?>

<section class="aps-search-page">
    <div class="aps-container">
        <!-- Search Header -->
        <div class="aps-search-header">
            <h1 class="aps-search-title">
                <?php
                if ($search_query) {
                    printf(esc_html__('Search Results for: "%s"', 'aps-sa'), esc_html($search_query));
                } else {
                    esc_html_e('Search Results', 'aps-sa');
                }
                ?>
            </h1>
            <p class="aps-search-count">
                <?php
                global $wp_query;
                printf(
                    esc_html(_n('%s result found', '%s results found', $wp_query->found_posts, 'aps-sa')),
                    '<strong>' . number_format_i18n($wp_query->found_posts) . '</strong>'
                );
                ?>
            </p>
        </div>

        <!-- Search Form & Filters -->
        <div class="aps-search-filters">
            <form role="search" method="get" class="aps-search-form" action="<?php echo esc_url(home_url('/')); ?>">
                <input type="search"
                    class="aps-search-input"
                    placeholder="<?php esc_attr_e('Search parks, equipment, amenities...', 'aps-sa'); ?>"
                    value="<?php echo esc_attr($search_query); ?>"
                    name="s"
                    required>
                <button type="submit" class="aps-search-submit">
                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none">
                        <path d="M9 17A8 8 0 1 0 9 1a8 8 0 0 0 0 16zM19 19l-4.35-4.35" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    <?php esc_html_e('Search', 'aps-sa'); ?>
                </button>
            </form>

            <!-- Post Type Filter -->
            <div class="aps-filter-tabs">
                <a href="<?php echo esc_url(add_query_arg(['s' => $search_query, 'post_type' => 'all'])); ?>"
                    class="aps-filter-tab <?php echo $post_type_filter === 'all' ? 'active' : ''; ?>">
                    <?php esc_html_e('All', 'aps-sa'); ?>
                </a>
                <a href="<?php echo esc_url(add_query_arg(['s' => $search_query, 'post_type' => 'location'])); ?>"
                    class="aps-filter-tab <?php echo $post_type_filter === 'location' ? 'active' : ''; ?>">
                    <?php esc_html_e('Locations', 'aps-sa'); ?>
                </a>
                <a href="<?php echo esc_url(add_query_arg(['s' => $search_query, 'post_type' => 'equipment'])); ?>"
                    class="aps-filter-tab <?php echo $post_type_filter === 'equipment' ? 'active' : ''; ?>">
                    <?php esc_html_e('Equipment', 'aps-sa'); ?>
                </a>
            </div>
        </div>

        <!-- Search Results -->
        <div class="aps-search-results">
            <?php if (have_posts()) : ?>
                <div class="aps-results-grid">
                    <?php while (have_posts()) : the_post(); ?>
                        <article <?php post_class('aps-result-card'); ?>>
                            <!-- Thumbnail -->
                            <div class="aps-result-thumbnail">
                                <?php if (has_post_thumbnail()) : ?>
                                    <a href="<?php the_permalink(); ?>">
                                        <?php the_post_thumbnail('medium', ['class' => 'aps-result-img']); ?>
                                    </a>
                                <?php else : ?>
                                    <a href="<?php the_permalink(); ?>">
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/image/logo.png"
                                            alt="<?php the_title_attribute(); ?>"
                                            class="aps-result-img">
                                    </a>
                                <?php endif; ?>

                                <!-- Post Type Badge -->
                                <span class="aps-result-badge">
                                    <?php echo esc_html(get_post_type_object(get_post_type())->labels->singular_name); ?>
                                </span>
                            </div>

                            <!-- Content -->
                            <div class="aps-result-content">
                                <?php if (get_post_type() === 'location') :
                                    $address = get_post_meta(get_the_ID(), '_aps_location', true);
                                    if ($address) : ?>
                                        <p class="aps-result-meta">
                                            <svg width="16" height="16" viewBox="0 0 16 16" fill="currentColor">
                                                <path d="M8 0C5.243 0 3 2.243 3 5c0 4.5 5 11 5 11s5-6.5 5-11c0-2.757-2.243-5-5-5zm0 7.5c-1.381 0-2.5-1.119-2.5-2.5S6.619 2.5 8 2.5s2.5 1.119 2.5 2.5S9.381 7.5 8 7.5z" />
                                            </svg>
                                            <?php echo esc_html($address); ?>
                                        </p>
                                <?php endif;
                                endif; ?>

                                <h3 class="aps-result-title">
                                    <a href="<?php the_permalink(); ?>">
                                        <?php the_title(); ?>
                                    </a>
                                </h3>

                                <div class="aps-result-excerpt">
                                    <?php echo wp_trim_words(get_the_excerpt(), 20, '...'); ?>
                                </div>

                                <?php if (get_post_type() === 'location') :
                                    $amenities = get_field('amentities');
                                    if ($amenities && is_array($amenities)) : ?>
                                        <div class="aps-result-tags">
                                            <?php
                                            $count = 0;
                                            foreach ($amenities as $amenity) :
                                                if ($count >= 3) break;
                                                $term = isset($amenity['amentities_taxomony']) ? $amenity['amentities_taxomony'] : null;
                                                if ($term) :
                                                    if (is_numeric($term)) {
                                                        $term = get_term($term);
                                                    }
                                                    if ($term && !is_wp_error($term)) : ?>
                                                        <span class="aps-tag"><?php echo esc_html($term->name); ?></span>
                                            <?php
                                                        $count++;
                                                    endif;
                                                endif;
                                            endforeach;
                                            ?>
                                        </div>
                                <?php endif;
                                endif; ?>

                                <a href="<?php the_permalink(); ?>" class="aps-result-link">
                                    <?php esc_html_e('View Details', 'aps-sa'); ?>
                                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none">
                                        <path d="M6 12l4-4-4-4" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </a>
                            </div>
                        </article>
                    <?php endwhile; ?>
                </div>

                <!-- Pagination -->
                <div class="aps-pagination">
                    <?php
                    echo paginate_links([
                        'prev_text' => '&laquo; ' . __('Previous', 'aps-sa'),
                        'next_text' => __('Next', 'aps-sa') . ' &raquo;',
                        'type' => 'list',
                    ]);
                    ?>
                </div>

            <?php else : ?>
                <!-- No Results -->
                <div class="aps-no-results">
                    <svg width="80" height="80" viewBox="0 0 80 80" fill="none">
                        <circle cx="40" cy="40" r="38" stroke="#E5E7EB" stroke-width="4" />
                        <path d="M40 20v24M40 52h.02" stroke="#9CA3AF" stroke-width="4" stroke-linecap="round" />
                    </svg>
                    <h2><?php esc_html_e('No results found', 'aps-sa'); ?></h2>
                    <p><?php esc_html_e('Try different keywords or check your spelling', 'aps-sa'); ?></p>
                    <a href="<?php echo esc_url(home_url('/')); ?>" class="aps-btn aps-btn--ghost">
                        <?php esc_html_e('Back to Home', 'aps-sa'); ?>
                    </a>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<?php
// Remove filters after query
remove_filter('posts_search', 'aps_search_acf_fields');
remove_filter('posts_join', 'aps_search_acf_join');
remove_filter('posts_groupby', 'aps_search_acf_groupby');

get_footer();
