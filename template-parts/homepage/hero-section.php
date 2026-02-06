<?php
// Hero Section Fields
$hero_group = get_field('hero_section');
$hero_background = $hero_group['background_desk_hero'];
$hero_background_mobile = $hero_group['background_mobile_hero'];
$hero_heading = $hero_group['hero_title'];
$hero_btn_text = $hero_group['hero_subtitle'];
?>
<!-- hero -->
<section class="aps-hero"
    style="--hero-bg-desktop: url('<?php echo esc_url($hero_background['url']); ?>'); --hero-bg-mobile: url('<?php echo esc_url($hero_background_mobile['url']); ?>');">
    <div class="aps-container aps-hero__inner">
        <h1 class="aps-hero__title">
            <?php
            if ($hero_heading) {
                echo esc_html($hero_heading);
            } else {
                echo esc_html('No Title');
            }
            ?>
        </h1>
        <a href="<?php echo esc_url($hero_btn_link['url']); ?>" class="aps-btn aps-btn--hero">
            <?php echo esc_html($hero_btn_text); ?>
        </a>
    </div>
</section><!-- end hero section -->