<?php
/**
 * Template part for displaying results in search pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package MCU
 */

?>
<div id="tmpl-interior" class="tmpl-wrap clearfix search-results">
	<a href="<?php echo esc_url( get_permalink() );?>">
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php
		//the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );
		the_title( sprintf( '<h2 class="entry-title">', esc_url( get_permalink() ) ), '</h2>' );
		 ?>

		<?php if ( 'post' === get_post_type() ) : ?>
		<div class="entry-meta">
			<?php mcu_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<div class="entry-summary">
		<?php echo get_post_meta(get_the_ID(), '_yoast_wpseo_metadesc', true);  ?>
	</div><!-- .entry-summary -->


</article><!-- #post-## -->
</a>
</div>
