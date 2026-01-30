<header class="aps-topbar">
    <div class="aps-container aps-topbar__inner">
        <a class="aps-logo aps-logo--desktop" href="<?php echo esc_url(home_url('/')); ?>">
            <?php $logo = get_field('header_logo', 'option'); ?>
            <?php if ($logo): ?>
                <img src="<?php echo esc_url(is_array($logo) ? $logo['url'] : $logo); ?>" alt="aps-logo" />
            <?php endif; ?>
        </a>


        <a class="aps-logo aps-logo--mobile" href="<?php echo esc_url(home_url('/')); ?>">
            <?php $logo_mobile = get_field('header_logo_mobile', 'option'); ?>
            <?php if ($logo): ?>
                <img src="<?php echo esc_url(is_array($logo) ? $logo['url'] : $logo); ?>" alt="aps-logo" />
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
        <?php $search_icon = get_field('header_search', 'option'); ?>
        <?php if ($search_icon): ?>
            <button class="aps-icon-btn aps-icon-btn--search" aria-label="Search">
                <?php echo $search_icon; ?>
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