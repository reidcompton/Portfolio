<?php

	get_header(); 

	$img = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );
?>
		<div class="section fp-auto-height">
			<div class="tagline-filter"></div>
			<div class="tagline-bg" style="background-image:url(<? echo $img[0] ?>); background-repeat:no-repeat; background-size:100%; background-position:center;"></div>
			<p class="tagline"><?php the_title(); ?></p>
		</div>
<?
	if (have_posts()) : while (have_posts()) : the_post();
		//the_content(); ?>
		<div class="single-code-main group">
		<div class="two-col left">
			<? the_content(); ?>
		</div>
		<div class="two-col right">
<?
	$images = get_images_src('large', false, $post->ID); 
	$i = 0;
	$imgArray = [];
	foreach($images as $image) {
		array_push($imgArray, $image[0]);
		echo "<a href='#' class='port-lb' data-url='" . $image[0] . "' style='background-image:url(" . $image[0] . "); background-size:cover; background-position:bottom'></a>";
		$i++; 
		if ($i == count($images)) {
			echo '</div></div>';
		}
	}
	echo '<span id="allImageUrls" data-urls="' . implode("|", $imgArray) . '"></span>';
	endwhile; endif; ?>
	</div>
<?
	get_sidebar();
	get_footer();

?>