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

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="fullpage">
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'reidcompton' ); ?></a>

	<header id="masthead" class="site-header" role="banner">
		<div id="headerWrapper">
			<div class="site-branding">
				<a href="<?php echo bloginfo('siteurl');?>"><img id="logo" src="<?php echo bloginfo('stylesheet_directory');?>/img/logo.png"></a>
			</div><!-- .site-branding -->

			<nav id="site-navigation" class="main-navigation" role="navigation">
				<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'reidcompton' ); ?></button>
				<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
			</nav><!-- #site-navigation -->
		</div><!-- #headerWrapper -->
	</header><!-- #masthead -->

