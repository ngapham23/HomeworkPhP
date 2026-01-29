<?php
// Hero Section Fields
$hero_background = get_field('hero_background');
$hero_background_mobile = get_field('hero_background_mobile');
$hero_heading = get_field('hero_heading');
$hero_btn_text = get_field('hero_title');
$hero_btn_link = get_field('hero_button_link');
?>

<!-- hero -->
<section class="aps-hero"
    style="--hero-bg-desktop: url('<?php echo esc_url($hero_background['url']); ?>'); --hero-bg-mobile: url('<?php echo esc_url($hero_background_mobile['url']); ?>');">
    <div class="aps-container aps-hero__inner">
        <h1 class="aps-hero__title">
            <?php
            echo esc_html($hero_heading); ?>
        </h1>
        <a href="<?php echo esc_url($hero_btn_link['url']); ?>" class="aps-btn aps-btn--hero">
            <?php echo esc_html($hero_btn_text); ?>
        </a>
    </div>

</section><!-- end hero section -->