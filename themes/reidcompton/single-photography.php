<?php

	get_header(); 

	$img = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );
?>
		<div>
			<div class="tagline-filter"></div>
			<div class="tagline-bg" style="background-image:url(<? echo $img[0] ?>); background-repeat:no-repeat; background-size:cover; background-position:center;"></div>
			<p class="tagline"><?php echo get_post_meta($post->ID, 'photography_style_type_of_style', true);?></p>
		</div>
<?
	if (have_posts()) : while (have_posts()) : the_post();
		//the_content();
	$images = get_images_src('large', false, $post->ID); 
	$i = 0;
	$imgArray = [];
	foreach($images as $image) {
		array_push($imgArray, $image[0]);
		if ($i==0) {
			echo "<div class='group' id='photos" . $i . "'><div class='photos group'>";
		} else if ($i==3 || $i==7 || $i==10 || $i == 15 || $i == 18) {
			echo "</div></div><div class='group' id='photos" . $i . "'><div class='photos group'>";
			if ($i == 3)
				the_content();
		} 
		echo "<a href='#' class='port-lb' data-url='" . $image[0] . "' style='background-image:url(" . $image[0] . "); background-size:cover; background-position:bottom'></a>";
		$i++; 
		if ($i == count($images)) {
			echo '</div></div>';
		}
	}
	echo '<span id="allImageUrls" data-urls="' . implode("|", $imgArray) . '"></span>';
	endwhile; endif;

	get_sidebar();
	get_footer();

?>