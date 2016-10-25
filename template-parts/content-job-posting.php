<?php
/**
 * Template part for displaying page content in  single-autosforsale.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package MCU
 */

?>
<div id="tmpl-interior" class="tmpl-wrap clearfix">

	<div class="pods-features-interior-main clearfix">
	<div class="contain">

		<?php
						//Loop through custom job fields


						the_title( '<h3 class="entry-title">','</h3>' );

                         echo'<p>';
                         if(get_field('job_location')){
                                   $job_location = get_field('job_location');
                                   echo '<strong>Position available in '. $job_location. '</strong>';

                          }

                         echo '</p>';

												 the_content();

												 echo '<hr />';






                         ?>  <!--job content -->

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
