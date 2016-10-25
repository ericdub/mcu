<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package MCU
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
       <div id="tmpl-interior" class="tmpl-wrap clearfix">
			<header class="entry-header">
				<div class="contained">
		    	<div class="copy-wrap">
		            <div class="breadcrumbs"></div>
		      </div>
		    		<div id="pods-none-hank-13" class="pods-none-hank clearfix">
							  <div class="contained">
						    	<div class="hidden-hank"><img src="/wp-content/uploads/static/hiddenHank.png" /></div><!--/hidden-hank-->
						    </div>
								<div id="hank-expand"><img src="/wp-content/uploads/static/hank-tips/Hank-Tips_21.jpg" /></div>
						</div><!--/ pods-none-hank-13 -->
						<div id="pods-features-interior-intro-81" class="pods-features-interior-intro clearfix">
						    <div class="white-top">
						    	<div class="contain">

							<?php echo '<h1 class="entry-title">Page Not Found</h1>' ?>

						        </div>
						    </div>
		       </div><!--/ pods-features-interior-intro-81 -->



		    </div>
			</header><!-- .entry-header -->


			<div class="copy-wrap ">
				<div class="pods-features-interior-main clearfix">
				<div class="contain">
					<section class="error-404 not-found">

							<h2><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'mcu' ); ?></h2>


						<div class="page-content">
							<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try a search?', 'mcu' ); ?></p>

							<?php get_search_form(); ?>


						</div><!-- .page-content -->
						<!-- .page-content -->
					</section><!-- .error-404 -->


						<footer class="entry-footer">
							<?php edit_post_link( esc_html__( 'Edit', 'mcu' ), '<span class="edit-link">', '</span>' ); ?>
						</footer><!-- .entry-footer -->
				</div>

			</div>

			</div>



		</main><!-- #main -->
	</div><!-- #primary -->
</div>

<?php get_footer(); ?>
