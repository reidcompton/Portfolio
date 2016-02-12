<?php
/**
 * Template Name: Code
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package reidcompton
 */
get_header(); 

	echo '<div class="section fp-auto-height tagline">';
	if (have_posts()) : while (have_posts()) : the_post();
	the_content();
	endwhile; endif;
	echo '</div>';

$featured_args = array(
        'post_type'     => 'code',
        'meta_key'		=> 'code_project_front_page',
        'meta_value'	=> 'yes',	
		'orderby'       => 'post_date',
		'order'         => 'DESC',
		'posts_per_page'=> '3', // overrides posts per page in theme settings
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
?>
		
		<div class="section">
			<div class="other-work">	
			<h2>Other Work</h2>
<?php
$other_args = array(
        'post_type'     => 'code',
        'meta_key'		=> 'code_project_front_page',
        'meta_value' 	=> 'no',
		'orderby'       => 'post_date',
		'order'         => 'DESC',
		'posts_per_page'=> '10', // overrides posts per page in theme settings
	);
	$other_loop = new WP_Query( $other_args );
		if( $other_loop->have_posts()) : while ($other_loop->have_posts()) : $other_loop->the_post(); 
?>
			<div class="other-work-code">
				<div class="img-wrapper">
					<?php echo the_post_thumbnail('medium'); ?>
				</div>
				<p class="portTitle"><?php the_title(); ?></p>
				<p class="portType"><?php echo get_post_meta($post->ID, 'code_project_type_of_project', true);?></p>
			</div>

<?php
	// end other loop
	endwhile; 
	endif; 
?>
		</div> <!-- .other-work -->
	</div> <!-- #section -->
<?php
	get_sidebar();
	get_footer();

?>