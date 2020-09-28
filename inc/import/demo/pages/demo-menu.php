<?php
/**
 * Import menu page demo.
 *
 * @package Ultimate_Restaurant
 * @author  PriceListo
 */

if (! function_exists('urestaurant_import_demo_menu_page')) :

    /**
     * Import menu demo page.
     *
     * @since 1.0.0
     *
     * @return void
     */
    function urestaurant_import_demo_menu_page() {
        // Get current active template name.
        $template_name = urestaurant_get_active_theme_template();

        // Post array
        $postarr = array(
            'post_title'   => 'Menu',
            'post_name'    => 'menu',
            'post_type'    => 'page',
            'post_parent'  => 0,
            'post_content' => '',
            'post_status'  => 'publish',
            'meta_input'   => array(
            '_wp_page_template' => 'page-menu.php',
            ),
        );

        $post_id = wp_insert_post($postarr);

        // Get menu demo default custom fields.
        $default_fields = urestaurant_get_menu_default_fields($template_name);

        /*
        * Update acf custom fields for the new demo page
        */
        foreach ($default_fields as $field_key => $field_value) {
            update_field($field_key, $field_value, $post_id);
        }
    }

endif;

/**
 * Get menu default custom fields.
 *
 * @param string $template_name The active tamplate name.
 *
 * @since 1.0.0
 *
 * @return void
 */
function urestaurant_get_menu_default_fields( $template_name ) {
    // Initialize custom_fields array.
    $custom_fields = array();

    // Register visible sections field.
    $custom_fields['field_menu5f1bdb0567911'] = apply_filters(
        'urestaurant_menu_demo_visible_sections',
        array(
            'breadcrumb',
            'menu',
        ) 
    );

    // Register Breadcrumb Background Image field.
    $custom_fields['field_menu5f1a0c59c3128'] = apply_filters('urestaurant_menu_demo_breadcrumb_background_image_id', urestaurant_insert_attachment(URESTAURANT_EXT_IMAGES_SOURCE . "{$template_name}/menu-breadcrumb.jpg"));

    // Register breadcrumb section heading field.
    $custom_fields['field_menu5f1a0c95c3129'] = apply_filters('urestaurant_menu_demo_breadcrumb_heading', __('Our Menu', 'urestaurant'));

    // Register Menu Section Background Image field.
    $custom_fields['field_menu5f1a0d7cc312d'] = apply_filters('urestaurant_menu_demo_menu_background_image_id', urestaurant_insert_attachment(URESTAURANT_EXT_IMAGES_SOURCE . "{$template_name}/menu-background.jpg"));

    // Register our menu section check menu title field.
    $custom_fields['field_menu5f1a0cedc312b'] = apply_filters('urestaurant_menu_demo_check_menu_title', __('Check Our Menu', 'urestaurant'));

    // Register menu section check menu description field.
    $custom_fields['field_menu5f1a0d51c312c'] = apply_filters('urestaurant_about_demo_check_menu_description', __('Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nullaDuis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nullaDuis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla', 'urestaurant'));

    /*
    * Register  menu section best menu shortcode field
    */
    $view                                     = esc_attr(urestaurant_best_restaurant_plugin_view());
    $custom_fields['field_menu5f1a0dc6c312e'] = apply_filters('urestaurant_menu_demo_best_menu_shortcode', "[brm_restaurant_menu view='{$view}']");

    return $custom_fields;
}
