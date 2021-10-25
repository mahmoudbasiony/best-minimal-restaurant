<?php
/**
 * Template Name: Menu Page Template
 *
 * @package Best_Minimal_Restaurant
 * @author  PriceListo
 */

?>
	<!---- Header ---->
	<?php get_header(); ?>

	<main id="primary site-content" class="site-main">

		<?php
			// Menu page template parts.
			get_template_part( "template-parts/{$active_template}/content", 'menu' );

			// CTA section.
		if ( apply_filters( 'best_minimal_restaurant_home_show_cta_section', true ) ) :
			get_template_part( "template-parts/{$active_template}/section", 'call-to-action' );
			endif;

			// If comments are open or we have at least one comment, load up the comment template.
		if ( comments_open() || get_comments_number() ) :
			comments_template();
			endif;

		?>

	</main>

	<!---- Footer ---->
	<?php get_footer(); ?>
