<!-- Benefit Section -->
<section class="aps-guide">
    <div class="aps-container">
        <div class="aps-guide__inner">
            <h3 class="aps-guide__title">
                <?php
                $benefit_heading = get_field('benefit_title');
                if ($benefit_heading) {
                    echo $benefit_heading;
                } else {
                    esc_html_e('Title not found', 'aps-sa');
                }
                ?>
            </h3>
            <p class="aps-subtitle">
                <?php
                $benefit_subtitle = get_field('benefit_subtitle');
                if ($benefit_subtitle) {
                    echo $benefit_subtitle;
                } else {
                    esc_html_e('Subtitle not found', 'aps-sa');
                }
                ?>
            </p>
        </div>
        <?php
        if (have_rows('benefit_steps')): ?>
            <div class="aps-guide__steps">
                <?php while (have_rows('benefit_steps')):
                    the_row();
                    $benefit_step_title = get_sub_field('benefit_step_title');
                    $benefit_icon = get_sub_field('benefit_icon');
                    $benefit_step_description = get_sub_field('benefit_step_subtitle');
                    ?>
                    <div class="aps-guide__step">

                        <div class="aps-guide__step-img" aria-label="<?php echo esc_attr($benefit_step_title); ?>">
                            <?php echo $benefit_icon; ?>
                        </div>
                        <h5 class="aps-guide__step-title">
                            <?php
                            if ($benefit_step_title) {
                                echo $benefit_step_title;
                            }
                            ?>
                        </h5>
                        <p class="aps-text_medium">
                            <?php
                            if ($benefit_step_description) {
                                echo $benefit_step_description;
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