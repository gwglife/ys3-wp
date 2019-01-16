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

<style>
	#wrapper-footer{display:none;}
</style>

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
						
<div id="carouselExampleSlidesOnly" class="carousel slide carousel-fade" data-ride="carousel" data-interval="15000">
  <div class="carousel-inner">
    <div class="carousel-item py-3 active">
      <h1><strong>Come inside and chat for a bit.</strong></h1>
    </div>
    <div class="carousel-item py-3">
      <h1><strong>Life insurance as unique as you are.</strong></h1>
    </div>
    <div class="carousel-item py-3">
      <h1><strong>What's your true Biological Age?</strong></h1>
    </div>
    <div class="carousel-item py-3">
      <h1><strong>How healthy are you on a molecular level?</strong></h1>
    </div>
    <div class="carousel-item py-3">
      <h1><strong>Get fit. Get molecular.</strong></h1>
    </div>
  </div>
</div>

						</div>
						
					</div>
				</div>

			</div>

		</div>

		<?php get_footer() ?>