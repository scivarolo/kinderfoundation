<?php
/*
New display format for gifts.
Template Name: Signature Gift
*/

get_header(); ?>

<div id="primary" class="content-area">
  <main id="main" class="site-main" role="main">

    <?php while ( have_posts() ) : the_post(); ?>

      <?php $children = wp_list_pages('title_li=&child_of='.$post->post_parent.'&echo=0&sort_column=menu_order&sort_order=DESC');
      if ( $children ) : ?>
        <ul class="sub-nav">
          <li class="label"><?php echo get_the_title($post->post_parent); ?></li>
          <?php echo $children; ?>
        </ul>
      <?php endif; /* children */ ?>

      <article id="post-<?php the_ID(); ?>" <?php post_class('single-gift signature-gift'); ?>>

        <header class="entry-header sg__header">
          <?php the_title('<h1 class="entry-title">', '</h1>'); ?>
          <?php if( get_field('introduction') ) : ?>
            <div class="sg__introduction"><?php the_field('introduction'); ?></div>
          <?php endif; ?>

        </header>

        <div class="sg__entry-content">
          <?php if( have_rows('page_sections') ) : ?>
            <?php while( have_rows('page_sections') ) : the_row(); ?>

              <?php if( get_row_layout() == 'signature_slider' ) : ?>

                <?php $images = get_sub_field('images'); ?>
                <?php if( count($images) == 1 ) : ?>
                  <div class="sg__signature-image">
                    <img src="<?php echo $images[0]['sizes']['signature-slide']; ?>" />
                    <?php if($images[0]['caption']): ?>
                      <span class="signature-image__caption"><?php echo $images[0]['caption']; ?></span>
                    <?php endif; ?>
                  </div>
                <?php elseif(count($images) > 1 ) : ?>
                  <div class="sg__signature-slider owl-carousel">
              	      <?php foreach( $images as $image ) : ?>
                        <div class="owl-slide">
                          <img class="owl-lazy" data-src="<?php echo $image['sizes']['signature-slide']; ?>" />
                          <?php if($image['caption']): ?>
                            <span class="owl-caption"><?php echo $image['caption']; ?></span>
                          <?php endif; ?>
                        </div>
            	        <?php endforeach; ?>

              	    </ul>
                  </div>
                <?php endif; ?>

              <?php elseif( get_row_layout() == 'text_block' ) : ?>

                <div class="sg__text-block">
                  <div class="wrapper">
                    <?php if(get_sub_field('heading')) : ?>
                      <h2 class="sg__section-heading"><?php the_sub_field('heading'); ?></h2>
                    <?php endif; ?>
                    <?php the_sub_field('text'); ?>
                    <?php if(get_sub_field('show_url')) : ?>
                      <span class="organization-url">
                        <a href="<?php the_sub_field('url'); ?>" target="_blank"><?php the_sub_field('label'); ?></a>
                      </span>
                    <?php endif; ?>
                    
                  </div>
                </div>


              <?php elseif( get_row_layout() == 'text_image_row' ) : ?>
                <div class="sg__text-image-row">
                  <div class="row__text-block">
                    <?php if( get_sub_field('heading') ) : ?>
                      <h2 class="sg__section-heading"><?php the_sub_field('heading'); ?></h2>
                    <?php endif; ?>
                    <?php the_sub_field('text'); ?>
                    <?php $show_link = get_sub_field('show_link'); ?>

                    <?php if( $show_link ) : ?>
                      <?php $link_style = get_sub_field('link_style');
                      $link_label = get_sub_field('link_label');
                      $link_type = get_sub_field('link_type');
                      if($link_type == 'url') :
                        $link = get_sub_field('link_url');
                        $target = '_blank';
                      elseif($link_type == 'page') : $link = get_sub_field('link_page');
                      endif; ?>

                      <a class="sg__link <?= $link_style; ?>" href="<?= $link; ?>" target="<?= $target; ?>"><?= $link_label; ?></a>

                    <?php endif; /* show_link */ ?>
                  </div>
                  <div class="row__image-block">
                    <?php $images = get_sub_field('images'); ?>
                    <?php if(count($images) == 1) : ?>
                      <div class="single-image" style="background: url('<?= $images[0]["sizes"]["large"]; ?>'); background-size: cover; background-position: center;">
                        <?php if($images[0]['caption']): ?>
                          <span class="signature-image__caption"><?php echo $images[0]['caption']; ?></span>
                        <?php endif; ?>
                      </div>

                    <?php elseif(count($images) > 1 ) : ?>

                      <div class="block-carousel owl-carousel">
                          <?php foreach($images as $image) : ?>
                            <div class="owl-slide owl-lazy" data-src="<?php echo $image['sizes']['large']; ?>" style="background-size: cover; background-position: center;">
                              <?php if($image['caption']): ?>
                                <span class="owl-caption"><?php echo $image['caption']; ?></span>
                              <?php endif; ?>
                            </div>
                          <?php endforeach; ?>
                      </div>

                    <?php endif; /* images */ ?>
                  </div>
                </div>
              <?php elseif( get_row_layout() == 'callout' ) : ?>

                <div class="sg__callout">
                  <div class="wrapper">
                    <div class="sg__callout-text">
                      <?php the_sub_field('quote'); ?>
                    </div>
                    <?php if(get_sub_field('byline')): ?>
                      <div class="sg__callout-byline">
                        <?php the_sub_field('byline'); ?>
                      </div>
                    <?php endif; ?>
                  </div>
                </div>

              <?php else : endif; ?>


            <?php endwhile; ?>
          <?php endif; ?>

          <?php if( get_field('news_press') ) : ?>
            <div class="sg__news">
              <div class="wrapper">
                <h2 class="sg__section-heading">News & Press</h2>
                <ul class="sg__news-links">
                <?php $terms = get_field('news_press'); ?>
                <?php $tags = get_field('news_press_tags'); ?>
                <?php $args = array (
                  'post_type' => array('post', 'blog'),
                  'posts_per_page' => 16,
                  'tax_query' => array(
                    'relation' => 'OR',
                    array(
                      'taxonomy' => 'organization',
                      'field' => 'term_id',
                      'terms' => $terms
                    ),
                    array(
                      'taxonomy' => 'post_tag',
                      'field' => 'term_id',
                      'terms' => $tags
                    )
                  )
                );
                $query = new WP_Query($args);
                while($query->have_posts() ) : $query->the_post(); ?>
                  <?php $post_type = get_post_type(); ?>
                  <?php if($post_type == 'blog') { 
                    $url = get_the_permalink();
                    $label = 'Blog Post'; 
                  } else {
                    $url = get_field('source_url', get_the_id());
                  } 
                  if( in_category( 'Press Release' ) ) {
                    $label = 'Press Release';
                  }
                  ?>
                  <li>
                    <span class="widget-post-date"><?php the_time(get_option('date_format')); ?></span>
                    <a class="widget-post-link" href="<?= $url ?>" <?php if($post_type != 'blog') { echo 'target="_blank"'; } ?>><?php the_title(); ?></a>
                    <?php if($post_type == 'post' && get_field('source_name', get_the_ID()) ): ?>
                      <span class="source">&mdash;<?php the_field('source_name', get_the_id()); ?></span>
                    <?php elseif( $label ) : ?>
                      <span class="source">&mdash;<?php echo $label; ?></span>
                    <?php endif; ?>
                  </li>
                <?php endwhile;
                wp_reset_postdata(); ?>
                </ul>
              </div>
            </div>
            <?php endif; ?>
        </div>

      </article>

      <?php edit_post_link( __( 'Edit', 'kinderfoundation' ), '<footer class="entry-footer"><span class="edit-link">', '</span></footer>' ); ?>

    <?php endwhile; // end of the loop. ?>

  </main><!-- #main -->
</div><!-- #primary -->

<?php get_footer(); ?>
