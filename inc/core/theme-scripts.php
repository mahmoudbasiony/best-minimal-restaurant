<?php
/**
 * The core theme styles and scripts.
 *
 * @package Best_Minimal_Restaurant
 * @author  PriceListo
 */

/**
 * Global js needed for the front-end.
 *
 * @since 1.0.0
 *
 * @return void
 */
function best_minimal_restaurant_global_theme_js() {
	// Get js directory uri.
	$dir = BMR_MINIMAL_JS_DIR_URI;

	// Get current theme version.
	$theme_version = BMR_MINIMAL_THEME_VERSION;

	// Get google maps api key.
	$google_map_api_key = best_minimal_restaurant_get_google_map_api_key();

	if ( isset( $google_map_api_key ) ) {
		wp_enqueue_script( 'google-map-api', "https://maps.googleapis.com/maps/api/js?key={$google_map_api_key}", array( 'jquery' ), $theme_version, false );
	}

	wp_enqueue_script( 'bootstrap', $dir . 'third/bootstrap.min.js', array( 'jquery' ), $theme_version, true );
	wp_enqueue_script( 'easing', $dir . 'third/jquery.easing.min.js', array( 'jquery' ), $theme_version, true );
	wp_enqueue_script( 'nice-select', $dir . 'third/jquery.nice-select.min.js', array( 'jquery' ), $theme_version, true );
	wp_enqueue_script( 'magnific-popup', $dir . 'third/jquery.magnific-popup.min.js', array( 'jquery' ), $theme_version, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	wp_enqueue_script( 'best-minimal-restaurant-main', $dir . 'main.js', array( 'jquery' ), $theme_version, true );
}
add_action( 'wp_enqueue_scripts', 'best_minimal_restaurant_global_theme_js' );

/**
 * Fix skip link focus in IE11.
 *
 * This does not enqueue the script because it is tiny and because it is only for IE11,
 * thus it does not warrant having an entire dedicated blocking script being loaded.
 *
 * @link https://git.io/vWdr2
 */
function best_minimal_restaurant_skip_link_focus_fix() {

	// If SCRIPT_DEBUG is defined and true, print the unminified file.
	if ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) {
		echo '<script>';
		include BMR_MINIMAL_JS_DIR_URI . 'skip-link-focus-fix.js';
		echo '</script>';
	}

	// The following is minified via `npx terser --compress --mangle -- assets/js/skip-link-focus-fix.js`.
	?>
	<script>
	/(trident|msie)/i.test(navigator.userAgent)&&document.getElementById&&window.addEventListener&&window.addEventListener("hashchange",(function(){var t,e=location.hash.substring(1);/^[A-z0-9_-]+$/.test(e)&&(t=document.getElementById(e))&&(/^(?:a|select|input|button|textarea)$/i.test(t.tagName)||(t.tabIndex=-1),t.focus())}),!1);
	</script>
	<?php
}
add_action( 'wp_print_footer_scripts', 'best_minimal_restaurant_skip_link_focus_fix' );

/**
 * Global css needed for the front-end.
 *
 * @since 1.0.0
 *
 * @return void
 */
function best_minimal_restaurant_global_theme_css() {
	// Get css directory uri.
	$dir = BMR_MINIMAL_CSS_DIR_URI;

	// Get current theme version.
	$theme_version = BMR_MINIMAL_THEME_VERSION;

	wp_enqueue_style( 'best-minimal-restaurant-google-fonts', best_minimal_restaurant_theme_fonts_url(), false, $theme_version );
	wp_enqueue_style( 'bootstrap', $dir . 'third/bootstrap.min.css', false, $theme_version );
	wp_enqueue_style( 'animate', $dir . 'third/animate.min.css', false, $theme_version );
	wp_enqueue_style( 'ionicons', $dir . 'third/ionicons.min.css', false, $theme_version );
	wp_enqueue_style( 'nice-select', $dir . 'third/nice-select.min.css', false, $theme_version );
	wp_enqueue_style( 'magnific-popup', $dir . 'third/magnific-popup.min.css', false, $theme_version );

	// Target theme template css.
	best_minimal_restaurant_target_theme_css();

	wp_enqueue_style( 'best-minimal-restaurant-style', get_stylesheet_uri(), array(), $theme_version );
	wp_style_add_data( 'best-minimal-restaurant-style', 'rtl', 'replace' );
}
add_action( 'wp_enqueue_scripts', 'best_minimal_restaurant_global_theme_css' );

/**
 * Target css for the current active theme template.
 *
 * @since 1.0.0
 *
 * @return void
 */
function best_minimal_restaurant_target_theme_css() {
	// Get css directory uri.
	$dir = BMR_MINIMAL_CSS_DIR_URI;

	// Get current theme version.
	$theme_version = BMR_MINIMAL_THEME_VERSION;

	// Get current active theme template.
	$active_theme = best_minimal_restaurant_get_active_theme_template();

	wp_enqueue_style( "best-minimal-restaurant-{$active_theme}-main", $dir . "{$active_theme}-main.css", false, $theme_version );
	wp_enqueue_style( "best-minimal-restaurant-{$active_theme}-responsive", $dir . "{$active_theme}-responsive.css", false, $theme_version );
}

/**
 * Get theme fonts url.
 *
 * @since 1.0.0
 *
 * @return string $fonts_url
 */
function best_minimal_restaurant_theme_fonts_url() {
	// Initialize font family array.
	$font_families = array();

	$font_families[] = 'Nunito:wght@300;400;600;700;800;900&display=swap';

	$font_families[] = 'Poppins:wght@300;400;500;600;700;800&display=swap';

	$query_args = array(
		'family' => implode( '|', $font_families ),
	);

	$fonts_url = esc_url( add_query_arg( $query_args, 'https://fonts.googleapis.com/css' ) );

	return $fonts_url;
}
