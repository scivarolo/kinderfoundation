<?php
/*
Template Name: Category Landing Page
*/

get_header(); ?>

<ul class="gift-grid">

<?php 
      //Get the ID of the current Category to use in the query of the children
      $current_id = get_the_id(); 
      $gift_args = array (
        'post_parent'     => $current_id,
        'post_type'       => 'page',
        'pagination'      => false,
        'posts_per_page'  => '-1',
        'orderby'         => 'menu_order',
        'order'           => 'DESC'
      );
      
      $majorgifts = new WP_Query( $gift_args ); ?>
        
      <?php if ( $majorgifts->have_posts() ) : ?>
        <?php while ( $majorgifts->have_posts() ) : $majorgifts->the_post(); ?>
        
          <li class="grid-single-gift">
            <a href="<?php the_permalink(); ?>">
            <div class="caption">
              <h3><?php the_title(); ?></h3>
              
            </div>
            <?php if ( has_post_thumbnail() ) : 
              $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'post-thumbnail' ); ?>
              <img src="<?php echo $image[0]; ?>" />
            <?php else : ?>
              <img src="//placehold.it/400x300/807e82/807e82" />
            <?php endif; ?>
            </a>
          </li>
        <?php endwhile; /* $majorgifts */ ?>
      <?php endif; /* $majorgifts */ ?>

</ul>

<!-- <?php wp_reset_postdata(); ?> -->

<?php get_footer(); ?>
