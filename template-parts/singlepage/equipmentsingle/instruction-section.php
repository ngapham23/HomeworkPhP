        <!-- Instructions & Safety (2 Columns) -->
        <div class="equipment-middle-box">
            <?php
            $equipment_airwalk = get_field('equipment_airwalk');
            $airwalk_title = $equipment_airwalk['airwalk_title'] ?? '';
            $airwalk_subtitle = $equipment_airwalk['airwalk_subtitle'] ?? '';
            ?>
            <div class="equipment-middle-left">
                <h4 class="equipment-middle-left--title"><?php echo esc_html($airwalk_title); ?></h4>
                <div class="equipment-middle-left--subtitle"><?php echo nl2br(esc_html($airwalk_subtitle)); ?></div>
            </div>
            <?php
            $equipment_safety = get_field('equipment_safety');
            $safety_title = $equipment_safety['safety_title'] ?? '';
            $safety_subtitle = $equipment_safety['safety_subtitle'] ?? '';
            ?>
            <div class="equipment-middle-right">
                <h4 class="equipment-middle-right--title"><?php echo esc_html($safety_title); ?></h4>
                <div class="equipment-middle-right--subtitle"><?php echo nl2br(esc_html($safety_subtitle)); ?></div>
            </div>
        </div>