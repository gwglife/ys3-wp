<?php
/**
 * Template Name: LP Video Header
 *
 * Baseline markup to create a video hero region that actually plays video on mobile
 *
 * @package understrap
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header();

?>

<div class="video-container">

	<video class="vid-top" autoplay loop id="video-background" muted plays-inline>
		<source src="/wp-content/uploads/2019/01/yousurance_intro_3_optimized-1.mp4" type="video/mp4">
			<source src="/wp-content/uploads/2019/01/yousurance_intro_3_optimized.webm" type="video/webm" />
			<img src="/wp-content/uploads/2018/10/bg-1.jpg">
		</video>

		<div class="overlay-desc">
			<div class="container">
				<div class="row text-center">
					<div class="col-sm-12">
						<h1>Make it count. <br>
							<strong>Make it molecular.</strong></h1>
						</div>
						
					</div>
				</div>

			</div>

			<div class="vid-chevron-wrap">
<a href="#down-hop" class="scroll-container">
  <div class="chevron"></div>
  <div class="chevron"></div>
  <div class="chevron"></div>
  <!--<span class="text">Scroll down</span>-->
</a>
</div>

		</div>

		<?php
		while ( have_posts() ) : the_post();
			get_template_part( 'loop-templates/content', 'empty' );
		endwhile;

		get_footer();
