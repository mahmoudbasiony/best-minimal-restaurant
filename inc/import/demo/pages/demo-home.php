<?php
/**
 * Import home page demo.
 *
 * @package Ultimate_Restaurant
 */

if (! function_exists( 'urestaurant_import_demo_home_page' )) {
    /**
     * Import home demo page.
     *
     * @since 1.0.0
     *
     * @return void
     */
    function urestaurant_import_demo_home_page() {
        // Get current active template name.
        $template_name = urestaurant_get_active_theme_template();

        // Post array
        $postarr = array(
            'post_title'   => 'Home',
            'post_name'    => 'home',
            'post_type'    => 'page',
            'post_parent'  => 0,
            'post_content' => '',
            'post_status'  => 'publish',
            'meta_input'   => array(
                '_wp_page_template' => 'page-home.php',
            ),
        );

        $post_id = wp_insert_post( $postarr );

        // Get home demo default custom fields.
        $default_fields = urestaurant_get_home_default_fields( $template_name );

        /*
        * Update acf custom fields for the new demo page
        */
        foreach ($default_fields as $field_key => $field_value) {
            update_field($field_key, $field_value, $post_id);
        }

        // Set page as front page.
        urestaurant_set_front_page( $post_id );
    }
}

/**
 * Get home default custom fields.
 *
 * @param string $template_name The active tamplate name.
 *
 * @since 1.0.0
 *
 * @return void
 */
