<!-- Partners Section -->
<section class="aps-partners">
    <div class="aps-container">
        <div class="aps-partners__inner">
            <h3 class="aps-partners__title">Our Partners & Adelaide University</h3>
            <?php
            if (have_rows('partners_logos')): ?>
                <div class="aps-partners__logos">
                    <?php while (have_rows('partners_logos')):
                        the_row();
                        $partners_logo = get_sub_field('partners-icon');
                    ?>
                        <div><img src="<?php echo esc_url($partners_logo['url']); ?>"
                                alt="<?php echo esc_attr($partners_logo['alt']); ?>" class="aps-partners__logo" /></div>
                    <?php endwhile; ?>
                </div>
            <?php endif; ?>
        </div>
</section> <!-- end partners -->