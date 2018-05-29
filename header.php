<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package kinderfoundation
 */
?><!DOCTYPE html>
<!--[if lt IE 9]><html lang="en-US" class="lt-ie9"><![endif]-->
<!--[if gt IE 8]><!-->

<html <?php language_attributes(); ?>>

<!--<![endif]-->

<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<link href='https://fonts.googleapis.com/css?family=Bitter:400,700,400italic' rel='stylesheet' type='text/css'>

<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/style.css?v=1.2">
<!--TODO: Replace Major Gift Slider with Owl Carousel -->
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/slippry.css">

<!--[if lt IE 9]>
  <script src="/wordpress/wp-content/themes/kinderfoundation/bower_components/html5shiv/dist/html5shiv.min.js"></script>
<![endif]-->

<?php wp_head(); ?>


<!--[if lt IE 9]>
  <link rel="stylesheet" href="/wordpress/wp-content/themes/kinderfoundation/css/ie8.css" /></noscript>
<![endif]-->

<?php
$urbangreenspace = get_page_by_title('Urban Green Space');
$education = get_page_by_title('Education');
$qualityoflife = get_page_by_title('Quality of Life');
$aboutus = get_page_by_title('About Us'); ?>

<style>
  .site-header {
    background: #b2c92d;

    <?php if( !is_front_page() ) : ?>

      <?php if( get_field( 'header_image' ) ) :

        $header_image = get_field('header_image');

      elseif( is_tree($aboutus->ID)) :
        $header_image = get_field('about_us_header_image', 'option');
        $header_image = $header_image['sizes']['header-background'];

      elseif( is_tree($urbangreenspace->ID) && get_field('green_space_header_image', 'option') ) :
        $header_image = get_field('green_space_header_image', 'option');
        $header_image = $header_image['sizes']['header-background'];

      elseif( is_tree($education->ID) && get_field('education_header_image', 'option') ) :
        $header_image = get_field('education_header_image', 'option');
        $header_image = $header_image['sizes']['header-background'];

      elseif( is_tree($qualityoflife->ID) && get_field('quality_of_life_header_image', 'option') ) :
        $header_image = get_field('quality_of_life_header_image', 'option');
        $header_image = $header_image['sizes']['header-background'];

      elseif( is_blog() && get_field('news_header_image', 'option') ) :
        $header_image = get_field('news_header_image', 'option');
        $header_image = $header_image['sizes']['header-background'];

      ?>

      <?php else : ?>

      <?php $header_image = get_field('header_image', 'option');
      $header_image = $header_image['sizes']['header-background']; ?>

      <?php endif; ?>

      background: linear-gradient(rgba(178, 201, 45, 0.65) 0%, rgba(178, 201, 45, 0.65) 100%), url(<?php echo $header_image; ?>);
      background: url(<?php echo $header_image; ?>);
      background-size: cover;
      background-position: center;
    <?php endif; ?>
    <?php  ?>
  }
</style>

</head>

<body <?php body_class(); ?>>

  <div class="home-nav-wrapper">
    <nav id="site-navigation" class="main-navigation" role="navigation">
      <div class="frontpage-logo">
        <a href="<?php echo esc_url( home_url('/') ); ?>" rel="home">
          <img src="<?php echo get_template_directory_uri(); ?>/img/kinderlogo.svg">
        </a>
      </div>
  		<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
  	</nav><!-- #site-navigation -->
  </div>

  <?php if( !is_front_page() ) : ?>
  <header id="masthead" class="site-header" role="banner">
    <div class="container">
      <div class="kinder-logo">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
          <img src="<?php echo get_template_directory_uri(); ?>/img/kinder-logo.png" alt="Kinder Foundation Logo" >
        </a>
      </div>
      <div class="page-title">

        <?php if( is_page() ) : ?>

          <?php if( is_page('Major Gifts') ) : ?>

            <h1><?php the_field('major_gifts_heading', 'option'); ?></h1>
            <?php if(get_field('major_gifts_tagline', 'option')) : ?>
              <h2><?php the_field('major_gifts_tagline', 'option'); ?></h2>
            <?php endif; ?>

           <?php elseif( is_tree( $urbangreenspace->ID ) ) : ?>

            <h1><?php the_field('urban_green_space_heading', 'option'); ?></h1>
            <?php if(get_field('urban_green_space_heading', 'option')) : ?>
              <h2><?php the_field('urban_green_space_tagline', 'option'); ?></h2>
            <?php endif; ?>
           <?php elseif( is_tree( $education->ID ) ) : ?>

            <h1><?php the_field('education_heading', 'option'); ?></h1>
            <?php if(get_field('education_heading', 'option')) : ?>
              <h2><?php the_field('education_tagline', 'option'); ?></h2>
            <?php endif; ?>
           <?php elseif( is_tree( $qualityoflife->ID ) ) : ?>

            <h1><?php the_field('quality_of_life_heading', 'option'); ?></h1>
            <?php if(get_field('quality_of_life_heading', 'option') ) : ?>
              <h2><?php the_field('quality_of_life_tagline', 'option'); ?></h2>
            <?php endif; ?>
           <?php elseif( is_tree( $aboutus->ID) ) : ?>

            <h1>About Us</h1>

           <?php else : ?>

          <?php endif; ?>

        <?php elseif( is_blog() ) : ?>
          <h1>News</h1>
        <?php else : ?>

        <?php endif; ?>
      </div>
    </div><!--.container-->
  </header><!-- #masthead -->
  <?php endif; ?>

  <div id="page" class="container hfeed site">

  <a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'kinderfoundation' ); ?></a>

<div id="content" class="site-content">
