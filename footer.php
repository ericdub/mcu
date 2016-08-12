<?php

/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package MCU
 */

?>

	</div><!-- #content -->
	<footer id="site-footer"><!--/footer-->
				<div class="contained">
		<div id="footer">
	    	<div id="pods-features-footer-nav-89" class="pods-features-footer-nav clearfix">

	    <ul>
	<li><a href="/contact-mcu">Contact MCU</a></li>
	<li><a href="/careers">Careers</a></li>
	<li><a title="Policies and Disclosures" href="/policies-and-disclosures">Policies and Disclosures</a></li>

	</ul>
	<ul class="security">
	<li class="title"><a href="/banking-security">Security</a></li>
	<li><a href="/phishing-banking-scams">Phishing</a></li>
	<li><a title="Idenity Fraud" href="/identity-fraud">Identity Fraud</a></li>
	<li><a href="/banking-scams">Scams</a></li>
	</ul>
	<div class="foot-rt">
	<p>&copy; Copyright 2015. Missouri Credit Union. All Rights Reserved.</p>
	<p>&nbsp;<img src="/wp-content/uploads/2016/08/ncua.png" alt="NCUA logo image" />&nbsp; <img class="mid-logo" src="/wp-content/uploads/2016/08/esi_logo.png" alt="ESI logo image" /> <img src="/wp-content/uploads/2016/08/ehl_logo.png" alt="EHL logo image" /></p>
	<p>This credit union is federally insured by the National Credit Union Administration.</p>
	</div>

	</div><!--/ pods-features-footer-nav-89 -->
	        <div style="clear:both;"></div>
	      <?php
	// webid.php (shows server ID info)
	// last modified: 04.20.15

	$web01 = '192.168.12.11';
	$web02 = '192.168.12.12';
	$web03 = '192.168.12.13';
	$webip = $_SERVER['SERVER_ADDR'];
	echo "<span style='font-family:Verdana,Arial,sans serif;font-size:1.0em;font-weight:400;margin:0 auto;'>";
		if ($webip == $web01) {
			echo "<p>Web 01</p>";
		} elseif ($webip == $web02) {
			echo "<p>Web 02</p>";
		} elseif ($webip == $web03) {
			echo "<p>Web 03</p>";
		}
	echo "</span>";

?>

	    </div><!--/footer-->
	</div><!--/contained-->



			</footer><!--/footer-->

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
