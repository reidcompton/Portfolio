<?php
/**
 * Template Name: Internal
 *
 * @package reidcompton
 */
get_header(); 

	$img = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );
?>
	<div class="section fp-auto-height">
<? if (get_post_meta($post->ID, 'tagline', true) != null) { ?>
	<div class="tagline" style="background-image:url(<? echo $img[0] ?>); background-repeat:no-repeat; background-size:cover;">
		<? echo get_post_meta($post->ID, 'tagline', true); ?>
	</div>
<? }
	if (get_post_meta($post->ID, 'tagline_followup', true) != null) {
?>
	<div class="followup"><p> <? echo get_post_meta($post->ID, 'tagline_followup', true) ?> </p></div>
<? } ?>
	</div>
<?
	if (have_posts()) : while (have_posts()) : the_post();	
?>
		<div class="section">
			<div class="sectionInternalWrapper">
				<?php //the_content(); ?>
				<div class="two-col left">
					<p>If you just want to say “hi” or have any questions in regards of my work, do not hesitate on contacting me. For work inquiries, please make sure you add it on the subject line.</p>
					<div class="form">

					</div>
				</div>
				<div class="two-col right">
					<h2>Currently located in Chicago</h2>
					<p>Shoot me an email if you'd like to meet up!</p>
					<p>Map</p>
				</div>
			</div>
		</div>	
		<div class="section">
			<? echo do_shortcode('[instagram-feed]'); ?>
		</div>	

<?php 
	endwhile; endif;
	get_sidebar();
	get_footer();

?>