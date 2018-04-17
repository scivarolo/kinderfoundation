<?php
/**
 * @package kinderfoundation
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('post'); ?>>
	<header class="entry-header">
		<?php echo get_the_category_list(); ?>
		
		<div class="entry-meta">
		  <span class="entry-date"><?php the_time( get_option('date_format') ); ?></span>
		  <?php if( get_field('source_name') ) : ?> <span class="entry-source">&mdash; <?php the_field('source_name'); ?> </span><?php endif; ?>
		</div>
		
    <h1 class="entry-title"><a href="<?php the_field('source_url'); ?>" target="_blank"><?php the_title(); ?></a></h1>
    
    <div class="entry-organization">
      <?php echo get_the_term_list( $post->ID, 'organization', '<span class="organization-label">Organization:</span> ', ', ' ); ?>
    </div>
		
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'kinderfoundation' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

</article><!-- #post-## -->
