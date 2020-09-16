<?php
/**
 * Ultimate_Restaurant_Redux
 *
 * Setup theme option with help of ReduxFramework (https://reduxframework.com/)
 *
 * @package Ultimate_Restaurant
 * @author  PriceListo
 */

if (! defined('ABSPATH')) {
    die('Access denied!');
}

// Check Redux Framework is exist and active
if (! class_exists('Redux')) {
    return;
}

// The option name where all the Redux data is stored.
$opt_name = 'ultimate_restaurant_settings';

$theme = wp_get_theme(); // For use with some settings. Not necessary.

// Get current active template name.
$template_name = urestaurant_get_active_theme_template();

// Redux framework args.
$args = array(
    // TYPICAL -> Change these values as you need/desire
    'opt_name'             => $opt_name,
    // This is where your data is stored in the database and also becomes your global variable name.
    'display_name'         => $theme->get( 'Name' ),
    // Name that appears at the top of your panel
    'display_version'      => $theme->get( 'Version' ),
    // Version that appears at the top of your panel
    'menu_type'            => 'menu',
    // Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
    'allow_sub_menu'       => true,
    // Show the sections below the admin menu item or not
    'menu_title'           => esc_html__( 'Theme Options', 'urestaurant' ),
    'page_title'           => esc_html__( 'Theme Options', 'urestaurant' ),
    // You will need to generate a Google API key to use this feature.
    // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
    'google_api_key'       => '',
    // Set it you want google fonts to update weekly. A google_api_key value is required.
    'google_update_weekly' => false,
    // Must be defined to add google fonts to the typography module
    'async_typography'     => true,
    // Use a asynchronous font on the front end or font string
    // 'disable_google_fonts_link' => true,                    // Disable this in case you want to create your own google fonts loader
    'admin_bar'            => true,
    // Show the panel pages on the admin bar
    'admin_bar_icon'       => 'dashicons-portfolio',
    // Choose an icon for the admin bar menu
    'admin_bar_priority'   => 32,
    // Choose an priority for the admin bar menu
    'global_variable'      => '',
    // Set a different name for your global variable other than the opt_name
    'dev_mode'             => false,
    // Show the time the page took to load, etc
    'update_notice'        => false,
    // If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
    'customizer'           => true,
    // Enable basic customizer support
    // 'open_expanded'     => true,                    // Allow you to start the panel in an expanded way initially.
    // 'disable_save_warn' => true,                    // Disable the save warning when a user changes a field

    // OPTIONAL -> Give you extra features
    'page_priority'        => 56,
    // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
    'page_parent'          => 'themes.php',
    // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
    'page_permissions'     => 'manage_options',
    // Permissions needed to access the options panel.
    'menu_icon'            => '',
    // Specify a custom URL to an icon
    'last_tab'             => '',
    // Force your panel to always open to a specific tab (by id)
    'page_icon'            => 'icon-themes',
    // Icon displayed in the admin panel next to your menu_title
    'page_slug'            => 'urestaurant_options',
    // Page slug used to denote the panel
    'save_defaults'        => true,
    // On load save the defaults to DB before user clicks save or not
    'default_show'         => false,
    // If true, shows the default value next to each field that is not the default value.
    'default_mark'         => '',
    // What to print by the field's title if the value shown is default. Suggested: *
    'show_import_export'   => false,
    // Shows the Import/Export panel when not used as a field.

    // CAREFUL -> These options are for advanced use only
    'transient_time'       => 60 * MINUTE_IN_SECONDS,
    'output'               => true,
    // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
    'output_tag'           => true,
    // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
    // 'footer_credit'     => '',                   // Disable the footer credit of Redux. Please leave if you can help it.

    // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
    'database'             => '',
    // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!

    'use_cdn'              => true,
    // If you prefer not to use the CDN for Select2, Ace Editor, and others, you may download the Redux Vendor Support plugin yourself and run locally or embed it in your code.

    // 'compiler'             => true,

    // HINTS
    'hints'                => array(
        'icon'          => 'el el-question-sign',
        'icon_position' => 'right',
        'icon_color'    => 'lightgray',
        'icon_size'     => 'normal',
        'tip_style'     => array(
            'color'   => 'light',
            'shadow'  => true,
            'rounded' => false,
            'style'   => '',
        ),
        'tip_position'  => array(
            'my' => 'top left',
            'at' => 'bottom right',
        ),
        'tip_effect'    => array(
            'show' => array(
                'effect'   => 'slide',
                'duration' => '500',
                'event'    => 'mouseover',
            ),
            'hide' => array(
                'effect'   => 'slide',
                'duration' => '500',
                'event'    => 'click mouseleave',
            ),
        ),
    ),
);

