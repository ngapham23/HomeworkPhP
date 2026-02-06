<!-- Benefit Section -->
<section class="aps-guide">
    <div class="aps-container">
        <div class="aps-guide__inner">
            <h3 class="aps-guide__title">
                <?php esc_html_e('How It Works On Parks', 'aps-sa'); ?>
            </h3>
            <p class="aps-subtitle">
                <?php esc_html_e('Explore simple steps to start training at any outdoor fitness park', 'aps-sa'); ?>
            </p>
        </div>
        <?php
        if (have_rows('benefit_section')): ?>
            <div class="aps-guide__steps">
                <?php while (have_rows('benefit_section')):
                    the_row();
                    $benefit_title = get_sub_field('benefit_title');
                    $benefit_icon = get_sub_field('benefit_icon');
                    $benefit_step_description = get_sub_field('benefit_subtitle');
                ?>
                    <div class="aps-guide__step">

                        <div class="aps-guide__step-img" aria-label="<?php echo esc_attr($benefit_step_title); ?>">
                            <img src="<?php echo esc_url($benefit_icon['url']); ?>"
                                alt="<?php echo esc_attr($benefit_icon['alt']); ?>" />
                        </div>

                        <h5 class="aps-guide__step-title">
                            <?php
                            if ($benefit_title) {
                                echo $benefit_title;
                            } else {
                                esc_html_e('Benefit Title', 'aps-sa');
                            }
                            ?>
                        </h5>
                        <p class="aps-text_medium">
                            <?php
                            if ($benefit_step_description) {
                                echo $benefit_step_description;
                            } else {
                                esc_html_e('Benefit Subtitle', 'aps-sa');
                            }
                            ?>

                        </p>
                    </div>
                <?php endwhile; ?>
            </div>
        <?php endif; ?>
    </div>
    </div>
</section>