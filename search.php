<?php
/**
 * The template for displaying search results pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package MCU
 */

get_header(); ?>
<div id="tmpl-interior" class="tmpl-wrap clearfix">

	<section id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php if ( have_posts() ) : ?>

			<header class="entry-header">
				<div class="contained">
		    	<div class="copy-wrap">
		            <div class="breadcrumbs"></div>
		      </div>

						<div id="pods-features-interior-intro-81" class="pods-features-interior-intro clearfix">
						    <div class="white-top">
						    	<div class="contain">

							<h1><?php printf( esc_html__( 'Search Results for: %s', 'mcu' ), '<span>' . get_search_query() . '</span>' ); ?></h1>

						        </div>
						    </div>
		       </div><!--/ pods-features-interior-intro-81 -->



		    </div>
			</header><!-- .entry-header -->

			<div class="copy-wrap">
				<div class="pods-features-interior-main clearfix">
				<div class="contain">
					<?php /* Start the Loop */ ?>
					<?php while ( have_posts() ) : the_post(); ?>

						<?php
						/**
						 * Run the loop for the search to output the results.
						 * If you want to overload this in a child theme then include a file
						 * called content-search.php and that will be used instead.
						 */
						get_template_part( 'template-parts/content', 'search' );
						?>

					<?php endwhile; ?>

					<?php the_posts_navigation(); ?>

				<?php else : ?>
					<header class="entry-header">
						<div class="contained">
							<div class="copy-wrap">
										<div class="breadcrumbs"></div>
							</div>
							
								<div id="pods-features-interior-intro-81" class="pods-features-interior-intro clearfix">
										<div class="white-top">
											<div class="contain">

									<h1><?php printf( esc_html__( 'Search Results for: %s', 'mcu' ), '<span>' . get_search_query() . '</span>' ); ?></h1>

												</div>
										</div>
							 </div><!--/ pods-features-interior-intro-81 -->



						</div>
					</header><!-- .entry-header -->

					<div class="copy-wrap">
						<div class="pods-features-interior-main clearfix">
						<div class="contain">
					<?php get_template_part( 'template-parts/content', 'none' ); ?>

				<?php endif; ?>

				</div>
				<?php wp_reset_postdata(); ?>
				<div class="pods-none-right-column clearfix widget-area">
				<?php get_sidebar(); ?>
			  </div>
			</div>

			</div>



		</main><!-- #main -->
	</section><!-- #primary -->

<?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>
