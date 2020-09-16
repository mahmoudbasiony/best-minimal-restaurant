<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package Ultimate_Restaurant
 * @author  PriceListo
 */

if (! function_exists( 'urestaurant_get_header' )) {
    /**
     * Displays site header regarding to selected template.
     *
     * @since 1.0.0
     *
     * @return mixed|HTML
     */
    function urestaurant_get_header() {
        // Get current active template.
        $active_template = urestaurant_get_active_theme_template();

        switch ( $active_template ) {
            case 'bold' :
                get_header( 'bold' );
            break;

            case 'colorful' :
                get_header( 'colorful' );
            break;

            case 'fancy' :
                get_header( 'fancy' );
            break;

            case 'minimal' :
                get_header( 'minimal' );
            break;

            default :
                get_header();
            break;
        }
    }
}

if (! function_exists( 'urestaurant_get_footer' )) {
    /**
     * Displays site footer.
     *
     * @since 1.0.0
     *
     * @return mixed|HTML
     */
    function urestaurant_get_footer() {
        get_footer();
    }
}

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function urestaurant_body_classes( $classes ) {
    // Adds a class of hfeed to non-singular pages.
    if (! is_singular()) {
        $classes[] = 'hfeed';
    }

    // Adds a class of no-sidebar when there is no sidebar present.
    if (! is_active_sidebar( 'sidebar-1' )) {
        $classes[] = 'no-sidebar';
    }

    // Custom template pages.
    $page_templates = apply_filters( 'urestaurant_custom_page_templates', array(
        'home'     => 'page-home.php',
        'about'    => 'page-about.php',
        'contact'  => 'page-contact.php',
        'menu'     => 'page-menu.php',
        'location' => 'page-location.php',
    ) );

    // Get current active template name.
    $template_name = urestaurant_get_active_theme_template();

    // Adds a class of current active template.
    if ( is_page_template( $page_templates ) ) {
        $classes[] = $template_name;
    }

    return $classes;
}
add_filter( 'body_class', 'urestaurant_body_classes' );

/**
 * Adds custom classes to nav menu.
 *
 * @param array  $classes Classes for the nav menu.
 * @param object $item    The item object.
 * @param array  $args    The nav args.
 *
 * @return array
 */
function urestaurant_menu_css_classes( $classes, $item, $args ) {
    if ($args->theme_location == 'urestaurant_top_right_menu' || $args->theme_location == 'urestaurant_top_left_menu') {
        $classes[] = 'nav-item';
    }

    if (in_array('current-menu-item', $classes )){
        $classes[] = 'active';
    }

    return $classes;
}
add_filter( 'nav_menu_css_class', 'urestaurant_menu_css_classes', 10, 3 );


/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 *
 * @since 1.0.0
 *
 * @return void
 */
function urestaurant_pingback_header() {
    if (is_singular() && pings_open()) {
        printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
    }
}
add_action( 'wp_head', 'urestaurant_pingback_header' );

/**
 * Filters the custom logo HTML.
 *
 * @param string $html The logo HTML
 *
 * @since 1.0.0
 *
 * @return string $html The filtered logo html
 */
function urestaurant_get_custom_logo( $html ) {
    global $ultimate_restaurant_settings;

    $custom_logo_id = get_theme_mod('custom_logo');

    if ($custom_logo_id) {
        $html = sprintf(
            '<a href="%1$s" class="custom-logo-link" rel="home" itemprop="url"><img class="custom-logo" style="max-width:%2$spx;max-height:%3$spx" src="%4$s" /></a>',
            esc_url( home_url( '/' ) ),
            $ultimate_restaurant_settings['logo-max-width'],
            $ultimate_restaurant_settings['logo-max-height'],
            wp_get_attachment_image_src(
                $custom_logo_id,
                'full'
            )[0]
        );
    }

    return $html;
}
add_filter( 'get_custom_logo', 'urestaurant_get_custom_logo', 10, 2 );
