<?php
/**
 * Best Minimal Restaurant (Minimal template) Starter Content
 *
 * @link https://make.wordpress.org/core/2016/11/30/starter-content-for-themes-in-4-7/
 *
 * @package WordPress
 * @subpackage best-minimal-restaurant
 * @since 1.0.0
 */

/**
 * Function to return the array of starter content for the theme.
 *
 * Passes it through the `best_minimal_restaurant_starter_content` filter before returning.
 *
 * @since 1.0.0
 *
 * @return array A filtered array of args for the starter_content.
 */
function best_minimal_restaurant_get_starter_content() {

	// Define and register starter content to showcase the theme on new sites.
	$starter_content = array(

		'attachments' => array(
			'homepage_banner'          => array(
				'post_name'    => esc_html( 'best-minimal-homepage-banner' ),
				'post_title'   => esc_html__( 'Homepage banner', 'best-minimal-restaurant' ),
				'post_content' => esc_html__( 'Homepage banner image displayed in the hero section', 'best-minimal-restaurant' ),
				'file'         => 'assets/img/homepage-banner.png',
			),
			'homepage_about'           => array(
				'post_name'    => esc_html( 'best-minimal-homepage-about-background' ),
				'post_title'   => esc_html__( 'Homepage about background', 'best-minimal-restaurant' ),
				'post_content' => esc_html__( 'Homepage about section background image', 'best-minimal-restaurant' ),
				'file'         => 'assets/img/about-us.png',
			),
			'homepage_feature'         => array(
				'post_name'    => esc_html( 'best-minimal-homepage-feature-background' ),
				'post_title'   => esc_html__( 'Homepage feature background', 'best-minimal-restaurant' ),
				'post_content' => esc_html__( 'Homepage feature section background image', 'best-minimal-restaurant' ),
				'file'         => 'assets/img/feature-background.png',
			),
			'homepage_food_category_1' => array(
				'post_name'    => esc_html( 'best-minimal-homepage-food-cat-1' ),
				'post_title'   => esc_html__( 'Homepage food first category image', 'best-minimal-restaurant' ),
				'post_content' => esc_html__( 'Homepage first food category icon image', 'best-minimal-restaurant' ),
				'file'         => 'assets/img/icon_1.png',
			),
			'homepage_food_category_2' => array(
				'post_name'    => esc_html( 'best-minimal-homepage-food-cat-2' ),
				'post_title'   => esc_html__( 'Homepage food second category image', 'best-minimal-restaurant' ),
				'post_content' => esc_html__( 'Homepage second food category icon image', 'best-minimal-restaurant' ),
				'file'         => 'assets/img/icon_2.png',
			),
			'homepage_food_category_3' => array(
				'post_name'    => esc_html( 'best-minimal-homepage-food-cat-3' ),
				'post_title'   => esc_html__( 'Homepage food third category image', 'best-minimal-restaurant' ),
				'post_content' => esc_html__( 'Homepage third food category icon image', 'best-minimal-restaurant' ),
				'file'         => 'assets/img/icon_3.png',
			),
			'homepage_food_category_4' => array(
				'post_name'    => esc_html( 'best-minimal-homepage-food-cat-4' ),
				'post_title'   => esc_html__( 'Homepage food fourth category image', 'best-minimal-restaurant' ),
				'post_content' => esc_html__( 'Homepage fourth food category icon image', 'best-minimal-restaurant' ),
				'file'         => 'assets/img/icon_4.png',
			),
			'about_breadcrumb'         => array(
				'post_name'    => esc_html( 'best-minimal-aboutpage-breadcrumb-background' ),
				'post_title'   => esc_html__( 'About page breadcrumb background', 'best-minimal-restaurant' ),
				'post_content' => esc_html__( 'About page breadcrumb section background image', 'best-minimal-restaurant' ),
				'file'         => 'assets/img/breadcrumb-about.jpg',
			),
			'about_about_section'      => array(
				'post_name'    => esc_html( 'best-minimal-aboutpage-about-section' ),
				'post_title'   => esc_html__( 'About page about image', 'best-minimal-restaurant' ),
				'post_content' => esc_html__( 'About page about section image', 'best-minimal-restaurant' ),
				'file'         => 'assets/img/about-section.png',
			),
			'about_video'              => array(
				'post_name'    => esc_html( 'best-minimal-aboutpage-video-section' ),
				'post_title'   => esc_html__( 'About page video background', 'best-minimal-restaurant' ),
				'post_content' => esc_html__( 'About page video section background image', 'best-minimal-restaurant' ),
				'file'         => 'assets/img/video-background.jpg',
			),
			'about_about_2_section'    => array(
				'post_name'    => esc_html( 'best-minimal-aboutpage-about2-section' ),
				'post_title'   => esc_html__( 'About page about 2 image', 'best-minimal-restaurant' ),
				'post_content' => esc_html__( 'About page about 2 section image', 'best-minimal-restaurant' ),
				'file'         => 'assets/img/about-section-2.png',
			),
			'menu_breadcrumb'          => array(
				'post_name'    => esc_html( 'best-minimal-menupage-breadcrumb-background' ),
				'post_title'   => esc_html__( 'Menu page breadcrumb background', 'best-minimal-restaurant' ),
				'post_content' => esc_html__( 'Menu page breadcrumb section background image', 'best-minimal-restaurant' ),
				'file'         => 'assets/img/breadcrumb-menu.jpg',
			),
			'menu_section'             => array(
				'post_name'    => esc_html( 'best-minimal-menupage-menu-section' ),
				'post_title'   => esc_html__( 'Menu page menu image', 'best-minimal-restaurant' ),
				'post_content' => esc_html__( 'Menu page menu section image', 'best-minimal-restaurant' ),
				'file'         => 'assets/img/menu-section.jpg',
			),
			'location_breadcrumb'      => array(
				'post_name'    => esc_html( 'best-minimal-locationpage-breadcrumb-background' ),
				'post_title'   => esc_html__( 'Location page breadcrumb background', 'best-minimal-restaurant' ),
				'post_content' => esc_html__( 'Location page breadcrumb section background image', 'best-minimal-restaurant' ),
				'file'         => 'assets/img/breadcrumb.jpg',
			),
			'contact_breadcrumb'       => array(
				'post_name'    => esc_html( 'best-minimal-contactpage-breadcrumb-background' ),
				'post_title'   => esc_html__( 'Contact page breadcrumb background', 'best-minimal-restaurant' ),
				'post_content' => esc_html__( 'Contact page breadcrumb section background image', 'best-minimal-restaurant' ),
				'file'         => 'assets/img/breadcrumb.jpg',
			),
			'contact_info_phone'       => array(
				'post_name'    => esc_html( 'best-minimal-contactpage-contact-phone' ),
				'post_title'   => esc_html__( 'Contact info phone image', 'best-minimal-restaurant' ),
				'post_content' => esc_html__( 'Contact info phone icon image', 'best-minimal-restaurant' ),
				'file'         => 'assets/img/phone.png',
			),
			'contact_info_email'       => array(
				'post_name'    => esc_html( 'best-minimal-contactpage-contact-email' ),
				'post_title'   => esc_html__( 'Contact info email image', 'best-minimal-restaurant' ),
				'post_content' => esc_html__( 'Contact info email icon image', 'best-minimal-restaurant' ),
				'file'         => 'assets/img/mail.png',
			),
			'contact_info_location'    => array(
				'post_name'    => esc_html( 'best-minimal-contactpage-contact-location' ),
				'post_title'   => esc_html__( 'Contact info location map image', 'best-minimal-restaurant' ),
				'post_content' => esc_html__( 'Contact info location map icon image', 'best-minimal-restaurant' ),
				'file'         => 'assets/img/map.png',
			),
			'contact_contact_form'     => array(
				'post_name'    => esc_html( 'best-minimal-contactpage-contact-form-background' ),
				'post_title'   => esc_html__( 'Contact form section background', 'best-minimal-restaurant' ),
				'post_content' => esc_html__( 'Contact form section background image', 'best-minimal-restaurant' ),
				'file'         => 'assets/img/contact-form-section.png',
			),
		),

		// Specify the core-defined pages to create and add custom thumbnails to some of them.
		'posts'       => array(
			'front'    => array(
				'post_type'    => 'page',
				'post_title'   => esc_html_x( 'Home', 'Theme starter content', 'best-minimal-restaurant' ),
				'post_content' => '',
				'template'     => 'template-home.php',
			),
			'about'    => array(
				'post_type'    => 'page',
				'post_title'   => esc_html__( 'About', 'best-minimal-restaurant' ),
				'post_content' => '',
				'template'     => 'template-about.php',
			),
			'contact'  => array(
				'post_type'    => 'page',
				'post_title'   => esc_html__( 'Contact', 'best-minimal-restaurant' ),
				'post_content' => '',
				'template'     => 'template-contact.php',
			),
			'location' => array(
				'post_type'    => 'page',
				'post_title'   => esc_html__( 'Location', 'best-minimal-restaurant' ),
				'post_content' => '',
				'template'     => 'template-location.php',
			),
			'menu'     => array(
				'post_type'    => 'page',
				'post_title'   => esc_html__( 'Menu', 'best-minimal-restaurant' ),
				'post_content' => '',
				'template'     => 'template-menu.php',
			),
		),

		// Default to a static front page and assign the front and posts pages.
		'options'     => array(
			'show_on_front' => 'page',
			'page_on_front' => '{{front}}',
		),

		// Set up nav menus for each of the two areas registered in the theme.
		'nav_menus'   => array(
			// Assign a menu to the "primary" location.
			'best_minimal_restaurant_main_menu'   => array(
				'name'  => esc_html__( 'Primary menu', 'best-minimal-restaurant' ),
				'items' => array(
					'link_home', // Note that the core "home" page is actually a link in case a static front page is not used.
					'page_about',
					'page_menu'     => array(
						'type'      => 'post_type',
						'object'    => 'page',
						'object_id' => '{{menu}}',
					),
					'page_contact',
					'page_location' => array(
						'type'      => 'post_type',
						'object'    => 'page',
						'object_id' => '{{location}}',
					),
				),
			),

			// Assign a menu to the "footer" location.
			'best_minimal_restaurant_footer_menu' => array(
				'name'  => esc_html__( 'Footer menu', 'best-minimal-restaurant' ),
				'items' => array(
					'link_home', // Note that the core "home" page is actually a link in case a static front page is not used.
					'page_about',
					'page_menu'     => array(
						'type'      => 'post_type',
						'object'    => 'page',
						'object_id' => '{{menu}}',
					),
					'page_contact',
					'page_location' => array(
						'type'      => 'post_type',
						'object'    => 'page',
						'object_id' => '{{location}}',
					),
				),
			),
		),
	);

	/**
	 * Filters the array of starter content.
	 *
	 * @since Twenty Twenty-One 1.0
	 *
	 * @param array $starter_content Array of starter content.
	 */
	return apply_filters( 'best_minimal_restaurant_starter_content', $starter_content );
}