/**
 * Set redux arguments
 * 
 * @since 1.0.0
 * @access public
 */
Redux::setArgs( $opt_name, $args );

/**
 * Set redux sections
 *
 * @since 1.0.0
 * @access public
 */

/*********************************
 *          General
 */
Redux::setSection(
    $opt_name,
    array(
        'title'            => esc_html__( 'General', 'urestaurant' ),
        'id'               => 'general',
        'customizer_width' => '400px',
        'desc'             => esc_html__( 'Theme General Options!', 'urestaurant' ),
        'icon'             => 'el el-home',
        'fields'           => array(
            array(
                'id'       => 'ultimate-restaurant-theme',
                'type'     => 'select',
                'title'    => esc_html__( 'Select Theme', 'urestaurant' ),
                // Must provide key => value pairs for select options
                'options'  => array(
                    'minimal'  => 'Minimal',
                    'bold'     => 'Bold',
                    'colorful' => 'Colorful',
                    'fancy'    => 'Fancy',
                ),
                'default'  => 'minimal',
            ),
        ),
    ) 
);

/*********************************
 *          HEADER
*/
Redux::setSection(
    $opt_name,
    array(
        'title'            => esc_html__( 'Header', 'urestaurant' ),
        'id'               => 'header',
        'customizer_width' => '500px',
    )
);

/*********************************
 *          LOGO - SUBSECTION
*/
Redux::setSection(
    $opt_name,
    array(
        'title'            => esc_html__( 'Logo', 'urestaurant' ),
        'id'               => 'logo',
        'customizer_width' => '400px',
        'subsection'       => true,
        'fields'           => array(
            array(
                'id'            => 'logo-max-width',
                'type'          => 'slider',
                'title'         => esc_html__( 'Logo Max Width(px)', 'urestaurant' ),
                'default'       => 300,
                'min'           => 20,
                'step'          => 10,
                'max'           => 440,
            ),
            array(
                'id'            => 'logo-max-height',
                'type'          => 'slider',
                'title'         => esc_html__( 'Logo Max Height(px)', 'urestaurant' ),
                'default'       => 65,
                'min'           => 10,
                'step'          => 5,
                'max'           => 140,
            ),
        ),
    )
);

/*********************************
 *          RESERVATION BUTTON - SUBSECTION
*/
Redux::setSection(
    $opt_name,
    array(
        'title'            => esc_html__( 'Reservation Button', 'urestaurant' ),
        'id'               => 'reservation-button',
        'customizer_width' => '400px',
        'subsection'       => true,
        'fields'           => array(
            array(
                'id'            => 'reservation-button-text',
                'type'          => 'text',
                'title'         => esc_html__( 'Reservation Button Text', 'urestaurant' ),
                'default'       => esc_html__( 'Reservation', 'urestaurant' ),
            ),
            array(
                'id'            => 'reservation-button-url',
                'type'          => 'text',
                'title'         => esc_html__( 'Reservation Button Link', 'urestaurant' ),
                'desc'          => esc_html__( 'Leave it empty to hide.', 'urestaurant' ),
                'default'       => '#',
            ),
        ),
    )
);

/*********************************
 *          SOCIAL ICONS
*/
Redux::setSection(
    $opt_name,
    array(
        'title'            => esc_html__( 'Social Icons', 'urestaurant' ),
        'id'               => 'social-icons',
        'customizer_width' => '400px',
        'fields'           => array(
            array(
                'id'       => 'facebook',
                'type'     => 'text',
                'title'    => esc_html__( 'Facebook', 'urestaurant' ),
                'default'  => '',
            ),
            array(
                'id'       => 'twitter',
                'type'     => 'text',
                'title'    => esc_html__( 'Twitter', 'urestaurant' ),
                'default'  => '',
            ),
            array(
                'id'       => 'instagram',
                'type'     => 'text',
                'title'    => esc_html__( 'Instagram', 'urestaurant' ),
                'default'  => '',
            ),
        ),
    )
);

