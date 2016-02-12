<?php
/**
 * Template Name: Photography
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package reidcompton
 */
get_header(); 

	echo '<div class="section fp-auto-height">';
	echo '<div class="tagline">';
	if (have_posts()) : while (have_posts()) : the_post();
	the_content();
	endwhile; endif;
	echo '</div>';
	echo '<div class="followup"><p>Sed facilisis lectus ligula, sed placerat mi pretium sit amet.</p></div>';
	echo '</div>';

$featured_args = array(
        'post_type'     => 'photography',
		'orderby'       => 'post_date',
		'order'         => 'DESC',
		'posts_per_page'=> '-1', // overrides posts per page in theme settings
	);



	$featured_loop = new WP_Query( $featured_args );
	if( $featured_loop->have_posts()) : while ($featured_loop->have_posts()) : $featured_loop->the_post();

?>
		<div class="section">
			<div class="sectionInternalWrapper">
				<?php echo the_post_thumbnail('large'); ?>
				<iframe class="portVideo" width="500" height="253" src="https://www.youtube.com/embed/<?php echo get_post_meta($post->ID, 'code_project_video_url', true);?>" frameborder="0" allowfullscreen></iframe>
				<div class="portInfo">
					<p class="portTitle"><?php the_title(); ?></p>
					<p class="portType"><?php echo get_post_meta($post->ID, 'code_project_type_of_project', true);?></p>
					<p class="portDesc"><?php the_content(); ?></p>
				</div>
			</div>
		</div>	

<?php 
	// end featured loop
	endwhile; 
	endif;

	get_sidebar();
	get_footer();

?>