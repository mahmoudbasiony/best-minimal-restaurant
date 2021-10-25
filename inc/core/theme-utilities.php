<?php
/**
 * Theme helper functions and utilities
 *
 * @package Best_Minimal_Restaurant
 * @author  PriceListo
 */

if ( ! function_exists( 'best_minimal_restaurant_get_active_theme_template' ) ) {
	/**
	 * Get current active template name.
	 *
	 * @since 1.0.0
	 *
	 * @return string $active_template The active template name
	 */
	function best_minimal_restaurant_get_active_theme_template() {
		return esc_html( apply_filters( 'best_minimal_restaurant_active_theme_template', 'minimal' ) );
	}
}

if ( ! function_exists( 'best_minimal_restaurant_get_template_page_id' ) ) {
	/**
	 * Get template page ID by name.
	 *
	 * @param string $template_name The template name.
	 *
	 * @since 1.0.0
	 *
	 * @return int|null $id
	 */
	function best_minimal_restaurant_get_template_page_id( $template_name ) {
		// Get pages.
		$pages = get_posts(
			array(
				'post_type'  => 'page',
				'meta_key'   => '_wp_page_template',
				'meta_value' => $template_name,
			)
		);

		$id = null;
		if ( isset( $pages[0] ) ) {
			$id = $pages[0]->ID;
		}

		return $id;
	}
}

if ( ! function_exists( 'best_minimal_restaurant_get_permalink_by_id' ) ) {
	/**
	 * Get page/post permalink by ID.
	 *
	 * @param int $id The page/post ID.
	 *
	 * @since 1.0.0
	 *
	 * @return string $permalink
	 */
	function best_minimal_restaurant_get_permalink_by_id( $id ) {
		// Define permalink string.
		$permalink = '';

		// Validate page/post ID.
		if ( $id ) {
			$permalink = get_permalink( $id );
		}

		return $permalink;
	}
}

if ( ! function_exists( 'urestaurany_get_attachment_url_by_title' ) ) {
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
		$args    = array(
			'post_type'      => 'attachment',
			'title'          => sanitize_title( $title ),
			'posts_per_page' => 1,
			'post_status'    => 'inherit',
		);
		$_header = get_posts( $args );
		$header  = $_header ? array_pop( $_header ) : null;
		return $header ? wp_get_attachment_url( $header->ID ) : '';
	}
}

if ( ! function_exists( 'urestaurany_get_attachment_id_by_name' ) ) {
	/**
	 * Get the attachment ID by post name.
	 *
	 * @param string $name The attachment post name.
	 *
	 * @since 1.0.0
	 *
	 * @return int|string The attachemnt ID or empty string if not found.
	 */
	function urestaurany_get_attachment_id_by_name( $name ) {
		$args       = array(
			'post_type'      => 'attachment',
			'name'           => sanitize_title( $name ),
			'posts_per_page' => 1,
			'post_status'    => 'inherit',
		);
		$_header    = get_posts( $args );
		$attachment = $_header ? array_pop( $_header ) : null;
		return $attachment ? (int) $attachment->ID : '';
	}
}

if ( ! function_exists( 'best_minimal_restaurant_best_restaurant_plugin_view' ) ) {
	/**
	 * Get the template name compatable with Best Restaurant Plugin view mode.
	 *
	 * @since 1.0.0
	 *
	 * @return string $view
	 */
	function best_minimal_restaurant_best_restaurant_plugin_view() {
		$views = apply_filters(
			'best_minimal_restaurant_best_restaurant_plugin_view',
			array(
				'minimal'  => 'minimalist',
				'fancy'    => 'fancy',
				'colorful' => 'colorful',
				'bold'     => 'bold',
			)
		);

		// Get the active template name.
		$active_template = best_minimal_restaurant_get_active_theme_template();

		$view = isset( $views[ $active_template ] ) ? $views[ $active_template ] : '';
		return $view;
	}
}

if ( ! function_exists( 'best_minimal_restaurant_get_demo_contact_form_7_id' ) ) {
	/**
	 * Get demo contact form 7 ID.
	 *
	 * @since 1.0.0
	 *
	 * @return int $form_id
	 */
	function best_minimal_restaurant_get_demo_contact_form_7_id() {
		$form_id = get_option( 'best_minimal_restaurant_imported_demo_contact_form_7' );

		return $form_id;
	}
}

if ( ! function_exists( 'best_minimal_restaurant_get_demo_contact_form_7_shortcode' ) ) {
	/**
	 * Get demo contact form 7 Shortcode.
	 *
	 * @since 1.0.0
	 *
	 * @return string $shortcode
	 */
	function best_minimal_restaurant_get_demo_contact_form_7_shortcode() {
		$form_id = best_minimal_restaurant_get_demo_contact_form_7_id();

		if ( $form_id ) {
			$shortcode = "[contact-form-7 id='{$form_id}' html_class='contact_form']";
		} else {
			$shortcode = '';
		}

		return $shortcode;
	}
}

if ( ! function_exists( 'best_minimal_restaurant_get_google_map_api_key' ) ) {
	/**
	 * Get google map api key.
	 *
	 * @since 1.0.0
	 *
	 * @return string $api_key
	 */
	function best_minimal_restaurant_get_google_map_api_key() {
		global $best_minimal_restaurant_settings;
		$api_key = null;

		if ( isset( $best_minimal_restaurant_settings ) && isset( $best_minimal_restaurant_settings['google-map-api-key'] ) ) {
			$api_key = $best_minimal_restaurant_settings['google-map-api-key'];
		}

		return $api_key;
	}
}
