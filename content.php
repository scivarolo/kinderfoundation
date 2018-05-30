<?php
/**
 * @package kinderfoundation
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('post'); ?>>
	<header class="entry-header">

    <div class="entry-date"><?php the_time( 'M j, Y' ); ?></div>

    <h1 class="entry-title">
      <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
    </h1>

    <?php $terms = get_the_term_list( $post->ID, 'organization', '<span class="organization-label">Organization:</span> ', '<span class="org-comma">, </span>' );
    if($terms) : ?>

    <div class="entry-meta">

      <div class="entry-organization">
        <?php echo $terms; ?>
      </div>

      <?php if( get_field('source_name') ) : ?> <span class="entry-source">&mdash; <?php the_field('source_name'); ?> </span><?php endif; ?>
    </div>

    <?php endif; ?>

	</header><!-- .entry-header -->

	<div class="entry-content">
    <?php if(has_post_thumbnail()) : ?>
      <?php $thumb_data = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), "medium" ); ?>
      <figure class="wp-caption alignright" style="width: <?php echo $thumb_data[1]; ?>px;">
        <a href="<?php the_post_thumbnail_url('full'); ?>"><?php the_post_thumbnail('medium'); ?></a>
        <?php if(get_the_post_thumbnail_caption()) : ?>
          <figcaption class="wp-caption-text">
            <?php the_post_thumbnail_caption(); ?>
          </figcaption>
        <?php endif; ?>
      </figure>
    <?php endif; ?>
		<?php
			/* translators: %s: Name of current post */
			the_content( sprintf(
				__( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'kinderfoundation' ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			) );
		?>

		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'kinderfoundation' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

</article><!-- #post-## -->
