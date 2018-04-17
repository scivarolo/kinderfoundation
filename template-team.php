<?php
/*
Template Name: Team Template
*/

get_header(); ?>

<?php $show_team_photos = get_field('show_team_photos'); ?>

<?php if( $show_team_photos ) : ?>
  <div id="primary" class="content-area show-team-photos">
  <?php else : ?>
	<div id="primary" class="content-area hide-team-photos has-image-column">
<?php endif; ?>

    <main id="main" class="site-main" role="main">

      <?php if( have_posts() ) : ?>
        <?php while ( have_posts() ) : the_post(); ?>


          <?php /* based on content-page.php */ ?>

          <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
          	<header class="entry-header">
          		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
          	</header><!-- .entry-header -->

          	<div class="entry-content">
          		<?php the_content(); ?>

              <?php if($show_team_photos) : ?>

                <?php /* Bios with Images */ ?>

                <?php if(have_rows('team') ) :
                  while( have_rows('team') ) : the_row(); ?>

                  <div class="team-member--with-photo">

                    <?php $headshot = get_sub_field('team_headshot'); ?>

                    <img class="team-member__headshot" src="<?php echo $headshot['sizes']['medium']; ?>" alt="<?php echo $headshot['alt']; ?>" />
                    <div class="bio-wrap">
                      <h1 class="team-member__name"><?php the_sub_field('team_name'); ?></h1>
                      <h2 class="team-member__title"><?php the_sub_field('team_title'); ?></h2>
                      <div class="team-member__bio">
                        <?php the_sub_field('team_bio'); ?>
                      </div>
                    </div>
                  </div>

                  <?php endwhile; ?>
                <?php endif; ?>

              <?php else : /* hide headshots */ ?>

                <?php /* Bios without Images */ ?>
                  <?php if( have_rows('team') ) :
                    while( have_rows('team') ) : the_row(); ?>

                    <div class="team-member">
                      <h1 class="team-member__name"><?php the_sub_field('team_name'); ?></h1>
                      <h2 class="team-member__title"><?php the_sub_field('team_title'); ?></h2>
                      <div class="team-member__bio">
                        <?php the_sub_field('team_bio'); ?>
                      </div>
                    </div>

                    <?php endwhile;
                  endif; ?>

              <?php endif; ?>


          	</div><!-- .entry-content -->

          	<footer class="entry-footer">
          		<?php edit_post_link( __( 'Edit', 'kinderfoundation' ), '<span class="edit-link">', '</span>' ); ?>
          	</footer><!-- .entry-footer -->
          </article><!-- #post-## -->

          <?php /* end based on content-page.php */ ?>




          <?php $images = get_field('gallery'); ?>

          <?php if( !empty($images) && empty( $show_team_photos ) ) : ?>

            <div class="image-column">
              <?php foreach( $images as $image ) : ?>
                <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">
              <?php endforeach; ?>
            </div>

          <?php endif; ?>

        <?php endwhile; ?>
      <?php endif; ?>
		</main>
	</div>
<?php get_footer(); ?>
