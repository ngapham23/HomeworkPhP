<?php
$equipments = get_field('featured_equipment');
if ($equipments && is_array($equipments)): ?>
    <div class="equipment-list-section">
        <h4 class="equipment-list--title">Equipment List</h4>
        <div class="location-equipment-listing">
            <?php
            $equipments_display = array_slice($equipments, 0, 11);
            foreach ($equipments_display as $p):
                $post_id = is_object($p) ? $p->ID : $p;
                $thumb = get_the_post_thumbnail_url($post_id, 'medium');
                if (!$thumb) {
                    $thumb = get_template_directory_uri() . '/assets/image/logo.png';
                }
                $post_object = get_post($post_id);
                if ($post_object) {
                    setup_postdata($GLOBALS['post'] = &$post_object);
                    get_template_part('template-parts/components/equipment-card', null, array('thumbnail' => $thumb));
                }
            endforeach;
            wp_reset_postdata();
            ?>
        </div>
    </div>
<?php endif; ?>