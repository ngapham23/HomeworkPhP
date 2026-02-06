        <div class="page-header-area">
            <div class="location-address">
                <img src="<?php echo esc_url(aps_img . '/featured-section/icon-location/location-icon.svg'); ?>"
                    alt="<?php esc_attr_e('Location', 'aps-sa'); ?>">
                <?php
                $address = get_post_meta(get_the_ID(), '_aps_location', true);
                if ($address) {
                    esc_html_e($address);
                }
                ?>
            </div>
            <h2 class="location-title">
                <?php the_title(); ?>
            </h2>
        </div>

        <div class="location-content-grid">
            <div class="location-content--box">
                <div class="location-overview-col">
                    <?php
                    $overview_subtitle = get_field('overview_summary') ?? '';
                    ?>
                    <h4 class="location-overview--title">Overview Summary</h4>
                    <div class="location-overview--subtitle">
                        <?php
                        if ($overview_subtitle) {
                            echo $overview_subtitle;
                        } else {
                            echo 'No overview available';
                        }
                        ?>
                    </div>
                </div>
                <div class="location-fulldes-col">
                    <h4 class="location-fulldes--title">Full Description</h4>
                    <div class="location-fulldes--subtitle">
                        <?php
                        $raw_content = get_the_content();
                        $clean_content = trim(wp_strip_all_tags($raw_content));
                        if (!empty($clean_content)) {
                            echo apply_filters('the_content', $raw_content);
                        } else {
                            echo 'No full description available';
                        }
                        ?>
                    </div>
                </div>
            </div>

            <div class="location-quickfact-col">
                <?php
                $quickfacts_location = get_field('quickfacts_location');
                $quickfacts_title = $quickfacts_location['quickfacts_title'] ?? '';
                $quickfacts_region = $quickfacts_location['quickfacts_region'] ?? '';
                $quickfacts_coordinates = $quickfacts_location['quickfacts_coordinates'] ?? '';

                $amenities = get_field('amentities');
                $amenities_count = is_array($amenities) ? count($amenities) : 0;


                $equipments = get_field('featured_equipment');
                $equipment_count = is_array($equipments) ? count($equipments) : 0;
                ?>
                <h4 class="location-quickfact--title">
                    <?php echo esc_html($quickfacts_title); ?>
                </h4>
                <div class="location-quickfacts-box">
                    <div class="location-region">
                        <p class="location-quickfacts--title">Region / Council: </p>
                        <a href="">
                            <p class="location-quickfacts--subtitle">
                                <?php echo esc_html($quickfacts_region); ?>
                            </p>
                        </a>
                    </div>
                    <div class="location-coordinates">
                        <p class="location-quickfacts--title">Coordinates</p>
                        <a href="">
                            <p class="location-quickfacts--subtitle">
                                <?php echo esc_html($quickfacts_coordinates); ?>
                            </p>
                        </a>
                    </div>
                    <div class="location-type">
                        <div class="location-amenities">
                            <p class="location-amenities-title">Amenities:</p>
                            <a href="">
                                <p class="location-amenities-subtitle">
                                    <?php echo $amenities_count; ?> Availables
                                </p>
                            </a>
                        </div>
                        <div class="location-equipment">
                            <p class="location-equipment-title">Equipment:</p>
                            <a href="">
                                <p class="location-equipment-subtitle">
                                    <?php echo $equipment_count; ?> Types
                                </p>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>