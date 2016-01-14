<?php
/**
 * Template Name: Home
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package reidcompton
 */

	get_header(); 
?>
	// if (have_posts()) : while (have_posts()) : the_post();
	// 	the_content();
	// endwhile; endif;
	<div class="section" id="welcome">
		<h2 class="tagline">hand crafted digital</h2>
		<a href="#" id="meet-reid">Who's Reid?</a>
		<div class="extended-tag">
			<p>Lorem ipsum dolor sit amet consectetur adispicing elit.</p>
		</div>
	</div>
	<div class="section">
		<div id="code">
			<div class="descriptor">
				<div class="info">
				<div class="info-text">
						<h2>CODE</h2>
						<hr class="underline">
						<p>In accumsan fringilla cursus. Donec consequat pretium sem bibendum iaculis. </p>
						<a href="code" class="samples">Samples</a>
					</div>
				</div>
			</div>
		</div>
		<div id="photo">
			<div class="descriptor">
				<div class="info">
					<div class="info-text">
						<h2>PHOTOGRAPHY</h2>
						<hr class="underline">
						<p>In accumsan fringilla cursus. Donec consequat pretium sem bibendum iaculis. </p>
						<a href="#" class="samples">Samples</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	

<?
	get_sidebar();
	get_footer();

?>