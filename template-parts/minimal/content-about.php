<?php
/**
 * Template part for displaying page about content.
 *
 * @package Best_Minimal_Restaurant
 * @author  PriceListo
 */

// Exits if ACF niether installed nor activated.
if ( ! BMR_MINIMAL_ACF_ACTIVE || ! function_exists( 'get_field' ) ) {
	return;
}

/**
 * Get the active template name.
 *
 * @var string
 */
$template_name = best_minimal_restaurant_get_active_theme_template();

/**
 * Get the visible sections on this template
 *
 * @var array
 */
$visible_sections = apply_filters( 'best_minimal_restaurant_about_visible_sections', ( get_field( 'about-visible-sections' ) && is_array( get_field( 'about-visible-sections' ) ) ) ? get_field( 'about-visible-sections' ) : array() );
?>

<!-- Breadcrumb area Start -->
<?php if ( apply_filters( 'best_minimal_restaurant_about_show_breadcrumb_section', in_array( 'breadcrumb', $visible_sections ) ) ) : ?>
	<section class="breadcrumb_wrap v1" style="background-image: url(<?php get_field( 'background-breadcrump' ) ? esc_url( the_field( 'background-breadcrump' ) ) : ''; ?>);">
		<div class="overlay v2"></div>
		<div class="container">
			<?php if ( get_field( 'heading-breadcrump' ) ) : ?>
				<div class="breadcrumb_text">
					<h3><?php esc_html( the_field( 'heading-breadcrump' ) ); ?></h3>
				</div>
			<?php endif; ?>
		</div>
	</section>
<?php endif; ?>
<!-- Breadcrumb area End -->

<!-- About section starts -->
<?php if ( apply_filters( 'best_minimal_restaurant_about_show_about_section', in_array( 'about', $visible_sections ) ) ) : ?>
	<section class="about_wrap v1 style1">
		<?php
		if ( get_field( 'about-image' ) ) :
			$image = get_field( 'about-image' );
			?>
			<img src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ); ?>" class="abs_img_2">
		<?php endif; ?>
		<div class="container">
			<div class="row align-items-center">
				<div class="col-lg-6  col-md-7">
					<div class="about_text">
						<?php if ( get_field( 'about-title' ) ) : ?>
							<h2 class="title"><?php esc_html( the_field( 'about-title' ) ); ?></h2>
						<?php endif; ?>
						<?php if ( get_field( 'about-content' ) ) : ?>
							<?php esc_html( the_field( 'about-content' ) ); ?>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
	</section>
<?php endif; ?>
<!-- About section ends -->

<!-- Promo Video section starts -->
<?php if ( apply_filters( 'best_minimal_restaurant_about_show_video_section', in_array( 'video', $visible_sections ) ) ) : ?>
	<section class="promo_video_wrap v1" style="background-image: url(<?php get_field( 'video-background-image' ) ? esc_url( the_field( 'video-background-image' ) ) : ''; ?>);">
		<div class="overlay v2"></div>
		<div class="video_btn">
			<?php
			if ( get_field( 'about-promo-video' ) ) :
				$url = get_field( 'about-promo-video', false, false );
				?>
				<a href="<?php echo esc_url( $url ); ?>" class="play_btn hvr-ripple-out"><img src="<?php echo esc_url( urestaurany_get_attachment_url_by_title( "{$template_name}-play" ) ); ?>" alt="Image"></a>
			<?php endif; ?>
		</div>
	</section>
<?php endif; ?>
<!-- Promo Video section ends -->

<!-- About 2 section starts -->
<?php if ( apply_filters( 'best_minimal_restaurant_about_show_about2_section', in_array( 'about2', $visible_sections ) ) ) : ?>
	<section class="simple_wrap v1">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-xl-6 col-lg-6  col-md-12 col-12 order-xl-1 order-lg-1 order-md-2 order-2">
					<div class="simple_text">
						<?php if ( get_field( 'about-title-2' ) ) : ?>
							<h2 class="title"><?php esc_html( the_field( 'about-title-2' ) ); ?></h2>
						<?php endif; ?>
						<?php if ( get_field( 'about-content-2' ) ) : ?>
							<?php esc_html( the_field( 'about-content-2' ) ); ?>
						<?php endif; ?>
					</div>
				</div>
				<div class="col-xl-5 offset-xl-1 col-lg-6 col-md-12 col-12 order-xl-2 order-lg-2 order-md-1 order-1">
					<?php
					if ( get_field( 'about-image-2' ) ) :
						$image = get_field( 'about-image-2' );
						?>
						<div class="simple_img">
							<div class="br_one v3"></div>
							<img src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ); ?>">
						</div>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</section>
<?php endif; ?>
<!-- About 2 section ends -->
