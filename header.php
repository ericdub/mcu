<?php
/**
 * The header for our Wordpress theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package MCU
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">


<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<!-- temp import MCU scripts -->
<link rel="shortcut icon" type="image/x-icon" href="/favicon.ico">





<?php wp_head(); ?>
</head>



<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'mcu' ); ?></a>

<?php
if (is_front_page ()) {

	function displayRandomPhotoArea() {
	    $images = array("/wp-content/uploads/2016/10/HSA.png",
	    "/wp-content/uploads/2016/06/banner_EMV.png", "/wp-content/uploads/2016/08/eAlerts.png",
		"/wp-content/uploads/2016/08/Skimmers.png");
	    $links = array("http://missouricu.org/health-savings-accounts",
	    "http://missouricu.org/emv-chip-cards", "http://missouricu.org/e-alerts-bank-notifications/",
		"http://missouricu.org/card-skimmers/");
		$alt = array("Health Savings Account image", "EMV Chip card image", "E Alert image", "Card skimmer image");
	    $randomNumber = rand(0, (count($images) - 1));

	    echo '<a href="'. $links[$randomNumber].'"><div class="home-banner"><img src="' . $images[$randomNumber] . '" alt="'.$alt[$randomNumber].'"></div></a>';
	}


?>

<header style="background-color:#fff;"><!--/site header-->
	<div id="leader-wrap" >
	<div id="leaderboard">
			<div id="header-wrap">
	            <div id="header">
	                 <img id="mcu_logo" src="/wp-content/uploads/static/MCU_logo.png" alt="Missouri Credit Union logo" />
	                 <div id="login">
	                     <p>MCU@Home Banking Login</p>
	                     <form action="https://hb.missouricu.org/User/AccessSignin/Username" method="post">
	                        <input type="text" name="UsernameField" value="" size="40" class="usr-fld" placeholder="Username">
	                        <input type="submit" value="Sign In" class="sbmt-btn" name="SubmitNext">
	                    </form>
	                   <div style="width:220px;">
	                    	<a href="https://hb.missouricu.org/User/AccessSignup/Start" title="Home banking user name" style="border-right:1px #ffffff solid;">Register</a>
	                        <a href="https://hb.missouricu.org/User/AccessSigninResetUsername/Start">Forgot Username?</a>
	                    </div>
	                 </div>
	                 <div id="search">
										 <form name="" action="<?php echo home_url( '/' ); ?>" method="get">
													<input type="text" name="s" value="" size="40" class="srch-fld" title="Site search" placeholder="Search">
													<input type="submit" value="" class="srch-sbmt-btn">
											</form>
	                    <div id="icons">
	                    	<a href="https://chat.missouricu.org:8443/ECCChat/chat.html" title="Live Chat" target="_blank"><div class="social live"></div></a>
	                        <a href="https://www.facebook.com/MissouriCreditUnion" title="Find us on Facebook" target="_blank"><div class="social facebook">&nbsp;</div></a>
	                        <a href="https://www.youtube.com/user/missouricreditunion"title="Check us out on YouTube" target="_blank"><div class="social youtube">&nbsp;</div></a>
	                        <a href="https://missouricu.wordpress.com/" title="Heads &amp; Tails Blog" target="_blank"><div class="social blog">&nbsp;</div></a>
	                    </div>
	                 </div>

	            </div><!--/header-->
							<?php
							// Display a random image here
							displayRandomPhotoArea();
										//echo '<a href="/emv-chip-cards"><div class="home-banner"><img src="/wp-content/uploads/2016/06/banner_EMV.png"/></div></a>';

									//}
							?>

	         </div><!--/header-wrap-->
	           <?php include('/wp-content/themes/mcu/inc/nav.php') ?>
	</div><!--/leaderboard-->
	</div><!--/leader-wrap-->
</header><!--/site header-->
<?php
} else {

?>


	<header><!--/site header-->


<div id="leader-wrap" style="background:#f8f8f8;">
<div id="leaderboard">
		<div id="header-wrap" class="int-head">
            <div id="header">
                 <a href="/"><img id="mcu_logo" src="/wp-content/uploads/static/MCU_logo.png" alt="Missouri Credit Union Logo" /></a>
                 <div id="login">
                     <p>MCU@Home Banking Login</p>
                     <form action="https://hb.missouricu.org/User/AccessSignin/Username" method="post">
                        <input type="text" name="UsernameField" value="" size="40" class="usr-fld" placeholder="Username">
                        <input type="submit" value="Sign In" class="sbmt-btn" name="SubmitNext">
                    </form>
                   <div style="width:220px;">
                    	<a href="https://hb.missouricu.org/User/AccessSignup/Start" style="border-right:1px #ffffff solid;">Register</a>
                        <a href="https://hb.missouricu.org/User/AccessSigninResetUsername/Start">Forgot Username?</a>
                    </div>
                 </div>
                 <div id="search">
                 	<form name="" action="<?php echo home_url( '/' ); ?>" method="get">
                        <input type="text" name="s" value="" size="40" class="srch-fld" placeholder="Search">
                        <input type="submit" value="" class="srch-sbmt-btn">
                    </form>
                    <div id="icons">
                    	<a href="https://chat.missouricu.org:8443/ECCChat/chat.html" title="Live Chat" target="_blank"><div class="social live"></div></a>
                        <a href="https://www.facebook.com/MissouriCreditUnion" title="Find us on Facebook" target="_blank"><div class="social facebook">&nbsp;</div></a>
                        <a href="https://www.youtube.com/user/missouricreditunion"title="Check us out on YouTube" target="_blank"><div class="social youtube">&nbsp;</div></a>
                        <a href="https://missouricu.wordpress.com/" title="Heads &amp; Tails Blog" target="_blank"><div class="social blog">&nbsp;</div></a>
                    </div>
                 </div>

            </div><!--/header-->
         </div><!--/header-wrap-->

         <?php include('/wp-content/themes/mcu/inc/nav.php') ?>

</div><!--/leaderboard-->
</div><!--/leader-wrap-->

		</header><!--/site header-->


	<div id="content" class="site-content">

<?php	} ?>
