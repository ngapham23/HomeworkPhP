<?php
$bg_desk = get_field('bg_desk');
$bg_mobile = get_field('bg_mobile');
$bg_desk_img = is_array($bg_desk) ? $bg_desk['url'] : $bg_desk;
$bg_mobile_img = is_array($bg_mobile) ? $bg_mobile['url'] : $bg_mobile;
?>
<!-- Hero Section -->
<section class="equipment_hero" style="--hero-bg-desktop: url('<?php echo esc_url($bg_desk_img); ?>');
    --hero-bg-mobile: url('<?php echo esc_url($bg_mobile_img); ?>');">
</section>