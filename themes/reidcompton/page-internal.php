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
	if (have_posts()) : while (have_posts()) : the_post();	?>
		<!-- the_content(); -->

		<div class="section">
			<div class="resume group">
				<h2>Skills</h2>
				<div class="two-col left">
					<h3>Technical</h3>
					<div class="skill">
						<p>C#/.NET (high)</p>
						<span class="skillLevel"><span class="high"></span></span>
					</div>
					<div class="skill">
						<p>SQL (high)</p>
						<span class="skillLevel"><span class="high"></span></span>
					</div>
					<div class="skill">
						<p>HTML/CSS (high)</p>
						<span class="skillLevel"><span class="high"></span></span>
					</div>
					<div class="skill">
						<p>JavaScript(high)</p>
						<span class="skillLevel"><span class="high"></span></span>
					</div>
					<div class="skill">
						<p>PHP (intermediate)</p>
						<span class="skillLevel"><span class="intermediate"></span></span>
					</div>
					<div class="skill">
						<p>Ruby (intermediate)</p>
						<span class="skillLevel"><span class="intermediate"></span></span>
					</div>
				</div>
				<div class="two-col right">
					<h3>Creative</h3>
					<div class="skill">
						<p>Photography (high)</p>
						<span class="skillLevel"><span class="high"></span></span>
					</div>
					<div class="skill">
						<p>Video Production (high)</p>
						<span class="skillLevel"><span class="high"></span></span>
					</div>
					<div class="skill">
						<p>Audio Production (high)</p>
						<span class="skillLevel"><span class="intermediate"></span></span>
					</div>
					<div class="skill">
						<p>Web Design (intermediate)</p>
						<span class="skillLevel"><span class="intermediate"></span></span>
					</div>
				</div>
			</div>
		</div>

		<div class="section">
			<div class="experience group">
				<div class="group">
				<h2>Experience</h2>
					<div class="two-col left">
						<h3 class="group">
							<span style="display:block; float:left;">Consultant</span>
							<span style="display:block; float:right;">2008 &ndash; Present</span>
						</h3>
						<h4>Software Development</h4>
						<p>Focusing on emerging web technologies, I build software solutions for clients. </p>
						<h4>Photography</h4>
						<p>Commercial, editorial, and documentary photography.</p>
					</div>
					<div class="two-col right">
						<h3 class="group">
							<span style="display:block; float:left;">DonorPath</span>
							<span style="display:block; float:right;">2013 &ndash; 2015</span>
							<h4>Senior Software Developer<br>Chicago, IL</h4>
							<p>I’ve worn many hats during my time at DonorPath. When I joined the company in it’s infancy, my role was primarily user experience designer and front-end developer.</p>
						</h3>
					</div>
				</div>
			</div>
		</div>

		<div class="section">
			<div class="client-logos">
				<h3>Clients I've had the opportunity to work with
					<div id="slider1">
						<a class="buttons prev" href="#">&#60;</a>
						<div class="viewport">
							<ul class="overview">
								<li><img src="http://placehold.it/300x200/f00" /></li>
								<li><img src="http://placehold.it/300x200/0f0" /></li>
								<li><img src="http://placehold.it/300x200/00f" /></li>
								<li><img src="http://placehold.it/300x200/f9c" /></li>
								<li><img src="http://placehold.it/300x200/8d7" /></li>
								<li><img src="http://placehold.it/300x200/0d6" /></li>
							</ul>
						</div>
						<a class="buttons next" href="#">&#62;</a>
					</div>
				</div>
			</div>
		</div>

<?	endwhile; endif;

	get_sidebar();
	get_footer();

?>