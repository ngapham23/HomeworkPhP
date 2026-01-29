<?php
if (!defined('ABSPATH'))
    exit;
get_header();
?>
<div class="aps-404">
    <img src="<?php echo esc_url(aps_img . '404/404.jpg'); ?>" alt="404 Not Found" class="aps-404__img" />
    <a href="<?php echo esc_url(home_url('/')); ?>" class="aps-404__btn">Go Home</a>
</div>
<?php get_footer(); ?>