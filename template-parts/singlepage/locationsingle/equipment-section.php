        <!-- Equipment List Section (Reverse Query) -->
        <?php
        $equipments = get_field('featured_equipment');
        if ($equipments && is_array($equipments)): ?>
            <div class="equipment-list-section">
                <h4 class="equipment-list--title">Equipment List</h4>
                <div class="location-equipment-listing">
                    <?php
                    $equipments_display = array_slice($equipments, 0, 11);
                    foreach ($equipments_display as $p):
                        $post_id = is_object($p) ? $p->ID : $p;

                        $permalink = get_permalink($post_id);
                        $title = get_the_title($post_id);
                        $thumb = get_the_post_thumbnail_url($post_id, 'thumbnail');

                        if (!$thumb) {
                            $thumb = get_template_directory_uri() . '/assets/image/logo.png';
                        }
                    ?>
                        <article class="location-equipment-card">
                            <a href="<?php echo esc_url($permalink); ?>">
                                <img class="location-equipment-card-img" src="<?php echo esc_url($thumb); ?>"
                                    alt="<?php echo esc_attr($title); ?>">

                                <div class="location-equipment-card-content">
                                    <h6 class="location-equipment-card-title"><?php echo esc_html($title); ?></h6>
                                    <p class="location-equipment-card-text">
                                        <span><?php esc_html_e('View Details', 'aps-sa'); ?></span>
                                    </p>
                                </div>
                            </a>
                        </article>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php endif; ?>