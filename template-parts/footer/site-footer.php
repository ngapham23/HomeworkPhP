<footer class="aps-footer">
    <div class="aps-container">
        <div class="aps-footer__inner">
            <div class=" aps-footer__col--about">
                <?php
                $about = get_field('about', 'option');
                if ($about):
                    $about_logo = $about['about_logo'];
                    ?>
                <img src="<?php echo esc_url($about_logo['url']); ?>" alt="APSA_LOGO" class="aps-footer__logo" />
                <div class="aps-footer__contact">
                    <h6 class="aps-footer__contact-title"><?php echo esc_html($about['about_title']); ?></h6>
                    <p class="aps-footer__contact-text"><?php echo esc_html($about['about_contact']); ?></p>
                    <p class="aps-footer__contact-address"><?php echo esc_html($about['about_address']); ?></p>
                </div>
                <?php endif; ?>
            </div>
            <div class="aps-footer__col--newsletter">
                <?php
                $letter = get_field('letter', 'option');
                ?>
                <div class="aps-footer__newsletter-content">
                    <div class="aps-footer__newsletter-left">
                        <h4 class="aps-footer__title">
                            <?php echo esc_html($letter['letter_title']); ?>
                        </h4>
                        <p class="aps-footer__subtitle">
                            <?php echo esc_html($letter['letter_subtitle']); ?>
                        </p>
                    </div>

                    <form class="aps-footer__form">
                        <input type="email" placeholder="Enter your e-mail" class="aps-footer__input" />
                        <button type="submit" class="aps-footer__submit">
                            <img src="<?php echo esc_url(aps_img . '/footer/icon-footer/button.png'); ?>" alt="Send" />
                        </button>
                    </form>

                </div>


                <nav class="aps-footer__nav">
                    <ul>
                        <?php
                        wp_nav_menu(array(
                            'theme_location' => 'footer_menu',
                            'menu_class' => 'aps-footer__list',
                            'container' => false,
                            'fallback_cb' => 'wp_page_menu',
                        ));
                        ?>

                </nav>
            </div>
        </div>
        <div class=" aps-footer__bottom">
            <?php
            $copyright = get_field('copyright', 'option');
            ?>
            <p class="aps-footer__copyright"><?php echo esc_html($copyright); ?></p>
            <div class=" aps-footer__legal">
                <a href="<?php echo get_permalink(122); ?>" class="aps-footer__legal-link">Terms Of
                    Services</a>
                <!-- <a href="<?php echo esc_url(get_permalink(get_option('wp_page_for_privacy_policy'))); ?>" class="
                aps-footer__legal-link">Privacy Policy</a> -->
                <a href="<?php echo get_permalink(124); ?>" class=" aps-footer__legal-link">Privacy
                    Policy</a>
                <a href="" class="aps-footer__legal-link">Cookie Policy</a>
            </div>
        </div>

    </div>


</footer>