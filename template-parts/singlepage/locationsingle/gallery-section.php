        <!-- Gallery Section -->
        <?php
        $gallery = get_field('location_gallery');
        if ($gallery):
        ?>
            <div class="location-gallery-wrapper">
                <h4 class="location-gallery--title">Gallery</h4>
                <!-- Mobile Gallery Slider -->
                <div class="location-gallery-slider-mobile">
                    <?php foreach ($gallery as $img): ?>
                        <div class="gallery-item-mobile">
                            <a href="<?php echo esc_url($img['url']); ?>" class="glightbox"
                                data-gallery="location-gallery-mobile">
                                <img src="<?php echo esc_url($img['url']); ?>" alt="<?php echo esc_attr($img['alt']); ?>">
                            </a>
                        </div>
                    <?php endforeach; ?>
                </div>

                <!-- Desktop Gallery Grid -->
                <div class="location-gallery-grid desktop-only">
                    <!-- Main Image (First Image) -->
                    <div class="gallery-main-img">
                        <?php if (isset($gallery[0])): ?>
                            <a href="<?php echo esc_url($gallery[0]['url']); ?>" class="glightbox"
                                data-gallery="location-gallery">
                                <img src="<?php echo esc_url($gallery[0]['url']); ?>"
                                    alt="<?php echo esc_attr($gallery[0]['alt']); ?>">
                            </a>
                        <?php endif; ?>
                        <button class="btn-view-all-photo" onclick="document.querySelector('.glightbox').click();">
                            <img class="image-icon"
                                src="<?php echo get_template_directory_uri(); ?>/assets/image/singlepage/Image.svg" alt="">
                            <span class="view-all-photo">View All Photo</span>
                        </button>
                    </div>

                    <!-- Sub Images  -->
                    <div class="gallery-sub-grid">
                        <?php
                        // First 4 images are shown in grid (skipping the main one)
                        $sub_images = array_slice($gallery, 1, 4);
                        foreach ($sub_images as $img):
                        ?>
                            <div class="gallery-sub-item">
                                <a href="<?php echo esc_url($img['url']); ?>" class="glightbox" data-gallery="location-gallery">
                                    <img src="<?php echo esc_url($img['url']); ?>" alt="<?php echo esc_attr($img['alt']); ?>">
                                </a>
                            </div>
                        <?php endforeach; ?>

                        <?php
                        // Hidden links for the rest of the images
                        $remaining_images = array_slice($gallery, 5);
                        if (!empty($remaining_images)):
                            foreach ($remaining_images as $img):
                        ?>
                                <a href="<?php echo esc_url($img['url']); ?>" class="glightbox" data-gallery="location-gallery"
                                    style="display: none;"></a>
                        <?php
                            endforeach;
                        endif;
                        ?>
                    </div>
                </div>


                <div class="location-slider-dots" aria-hidden="true">
                    <svg xmlns="http://www.w3.org/2000/svg" width="80" height="20" viewBox="0 0 62 20" fill="none">
                        <circle class="location-dot-circle" data-slide="0" cx="10" cy="10" r="9.5" stroke="#140F50" />
                        <circle class="location-dot-inner" data-slide="0" cx="10" cy="10" r="4" fill="#140F50" />
                        <circle class="location-dot-circle" data-slide="1" cx="34" cy="10" r="3.5" stroke="#140F50" />
                        <circle class="location-dot-inner" data-slide="1" cx="34" cy="10" r="4" fill="#140F50"
                            opacity="0" />
                        <circle class="location-dot-circle" data-slide="2" cx="58" cy="10" r="3.5" stroke="#140F50" />
                        <circle class="location-dot-inner" data-slide="2" cx="58" cy="10" r="4" fill="#140F50"
                            opacity="0" />
                    </svg>
                </div>
            </div>
        <?php endif; ?>