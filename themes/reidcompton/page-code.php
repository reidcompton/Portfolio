<?php
/**
 * Template Name: Code
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package reidcompton
 */
get_header(); 

$args = array(
        'post_type'      => 'code',
		'orderby'       => 'post_date',
		'order'         => 'DESC',
		'posts_per_page'=> '12', // overrides posts per page in theme settings
	);



	$loop = new WP_Query( $args );
			if( $loop->have_posts()) : while ($loop->have_posts()) : $loop->the_post(); 
?>
			<div class="section">
					<a class="col-hover" href="<?php echo post_permalink($post->ID);?>">
						<span><?php the_title(); ?><br>
						<?php echo get_post_meta($post->ID, 'code_project_type_of_project', true);?></span>
					</a>
					<a class="image-wrapper" href="<?php echo post_permalink($post->ID);?>"><?php echo the_post_thumbnail('medium'); ?></a>
				</div>	

<?php 
	
	endwhile; 
	endif; 

	get_sidebar();
	get_footer();

?>