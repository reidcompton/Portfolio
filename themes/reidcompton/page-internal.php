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
		the_content();
	endwhile; endif;

	get_sidebar();
	get_footer();

?>