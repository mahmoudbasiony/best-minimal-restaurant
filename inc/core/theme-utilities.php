<?php
/**
 * Theme helper functions and utilities
 *
 * @package Ultimate_Restaurant
 * @author  PriceListo
 */

if (! function_exists('urestaurant_get_active_theme_template')) {
    /**
     * Get current active template name.
     *
     * @since 1.0.0
     *
     * @return string $active_template The active template name
     */
    function urestaurant_get_active_theme_template() {
        global $ultimate_restaurant_settings;

        $active_template = 'minimal';
    
        if (isset($ultimate_restaurant_settings) && isset($ultimate_restaurant_settings['ultimate-restaurant-theme']) && ! empty($ultimate_restaurant_settings['ultimate-restaurant-theme'])) {
            $active_template = $ultimate_restaurant_settings['ultimate-restaurant-theme'];
        }
    
        return esc_html(stripslashes($active_template));
    }
}

if (! function_exists('urestaurant_get_template_page_id')) {
    /**
     * Get template page ID by name.
     *
     * @param string $template_name The template name
     *
     * @since 1.0.0
     *
     * @return int|null $id
     */
    function urestaurant_get_template_page_id( $template_name ) {
        // Get pages.
        $pages = get_posts(
            array(
                'post_type'  => 'page',
                'meta_key'   => '_wp_page_template',
                'meta_value' => $template_name,
            )
        );

        $id = null;
        if (isset($pages[0])) {
            $id = $pages[0]->ID;
        }

        return $id;
    }
}

if (! function_exists('urestaurant_get_permalink_by_id')) {
    /**
     * Get page/post permalink by ID.
     *
     * @param int $id The page/post ID
     *
     * @since 1.0.0
     *
     * @return string $permalink
     */
    function urestaurant_get_permalink_by_id( $id ) {
        // Define permalink string.
        $permalink = '';

        // Validate page/post ID.
        if ($id) {
            $permalink = get_permalink($id);
        }

        return $permalink;
    }
}

if (! function_exists('urestaurant_insert_attachment')) {
    /**
     * Insert attachment to upload folder and return the attachment ID.
     *
     * @param string $path    The attachment path
     * @param int    $post_id The post ID - default = 0
     *
     * @since 1.0.0
     *
     * @return int $attachment_id
     */
    function urestaurant_insert_attachment( $path, $active_template = null, $post_id = 0 ) {
        global $wp_filesystem;
        // Initialize attachment ID variable.
        $attachment_id = null;

        $active_template = null === $active_template ? urestaurant_get_active_theme_template() : $active_template;
        $file_name = $active_template . '-' . basename($path);

        if (!is_a($wp_filesystem, 'WP_Filesystem_Base')) {
            include_once(ABSPATH . 'wp-admin/includes/file.php');
            $creds = request_filesystem_credentials( site_url() );
            wp_filesystem($creds);
        }

        $upload_file = wp_upload_bits($file_name, null, $wp_filesystem->get_contents($path));

        // If no error.
        if (! $upload_file['error']) {
            $file_type  = wp_check_filetype($file_name, null);
            $attachment = array(
                'post_mime_type' => $file_type['type'],
                'post_title'     => preg_replace('/\.[^.]+$/', '', $file_name),
                'post_content'   => '',
                'post_status'    => 'inherit',
            );

            $attachment_id = wp_insert_attachment($attachment, $upload_file['file'], $post_id);

            // Validate insert attachment.
            if (! is_wp_error($attachment_id)) {
                // Include admin image.php file
                include_once ABSPATH . 'wp-admin/includes/image.php';

                // Generate attachment metadata
                $attachment_data = wp_generate_attachment_metadata($attachment_id, $upload_file['file']);
                wp_update_attachment_metadata($attachment_id, $attachment_data);
            }
        }

        return $attachment_id;
    }
}

if (!function_exists('urestaurany_get_attachment_url_by_title')) {
    /**
     * Get the attachment url by post title.
     *
     * @param string $title The attachment post title.
     *
     * @since 1.0.0
     *
     * @return string The attachemnt url.
     */
    function urestaurany_get_attachment_url_by_title( $title ) {
        $args = array(
          'post_type' => 'attachment',
          'title' => sanitize_title($title),
          'posts_per_page' => 1,
          'post_status' => 'inherit',
        );
        $_header = get_posts( $args );
        $header = $_header ? array_pop($_header) : null;
        return $header ? wp_get_attachment_url($header->ID) : '';
      }
}

if (! function_exists('urestaurant_best_restaurant_plugin_view')) {
    /**
     * Get the template name compatable with Best Restaurant Plugin view mode.
     *
     * @since 1.0.0
     *
     * @return string $view
     */
    function urestaurant_best_restaurant_plugin_view() {
        $views = apply_filters(
            'urestaurant_best_restaurant_plugin_view',
            array(
                'minimal'  => 'minimalist',
                'fancy'    => 'fancy',
                'colorful' => 'colorful',
                'bold'     => 'bold',
            )
        );

        // Get the active template name.
        $active_template = urestaurant_get_active_theme_template();

        $view = isset($views[$active_template]) ? $views[$active_template] : '';
        return $view;
    }
}

if (! function_exists('urestaurant_get_demo_contact_form_7_id')) {
    /**
     * Get demo contact form 7 ID.
     *
     * @since 1.0.0
     *
     * @return int $form_id
     */
    function urestaurant_get_demo_contact_form_7_id() {
        $form_id = get_option('urestaurant_imported_demo_contact_form_7');

        return $form_id;
    }
}

if (! function_exists('urestaurant_get_demo_contact_form_7_shortcode')) {
    /**
     * Get demo contact form 7 Shortcode.
     *
     * @since 1.0.0
     *
     * @return string $shortcode
     */
    function urestaurant_get_demo_contact_form_7_shortcode() {
        $form_id = urestaurant_get_demo_contact_form_7_id();

        if ($form_id) {
            $shortcode = "[contact-form-7 id='{$form_id}' html_class='contact_form']";
        } else {
            $shortcode = '';
        }

        return $shortcode;
    }
}

if (! function_exists('urestaurant_get_google_map_api_key')) {
    /**
     * Get google map api key.
     *
     * @since 1.0.0
     *
     * @return string $api_key
     */
    function urestaurant_get_google_map_api_key() {
        global $ultimate_restaurant_settings;
        $api_key = null;

        if(isset($ultimate_restaurant_settings) && isset($ultimate_restaurant_settings['google-map-api-key'])) {
            $api_key = $ultimate_restaurant_settings['google-map-api-key'];
        }

        return $api_key;
    }
}