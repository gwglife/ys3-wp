<?php
/**
 * Template Name: TV Video Header
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
		<source src="/wp-content/uploads/2019/01/helix-webformat.mp4" type="video/mp4">
			<source src="/wp-content/uploads/2019/01/helix-webformat.mp4" type="video/webm" />
			<img src="/wp-content/uploads/2018/10/bg-1.jpg">
		</video>

		<div class="overlay-desc">
			<div class="container">
				<div class="row text-center">
					<div class="col-sm-12">
						<h1> 
							<strong>Come inside and chat for a bit</strong>
						</h1>
						</div>
						
					</div>
				</div>

			</div>

		</div>

		<?php
		while ( have_posts() ) : the_post();
			get_template_part( 'loop-templates/content', 'empty' );
		endwhile;

		get_footer();
