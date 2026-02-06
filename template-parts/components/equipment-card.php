 <article class="aps-blog__card">
     <a href="<?php the_permalink(); ?>">
         <img class="aps-blog__card-img" src="<?php echo esc_url($args['thumbnail']); ?>"
             alt="<?php the_title_attribute(); ?>">
         </img>
         <div class="aps-blog__card-content">
             <h6 class="aps-blog__card-title"><?php the_title(); ?></h6>
             <p class="aps-blog__card-text">
                 <a href="<?php the_permalink(); ?>" class="aps-blog__card-btn">
                     <?php esc_html_e('View Details', 'aps-sa'); ?>
                 </a>
             </p>
         </div>
     </a>
 </article>