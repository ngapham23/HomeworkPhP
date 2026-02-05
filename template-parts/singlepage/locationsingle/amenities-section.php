        <div class="location-amenities-row">
            <h4 class="location-amenities--title">
                Amenities
            </h4>
            <div class="location-amenities-box">
                <?php
                $amenities = get_field('amentities');
                if ($amenities) {
                    foreach ($amenities as $row) {
                        $amenities_icon     = $row['amentities_icon'] ?? '';
                        $amenities_taxonomy = $row['amentities_taxomony'] ?? '';
                ?>
                        <p class="location-amenities--subtitle">
                            <?php
                            if ($amenities_icon) {
                                echo '<img src="' . esc_url($amenities_icon['url']) . '" alt="' . esc_attr($amenities_icon['alt']) . '">';
                            }
                            if ($amenities_taxonomy) {
                                if (is_numeric($amenities_taxonomy)) {
                                    $term = get_term($amenities_taxonomy);
                                    if ($term && !is_wp_error($term)) {
                                        echo esc_html($term->name);
                                    }
                                } elseif (is_object($amenities_taxonomy)) {
                                    echo esc_html($amenities_taxonomy->name);
                                }
                            }
                            ?>
                        </p>
                <?php
                    }
                }
                ?>
            </div>
        </div>