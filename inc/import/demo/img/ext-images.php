<?php
/**
 * Import some external images demo.
 *
 * @package Ultimate_Restaurant
 * @author  PriceListo
 */

if (! function_exists('urestaurant_import_demo_external_images')) {
    /**
     * Import external images.
     *
     * @since 1.0.0
     *
     * @return void
     */
    function urestaurant_import_demo_external_images() {
        // Get current active template name.
        $template_name = urestaurant_get_active_theme_template();

        // Bold template images.
        urestaurant_insert_attachment(URESTAURANT_EXT_IMAGES_SOURCE . "bold/play.png", 'bold');
        urestaurant_insert_attachment(URESTAURANT_EXT_IMAGES_SOURCE . "bold/mail_shape.png", 'bold');
        urestaurant_insert_attachment(URESTAURANT_EXT_IMAGES_SOURCE . "bold/left_arrow.png", 'bold');
        urestaurant_insert_attachment(URESTAURANT_EXT_IMAGES_SOURCE . "bold/right_arrow.png", 'bold');
        urestaurant_insert_attachment(URESTAURANT_EXT_IMAGES_SOURCE . "bold/left_arrow_2.png", 'bold');
        urestaurant_insert_attachment(URESTAURANT_EXT_IMAGES_SOURCE . "bold/right_arrow_2.png", 'bold');

        // Colorful template images.
        urestaurant_insert_attachment(URESTAURANT_EXT_IMAGES_SOURCE . "colorful/play.png", 'colorful');
        urestaurant_insert_attachment(URESTAURANT_EXT_IMAGES_SOURCE . "colorful/mail_shape.png", 'colorful');
        urestaurant_insert_attachment(URESTAURANT_EXT_IMAGES_SOURCE . "colorful/shape_4.png", 'colorful');

        // Fancy template images.
        urestaurant_insert_attachment(URESTAURANT_EXT_IMAGES_SOURCE . "fancy/play.png", 'fancy');
        urestaurant_insert_attachment(URESTAURANT_EXT_IMAGES_SOURCE . "fancy/shape_2.png", 'fancy');
        urestaurant_insert_attachment(URESTAURANT_EXT_IMAGES_SOURCE . "fancy/shape_3.png", 'fancy');
        urestaurant_insert_attachment(URESTAURANT_EXT_IMAGES_SOURCE . "fancy/shape_4.png", 'fancy');
        urestaurant_insert_attachment(URESTAURANT_EXT_IMAGES_SOURCE . "fancy/mail_shape.png", 'fancy');
        urestaurant_insert_attachment(URESTAURANT_EXT_IMAGES_SOURCE . "fancy/bg_shape_1.png", 'fancy');

        // Minimal template images.
        urestaurant_insert_attachment(URESTAURANT_EXT_IMAGES_SOURCE . "minimal/play.png", 'minimal');
        urestaurant_insert_attachment(URESTAURANT_EXT_IMAGES_SOURCE . "minimal/mail_shape.png", 'minimal');
    }
}
