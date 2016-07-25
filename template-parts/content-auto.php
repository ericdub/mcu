<?php
/**
 * Template part for displaying page content in single-autosforsale.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package MCU
 */

?>
<div id="tmpl-interior" class="tmpl-wrap clearfix">

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<div class="contained">
    	<div class="copy-wrap">
            <div class="breadcrumbs"></div>
      </div>
    		<div id="pods-none-hank-13" class="pods-none-hank clearfix">
					  <div class="contained">
				    	<div class="hidden-hank"><img src="/wp-content/uploads/static/hiddenHank.png" alt="Hank the pig" /></div><!--/hidden-hank-->
				    </div>
						<div id="hank-expand"><img src="/wp-content/uploads/static/hank-tips/Hank-Tips_21.jpg" alt="Tip from Hank" /></div>
				</div><!--/ pods-none-hank-13 -->
				<div id="pods-features-interior-intro-81" class="pods-features-interior-intro clearfix">
				    <div class="white-top">
				    	<div class="contain">

					<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

				        </div>
				    </div>
       </div><!--/ pods-features-interior-intro-81 -->



    </div>
	</header><!-- .entry-header -->

<div class="copy-wrap">
	<div class="pods-features-interior-main clearfix">
	<div class="contain">

		<?php
						//Loop through custom car fields
            the_post_thumbnail();
                                                   echo'<ul>';
                                                   if(get_field('color')){
                                                             $auto_color = get_field('color');
                                                             echo '<li><strong>Color: '. $auto_color;
                                                             echo '</strong></li>';
                                                    }
                                                  if(get_field('features')){
                                                              $auto_features = get_field('features');
                                                             echo '<li><strong>Features:</strong> '.$auto_features;
                                                             echo '</li>';

                                                    }
                                                    if(get_field('mileage')){
                                                              $auto_mileage = get_field('mileage');
                                                             echo '<li><strong>Mileage:</strong> '.$auto_mileage;
                                                             echo '</li>';

                                                    }
																										if(get_field('asking_price')){
                                                              $asking_price = get_field('asking_price');
                                                             echo '<li><strong>Asking Price: $'.$asking_price;
                                                             echo '</strong></li>';

                                                    }


                                                echo '</ul>';

                         ?>  <!--automobile content -->

			<?php
				wp_link_pages( array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'mcu' ),
					'after'  => '</div>',
				) );
			?>


			<footer class="entry-footer">
				<?php edit_post_link( esc_html__( 'Edit', 'mcu' ), '<span class="edit-link">', '</span>' ); ?>
			</footer><!-- .entry-footer -->
	</div>
	<div class="pods-none-right-column clearfix widget-area">
	<?php get_sidebar(); ?>
  </div>
</div>
<div style="clear:both;"></div>
</div>


</article><!-- #post-## -->
