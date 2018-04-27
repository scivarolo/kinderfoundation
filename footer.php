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
		<div class="footer-address">
      <p>2229 San Felipe, Suite 1700, Houston, TX 77019</p>
    </div>
    <div class="site-info">
			<p>&copy; <?php echo date('Y'); ?> Kinder Foundation. Site by <a href="http://www.coredesignstudio.com/" target="_blank" rel="designer">CORE Design Studio</a></p>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->


<?php wp_footer(); ?>

</body>
</html>
