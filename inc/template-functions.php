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
        get_header();
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
 * Creates continue reading text.
 *
 * @since Twenty Twenty-One 1.0
 */
function urestaurant_continue_reading_text() {
	$continue_reading = sprintf(
		/* translators: %s: Name of current post. */
		esc_html__( 'Continue reading %s', 'twentytwentyone' ),
		the_title( '<span class="screen-reader-text">', '</span>', false )
	);

	return $continue_reading;
}

/**
 * Determines if post thumbnail can be displayed.
 *
 * @since Twenty Twenty-One 1.0
 *
 * @return bool
 */
function urestaurant_can_show_post_thumbnail() {
	/**
	 * Filters whether post thumbnail can be displayed.
	 *
	 * @since Twenty Twenty-One 1.0
	 *
	 * @param bool $show_post_thumbnail Whether to show post thumbnail.
	 */
	return apply_filters(
		'urestaurant_can_show_post_thumbnail',
		! post_password_required() && ! is_attachment() && has_post_thumbnail()
	);
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
        'home'     => 'template-home.php',
        'about'    => 'template-about.php',
        'contact'  => 'template-contact.php',
        'menu'     => 'template-menu.php',
        'location' => 'template-location.php',
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

/**
 * Gets the SVG code for a given icon.
 *
 * @since 1.0.0
 *
 * @param string $group The icon group.
 * @param string $icon  The icon.
 * @param int    $size  The icon size in pixels.
 * @return string
 */
function urestaurant_get_icon_svg( $icon ) {

    $icons = array(
        'arrow_right' => '<svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="m4 13v-2h12l-4-4 1-2 7 7-7 7-1-2 4-4z" fill="currentColor"/></svg>',
        'arrow_left'  => '<svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M20 13v-2H8l4-4-1-2-7 7 7 7 1-2-4-4z" fill="currentColor"/></svg>',
    );

    if ( isset( $icon ) && isset( $icons[$icon] ) ) {
        return $icons[$icon];
    }

    return '';
}
