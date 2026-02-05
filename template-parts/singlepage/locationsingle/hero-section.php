<?php
$background = get_field('background_location') ?: [];
$bg_desk = $background['background_desktop'] ?: [];
$bg_mobile = $background['background_mobile'] ?: [];
$url_desk = $bg_desk['url'] ?? '';
$url_mobile = $bg_mobile['url'] ?? '';
?>
<section class="location_hero" style="--hero-bg-desktop: url('<?php echo esc_url($url_desk); ?>');
    --hero-bg-mobile: url('<?php echo esc_url($url_mobile); ?>');">
</section>