<?php
/**
 * Template part for displaying page location content.
 *
 * @package Best_Minimal_Restaurant
 * @author  PriceListo
 */

// Exits if ACF niether installed nor activated.
if ( ! BMR_MINIMAL_ACF_ACTIVE || ! function_exists( 'get_field' ) ) {
	return;
}

/**
 * Get the visible sections on this template
 *
 * @var array
 */
$visible_sections = apply_filters( 'best_minimal_restaurant_location_visible_sections', ( get_field( 'location-visible-sections' ) && is_array( get_field( 'location-visible-sections' ) ) ) ? get_field( 'location-visible-sections' ) : array() );
?>

<!-- Breadcrumb area Start -->
<?php if ( apply_filters( 'best_minimal_restaurant_location_show_breadcrumb_section', in_array( 'breadcrumb', $visible_sections ) ) ) : ?>
	<section class="breadcrumb_wrap" style="background-image: url(<?php get_field( 'background-breadcrump-location' ) ? esc_url( the_field( 'background-breadcrump-location' ) ) : ''; ?>);">
		<div class="overlay v2"></div>
		<div class="container">
			<?php if ( get_field( 'heading-breadcrump-location' ) ) : ?>
				<div class="breadcrumb_text">
					<h3><?php esc_html( the_field( 'heading-breadcrump-location' ) ); ?></h3>
				</div>
			<?php endif; ?>
		</div>
	</section>
<?php endif; ?>
<!-- Breadcrumb area End -->

<?php if ( apply_filters( 'best_minimal_restaurant_location_show_location_section', in_array( 'our-location', $visible_sections ) ) ) : ?>
	<!-- Contact Info section starts -->
	<section class="contact_info_wrap">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="map_title">
						<?php if ( get_field( 'our-location-title' ) ) : ?>
							<h2 class="title"><?php esc_html( the_field( 'our-location-title' ) ); ?></h2>
						<?php endif; ?>
						<?php if ( get_field( 'location-address' ) ) : ?>
							<p><?php esc_html( the_field( 'location-address' ) ); ?></p>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Contact Info section ends -->

	<!-- Google Map starts -->
	<section class="google_maps">
	<?php
		$location = get_field( 'location-map' );
	if ( $location ) :
		?>
			<div class="acf-map" data-zoom="16">
				<div class="marker" data-lat="<?php echo esc_attr( $location['lat'] ); ?>" data-lng="<?php echo esc_attr( $location['lng'] ); ?>"></div>
			</div>
		<?php
		endif;
	?>
	</section>
	<!-- Google Map ends -->
<?php endif; ?>
