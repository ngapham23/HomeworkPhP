<?php
if (!defined('ABSPATH'))
    exit;
get_header();
?>

<section class="aps-error-page">
    <div class="aps-container">
        <div class="aps-error-content">
            <div class="aps-error-img">
                <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/image/404/404.jpg'); ?>" alt="404 Not Found" />
            </div>
            <h1 class="aps-error-title">Page Not Found</h1>
            <p class="aps-error-desc">We're sorry, the page you requested could not be found. <br> Please go back to the homepage.</p>
            <a href="<?php echo esc_url(home_url('/')); ?>" class="aps-btn--error">Back to Home</a>
        </div>
    </div>
</section>

<?php get_footer(); ?>  