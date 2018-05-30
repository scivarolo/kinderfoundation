<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package kinderfoundation
 */
?>

	</div><!-- #content -->
</div><!-- #page -->


  <?php if(is_front_page()) {
    echo get_template_part('layouts/home', 'slider');
  } ?>


	<footer id="colophon" class="site-footer" role="contentinfo">

		<a class="contact-button" href="<?php echo esc_url( get_permalink( get_page_by_title( 'Contact Us' ) ) ); ?>">CONTACT</a>

    <?php if(have_rows('social_media_links', 'option') ) : ?>
    <div class="footer-social">
      <?php while(have_rows('social_media_links', 'option') ) : the_row(); ?>
        <a href="<?php the_sub_field('url'); ?>"><?php the_sub_field('icon'); ?></a>
      <?php endwhile; ?>
    </div>
    <?php endif; ?>

    <div class="footer-text">
      <div class="footer-address">
        <p><span>2229 San Felipe, Suite 1700, </span><span>Houston, TX 77019</span></p>
      </div>
      <div class="site-info">
  			<p><span>&copy; <?php echo date('Y'); ?> Kinder Foundation. </span><span>Site by <a href="http://www.coredesignstudio.com/" target="_blank" rel="designer">CORE Design Studio</a></span></p>
  		</div><!-- .site-info -->
    </div>
	</footer><!-- #colophon -->


<?php wp_footer(); ?>

</body>
</html>
