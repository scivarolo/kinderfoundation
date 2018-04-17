<?php
/**
 * The template for displaying Financials
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package kinderfoundation
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php while ( have_posts() ) : the_post(); ?>
        
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        	<header class="entry-header">
        		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
        	</header><!-- .entry-header -->
        
        	<div class="entry-content">
        		<?php the_content(); ?>
        		
        		<div class="financial-graph">
        		<h2><?php the_field('graph_heading'); ?></h2>
        		<img src="<?php the_field('graph_image'); ?>" alt="financial graph" />
        		</div>
        		
        		<div class="financial-tabs-wrapper">
          		<h2>Grant Totals by Category</h2>
          		<?php if( have_rows('year') ) : ?>
            	  <div id="financial-tabs">
            	    <ul class="resp-tabs-list">
                  	<?php while( have_rows('year') ) : the_row(); ?> 
              		    
              		    <?php if(get_sub_field('future_commitment') ) : ?>
                		    <li class="future">
                  		<?php else : ?>
                  		  <li>
                		  <?php endif; ?>
                  		<?php the_sub_field('year_label'); ?></li>
              		  <?php endwhile; ?>
            	    </ul>
        	    <?php endif; ?>
        	    <?php if( have_rows('year') ) : ?>
        	    	  <div class="resp-tabs-container">
            		  <?php while( have_rows('year') ) : the_row(); ?> 
                    <div><div>
                      
                      <?php if(get_sub_field('future_commitment') ) : ?>
                        <table class="financials-table future">
                          <?php else : ?>
                      <table class="financials-table"> 
                        <?php endif; ?>
                        <thead>
                          <tr>
                            <th>Category</th>
                            <th colspan="2">Allocation</th>
                          </tr>
                        </thead>                    
                        <tbody>
                          <tr>
                            <td class="financials-label"><?php the_field('education_label'); ?></td>
                            <td class="dollar-sign">$</td>
                            <td class="financials-amount">
                              <?php if( get_sub_field('education_allocation') ) : ?>
                                <?php the_sub_field('education_allocation'); 
                                  else : ?> -
                              <?php endif; ?>
                            </td>
                          </tr>
                          <tr>
                            <td class="financials-label"><?php the_field('greenspace_label'); ?></td>
                            <td colspan="2" class="financials-amount">
                              <?php if( get_sub_field('green_space_allocation') ) : ?>
                                <?php the_sub_field('green_space_allocation'); 
                                  else : ?> -
                              <?php endif; ?>     
                            </td>
                          </tr>
                          <tr>
                            <td class="financials-label"><?php the_field('qualityoflife_label'); ?></td> 
                            <td colspan="2" class="financials-amount">
                              <?php if( get_sub_field('qualityoflife_allocation') ) : ?>
                                <?php the_sub_field('qualityoflife_allocation'); 
                                  else : ?> -
                              <?php endif; ?>      
                            </td>
                          </tr>
                          <tr class="total">
                            <td class="financials-label"><?php the_field('total_label'); ?></td>
                            <td class="dollar-sign">$</td>
                            <td class="financials-amount">
                              <?php if(get_sub_field('total_allocation') ) : ?>
                                <?php the_sub_field('total_allocation'); 
                                  else : ?> -
                              <?php endif; ?>
                            </td>
                          </tr>
			<?php if( get_field('all_years_total_excluding_pledges') ) : ?>
			  <tr class="total">
                            <td class="financials-label"><?php the_field('allyears_expledges_label'); ?></td>
                            <td class="dollar-sign">$</td>
                            <td class="financials-amount">
                                <?php the_field('all_years_total_excluding_pledges'); ?>
                            </td>
                          </tr>
			<?php endif; ?>
                          <tr class="total">
                            <td class="financials-label"><?php the_field('allyears_label'); ?></td>
                            <td class="dollar-sign">$</td>
                            <td class="financials-amount">
                              <?php if( get_field('all_years_total') ) : ?>
                                <?php the_field('all_years_total'); 
                                  else : ?> -
                              <?php endif; ?>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                      
                      <?php if( get_sub_field('future_commitment') ) : ?>
                        <span class="future-message">
                          <?php the_field('future_commitments_message'); ?>
                        </span>
                      <?php endif; ?>
                      <span class="financials-note">
                        <?php the_field('note'); ?>
                      </span>
                          
                    </div></div><!-- individual year wrap -->
                    <?php endwhile; ?>
            		  </div><!-- resp-tabs-container -->
            	  </div><!-- financial-tabs -->
          		<?php endif; ?>
        		</div><!-- .financial-tabs-wrapper -->
        		<?php
        			wp_link_pages( array(
        				'before' => '<div class="page-links">' . __( 'Pages:', 'kinderfoundation' ),
        				'after'  => '</div>',
        			) );
        		?>
        	</div><!-- .entry-content -->
        
        	<footer class="entry-footer">
        		<?php edit_post_link( __( 'Edit', 'kinderfoundation' ), '<span class="edit-link">', '</span>' ); ?>
        	</footer><!-- .entry-footer -->
        </article><!-- #post-## -->


			<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php /* get_sidebar(); */ ?>
<?php get_footer(); ?>