<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package reidcompton
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/fullPage.js/2.7.6/jquery.fullPage.css" />
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/fullPage.js/2.7.6/jquery.fullPage.js"></script>
<script type="text/javascript" src="<?php echo bloginfo('stylesheet_directory');?>/js/functions.js"></script>

<script type="text/javascript" src="<?php echo bloginfo('stylesheet_directory');?>/js/accordian/jquery-ui-1.10.3.custom.min.js"></script>
<script type="text/javascript" src="<?php echo bloginfo('stylesheet_directory');?>/js/accordian/jquery.accordionImageMenu.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo bloginfo('stylesheet_directory');?>/js/accordian/accordionImageMenu.css" />

<script src="<?php echo bloginfo('stylesheet_directory');?>/js/carousel/jquery.tinycarousel.min.js"></script>
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
<div class="lb-bg hide"></div>
<div class="lb hide">
	<a href="#" class="lb-escape">X</a>
	<div class="lb-mainImage">
		<a href="#" class="lb-prev">&lsaquo;</a>
		<img>
		<a href="#" class="lb-next">&rsaquo;</a>
	</div>
	<div class="lb-slider">
		<a class="buttons prev" href="#">&#60;</a>
		<div class="viewport">
			<ul class="overview">
			</ul>
		</div>
		<a class="buttons next" href="#">&#62;</a>
	</div>
</div>
<? if ((is_page('home') || is_page(11)) && !is_iphone()) { ?>
<div id="fullpage">
<? } else { ?>
<div>
<? } ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'reidcompton' ); ?></a>

	<header id="masthead" class="site-header" role="banner">
		<div id="headerWrapper" class="group">
			<div class="site-branding">
				<a href="<?php echo bloginfo('siteurl');?>"><img id="logo" src="<?php echo bloginfo('stylesheet_directory');?>/img/logo.png"></a>
			</div><!-- .site-branding -->

			<nav id="site-navigation" class="main-navigation" role="navigation">
				<button class="menu-toggle"><?php echo 'menu &raquo; <div><span></span><span></span><span></span></div>'; ?></button>
			</nav><!-- #site-navigation -->
		</div><!-- #headerWrapper -->
	</header><!-- #masthead -->

