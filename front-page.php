<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package kinderfoundation
 */

get_header(); ?>

	<div id="primary" class="content-area">
    
    <div id="home-slider">
      <div class="slider-overlay">
        <?php the_field('slider_overlay'); ?>
      </div>
      <ul class="home-slippry">
        
        <?php $images = get_field('slider_images'); ?>
        <?php if( $images ) : ?>
          <?php foreach($images as $image) : ?>
            <li>
              <img src="<?php echo $image['sizes']['homepage']; ?>">
            </li>
            <?php endforeach; ?>
            <?php endif; ?>
        </ul>
    </div>
	
	</div><!-- #primary -->

<?php /* get_sidebar(); */ ?>
<?php get_footer(); ?>
