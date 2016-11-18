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





	<div class="pods-features-interior-main clearfix">
	<div class="contain" itemscope itemtype="http://schema.org/Product">

		<?php
						//Loop through custom car fields

						echo '<a href="';
						the_permalink();
						echo '">';

						the_post_thumbnail('full', array('itemprop' => 'image'));
						echo "</a>";
						echo '<a href="';
						the_permalink();
					  echo '">';
						$make = get_field('auto-make');
						$model = get_field('auto-model');
						$year = get_field('auto-year');
						//the_title( '<h2 class="entry-title">','</h2>' );
						echo '<h2>'.$year.' <span itemprop="brand">'.$make.'</span> <span itemprop="name">'.$model.'</span></h2>';
	          echo "</a>";
                                                   echo'<ul>';
                                                   if(get_field('color')){
                                                             $auto_color = get_field('color');
                                                             echo '<li><strong>Color: '. $auto_color;
                                                             echo '</strong></li>';
                                                    }
                                                  if(get_field('features')){
                                                              $auto_features = get_field('features');
                                                             echo '<li><strong>Features:</strong> <span itemprop="description">'.$auto_features;
                                                             echo '</span></li>';

                                                    }
                                                    if(get_field('mileage')){
                                                              $auto_mileage = get_field('mileage');
                                                             echo '<li><strong>Mileage:</strong> '.$auto_mileage;
                                                             echo '</li>';

                                                    }
																										if(get_field('asking_price')){
                                                              $asking_price = get_field('asking_price');
																														echo '<span itemprop="offers" itemscope itemtype="http://schema.org/Offer">';
                                                             echo '<meta itemprop="priceCurrency" content="USD" />';
																														 echo '<li><strong>Asking Price: $<span itemprop="price">'.$asking_price;
                                                             echo '</span></strong></li>';
																														 echo '</span>';

                                                    }


                                                echo '</ul>';


		                                            $auto_make = get_field('auto-make');
																								$auto_model = get_field('auto-model');
																								$auto_year = get_field('auto-year');

																								echo '<p><a href="/auto-offer-form/?make='.$auto_make.'&model=
																								'.$auto_model.'&autoyear='.$auto_year.'&price='.$asking_price.'" class="orange-btn">
																								Make an offer!

																								</a></p><hr />';

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

</div>
