<?php
/**
 * Template Name: Photography
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package reidcompton
 */
get_header(); 


	$img = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );
	echo '<div class="section fp-auto-height">';
	echo '<div class="tagline" style="background-image:url(' . $img[0] . '); background-repeat:no-repeat; background-size:cover;">';
	if (have_posts()) : while (have_posts()) : the_post();
	the_content();
	endwhile; endif;
	echo '</div>';
	echo '<div class="followup"><p>Sed facilisis lectus ligula, sed placerat mi pretium sit amet.</p></div>';
	echo '</div>';

$featured_args = array(
        'post_type'     => 'photography',
		'orderby'       => 'post_date',
		'order'         => 'ASC',
		'posts_per_page'=> '-1', // overrides posts per page in theme settings
	); 
?>

		<div class="section" id="photoAccordion">
		<?php //echo do_shortcode("[a_image_menu]"); ?>
<?php 


$featured_loop = new WP_Query( $featured_args );
	if( $featured_loop->have_posts()) : while ($featured_loop->have_posts()) : $featured_loop->the_post();
	
?>
				<a href="<?php the_permalink(); ?>" class="portEntry">
					<span class="portImage"><?php echo the_post_thumbnail('large'); ?></span>
					<span class="portTitle"><?php the_title(); ?></span>
					<span class="hide hiddenNiceName"><?php echo get_post_meta($post->ID, 'photography_style_type_of_style', true);?></span>
					<span class="hide hiddenDescription"><?php the_content(); ?></span>
				</a>
<?php 
	// end featured loop
	endwhile; 
	endif;
?>
			<div class="portMetaBox group">
				<h2 class="portNiceName"></h2>
				<p class="portDescription"></p>
			</div>
		</div>	

<?php 

	get_sidebar();
	get_footer();

?>