<div class="home-carousel owl-carousel">
  <?php $images = get_field('slider_images'); ?>
  <?php if( $images ) : ?>
    <?php foreach($images as $image) : ?>
      <div class="owl-slide owl-lazy" data-src="<?php echo $image['sizes']['homepage']; ?>" style="background-size: cover; background-position: center;">
      </div>
    <?php endforeach; ?>
  <?php endif; ?>
</div>

<div class="slider-overlay">
  <div class="container">
    <?php the_field('slider_overlay'); ?>
  </div>
</div>
