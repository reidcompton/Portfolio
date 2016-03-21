<?php
/**
 * Template Name: Code
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
	echo '</div></div>';

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
				
				<a class="portInfo" href="<?php the_permalink();?>">
					<span class="portTitle"><?php the_title(); ?></span>
					<span class="portType"><?php echo get_post_meta($post->ID, 'code_project_type_of_project', true);?></span>
					<span class="portDesc"><?php the_content(); ?></span>
				</a>
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
	$other_loop = new WP_Query( $other_args );?>
<?
		if( $other_loop->have_posts()) : while ($other_loop->have_posts()) : $other_loop->the_post(); 
		$img = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );
?>		
			
			<div class="other-work-code">
				<span class="img-wrapper">
					<a href="<? the_permalink();?>" style="background-image:url(<? echo $img[0];?>); background-position:center top; background-size:cover;">
					</a>
				</span>
				<a href="<? the_permalink();?>">
					<span class="portTitle"><?php the_title(); ?></span>
				</a>
				<a href="<? the_permalink();?>">
					<span class="portType"><?php echo get_post_meta($post->ID, 'code_project_type_of_project', true);?></span>
				</a>
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