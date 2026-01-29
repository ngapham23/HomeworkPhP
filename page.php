<?php
if (!defined('ABSPATH')) {
    exit;
}

get_header();
?>
<section class="aps-hero">
    <div class="aps-container aps-hero__inner" ">
    </div>
</section>
<main class=" aps-privacy">

        <div class="aps-container">

            <?php while (have_posts()):
                the_post(); ?>
                <?php the_content(); ?>
            <?php endwhile; ?>
        </div>
        </main>

        <?php
        get_footer();