<?php
/**
 * Import location page demo.
 *
 * @package Ultimate_Restaurant
 * @author  PriceListo
 */

if (! function_exists('urestaurant_import_demo_location_page')) {
    /**
     * Import location demo page.
     *
     * @since 1.0.0
     *
     * @return void
     */
    function urestaurant_import_demo_location_page() {
        // Get current active template name.
        $template_name = urestaurant_get_active_theme_template();

        // Post array
        $postarr = array(
            'post_title'   => 'Location',
            'post_name'    => 'location',
            'post_type'    => 'page',
            'post_content' => '',
            'post_parent'  => 0,
            'post_status'  => 'publish',
            'meta_input'   => array(
                '_wp_page_template' => 'page-location.php',
            ),
        );

        $post_id = wp_insert_post($postarr);

        // Get location demo default custom fields.
        $default_fields = urestaurant_get_location_default_fields($template_name);

        /*
        * Update acf custom fields for the new demo page
        */
        foreach ($default_fields as $field_key => $field_value) {
            update_field($field_key, $field_value, $post_id);
        }
    }
}

/**
 * Get location default custom fields.
 *
 * @param string $template_name The active tamplate name.
 *
 * @since 1.0.0
 *
 * @return void
 */
function urestaurant_get_location_default_fields( $template_name ) {
    // Initialize custom_fields array.
    $custom_fields = array();

    // Register visible sections field.
    $custom_fields['field_location5f1bd80865fa8'] = apply_filters(
        'urestaurant_location_demo_visible_sections',
        array(
            'breadcrumb',
            'our-location',
        ) 
    );

    // Register Breadcrumb Background Image field.
    $custom_fields['field_location5f1a1c7680f7d'] = apply_filters('urestaurant_location_demo_breadcrumb_background_image_id', urestaurant_insert_attachment(URESTAURANT_EXT_IMAGES_SOURCE . "{$template_name}/location-breadcrumb.jpg"));

    // Register breadcrumb section heading field.
    $custom_fields['field_location5f1a1c9880f7e'] = apply_filters('urestaurant_location_demo_breadcrumb_heading', __('Location', 'urestaurant'));

    // Register our location section title field.
    $custom_fields['field_location5f1a1ceb80f80'] = apply_filters('urestaurant_location_demo_our_location_title', __('Our Location', 'urestaurant'));

    // Register our location section address field.
    $custom_fields['field_location5f1a1d2080f81'] = apply_filters(
        'urestaurant_location_demo_our_location_address',
        __('123 Elm Street Los Angeles, CA 90210', 'urestaurant')
    );

    // Register our location section google map field.
    $custom_fields['field_location5f1a1d7a80f82'] = apply_filters(
        'urestaurant_location_demo_our_location_google_map',
        array(
            'address' => '123 Elm Street Los Angeles, CA 90210',
            'lat'     => '34.0689635',
            'lng'     => '-118.3950807',
            'zoom'    => 16,
        ) 
    );

    return $custom_fields;
}
