<?php
/*
Template Name: Images on Left
*/

get_header(); ?>

	<div id="primary" class="content-area has-image-column">
		<main id="main" class="site-main" role="main">
      
      <?php if( have_posts() ) : ?>
        <?php while ( have_posts() ) : the_post(); ?>
       
          <?php get_template_part( 'content', 'page' ); ?>
          
          <?php $images = get_field('gallery'); ?>
          
          <?php if( !empty($images) ) : ?>
          
            <div class="image-column">
              <?php foreach( $images as $image ) : ?>
                <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">
              <?php endforeach; ?>
            </div>
          
          <?php endif; ?>
          
        <?php endwhile; ?>
      <?php endif; ?>
		</main>
	</div>
<?php get_footer(); ?>