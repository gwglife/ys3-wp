<?php
/**
 * Template Name: Calculator
 *
 * Life insurance calculator
 *
 * @package understrap
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}



get_header();

?> 
<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri(); ?>/css/form.css" />
<section class="img-header img-header-quote1">

				<!-- Main Heading Starts -->
				<div class="text-center top-text">

					<h1 class="text-white">Free life insurance calculator</h1>

				</div>
				<!-- Main Heading Ends -->

			</section>

<?php

while ( have_posts() ) : the_post();
	get_template_part( 'loop-templates/content', 'empty' );
endwhile;

get_footer();
