        <div class="equipment-bottom-box">
            <h4 class="equipment-bottom-box--title">Parks where this equipment exists</h4>
            <div class="equipment-bottom-box--post">
                <div class="equipment-bottom-box--inner">
                    <?php
                    $current_equipment_id = get_the_ID();

                    $args = array(
                        'post_type' => 'location',
                        'posts_per_page' => 3,
                        'meta_query' => array(
                            array(
                                'key' => 'featured_equipment',
                                'value' => '"' . $current_equipment_id . '"',
                                'compare' => 'LIKE'
                            )
                        )
                    );
                    $related_query = new WP_Query($args);

                    if ($related_query->have_posts()) {
                        while ($related_query->have_posts()) {
                            $related_query->the_post();
                            $location_id = get_the_ID();
                    ?>
                            <?php
                            set_query_var('post_id', $location_id);
                            get_template_part('template-parts/components/location-card');
                            ?>
                    <?php
                        }
                        wp_reset_postdata();
                    } else {
                        echo '<p class="aps-no-items">No related locations found.</p>';
                    }
                    ?>
                </div>
                <!-- Mobile Slider Dots -->
                <div class="equipment-slider-dots mobile-only" aria-hidden="true">
                    <svg xmlns="http://www.w3.org/2000/svg" width="80" height="20" viewBox="0 0 62 20" fill="none">
                        <circle class="equipment-dot-circle" data-slide="0" cx="10" cy="10" r="9.5" stroke="#140F50" />
                        <circle class="equipment-dot-inner" data-slide="0" cx="10" cy="10" r="4" fill="#140F50" />
                        <circle class="equipment-dot-circle" data-slide="1" cx="34" cy="10" r="3.5" stroke="#140F50" />
                        <circle class="equipment-dot-inner" data-slide="1" cx="34" cy="10" r="4" fill="#140F50" opacity="0" />
                        <circle class="equipment-dot-circle" data-slide="2" cx="58" cy="10" r="3.5" stroke="#140F50" />
                        <circle class="equipment-dot-inner" data-slide="2" cx="58" cy="10" r="4" fill="#140F50" opacity="0" />
                    </svg>
                </div>
            </div>


        </div>