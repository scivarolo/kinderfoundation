<?php
/*
Template Name: Major Gifts Landing Page
*/

get_header(); ?>

<?php
  // WP_Query arguments
  $category_args = array (
  	'post_parent'    => '10',
  	'post_type'      => 'page',
  	'pagination'     => false,
    'posts_per_page' => '-1',
  	'orderby'        => 'parent'
  );
  // The Query
  $gift_categories = new WP_Query( $category_args ); ?>


  <?php if ( $gift_categories->have_posts() ) : ?>

    <ul class="gift-grid">

    <?php while ( $gift_categories->have_posts() ) : $gift_categories->the_post(); ?>

      <li class="category-header">
        <div>
          <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
          <h3>
            <?php $current_id = get_the_id();  ?>
            <?php if( $current_id == 12 && get_field('urban_green_space_tagline', 'option') ) :
              the_field('urban_green_space_tagline', 'option');
            elseif( $current_id == 14 && get_field('education_tagline', 'option') ) :
              the_field('education_tagline', 'option');
             else :
              if(get_field('quality_of_life_tagline', 'option') ) { the_field('quality_of_life_tagline', 'option'); };
             endif; ?>
          </h3>

        </div>
        <img src="//placehold.it/400x300/ffffff/ffffff">
      </li>

      <?php
      //Get the ID of the current Category to use in the query of the children

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

      <?php $gift_categories->reset_postdata(); ?>

    <?php endwhile; /* $giftcategories */ ?>

    </ul> <!-- .gift-grid -->

    <?php else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

  <?php endif; /* $giftcategories */ ?>

<?php wp_reset_postdata(); ?>

<?php get_footer(); ?>
