<?php
/**
 * Template Name: Job Postings
 **/


get_header(); ?>
<div id="tmpl-interior" class="tmpl-wrap clearfix">

<article>

		<div class="contained">
    	<div class="copy-wrap">
            <div class="breadcrumbs"></div>
      </div>

				<div id="pods-features-interior-intro-81" class="pods-features-interior-intro clearfix">
				    <div class="white-top">
				    	<div class="contain">


                <?php
								$postType = get_queried_object();
                echo '<h1>Careers</h1>';
								?>
				        </div>
				    </div>
       </div><!--/ pods-features-interior-intro-81  -->
 <div class="copy-wrap">

			 <div id="primary" class="content-area">
		 		<main id="main" class="site-main" role="main">

				<div class="pods-features-interior-main clearfix" style="margin-bottom: 0px;">
 			 	<div class="contain" style="margin-bottom: 0px;"><?php the_content(); ?>
				</div>
			  </div>


		 	<?php
				$p_query = new WP_Query('post_type=jobposting');
        if ( $p_query->have_posts() ) {
	          while( $p_query->have_posts() ) {
	          $p_query->the_post();
    ?>


		 				<?php

		 					/*
		 					 * Includes the Post-Format-specific template for the content.
		 					 * If you want to override this in a child theme, then include a file
		 					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
		 					 */
		 					get_template_part( 'template-parts/content', 'job-posting' );
		 				?>

		 			<?php } ?>

		 			<?php the_posts_navigation(); ?>

		 		<?php } else { ?>

		 			<?php get_template_part( 'template-parts/content', 'job-posting-none' ); ?>

		 		<?php } ?>
				<h2><a name="submit"></a>Submitting Your Resume:</h2>
<p>We offer three methods for submitting your resume:</p>
<blockquote>
<p style="padding-left: 30px;"><strong>E-mail:</strong>  Please e-mail resume to the <strong><a href="mailto:hr@missouricu.org?subject=Employment">MCU Personnel Officer</a></strong>.</p>
<p style="padding-left: 30px;"><strong>FAX:</strong> (573) 874-1300</p>
<p style="padding-left: 30px;"><strong>U.S.P.S. mail:</strong></p>

<blockquote style="padding-left: 30px;">
<p>Missouri Credit Union, Attn: H.R.<br />
P.O. Box 1795<br />
Columbia, MO 65205-1795</p>
</blockquote>
</blockquote>
<p><strong>Missouri Credit Union is an Equal Opportunity Employer (EOE)</strong></p>


		 		</main><!-- #main -->

		 	</div><!-- #primary -->

		 </article>


     </div>

    </div>



<?php get_footer(); ?>
