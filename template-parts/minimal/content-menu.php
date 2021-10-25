<?php
/**
 * Template part for displaying page menu content.
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
$visible_sections = apply_filters( 'best_minimal_restaurant_menu_visible_sections', ( get_field( 'menu-visible-sections' ) && is_array( get_field( 'menu-visible-sections' ) ) ) ? get_field( 'menu-visible-sections' ) : array() );
?>

<!-- Breadcrumb area Start -->
<?php if ( apply_filters( 'best_minimal_restaurant_menu_show_breadcrumb_section', in_array( 'breadcrumb', $visible_sections ) ) ) : ?>
	<section class="breadcrumb_wrap" style="background-image: url(<?php get_field( 'background-breadcrump-menu' ) ? esc_url( the_field( 'background-breadcrump-menu' ) ) : ''; ?>);">
		<div class="overlay v1"></div>
		<div class="container">
			<?php if ( get_field( 'heading-breadcrump-menu' ) ) : ?>
				<div class="breadcrumb_text">
					<h3><?php esc_html( the_field( 'heading-breadcrump-menu' ) ); ?></h3>
				</div>
			<?php endif; ?>
		</div>
	</section>
<?php endif; ?>
<!-- Breadcrumb area End -->

<!-- Menu Item section starts -->
<?php if ( apply_filters( 'best_minimal_restaurant_menu_show_menu_section', in_array( 'menu', $visible_sections ) ) ) : ?>
	<section class="item_wrap">
		<?php
		if ( get_field( 'image-menu' ) ) :
			$image = get_field( 'image-menu' );
			?>
			<img class="abs_img_1" src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ); ?>">
		<?php endif; ?>
		<div class="container">
			<div class="row">
				<div class="col-lg-7 col-md-7">
					<div class="item_title">
						<?php if ( get_field( 'title-menu' ) ) : ?>
							<h3 class="title"><?php esc_html( the_field( 'title-menu' ) ); ?></h3>
						<?php endif; ?>
						<?php if ( get_field( 'menu-description' ) ) : ?>
							<?php esc_html( the_field( 'menu-description' ) ); ?>
						<?php endif; ?>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="item_box_wrap">
						<?php echo do_shortcode( get_field( 'menu-shortcode' ) ); ?>
					</div>
				</div>
			</div>
		</div>
	</section>
<?php endif; ?>
<!-- Menu Item section ends -->
