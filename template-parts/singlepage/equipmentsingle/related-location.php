        <div class="equipment-bottom-box">
            <h4 class="equipment-bottom-box--title">Parks where this equipment exists</h4>
            <div class="equipment-bottom-box--post">
                <div class="equipment-bottom-box--inner">
                    <?php
                    $related_locations = get_field('post_location');
                    if ($related_locations) {
                        // Limit to 3 posts
                        $related_locations = array_slice($related_locations, 0, 3);

                        foreach ($related_locations as $location_id) {
                            $post = get_post($location_id);
                            setup_postdata($post);
                    ?>
                            <article <?php post_class('equipment-bottom-box--card', $location_id); ?> id="post-<?php echo $location_id; ?>">
                                <?php if (has_post_thumbnail($location_id)): ?>
                                    <?php echo get_the_post_thumbnail($location_id, 'medium', ['class' => 'equipment-bottom-box--card__img']); ?>
                                <?php else: ?>
                                    <img class="equipment-bottom-box--card__img" src="<?php echo esc_url($default_image); ?>" alt="Default Image" />
                                <?php endif; ?>

                                <div class="equipment-bottom-box--card__body">
                                    <p class="equipment-bottom-box--card__meta">
                                        <img src="<?php echo esc_url(aps_img . '/featured-section/icon-location/location-icon.svg'); ?>" alt="Location">
                                        <?php
                                        $address = get_post_meta($location_id, '_aps_location', true);
                                        if ($address) {
                                            echo esc_html($address);
                                        }
                                        ?>
                                    </p>

                                    <h5 class="equipment-bottom-box--card__title"><?php echo esc_html(get_the_title($location_id)); ?></h5>

                                    <p class="equipment-bottom-box--card__captionA">
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
                                            echo esc_html(wp_trim_words(get_the_excerpt($location_id), 20, '...'));
                                        }
                                        ?>
                                    </p>

                                    <p class="equipment-bottom-box--card__captionE">
                                        <?php
                                        $equipments = get_the_terms($location_id, 'equipments');
                                        if ($equipments && !is_wp_error($equipments)) {
                                            echo 'Equipment: ';
                                            $links = [];
                                            foreach ($equipments as $eq) {
                                                $links[] = '<a class="aps-tag" href="' . esc_url(get_term_link($eq)) . '">' . esc_html($eq->name) . '</a>';
                                            }
                                            echo implode(', ', $links);
                                        } else {
                                            echo esc_html(wp_trim_words(get_the_excerpt($location_id), 20, '...'));
                                        }
                                        ?>
                                    </p>

                                    <hr class=" equipment-bottom-box--card__divider">
                                    <a href="<?php echo esc_url(get_permalink($location_id)); ?>" class="equipment-bottom-box--card__btn">
                                        Explore Park
                                        <img src="<?php echo esc_url(aps_img . '/featured-section/icon-button/arrow-card.svg'); ?>" alt="Arrow Right">
                                    </a>
                                </div>
                            </article>
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