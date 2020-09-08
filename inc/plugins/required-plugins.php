<?php
/**
 * Recommends plugins for use with the theme via the TGMA Script
 *
 * @package Ultimate_Restaurant
 * @author  PriceListo
 */

add_action( 'tgmpa_register', 'urestaurant_register_required_plugins' );

/**
 * Register the required plugins for this theme.
 *
 * @since 1.0.0
 */
function urestaurant_register_required_plugins() {
    /*
     * Array of plugin arrays. Required keys are name and slug.
     */
    $plugins = array(

        // ACF plugin - https://wordpress.org/plugins/advanced-custom-fields/
        array(
            'name'               => esc_html__( 'Advanced Custom Fields', 'urestaurant' ), // The plugin name.
            'slug'               => 'advanced-custom-fields', // The plugin slug (typically the folder name).
            'required'           => true, // If false, the plugin is only 'recommended' instead of required.
            'version'            => '5.9.0', // E.g. 1.0.0. If set, the active plugin must be this version or higher. If the plugin version is higher than the plugin version installed, the user will be notified to update the plugin.
            'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
            'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
            'is_callable'        => 'ACF',
        ),

        // Best Restaurant plugin - https://wordpress.org/plugins/best-restaurant-menu-by-pricelisto/
        array(
            'name'               => esc_html__( 'Best Restaurant Menu by PriceListo', 'urestaurant' ), // The plugin name.
            'slug'               => 'best-restaurant-menu-by-pricelisto', // The plugin slug (typically the folder name).
            'required'           => true, // If false, the plugin is only 'recommended' instead of required.
            'version'            => '1.2.0', // E.g. 1.0.0. If set, the active plugin must be this version or higher. If the plugin version is higher than the plugin version installed, the user will be notified to update the plugin.
            'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
            'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
        ),

        // Contact Form 7 - https://wordpress.org/plugins/contact-form-7/
        array(
            'name'               => esc_html__( 'Contact Form 7', 'urestaurant' ), // The plugin name.
            'slug'               => 'contact-form-7', // The plugin slug (typically the folder name).
            'required'           => true, // If false, the plugin is only 'recommended' instead of required.
            'version'            => '5.2.2', // E.g. 1.0.0. If set, the active plugin must be this version or higher. If the plugin version is higher than the plugin version installed, the user will be notified to update the plugin.
            'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
            'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
        ),

        // ReduxFramework - https://wordpress.org/plugins/redux-framework/
        array(
            'name'                  => esc_html__( 'Redux Framework', 'urestaurant' ),
            'slug'                  => 'redux-framework',
            'required'              => true,
            'version'               => '4.1.17',
            'force_activation'      => false,
            'force_deactivation'    => false,
        ),

    );

    /*
     * Array of configuration settings. Amend each line as needed.
     *
     * TGMPA will start providing localized text strings soon. If you already have translations of our standard
     * strings available, please help us make TGMPA even better by giving us access to these translations or by
     * sending in a pull-request with .po file(s) with the translations.
     *
     * Only uncomment the strings in the config array if you want to customize the strings.
     */
    $config = array(
        'id'           => 'urestaurant',           // Unique ID for hashing notices for multiple instances of TGMPA.
        'default_path' => '',                      // Default absolute path to bundled plugins.
        'menu'         => 'tgmpa-install-plugins', // Menu slug.
        'has_notices'  => true,                    // Show admin notices or not.
        'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
        'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
        'is_automatic' => true,                    // Automatically activate plugins after installation or not.
        'message'      => '',                      // Message to output right before the plugins table.
        'strings'      => array(
            'page_title'                      => esc_html__( 'Install Required Plugins', 'urestaurant' ),
            'menu_title'                      => esc_html__( 'Install Plugins', 'urestaurant' ),
            /* translators: %s: plugin name. */
            'installing'                      => esc_html__( 'Installing Plugin: %s', 'urestaurant' ),
            /* translators: %s: plugin name. */
            'updating'                        => esc_html__( 'Updating Plugin: %s', 'urestaurant' ),
            'oops'                            => esc_html__( 'Something went wrong with the plugin API.', 'urestaurant' ),
            'notice_can_install_required'     => _n_noop(
                /* translators: 1: plugin name(s). */
                'This theme requires the following plugin: %1$s.',
                'This theme requires the following plugins: %1$s.',
                'urestaurant'
            ),
            'notice_can_install_recommended'  => _n_noop(
                /* translators: 1: plugin name(s). */
                'This theme recommends the following plugin: %1$s.',
                'This theme recommends the following plugins: %1$s.',
                'urestaurant'
            ),
            'notice_ask_to_update'            => _n_noop(
                /* translators: 1: plugin name(s). */
                'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.',
                'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.',
                'urestaurant'
            ),
            'notice_ask_to_update_maybe'      => _n_noop(
                /* translators: 1: plugin name(s). */
                'There is an update available for: %1$s.',
                'There are updates available for the following plugins: %1$s.',
                'urestaurant'
            ),
            'notice_can_activate_required'    => _n_noop(
                /* translators: 1: plugin name(s). */
                'The following required plugin is currently inactive: %1$s.',
                'The following required plugins are currently inactive: %1$s.',
                'urestaurant'
            ),
            'notice_can_activate_recommended' => _n_noop(
                /* translators: 1: plugin name(s). */
                'The following recommended plugin is currently inactive: %1$s.',
                'The following recommended plugins are currently inactive: %1$s.',
                'urestaurant'
            ),
            'install_link'                    => _n_noop(
                'Begin installing plugin',
                'Begin installing plugins',
                'urestaurant'
            ),
            'update_link'                     => _n_noop(
                'Begin updating plugin',
                'Begin updating plugins',
                'urestaurant'
            ),
            'activate_link'                   => _n_noop(
                'Begin activating plugin',
                'Begin activating plugins',
                'urestaurant'
            ),
            'return'                          => esc_html__( 'Return to Required Plugins Installer', 'urestaurant' ),
            'plugin_activated'                => esc_html__( 'Plugin activated successfully.', 'urestaurant' ),
            'activated_successfully'          => esc_html__( 'The following plugin was activated successfully:', 'urestaurant' ),
            /* translators: 1: plugin name. */
            'plugin_already_active'           => esc_html__( 'No action taken. Plugin %1$s was already active.', 'urestaurant' ),
            /* translators: 1: plugin name. */
            'plugin_needs_higher_version'     => esc_html__( 'Plugin not activated. A higher version of %s is needed for this theme. Please update the plugin.', 'urestaurant' ),
            /* translators: 1: dashboard link. */
            'complete'                        => esc_html__( 'All plugins installed and activated successfully. %1$s', 'urestaurant' ),
            'dismiss'                         => esc_html__( 'Dismiss this notice', 'urestaurant' ),
            'notice_cannot_install_activate'  => esc_html__( 'There are one or more required or recommended plugins to install, update or activate.', 'urestaurant' ),
            'contact_admin'                   => esc_html__( 'Please contact the administrator of this site for help.', 'urestaurant' ),

            'nag_type'                        => '', // Determines admin notice type - can only be one of the typical WP notice classes, such as 'updated', 'update-nag', 'notice-warning', 'notice-info' or 'error'. Some of which may not work as expected in older WP versions.
        ),

    );

    tgmpa($plugins, $config);
}