function urestaurant_get_home_default_fields( $template_name ) {
    // Initialize custom_fields array.
    $custom_fields = array();

    // Register visible sections field.
    $custom_fields['field_home5f1bbca489ad6'] = apply_filters(
        'urestaurant_home_demo_visible_sections',
        array(
            'hero',
            'about',
            'feature',
            'offer',
        ) 
    );

    // Register Hero Background Image field.
    $custom_fields['field_home5f18cf8d87b95'] = apply_filters( 'urestaurant_home_demo_hero_background_image_id', urestaurant_insert_attachment( URESTAURANT_EXT_IMAGES_SOURCE . "{$template_name}/home-banner.png" ) );

    // Register hero section heading field.
    $custom_fields['field_home5f18cfeb87b96'] = apply_filters( 'urestaurant_home_demo_hero_heading', __( 'We serve quality food', 'urestaurant' ) );

    // Register hero section sub heading field.
    $custom_fields['field_home5f18d00b87b97'] = apply_filters( 'urestaurant_home_demo_hero_subheading', __( 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s stan', 'urestaurant' ) );

    // Register about section background image.
    $custom_fields['field_home5f18d94435aee'] = apply_filters( 'urestaurant_home_demo_about_background_image_id', urestaurant_insert_attachment( URESTAURANT_EXT_IMAGES_SOURCE . "{$template_name}/about_us.png" ) );

    // Register about section title field.
    $custom_fields['field_home5f18d9be35aef'] = apply_filters( 'urestaurant_home_demo_about_title', __( 'Who we are', 'urestaurant' ) );

    // Register about section content field.
    $custom_fields['field_home5f18d9de35af0'] = apply_filters(
        'urestaurant_home_demo_about_content',
        sprintf(__(
            "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s stan %s
            dard dummy text ever since the 1500s,when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting.dard dummy text ever since the 1500s,when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting.dard dummy text ever since the 1500s,when an unknown printer took.",
            'urestaurant'
        ), "\n")
    );

    // Register about section subtitle and content field. for bold and fancy templates
     if ('bold' === $template_name || 'fancy' === $template_name) {
        $custom_fields['field_home5f4bc27e5f2a4'] = apply_filters( 'urestaurant_home_demo_about_subtitle', __( 'Lorem Ipsum is simply dummy text of the printing and type. Lorem Ipsum has been the industry\'s stan', 'urestaurant' ) );

        // Register about section content field.
        $custom_fields['field_home5f18d9de35af0'] = apply_filters(
            'urestaurant_home_demo_about_content',
            __(
                'dard dummy text ever since the 1500s,when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting.dard dummy text ever since the 1500s,when an unknown printer took a galley of type.',
                'urestaurant'
            )
        );
    }

    // Register about section button text field.
    $custom_fields['field_home5f18da4735af1'] = apply_filters( 'urestaurant_home_demo_about_button_text', __( 'Read More', 'urestaurant' ) );

    // Register about section button link field.
    $custom_fields['field_home5f18daa335af2'] = apply_filters( 'urestaurant_home_demo_about_button_link', urestaurant_get_permalink_by_id( urestaurant_get_template_page_id( 'page-about.php' ) ) );

    // Register feature section background image.
    $custom_fields['field_home5f18df062b5ae'] = apply_filters( 'urestaurant_home_demo_feature_background_image_id', urestaurant_insert_attachment( URESTAURANT_EXT_IMAGES_SOURCE . "{$template_name}/home-feature.png" ) );

    // Register feature section title field.
    $custom_fields['field_home5f18df472b5af'] = apply_filters( 'urestaurant_home_demo_feature_title', __( 'Our Food', 'urestaurant' ) );

    // Register feature section content field.
    $custom_fields['field_home5f18df622b5b0'] = apply_filters( 'urestaurant_home_demo_feature_content', __( 'dard dummy text ever since the 1500s,when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting.dard dummy text ever since the 1500s,when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, e the 1500s,', 'urestaurant' ) );

    // Register feature section button text field.
    $custom_fields['field_home5f18dfc42b5b1'] = apply_filters( 'urestaurant_home_demo_feature_button_text', __( 'See Menu', 'urestaurant' ) );

    // Register feature section button link field.
    $custom_fields['field_home5f18dfee2b5b2'] = apply_filters( 'urestaurant_home_demo_feature_button_link', urestaurant_get_permalink_by_id( urestaurant_get_template_page_id( 'page-menu.php' ) ) );

    // Register offer section title field.
    $custom_fields['field_home5f18eaa451fce'] = apply_filters( 'urestaurant_home_demo_offer_title', __( 'What We Offer', 'urestaurant' ) );

    // Register offer section content field.
    $custom_fields['field_home5f18eac451fcf'] = apply_filters( 'urestaurant_home_demo_offer_content', __( 'dard dummy text ever since the 1500s,when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting.dard dummy text ever since the 1500s,when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, e the 1500s,', 'urestaurant' ) );

    // Register offer section food categories group field.
    $custom_fields['field_home5f18eaf051fd0'] = apply_filters(
        'urestaurant_home_demo_offer_food_categories',
        array(
            'food-category-title-1'      => apply_filters( 'urestaurant_home_demo_food_category_1_title', __( 'Italian Cousine', 'urestaurant' ) ),
            'food-category-icon-1'       => apply_filters( 'urestaurant_home_demo_food_cat_1_image_id', urestaurant_insert_attachment( URESTAURANT_EXT_IMAGES_SOURCE . "{$template_name}/icon_1.png" ) ),
            'food-category-target-url-1' => apply_filters( 'urestaurant_home_demo_food_category_1_url', esc_url( '' ) ),
            'food-category-title-2'      => apply_filters( 'urestaurant_home_demo_food_category_2_title', __( 'Sea Food', 'urestaurant' ) ),
            'food-category-icon-2'       => apply_filters( 'urestaurant_home_demo_food_cat_2_image_id', urestaurant_insert_attachment( URESTAURANT_EXT_IMAGES_SOURCE . "{$template_name}/icon_2.png" ) ),
            'food-category-target-url-2' => apply_filters( 'urestaurant_home_demo_food_category_2_url', esc_url( '' ) ),
            'food-category-title-3'      => apply_filters( 'urestaurant_home_demo_food_category_3_title', __( 'Snacks', 'urestaurant' ) ),
            'food-category-icon-3'       => apply_filters( 'urestaurant_home_demo_food_cat_3_image_id', urestaurant_insert_attachment( URESTAURANT_EXT_IMAGES_SOURCE . "{$template_name}/icon_3.png" ) ),
            'food-category-target-url-3' => apply_filters( 'urestaurant_home_demo_food_category_3_url', esc_url( '' ) ),
            'food-category-title-4'      => apply_filters( 'urestaurant_home_demo_food_category_4_title', __( 'Continental Dish', 'urestaurant' ) ),
            'food-category-icon-4'       => apply_filters( 'urestaurant_home_demo_food_cat_4_image_id', urestaurant_insert_attachment( URESTAURANT_EXT_IMAGES_SOURCE . "{$template_name}/icon_4.png" ) ),
            'food-category-target-url-4' => apply_filters( 'urestaurant_home_demo_food_category_4_url', esc_url( '' ) ),
        ) 
    );

    return $custom_fields;
}

/**
 * Sets home page as a front page.
 *
 * @param int $page_id The page ID.
 *
 * @since 1.0.0
 *
 * @return void
 */
function urestaurant_set_front_page( $page_id ) {
    if ($page_id) {
        update_option( 'page_on_front', $page_id );
        update_option( 'show_on_front', 'page' );
    }
}
