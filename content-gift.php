<?php
/**
 * The template used for displaying single gift content in page.php
 *
 * @package kinderfoundation
 */
?>

  <?php $children = wp_list_pages('title_li=&child_of='.$post->post_parent.'&echo=0&sort_column=menu_order&sort_order=DESC');
  if ($children) { ?>
  <ul class="sub-nav">
    <li class="label"><?php echo get_the_title($post->post_parent); ?>
    <?php echo $children; ?>
  </ul>
  <?php } ?>


<article id="post-<?php the_ID(); ?>" <?php post_class('single-gift'); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_content(); ?>
    
    <?php if(get_field('organization-url') ) : ?>
      <span class="organization-url">        
        <a href="<?php the_field('organization-url'); ?>" target="_blank"><?php the_field('organization-url-label'); ?></a>
      </span>
    <?php endif; ?>
    <?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'kinderfoundation' ),
				'after'  => '</div>',
			) );
		?>

	</div><!-- .entry-content -->
	<div class="slider-column">
	
	  <?php $images = get_field('gallery');
	  
	  if( $images ): ?>
	    <div class="entry-slider">
  	    <ul class="entry-slippry">
  	      <?php foreach( $images as $image ) : ?>
  	        <li>
  	          <img src="<?php echo $image['sizes']['large']; ?>" title="<?php echo $image['caption']; ?>" alt="<?php echo $image['alt']; ?>">
  	          <!-- <p class="caption"><?php echo $image['caption']; ?></p> -->
  	        </li>
	        <?php endforeach; ?>
	        
  	    </ul>
      </div>
    <?php endif; ?>
	  
	  <?php if ( get_field('quote') ) : ?>
      <div class="gift-callout">
    	  <span><?php the_field('quote'); ?></span>
  	  </div>
	  <?php endif; ?>
	</div>

	<footer class="entry-footer">
		<?php edit_post_link( __( 'Edit', 'kinderfoundation' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
