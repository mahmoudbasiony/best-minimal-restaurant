<?php
/**
 * Import demo contact form 7.
 *
 * @package Ultimate_Restaurant
 * @author  PriceListo
 */

$props = apply_filters(
    'urestaurant_contact_form_7_properties',
    array(
        'form'                => urestaurant_get_demo_form(),
        'mail'                => urestaurant_get_demo_mail(),
        'mail_2'              => urestaurant_get_demo_mail_2(),
        'messages'            => urestaurant_get_demo_messages(),
        'additional_settings' => '',
    )
);

$post_content = function_exists('wpcf7_array_flatten') ? implode("\n", wpcf7_array_flatten($props)) : '';

/*
 * Insert contact form post.
 */
$post_id = wp_insert_post(
    array(
        'post_type'    => 'wpcf7_contact_form',
        'post_status'  => 'publish',
        'post_title'   => apply_filters('urestaurant_contact_form_7_title', __('Restaurant Contact Form', 'urestaurant')),
        'post_content' => trim($post_content),
    )
);

/*
 * Insert contact form post meta.
 */
if ($post_id) {
    foreach ($props as $prop => $value) {
        if (function_exists('wpcf7_normalize_newline_deep')) {
            update_post_meta(
                $post_id,
                '_' . $prop,
                wpcf7_normalize_newline_deep($value) 
            );
        }
    }

    // wpcf7_contact_form( $post_id );
    update_option('urestaurant_imported_demo_contact_form_7', apply_filters('urestaurant_imported_contact_form_7_id', $post_id));

    /**
     * Fires after demo contact contact form post insertion.
     *
     * @param int $post_id The contact form 7 post ID.
     */
    do_action('urestaurant_after_insert_demo_contact_form', $post_id);
}
