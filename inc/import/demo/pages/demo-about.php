<?php
/**
 * Import about page demo.
 *
 * @package Ultimate_Restaurant
 * @author  PriceListo
 */

if (! function_exists('urestaurant_import_demo_about_page')) {
    /**
     * Import about demo page.
     *
     * @since 1.0.0
     *
     * @return void
     */
    function urestaurant_import_demo_about_page() {
        // Get current active template name.
        $template_name = urestaurant_get_active_theme_template();

        // Post array
        $postarr = array(
            'post_title'   => 'About',
            'post_name'    => 'about',
            'post_type'    => 'page',
            'post_parent'  => 0,
            'post_content' => '',
            'post_status'  => 'publish',
            'meta_input'   => array(
                '_wp_page_template' => 'page-about.php',
            ),
        );

        $post_id = wp_insert_post($postarr);

        // Get about demo default custom fields.
        $default_fields = urestaurant_get_about_default_fields($template_name);

        /*
        * Update acf custom fields for the new demo page
        */
        foreach ($default_fields as $field_key => $field_value) {
            update_field($field_key, $field_value, $post_id);
        }
    }
}

/**
 * Get about default custom fields.
 *
 * @param string $template_name The template name.
 *
 * @since 1.0.0
 *
 * @return void
 */
function urestaurant_get_about_default_fields( $template_name ) {
    // Initialize custom_fields array.
    $custom_fields = array();

    // Register visible sections field.
    $custom_fields['field_about5f1bd00b1854a'] = apply_filters(
        'urestaurant_about_demo_visible_sections',
        array(
            'breadcrumb',
            'about',
            'video',
            'about2',
        ) 
    );

    // Register Breadcrumb Background Image field.
    $custom_fields['field_about5f19c223e535d'] = apply_filters('urestaurant_about_demo_breadcrumb_background_image_id', urestaurant_insert_attachment(URESTAURANT_THEME_DIR . "/assets/img/{$template_name}/about-breadcrumb.jpg"));

    // Register breadcrumb section heading field.
    $custom_fields['field_about5f19c267e535e'] = apply_filters('urestaurant_about_demo_breadcrumb_heading', esc_html__('About best restaurants', 'urestaurant'));

    // Register about section background image.
    $custom_fields['field_about5f19c2a6e5360'] = apply_filters('urestaurant_about_demo_about_background_image_id', urestaurant_insert_attachment(URESTAURANT_THEME_DIR . "/assets/img/{$template_name}/about-section.png"));

    // Register about section title field.
    $custom_fields['field_about5f19e39ae5361'] = apply_filters('urestaurant_about_demo_about_title', esc_html__('About best restaurants', 'urestaurant'));

    // Register about section subtitle. For bold, colorful and fancy templates.
    if ('bold' === $template_name || 'colorful' === $template_name || 'fancy' === $template_name) {
        $custom_fields['field_about5f4979537be66'] = apply_filters('urestaurant_about_demo_about_subtitle', esc_html__('Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s stan', 'urestaurant'));
    }

    // Register about section content field.
    $custom_fields['field_about5f19e3cee5362'] = apply_filters(
        'urestaurant_about_demo_about_content',
        __(
            'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s stan
        dard dummy text ever since the 1500s,when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting.dard dummy text ever since the 1500s,when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting.dard dummy text ever since the 1500s,when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting.dard dummy text ever since the 1500s,when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting.dard dummy text ever since the 1500s,ever since the 1500s,when an unknown printer took a galley of type and scrambled it to make a type specimen book.',
            'urestaurant' 
        )
    );

    // ٍRegister video section promo video title and content. For bold and fancy templates.
    if ('bold' === $template_name || 'fancy' === $template_name) {
        // Promo title.
        $custom_fields['field_about5f497c5bcd95b'] = apply_filters('urestaurant_about_demo_video_title', esc_html__('Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s stan', 'urestaurant'));

        // Promo content.
        $custom_fields['field_about5f497ec8fa1e7'] = apply_filters('urestaurant_about_demo_video_content', esc_html__('dard dummy text ever since the 1500s,when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting.dard dummy text ever since the 1500s,when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting.dard dummy text ever since the 1500s,when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting.dard dummy text ever since the 1500s,when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries,', 'urestaurant'));
    }

    // Register video section background image.
    $custom_fields['field_about5f19e86ce5365'] = apply_filters('urestaurant_about_demo_video_background_image_id', urestaurant_insert_attachment(URESTAURANT_THEME_DIR . "/assets/img/{$template_name}/about-video.jpg"));

    // Register video section promo video oembed field.
    $custom_fields['field_about5f19e434e5364'] = apply_filters('urestaurant_about_demo_promo_video_oembed', 'https://www.youtube.com/watch?v=AC9EfT-y9e4');

    /*
    * About 2 section. Only for minimal and colorful template.
    */
    if ('minimal' === $template_name || 'colorful' === $template_name) {
        // Register about2 section title field.
        $custom_fields['field_about5f1a0975acc17'] = apply_filters('urestaurant_about_demo_about2_title', esc_html__('Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s stan', 'urestaurant'));

        // Register about2 section content field.
        $custom_fields['field_about5f1a099eacc18'] = apply_filters('urestaurant_about_demo_about2_content', esc_html__('dard dummy text ever since the 1500s,when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting.dard dummy text ever since the 1500s,when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting.dard dummy text ever since the 1500s,when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting.dard dummy text ever since the 1500s,when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting.dard dummy text ever since the 1500s,ever since the 1500s,when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 'urestaurant'));

        // Register about2 section background image.
        $custom_fields['field_about5f1a0964acc16'] = apply_filters('urestaurant_about_demo_about2_background_image_id', urestaurant_insert_attachment(URESTAURANT_THEME_DIR . "/assets/img/{$template_name}/about2-section.png"));
    }

    return $custom_fields;
}
