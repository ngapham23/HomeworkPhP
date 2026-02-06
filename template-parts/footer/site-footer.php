<footer class="aps-footer">
    <div class="aps-container">
        <div class="aps-footer__inner">
            <div class=" aps-footer__col--about">
                <?php
                $about = get_field('footer_option', 'option');
                if ($about):
                    $about_logo = $about['footer_logo'];
                ?>
                    <a href="<?php echo esc_url(home_url('/')); ?>">
                        <img src="<?php echo esc_url($about_logo['url']); ?>" alt="APSA_LOGO" class="aps-footer__logo" />
                    </a>
                    <div class="aps-footer__contact">
                        <h6 class="aps-footer__contact-title">
                            <?php
                            if ($about['footer_title_contact']) {
                                echo esc_html($about['footer_title_contact']);
                            } else {
                                echo esc_html('No Title Contact Found');
                            }
                            ?>
                        </h6>
                        <p class="aps-footer__contact-text">
                            <?php
                            if ($about['footer_contact']) {
                                echo esc_html($about['footer_contact']);
                            } else {
                                echo esc_html('No Contact Found');
                            }
                            ?>
                        </p>
                        <p class="aps-footer__contact-address">
                            <?php
                            if ($about['footer_address']) {
                                echo esc_html($about['footer_address']);
                            } else {
                                echo esc_html('No Address Found');
                            }
                            ?>
                        </p>
                    </div>
                <?php endif; ?>
            </div>
            <div class="aps-footer__col--newsletter">
                <div class="aps-footer__newsletter-content">
                    <div class="aps-footer__newsletter-left">
                        <h4 class="aps-footer__title">
                            <?php
                            if ($about['footer_frame_title']) {
                                echo esc_html($about['footer_frame_title']);
                            } else {
                                echo esc_html('No Title Newsletter Found');
                            }
                            ?>
                        </h4>
                        <p class="aps-footer__subtitle">
                            <?php
                            if ($about['footer_subtitle_frame']) {
                                echo esc_html($about['footer_subtitle_frame']);
                            } else {
                                echo esc_html('No Subtitle Newsletter Found');
                            }
                            ?>
                        </p>
                    </div>

                    <form class="aps-footer__form">
                        <input type="email" placeholder="Enter your e-mail" class="aps-footer__input" />
                        <button type="submit" class="aps-footer__submit">
                            <?php
                            $btn_icon = isset($about['footer_frame_icon']) ? $about['footer_frame_icon'] : null;
                            if ($btn_icon) {
                                echo '<img src="' . esc_url(is_array($btn_icon) ? $btn_icon['url'] : $btn_icon) . '" alt="Send" />';
                            } else {
                                echo '<img src="' . esc_url(aps_img . '/footer/icon-footer/button.png') . '" alt="Send" />';
                            }
                            ?>
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
            <p class="aps-footer__copyright">
                <?php
                if ($about['footer_copyright_title']) {
                    echo esc_html($about['footer_copyright_title']);
                } else {
                    echo esc_html('No Copyright Found');
                }
                ?>
            </p>
            <div class=" aps-footer__legal">
                <?php
                $links = $about['footer_legal'] ?? '';
                ?>
                <div class="aps-footer__legal">
                    <?php if ($links): ?>
                        <?php foreach ($links as $link): ?>
                            <a href="<?php echo esc_url($link); ?>" class="aps-footer__legal-link">
                                <?php echo esc_html(get_the_title(url_to_postid($link))); ?>
                            </a>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>

    </div>


</footer>