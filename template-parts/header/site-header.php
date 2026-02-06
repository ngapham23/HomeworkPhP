<header class="aps-topbar">
    <div class="aps-container aps-topbar__inner">
        <?php
        $header_group = get_field('header_option', 'option');
        ?>
        <a class="aps-logo aps-logo--desktop" href="<?php echo esc_url(home_url('/')); ?>">
            <?php $logo = isset($header_group['header_logo']) ? $header_group['header_logo'] : null; ?>
            <?php if ($logo): ?>
                <img src="<?php echo esc_url(is_array($logo) ? $logo['url'] : $logo); ?>" alt="aps-logo" />
            <?php endif; ?>
        </a>


        <a class="aps-logo aps-logo--mobile" href="<?php echo esc_url(home_url('/')); ?>">
            <?php $logo_mobile = isset($header_group['header_logomobile']) ? $header_group['header_logomobile'] : null; ?>
            <?php if ($logo_mobile): ?>
                <img src="<?php echo esc_url(is_array($logo_mobile) ? $logo_mobile['url'] : $logo_mobile); ?>"
                    alt="aps-logo" />
            <?php endif; ?>
        </a>
        <nav class="aps-nav">
            <!-- Nav of WPress -->
            <?php
            wp_nav_menu(array(
                'theme_location' => 'primary',
                'container' => false,
                'menu_class' => 'aps-nav__list',
                'fallback_cb' => 'wp_page_menu',
            ));
            ?>
        </nav>
        <?php $search_icon = isset($header_group['header_search']) ? $header_group['header_search'] : null; ?>
        <?php if ($search_icon): ?>
            <button class="aps-icon-btn aps-icon-btn--search" aria-label="Search">
                <img src="<?php echo esc_url(is_array($search_icon) ? $search_icon['url'] : $search_icon); ?>" alt="Search" />
            </button>
        <?php endif; ?>
        <button class="aps-mobile-toggle" aria-label="Toggle menu">
            <img src="<?php echo (aps_img . '/svg-icon/icon-mobileReponsive/Categories.svg'); ?>" alt="aps_mobile-menu"
                class="aps-mobile-toggle__icon">
        </button>

    </div>
    <div class="aps-search-dropdown">
        <form class="aps-search-dropdown__form" role="search" method="get"
            action="<?php echo esc_url(home_url('/')); ?>">
            <input class="aps-search-dropdown__input" type="search" name="s"
                placeholder="<?php esc_attr_e('Search...'); ?>" />
            <input type="hidden" name="post_type" value="location" />
        </form>
    </div>
    </div>
</header>