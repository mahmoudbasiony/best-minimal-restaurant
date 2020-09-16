<?php
/**
 * The core theme styles and scripts.
 *
 * @package Ultimate_Restaurant
 * @author  PriceListo
 */

/**
 * Global js needed for the front-end.
 * 
 * @since 1.0.0
 *
 * @return void
 */
function urestaurant_global_theme_js() {
    // Get js directory uri.
    $dir = URESTAURANT_JS_DIR_URI;

    // Get current theme version.
    $theme_version = URESTAURANT_THEME_VERSION;

    // Get google maps api key.
    $google_map_api_key = urestaurant_get_google_map_api_key();

    if(isset($google_map_api_key)) {
        wp_enqueue_script("google-map-api", "https://maps.googleapis.com/maps/api/js?key={$google_map_api_key}", array(), '', false);
    }

    wp_enqueue_script('bootstrap', $dir . 'third/bootstrap.min.js', array('jquery'), $theme_version, true);
    wp_enqueue_script('easing', $dir . 'third/jquery.easing.min.js', array('jquery'), $theme_version, true);
    wp_enqueue_script('nice-select', $dir . 'third/jquery-nice-select.js', array('jquery'), $theme_version, true);
    wp_enqueue_script('magnific-popup', $dir . 'third/jquery.magnific-popup.js', array('jquery'), $theme_version, true);

    wp_enqueue_script('urestaurant-main', $dir . 'main.js', array('jquery'), $theme_version, true);
    
}
add_action('wp_enqueue_scripts', 'urestaurant_global_theme_js');

/**
 * Global css needed for the front-end.
 *
 * @since 1.0.0
 *
 * @return void
 */
function urestaurant_global_theme_css() {
    // Get css directory uri.
    $dir = URESTAURANT_CSS_DIR_URI;

    // Get current theme version.
    $theme_version = URESTAURANT_THEME_VERSION;

    wp_enqueue_style('urestaurant-google-fonts', urestaurant_theme_fonts_url(), false, $theme_version);
    wp_enqueue_style('bootstrap', $dir . 'third/bootstrap.min.css', false, $theme_version);
    wp_enqueue_style('animate', $dir . 'third/animate.min.css', false, $theme_version);
    wp_enqueue_style('ionicons', $dir . 'third/ionicons.min.css', false, $theme_version);
    wp_enqueue_style('nice-select', $dir . 'third/nice-select.min.css', false, $theme_version);
    wp_enqueue_style('magnific-popup', $dir . 'third/magnific-popup.min.css', false, $theme_version);

    // Target theme template css.
    urestaurant_target_theme_css();

    wp_enqueue_style('urestaurant-style', get_stylesheet_uri(), array(), $theme_version);
    wp_style_add_data('urestaurant-style', 'rtl', 'replace');
}
add_action('wp_enqueue_scripts', 'urestaurant_global_theme_css');

/**
 * Target css for the current active theme template.
 *
 * @since 1.0.0
 *
 * @return void
 */
function urestaurant_target_theme_css() {
    // Get css directory uri.
    $dir = URESTAURANT_CSS_DIR_URI;

    // Get current theme version.
    $theme_version = URESTAURANT_THEME_VERSION;

    // Get current active theme template
    $active_theme = urestaurant_get_active_theme_template();

    wp_enqueue_style("urestaurant-{$active_theme}-main", $dir . "{$active_theme}-main.css", false, $theme_version);
    wp_enqueue_style("urestaurant-{$active_theme}-responsive", $dir . "{$active_theme}-responsive.css", false, $theme_version);
}

/**
 * Get theme fonts url.
 *
 * @since 1.0.0
 *
 * @return string $fonts_url
 */
function urestaurant_theme_fonts_url() {
    // Initialize font family array
    $font_families = array();

    // Get current active theme template
    $active_theme = urestaurant_get_active_theme_template();

    if ('fancy' === $active_theme) {
        $font_families[] = 'Literata:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500&display=swap';
    }

    $font_families[] = 'Nunito:wght@300;400;600;700;800;900&display=swap';

    $font_families[] = 'Poppins:wght@300;400;500;600;700;800&display=swap';

    $query_args = array(
        'family'  => implode('|', $font_families),
    );

    return $fonts_url = esc_url(add_query_arg($query_args, 'https://fonts.googleapis.com/css'));
}