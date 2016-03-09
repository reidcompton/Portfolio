<?php
/**
 * Template Name: Home
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package reidcompton
 */

	get_header(); 

	// if (have_posts()) : while (have_posts()) : the_post();
	// 	the_content();
	// endwhile; endif;
	?>
	<div class="section" id="welcome">

		<img id="intro-video" src="<?php echo bloginfo('stylesheet_directory');?>/img/train.jpg">
		<div class="video-overlay"></div>
		<div class="tagline-home-wrapper">
			<h2 class="tagline">hand&ndash;crafted digital</h2>
			<a href="about" id="meet-reid">Who's Reid?</a>
		</div>
			<div class="extended-tag">
				<p>Full-stack .NET development, Photography</p>
			</div>
	</div>
	<div class="section">
		<div id="code">
			<div class="descriptor">
				<div class="info">
					<div class="info-text"> 
						<img src="<?php echo bloginfo('stylesheet_directory');?>/img/brackets.png" class="sample-image">
						<h2>development</h2>
						<!-- <hr class="underline"> -->
						<!-- <p>In accumsan fringilla cursus. Donec consequat pretium sem bibendum iaculis. </p> -->
						<a href="code" class="samples">Samples</a>
					</div>
				</div>
			</div>
		</div>
		<div id="photo">
			<div class="descriptor">
				<div class="info">
					<div class="info-text">
						<img src="<?php echo bloginfo('stylesheet_directory');?>/img/aperture.png" class="sample-image">
						<h2>photography</h2>
						<!-- <hr class="underline"> -->
						<!-- <p>In accumsan fringilla cursus. Donec consequat pretium sem bibendum iaculis. </p> -->
						<a href="photography" class="samples">Samples</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	

<?
	get_sidebar();
	get_footer();

?>