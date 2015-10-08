<?php
/**
 * The header for our theme.
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

	<header><!--/site header-->


<div id="leader-wrap" style="background:#eaeaea;">
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
                        <a href="https://missouricu.wordpress.com/" title="Heads & Tails Blog" target="_blank"><div class="social blog">&nbsp;</div></a>
                    </div>
                 </div>

            </div><!--/header-->
         </div><!--/header-wrap-->
         <div>
         <div id="main-nav" style="margin-top:0px; border-top:1px solid #FFFFFF;">
         		<ul class="lvl-0"><li class="lvl-0 nav-loan-center">Loan Center<ul class="lvl-1"><li class="lvl-1 nav-auto-loans"><a href="auto-loans" class=" current"  >Auto</a><ul class="lvl-2"><li class="lvl-2 nav-autos-for-sale"><a href="autos-for-sale" class=""  >Autos for Sale</a></li><li class="lvl-2 nav-preferred-partners-dealerships"><a href="preferred-partners-dealerships" class=""  >Preferred Partners - Dealerships</a></li><li class="lvl-2 nav-loan-application-1"><a href="./applications/eLoanApp/loan_app.php" class=" external" target="_blank" >Loan Application</a></li><li class="lvl-2 nav-auto-loan-rewards-program"><a href="auto-loan-rewards-program" class=""  >Rewards</a></li><li class="lvl-2 nav-skip-a-payment"><a href="skip-a-payment" class=""  >Skip-a-Payment</a></li></ul></li><li class="lvl-1 nav-home-loans"><a href="home-loans" class=""  >Home Loans</a><ul class="lvl-2"><li class="lvl-2 nav-mortgage-loan-calculator"><a href="mortgage-loan-calculator" class=""  >Mortgage Loan Calculator</a></li><li class="lvl-2 nav-first-time-home-buyers"><a href="first-time-home-buyers" class=""  >First-time Home Buyers</a></li><li class="lvl-2 nav-prequalify-for-a-home-loan"><a href="/applications/prequalify/index.php" class=" external" target="_blank" >Prequalify for a Home Loan</a></li><li class="lvl-2 nav-mortgage-faqs"><a href="mortgage-faqs" class=""  >Mortgage FAQs</a></li><li class="lvl-2 nav-home-equity-line-of-credit"><a href="home-equity-line-of-credit" class=""  >Home Equity Line of Credit</a></li></ul></li><li class="lvl-1 nav-personal-banking"><a href="personal-banking" class=""  >Personal</a><ul class="lvl-2"><li class="lvl-2 nav-line-of-credit"><a href="line-of-credit" class=""  >Line of Credit</a></li><li class="lvl-2 nav-credit-card"><a href="credit-card" class=""  >Credit Card</a></li><li class="lvl-2 nav-loan-application-2"><a href="/applications/eLoanApp/loan_app.php" class=" external" target="_blank" >Loan Application</a></li></ul></li><li class="lvl-1 nav-loan-calculator"><a href="loan-calculator" class=""  >Loan Calculator</a></li></ul></li><li class="lvl-0 nav-money-center">Money Center<ul class="lvl-1"><li class="lvl-1 nav-member-advantage-levels"><a href="member-advantage-levels" class=""  >Member Advantage Levels</a></li><li class="lvl-1 nav-savings-account"><a href="savings-account" class=""  >Savings</a><ul class="lvl-2"><li class="lvl-2 nav-interest-rates"><a href="interest-rates" class=""  >Rates</a></li><li class="lvl-2 nav-cd-accounts"><a href="cd-accounts" class=""  >CDs</a></li><li class="lvl-2 nav-individual-retirement-account-ira"><a href="individual-retirement-account-ira" class=""  >IRAs</a></li><li class="lvl-2 nav-money-market-accounts"><a href="money-market-accounts" class=""  >Money Market Accounts</a></li></ul></li><li class="lvl-1 nav-checking-accounts"><a href="checking-accounts" class=""  >Checking</a><ul class="lvl-2"><li class="lvl-2 nav-atm-debit-gift-cards"><a href="atm-debit-gift-cards" class=""  >ATM/Debit/Gift Cards</a></li><li class="lvl-2 nav-courtesy-pay-program"><a href="courtesy-pay-program" class=""  >Courtesy Pay Program</a></li></ul></li><li class="lvl-1 nav-investment-financial-advisors"><a href="investment-financial-advisors" class=""  >Investments</a><ul class="lvl-2"><li class="lvl-2 nav-woodbury-financial"><a href="http://www.financialfocus.finlsite.com/" class=" external" target="_blank" >Woodbury Financial</a></li></ul></li><li class="lvl-1 nav-home-amp-family-finance-resource-centerreg"><a href="http://hffo.cuna.org/22035/front/22035/html" class=" external" target="_blank" >Home & Family Finance Resource Center®</a></li><li class="lvl-1 nav-youth-checking-savings-account"><a href="youth-checking-savings-account" class=""  >Youth</a><ul class="lvl-2"><li class="lvl-2 nav-kirby-kangaroo-club-youth-savings-account"><a href="kirby-kangaroo-club-youth-savings-account" class=""  >Kirby Kangaroo Club</a></li><li class="lvl-2 nav-new-attitudes-banking-account-for-teenagers"><a href="new-attitudes-banking-account-for-teenagers" class=""  >New Attitudes</a></li><li class="lvl-2 nav-college-scholarships"><a href="college-scholarships" class=""  >Scholarships</a></li><li class="lvl-2 nav-googolplex"><a href="http://googolplex.cuna.org/22035/index.php" class=" external" target="_blank" >Googolplex</a></li></ul></li></ul></li><li class="lvl-0 nav-account-tools">Account Tools<ul class="lvl-1"><li class="lvl-1 nav-customer-center"><ul class="lvl-2"><li class="lvl-2 nav-mcuhome-login"><a href="https://hb.missouricu.org" class=" external" target="_blank" >MCU@Home Login</a></li><li class="lvl-2 nav-mobile-banking-login"><a href="https://m.mobilecu.org/MissouriCU/Login.aspx" class=" external" target="_blank" >Mobile Banking Login</a></li><li class="lvl-2 nav-banking-by-phone-24-7-access"><a href="banking-by-phone-24-7-access" class=""  >Call24</a></li></ul></li><li class="lvl-1 nav-e-services">e-Services<ul class="lvl-2"><li class="lvl-2 nav-online-bill-payer"><a href="online-bill-payer" class=""  >BillPayer</a></li><li class="lvl-2 nav-mcuhome-faqs"><a href="mcuhome-faqs" class=""  >MCU@Home FAQs</a></li><li class="lvl-2 nav-mobile-banking"><a href="mobile-banking" class=""  >Mobile Banking</a></li><li class="lvl-2 nav-e-alerts-bank-notifications"><a href="e-alerts-bank-notifications" class=""  >e-Alerts</a></li><li class="lvl-2 nav-e-statements-online-banking"><a href="e-statements-online-banking" class=""  >e-Statements</a></li><li class="lvl-2 nav-dollar-dashboard-banking-app"><a href="dollar-dashboard-banking-app" class=""  >DollarDashboard</a></li><li class="lvl-2 nav-remote-deposit-anywhere"><a href="remote-deposit-anywhere" class=""  >Remote Deposit Anywhere</a></li></ul></li><li class="lvl-1 nav-services">Services<ul class="lvl-2"><li class="lvl-2 nav-automatic-payments-deposits"><a href="automatic-payments-deposits" class=""  >Automatic Payments/Deposits</a></li><li class="lvl-2 nav-reorder-my-checks-1"><a href="http://reorder.libertysite.com/" class=" external" target="_blank" >Reorder My Checks</a></li><li class="lvl-2 nav-switch-kit"><a href="_pdf/SwitchKit.pdf" class=" external" target="_blank" >Switch Kit</a></li></ul></li></ul></li><li class="lvl-0 nav-branch-locations"><a href="branch-locations" class=""  >Locations</a><ul class="lvl-1"><li class="lvl-1 nav-columbia-branches"><a href="/branch-locations" class=" external" target="_blank" >Columbia Branches</a><ul class="lvl-2"><li class="lvl-2 nav-downtown-columbia"><a href="/branch-locations" class=" external" target="_blank" >Downtown Columbia</a></li><li class="lvl-2 nav-north-smiley-lane"><a href="/branch-locations" class=" external" target="_blank" >North - Smiley Lane</a></li><li class="lvl-2 nav-south-buttonwood"><a href="/branch-locations" class=" external" target="_blank" >South - Buttonwood</a></li><li class="lvl-2 nav-west-crossroads"><a href="/branch-locations" class=" external" target="_blank" >West - Crossroads</a></li></ul></li><li class="lvl-1 nav-jefferson-city-branches"><a href="/branch-locations" class=" external" target="_blank" >Jefferson City Branches</a><ul class="lvl-2"><li class="lvl-2 nav-east-eastland"><a href="/branch-locations" class=" external" target="_blank" >East - Eastland</a></li><li class="lvl-2 nav-southwest-southwest-blvd"><a href="/branch-locations" class=" external" target="_blank" >Southwest - Southwest Blvd.</a></li><li class="lvl-2 nav-west-englewood"><a href="/branch-locations" class=" external" target="_blank" >West - Englewood</a></li></ul></li><li class="lvl-1 nav-atm"><a href="/branch-locations" class=" external" target="_blank" >ATM</a><ul class="lvl-2"><li class="lvl-2 nav-atm-locations"><a href="https://www.google.com/maps/d/u/0/viewer?mid=z_RBbsRrHI-A.kV2z2vXDafN0" class=" external" target="_blank" >ATM Locations</a></li><li class="lvl-2 nav-atm-co-op-locations"><a href="https://co-opcreditunions.org/locator/?ref=co-opatm.org&sc=1" class=" external" target="_blank" >ATM CO-OP Locations</a></li><li class="lvl-2 nav-shared-branch-location"><a href="https://co-opcreditunions.org/locator/?ref=co-opsharedbranch.org&sc=1" class=" external" target="_blank" >Shared Branch Location</a></li></ul></li></ul></li><li class="lvl-0 nav-about-mcu"><a href="about-mcu" class=""  >About MCU</a></li><li class="lvl-0 nav-join-mcu"><a href="join-mcu" class=""  >Join MCU</a></li></ul>

         	<div style="clear:both;"></div>
		 </div><!--/main-nav-->
         <div class="nav-open" style="display:none;">
         	<div id="pods-features-auto-rate-341" class="pods-features-auto-rate clearfix">
	<p class="rate">2.09% APR</p>
<p class="subrate">Auto Loan Rate</p>
<p class="subrate">Some restrictions may apply.<br />With approved credit.</p>

</div><!--/ pods-none-auto-rate-341 -->
            <div id="pods-features-fixed-rate-342" class="pods-features-fixed-rate clearfix">
	<p><a class="mortgage-rates" style="text-decoration: none; color: white;" href="home-loans#mortgagerates">Mortgage Loan Rates</a></p>

</div><!--/ pods-features-fixed-rate-342 -->
         	<div style="clear:both;"></div>
         </div>
    </div>
</div><!--/leaderboard-->
</div><!--/leader-wrap-->

		</header><!--/site header-->


	<div id="content" class="site-content">
