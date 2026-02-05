<div class="page-header-area">
    <div class="equipment-taxeq">
        <a href="<?php echo esc_url(home_url('/equipment')); ?>">
            <?php
            $taxonomies = get_object_taxonomies(get_post_type());
            $has_terms = false;

            if (!empty($taxonomies)) {
                foreach ($taxonomies as $tax) {
                    $terms = get_the_terms(get_the_ID(), $tax);
                    if ($terms && !is_wp_error($terms)) {
                        $term_output = [];
                        foreach ($terms as $term) {
                            $term_output[] = esc_html($term->name);
                        }
                        echo isset($term_output[0]) ? $term_output[0] : '';
                        $has_terms = true;

                        break;
                    }
                }
            }

            if (!$has_terms) {
                echo '<span>Equipment</span>';
            }
            ?>
        </a>
    </div>
    <h2 class="equipment-title">
        <?php the_title(); ?>
    </h2>
</div>

<!-- Video Section -->
<div class="equipment-content--box">
    <?php
    $ins_title = get_field('equipment_instrucvideo');
    $ins_video = get_field('equipment_video');

    if (empty($ins_title)) {
        $ins_title = 'Instructional Video';
    }
    ?>
    <h4 class="equipment-content--title">
        <?php echo esc_html($ins_title); ?>
    </h4>
    <div class="equipment-content--video">
        <?php echo $ins_video; ?>
    </div>
</div>