<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package kinderfoundation
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php while ( have_posts() ) : the_post(); ?>
        
        <?php if ( is_child(12) || is_child(14) || is_child(16) ) : 
          
          get_template_part( 'content', 'gift' ); 
          
        else : 
          get_template_part( 'content', 'page' );
        endif; ?>

			<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php /* get_sidebar(); */ ?>
<?php get_footer(); ?>
