<?php
/**
 * Template part for displaying page home content.
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
$visible_sections = apply_filters( 'best_minimal_restaurant_home_visible_sections', ( get_field( 'home-visible-sections' ) && is_array( get_field( 'home-visible-sections' ) ) ) ? get_field( 'home-visible-sections' ) : array() );
?>

<!-- Hero area Start -->
<?php if ( apply_filters( 'best_minimal_restaurant_home_show_hero_section', in_array( 'hero', $visible_sections ) ) ) : ?>
	<section class="hero_wrap v1" style="background-image: url(<?php get_field( 'background-hero' ) ? esc_attr( the_field( 'background-hero' ) ) : ''; ?>);">
		<div class="overlay v2"></div>
		<div class="container">
			<div class="hero_text">
				<?php if ( get_field( 'heading-hero' ) ) : ?>
					<h2 class="text_wh"><?php echo esc_html( get_field( 'heading-hero' ) ); ?></h2>
				<?php endif; ?>
				<?php if ( get_field( 'subheading-hero' ) ) : ?>
					<p><?php echo esc_html( get_field( 'subheading-hero' ) ); ?></p>
				<?php endif; ?>
			</div>
		</div>
	</section>
<?php endif; ?>
<!-- Hero area End -->

<!-- About section starts -->
<?php if ( apply_filters( 'best_minimal_restaurant_home_show_about_section', in_array( 'about', $visible_sections ) ) ) : ?>
	<section class="about_wrap v1">
		<div class="container">
			<div class="row align-items-start">
				<div class="col-lg-5 col-md-12">
					<div class="about_img">
						<div class="br_one v3"></div>
						<img src="<?php get_field( 'about_image' ) ? esc_attr( the_field( 'about_image' ) ) : ''; ?>" alt="Image">
					</div>
				</div>
				<div class="col-lg-6 offset-lg-1 col-md-12">
					<div class="about_text">
						<?php if ( get_field( 'title-about' ) ) : ?>
							<h2 class="title"><?php esc_html( the_field( 'title-about' ) ); ?></h2>
						<?php endif; ?>
						<?php if ( get_field( 'content-about' ) ) : ?>
							<?php esc_html( the_field( 'content-about' ) ); ?>
						<?php endif; ?>
						<?php if ( get_field( 'button-text-about' ) ) : ?>
							<a href="<?php get_field( 'button-link-about' ) ? esc_attr( the_field( 'button-link-about' ) ) : ''; ?>" class="btn v2"><?php esc_html( the_field( 'button-text-about' ) ); ?></a>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
	</section>
<?php endif; ?>
<!-- About section ends -->

<!-- Feature section starts -->
<?php if ( apply_filters( 'best_minimal_restaurant_home_show_feature_section', in_array( 'feature', $visible_sections ) ) ) : ?>
	<section class="feature_wrap v1" style="background-image: url(<?php get_field( 'background-feature' ) ? esc_attr( the_field( 'background-feature' ) ) : ''; ?>);">
		<div class="overlay v1"></div>
		<div class="container">
			<div class="row">
				<div class="col-xl-5 offset-xl-7 col-lg-6 offset-lg-6 col-md-8 offset-md-4">
					<div class="feature_text_wrap">
						<div class="feature_text">
							<div class="br_one v2"></div>
							<?php if ( get_field( 'title-feature' ) ) : ?>
								<h2 class="title"><?php esc_html( the_field( 'title-feature' ) ); ?></h2>
							<?php endif; ?>
							<?php if ( get_field( 'content-feature' ) ) : ?>
								<p><?php esc_html( the_field( 'content-feature' ) ); ?></p>
							<?php endif; ?>
							<?php if ( get_field( 'button-text-feature' ) ) : ?>
								<a href="<?php get_field( 'button-link-feature' ) ? esc_attr( the_field( 'button-link-feature' ) ) : ''; ?>" class="btn v2"><?php esc_html( the_field( 'button-text-feature' ) ); ?></a>
							<?php endif; ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
<?php endif; ?>
<!-- Feature section ends -->

<!-- Offer section starts -->
<?php if ( apply_filters( 'best_minimal_restaurant_home_show_offer_section', in_array( 'offer', $visible_sections ) ) ) : ?>
	<section class="offer_wrap v1">
		<div class="container">
			<div class="row">
				<div class="col-lg-10 offset-lg-1">
					<div class="offer_text">
						<?php if ( get_field( 'title-offer' ) ) : ?>
							<h2 class="title"><?php esc_html( the_field( 'title-offer' ) ); ?></h2>
						<?php endif; ?>
						<?php if ( get_field( 'content-offer' ) ) : ?>
							<?php esc_html( the_field( 'content-offer' ) ); ?>
						<?php endif; ?>
					</div>
				</div>
			</div>

			<?php
			$food_categories = get_field( 'food-categories' );

			if ( $food_categories ) :
				?>
				<div class="row">
					<?php for ( $i = 1; $i <= 4; $i++ ) : ?>
						<?php
						if ( $food_categories[ "food-category-icon-{$i}" ] ) :
							$icon = $food_categories[ "food-category-icon-{$i}" ];
							?>
						<div class="col-lg-3 col-md-6 col-6">
							<a href="<?php echo $food_categories[ "food-category-target-url-{$i}" ] ? esc_url( $food_categories[ "food-category-target-url-{$i}" ] ) : '#'; ?>" class="food_cat">
								<img src="<?php echo esc_url( $icon['url'] ); ?>" alt="<?php echo esc_attr( $icon['alt'] ); ?>">

								<?php if ( $food_categories[ "food-category-title-{$i}" ] ) : ?>
									<span><?php echo esc_html( $food_categories[ "food-category-title-{$i}" ] ); ?></span>
								<?php endif; ?>
							</a>
						</div>
						<?php endif; ?>
					<?php endfor; ?>
				</div>
			<?php endif; ?>
		</div>
	</section>
<?php endif; ?>
<!-- Offer section ends -->