/*********************************
 *          GOOGLE MAP
*/
Redux::setSection(
    $opt_name,
    array(
        'title'            => esc_html__( 'Google Map', 'urestaurant' ),
        'id'               => 'google-map',
        'customizer_width' => '400px',
        'fields'           => array(
            array(
                'id'            => 'google-map-api-key',
                'type'          => 'text',
                'title'         => esc_html__( 'API Key', 'urestaurant' ),
                'desc'          => esc_html__( 'Enter the google map api key.', 'urestaurant' ),
                'default'       => '',
            ),
        ),
    )
);

/*********************************
 *          Call To Action
*/
Redux::setSection(
    $opt_name,
    array(
        'title'            => esc_html__( 'Call To Action', 'urestaurant' ),
        'id'               => 'cta',
        'customizer_width' => '400px',
        'desc'             => esc_html__( 'Call to Action section displayed for all pages!', 'urestaurant' ),
        'fields'           => array(
            array(
                'id'       => 'start-time',
                'type'     => 'text',
                'title'    => esc_html__( 'Open/Start Time', 'urestaurant' ),
                'default'  => '10:00 AM',
            ),
            array(
                'id'       => 'end-time',
                'type'     => 'text',
                'title'    => esc_html__( 'End Time', 'urestaurant' ),
                'default'  => '10:00 PM',
            ),
            array(
                'id'       => 'large-group-txt',
                'type'     => 'text',
                'title'    => esc_html__( 'Large Group Reservation Text', 'urestaurant' ),
                'default'  => 'For reservation for large group, please contact us:',
            ),
            array(
                'id'       => 'phone',
                'type'     => 'text',
                'title'    => esc_html__( 'Phone', 'urestaurant' ),
                'default'  => '000-000-0000',
            ),
            array(
                'id'       => 'email',
                'type'     => 'text',
                'title'    => esc_html__( 'Email', 'urestaurant' ),
                'default'  => 'info@info.com',
            ),
            array(
                'id'                    => 'cta-background',
                'type'                  => 'background',
                'default'               => array( 
                    'background-image' => get_template_directory_uri() . "/assets/img/{$template_name}/call-to-action.png",
                ),
                'background-color'      => false,
                'background-repeat'     => false,
                'background-attachment' => false,
                'background-position'   => false,
                'background-size'       => false,
                'transparent'           => false,
                'preview_media'         => true,
                'preview'               => false,
                'output'                => 'section.cta_wrap',
                'preview_height'        => '200px',
                'title'                 => esc_html__( 'CTA Section Background', 'urestaurant' ),
                'subtitle'              => esc_html__( 'Uplaod the background image for Call to action section in all pages', 'urestaurant' ),
            ),
        ),
    )
);

/*********************************
 *          FOOTER
*/
Redux::setSection(
    $opt_name,
    array(
        'title'            => esc_html__( 'Footer', 'urestaurant' ),
        'id'               => 'footer',
        'customizer_width' => '400px',
        'fields'           => array(
            array(
                'id'       => 'show-social-icons',
                'type'     => 'checkbox',
                'title'    => esc_html__( 'Displays footer social icons', 'urestaurant' ),
                'default'  => '1',
            ),
        ),
    )
);

/**
 * Disable redux ads.
 *
 * @param object $redux The redux object.
 *
 * @since 1.0.0
 *
 * @return object $redux
 */
function urestaurant_redux_disable_ads( $redux ) {
    $redux->args['dev_mode'] = false;
}

add_action('redux/loaded', 'urestaurant_redux_disable_ads');

// Hide redux activation demo notice
remove_action('admin_notices', array( ReduxFrameworkPlugin::instance(), 'admin_notices' ));

// Remove connection banner.
remove_action('current_screen', array( Redux_Connection_Banner::init(), 'maybe_initialize_hooks' ));

// Hide plugin metalinks
remove_filter('plugin_row_meta', array( ReduxFrameworkPlugin::instance(), 'plugin_metalinks' ), null, 2);
