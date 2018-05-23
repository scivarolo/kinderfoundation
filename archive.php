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
		<main id="main" class="site-main" role="main">
      <h1 class="archive-title"><?php single_cat_title( '', true ); ?> &mdash; News and Press Releases</h1>
		<?php if ( have_posts() ) : ?>
      <table class="footable">
        <thead>
          <tr>
            <th class="column--date" data-type="numeric">Date</th>
            <th class="column--title" data-toggle="true">Title/Source</th>
            <th class="column--organization" data-hide="phone">Organization</th>
            <th class="column--category" data-hide="phone">Category</th>
          </tr>
        </thead>
        <tbody>
    			<?php /* Start the Loop */ ?>
    			<?php while ( have_posts() ) : the_post(); ?>
            <?php if(get_post_type() == 'blog') { $url = get_the_permalink(); } else { $url = get_field('source_url'); } ?>
    				<tr>
    				  <td class="column--date" data-value="<?php the_time('U'); ?>"><?php the_time('m-d-Y'); ?></td>
              <td class="column--title"><a class="post-title" href="<?php echo $url; ?>" <?php if(get_post_type() != 'blog') { ?> target="_blank" <?php } ?>><?php the_title(); ?></a> <?php if( get_field('source_name') ) : ?> <span class="entry-source">&mdash; <?php the_field('source_name'); ?> </span><?php endif; ?></td>
              <td class="column--organization"><?php echo get_the_term_list($post->ID, 'organization', '', ', '); ?></td>
              <td class="column-category"><?php echo get_the_term_list($post->ID, 'gift_category', '', ', '); ?></td>
    				</tr>

    			<?php endwhile; ?>
        </tbody>
      </table>

			<?php kinderfoundation_paging_nav(); ?>

		<?php else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
