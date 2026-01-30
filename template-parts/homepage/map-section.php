<!-- Map Section -->
<section class="aps-map">
    <div class="aps-container">
        <div class="aps-map__container">
            <?php
            $map_frame = get_field('map_section');
            if ($map_frame) {
                echo $map_frame;
            }
            ?>
        </div>
    </div>
</section><!-- End Map Section -->