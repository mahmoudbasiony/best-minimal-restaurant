<?php
/**
 * Template Name : Best Restaurant Menu.
 *
 * This template can be overridden by copying it to yourtheme/best-restaurant-menu/menu/best-restaurant-menu.php.
 *
 * @see
 * @package Best_Restaurant_Menu
 * @author  PriceListo
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

// Get header.
get_header(); ?>


<main id="primary" class="site-main">
	<section class="latest_post_wrap v1"></section>

	<div id="primary site-content" class="content-area">

		<?php
			/*
			 * Render display menu shortcode.
			 */
			echo do_shortcode( '[brm_restaurant_menu view="minimalist"]' );
		?>
	</div>
</main> <!-- #main -->

<?php
// Get footer.
get_footer();
