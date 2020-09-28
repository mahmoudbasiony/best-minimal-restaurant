<?php
/**
 * Import contact page demo.
 *
 * @package Ultimate_Restaurant
 * @author  PriceListo
 */

if (! function_exists('urestaurant_import_demo_contact_page')) {
    /**
     * Import contact demo page.
     *
     * @since 1.0.0
     *
     * @return void
     */
    function urestaurant_import_demo_contact_page() {
        // Get current active template name.
        $template_name = urestaurant_get_active_theme_template();

        // Post array
        $postarr = array(
            'post_title'   => 'Contact',
            'post_name'    => 'contact',
            'post_type'    => 'page',
            'post_parent'  => 0,
            'post_content' => '',
            'post_status'  => 'publish',
            'meta_input'   => array(
                '_wp_page_template' => 'page-contact.php',
            ),
        );

        $post_id = wp_insert_post($postarr);

        // Get contact demo default custom fields.
        $default_fields = urestaurant_get_contact_default_fields($template_name);

        /*
        * Update acf custom fields for the new demo page
        */
        foreach ($default_fields as $field_key => $field_value) {
            update_field($field_key, $field_value, $post_id);
        }
    }
}

/**
 * Get contact default custom fields.
 *
 * @param string $template_name The active tamplate name.
 *
 * @since 1.0.0
 *
 * @return void
 */
function urestaurant_get_contact_default_fields( $template_name ) {
    // Initialize custom_fields array.
    $custom_fields = array();

    // Register visible sections field.
    $custom_fields['field_contact5f1bd59e75b99'] = apply_filters(
        'urestaurant_contact_demo_visible_sections',
        array(
            'breadcrumb',
            'contact-info',
            'contact-form',
            'map',
        ) 
    );

    // Register Breadcrumb Background Image field.
    $custom_fields['field_contact5f1b27528a96d'] = apply_filters('urestaurant_contact_demo_breadcrumb_background_image_id', urestaurant_insert_attachment(URESTAURANT_EXT_IMAGES_SOURCE . "{$template_name}/contact-breadcrumb.jpg"));

    // Register breadcrumb section heading field.
    $custom_fields['field_contact5f1b277e8a96e'] = apply_filters('urestaurant_contact_demo_breadcrumb_heading', __('Contact us', 'urestaurant'));

    // Register contact info section title field.
    $custom_fields['field_contact5f1b28c98a970'] = apply_filters('urestaurant_contact_demo_contact_info_title', __('How To Reach Us', 'urestaurant'));

    // Register contact info section contact info group field.
    $custom_fields['field_contact5f1b2a98e3791'] = apply_filters(
        'urestaurant_contact_demo_offer_food_categories',
        array(
        'phone'          => apply_filters('urestaurant_contact_demo_phone_number', __('000-000-0000', 'urestaurant')),
        'phone-image'    => apply_filters('urestaurant_contact_demo_phone_image', urestaurant_insert_attachment(URESTAURANT_EXT_IMAGES_SOURCE . "{$template_name}/phone.png")),
        'email'          => apply_filters('urestaurant_contact_demo_email', __('info@info.com', 'urestaurant')),
        'email-image'    => apply_filters('urestaurant_contact_demo_email_image', urestaurant_insert_attachment(URESTAURANT_EXT_IMAGES_SOURCE . "{$template_name}/mail.png")),
        'location'       => apply_filters('urestaurant_contact_demo_location', __('Lorem ipsum dolor.', 'urestaurant')),
        'location-image' => apply_filters('urestaurant_contact_demo_location_image', urestaurant_insert_attachment(URESTAURANT_EXT_IMAGES_SOURCE . "{$template_name}/map.png")),
        ) 
    );


    // Register Contact form section Background Image field. For fancy and minimal templates.
    if ('fancy' === $template_name || 'minimal' === $template_name) {
        $custom_fields['field_contact5f1b5537168e5'] = apply_filters('urestaurant_contact_demo_contact_form_background_image_id', urestaurant_insert_attachment(URESTAURANT_EXT_IMAGES_SOURCE . "{$template_name}/contact-form-banner.png"));
    }

    // Register Contact form shortcode field.
    $custom_fields['field_contact5f1b5585168e6'] = apply_filters('urestaurant_contact_demo_contact_form_shortcode', urestaurant_get_demo_contact_form_7_shortcode());

    // Register Google Map section google map field.
    $custom_fields['field_contact5f1b5a114a1ce'] = apply_filters(
        'urestaurant_contact_demo_location_google_map',
        array(
            'address' => '123 Elm Street Los Angeles, CA 90210',
            'lat'     => '34.0689635',
            'lng'     => '-118.3950807',
            'zoom'    => 16,
        ) 
    );

    return $custom_fields;
}
