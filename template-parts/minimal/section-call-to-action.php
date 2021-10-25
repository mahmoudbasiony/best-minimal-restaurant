<?php
/**
 * Template part for displaying a cta in custom templates pages
 *
 * @global array $best_minimal_restaurant_settings.
 *
 * @package Best_Minimal_Restaurant
 * @author  PriceListo
 */

global $best_minimal_restaurant_settings;

$cta_background = isset( $best_minimal_restaurant_settings['cta-background'] ) && isset( $best_minimal_restaurant_settings['cta-background']['background-image'] ) ? $best_minimal_restaurant_settings['cta-background']['background-image'] : BMR_MINIMAL_IMAGES_DIR_URI . 'call-to-action.png';
?>

<section class="cta_wrap v1" style="background-image: url(<?php echo esc_url( $cta_background ); ?>);">
	<div class="overlay v1"></div>
	<div class="container">
		<div class="row">
			<div class="col-xl-4 col-lg-5 col-md-7">
				<div class="cta_info_box">
					<div class="cta_info_wrap">
						<div class="br_one v1"></div>
						<?php if ( isset( $best_minimal_restaurant_settings['start-time'] ) && isset( $best_minimal_restaurant_settings['end-time'] ) ) : ?>
							<div class="cta_info">
								<h4><?php esc_html_e( 'Open', 'best-minimal-restaurant' ); ?>:</h4>
								<span><?php echo esc_html( $best_minimal_restaurant_settings['start-time'] ); ?> - <?php echo esc_html( $best_minimal_restaurant_settings['end-time'] ); ?></span>
							</div>
						<?php endif; ?>
						<?php if ( isset( $best_minimal_restaurant_settings['large-group-txt'] ) && ! empty( $best_minimal_restaurant_settings['large-group-txt'] ) ) : ?>
							<p><?php echo esc_html( $best_minimal_restaurant_settings['large-group-txt'] ); ?></p>
						<?php endif; ?>
						<?php if ( isset( $best_minimal_restaurant_settings['phone'] ) && ! empty( $best_minimal_restaurant_settings['phone'] ) ) : ?>
							<div class="cta_info">
								<h4><?php esc_html_e( 'Phone', 'best-minimal-restaurant' ); ?>:</h4>
								<a href="tel:<?php echo esc_attr( $best_minimal_restaurant_settings['phone'] ); ?>"><?php echo esc_html( $best_minimal_restaurant_settings['phone'] ); ?></a>
							</div>
						<?php endif; ?>
						<?php if ( isset( $best_minimal_restaurant_settings['email'] ) && ! empty( $best_minimal_restaurant_settings['email'] ) ) : ?>
							<div class="cta_info">
								<h4><?php esc_html_e( 'Email', 'best-minimal-restaurant' ); ?>:</h4>
								<a href="mailto:<?php echo esc_attr( $best_minimal_restaurant_settings['email'] ); ?>"><?php echo esc_html( $best_minimal_restaurant_settings['email'] ); ?></a>
							</div>
						<?php endif; ?>
						<?php if ( isset( $best_minimal_restaurant_settings ) && isset( $best_minimal_restaurant_settings['show-reservation-button'] ) && '1' === $best_minimal_restaurant_settings['show-reservation-button'] ) : ?>
							<a href="<?php echo esc_url( $best_minimal_restaurant_settings['reservation-button-url'] ); ?>" class="btn v1"><?php esc_html_e( 'make reservation', 'best-minimal-restaurant' ); ?></a>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
