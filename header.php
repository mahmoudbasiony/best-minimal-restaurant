<?php
/**
 * The header for Minimal theme Template
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Best_Minimal_Restaurant
 * @author  PriceListo
 */

global $best_minimal_restaurant_settings, $active_template;
$active_template = best_minimal_restaurant_get_active_theme_template();

$wrapper_classes  = 'site-header';
$wrapper_classes .= has_custom_logo() ? ' has-logo' : '';
$wrapper_classes .= ( true === get_theme_mod( 'display_title_and_tagline', true ) ) ? ' has-title-and-tagline' : '';
$wrapper_classes .= has_nav_menu( 'best_minimal_restaurant_main_menu' ) ? ' has-menu' : '';

$blog_info    = get_bloginfo( 'name' );
$description  = get_bloginfo( 'description', 'display' );
$show_title   = ( true === get_theme_mod( 'display_title_and_tagline', true ) );
$header_class = $show_title ? 'site-title' : 'screen-reader-text';

?>

<!doctype html>
<html <?php language_attributes(); ?>>
<head>

	<!--====== Required meta tags ======-->
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="description" content="Restaurant Template">
	<meta name="keywords" content="Restaurant,food">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
	<!-- Preloader Start -->
	<div class="proloader">
		<div class="loader_34">
			<!-- Preloader Elements -->
			<div class="ytp-spinner">
				<div class="ytp-spinner-container">
					<div class="ytp-spinner-rotator">
						<!-- Preloader Container Left Begin -->
						<div class="ytp-spinner-left">
							<!-- Preloader Body Left -->
							<div class="ytp-spinner-circle"></div>
						</div>
						<!-- Preloader Container Left End -->
						<!-- Preloader Container Right Begin -->
						<div class="ytp-spinner-right">
							<!-- Preloader Body Right -->
							<div class="ytp-spinner-circle"></div>
						</div>
						<!-- Preloader Container Right End -->
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Preloader End -->
	<div class="page_wrapper">
		<a class="skip-link screen-reader-text" href="#site-content"><?php esc_html_e( 'Skip to content', 'best-minimal-restaurant' ); ?></a>
		<!-- Header  Start -->
		<header class="<?php echo esc_attr( $wrapper_classes ); ?> header-bar-area w-100  v1">
			<div class="container">
				<div class="row align-items-center">
					<div class="col-lg-3 col-md-5 col-8">
						<div class="logo">
							<?php if ( has_custom_logo() ) : ?>
								<?php the_custom_logo(); ?>
							<?php else : ?>
								<?php if ( $blog_info && $show_title ) : ?>
									<?php if ( is_front_page() && ! is_paged() ) : ?>
										<h1 class="<?php echo esc_attr( $header_class ); ?>">
											<a class="text_wh" href="<?php echo esc_url( home_url( '/' ) ); ?>">
												<?php echo esc_html( $blog_info ); ?>
											</a>
										</h1>

									<?php elseif ( is_front_page() && ! is_home() ) : ?>
										<h1 class="<?php echo esc_attr( $header_class ); ?>">
											<a class="text_wh" href="<?php echo esc_url( home_url( '/' ) ); ?>">
												<?php echo esc_html( $blog_info ); ?>
											</a>
										</h1>
									<?php else : ?>
										<h1 class="<?php echo esc_attr( $header_class ); ?>">
											<a class="text_wh" href="<?php echo esc_url( home_url( '/' ) ); ?>">
												<?php echo esc_html( $blog_info ); ?>
											</a>
										</h1>
									<?php endif; ?>
								<?php endif; ?>
							<?php endif; ?>

							<?php if ( $description && true === get_theme_mod( 'display_title_and_tagline', true ) ) : ?>
								<p class="site-description">
									<?php echo $description; // phpcs:ignore WordPress.Security.EscapeOutput ?>
								</p>
							<?php endif; ?>
						</div>
					</div>
					<div class="col-lg-9 col-md-7 col-4">
						<div class="site-navbar">
							<nav class="site-navigation">
								<?php
								if ( has_nav_menu( 'best_minimal_restaurant_main_menu' ) ) {
									wp_nav_menu(
										array(
											'theme_location' => 'best_minimal_restaurant_main_menu',
											'container'  => false,
											'menu_class' => 'site-menu js-clone-nav d-none d-lg-block',
										)
									);
								}
								?>
							</nav>
							<div class="d-lg-none sm-right">
								<a href="#" class="mobile-bar js-menu-toggle">
									<i class="ion-android-menu"></i>
								</a>
							</div>
							<!--mobile-menu starts -->
							<div class="site-mobile-menu">
								<div class="site-mobile-menu-header">
									<a href="#" class="site-mobile-menu-close  js-menu-toggle">
										<i class="ion-ios-close-empty"></i>
									</a>
								</div>
								<?php if ( isset( $best_minimal_restaurant_settings ) && isset( $best_minimal_restaurant_settings['show-reservation-button'] ) && '1' === $best_minimal_restaurant_settings['show-reservation-button'] ) : ?>
									<div class="site-mobile-menu-body">
										<div class="header_btn">
											<a href="<?php echo esc_url( $best_minimal_restaurant_settings['reservation-button-url'] ); ?>" class="btn v3"><?php echo esc_html( $best_minimal_restaurant_settings['reservation-button-text'] ); ?></a>
										</div>
									</div>
								<?php endif; ?>
							</div>
							<!--mobile-menu ends-->
							<?php if ( isset( $best_minimal_restaurant_settings ) && isset( $best_minimal_restaurant_settings['show-reservation-button'] ) && '1' === $best_minimal_restaurant_settings['show-reservation-button'] ) : ?>
								<div class="header_btn md-none">
									<a href="<?php echo esc_url( $best_minimal_restaurant_settings['reservation-button-url'] ); ?>" class="btn v3"><?php echo esc_html( $best_minimal_restaurant_settings['reservation-button-text'] ); ?></a>
								</div>
							<?php endif; ?>
						</div>
					</div>
				</div>
			</div>
		</header>
		<!-- Header bar area End -->
