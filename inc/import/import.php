<?php
/**
 * Import default/demo
 *
 * @package Ultimate_restaurant
 * @author  PriceListo
 */

$imported_pages = apply_filters('urestaurant_imported_demo_pages', get_option('urestaurant_imported_demo_pages', array()));
$imported_menus = apply_filters('urestaurant_imported_demo_menus', get_option('urestaurant_imported_demo_menus', array()));

/*
 * Validate activated required plugins.
 */
if (! URESTAURANT_ACF_ACTIVE || ! URESTAURANT_CONTACT_FORM_7_ACTIVE || ! URESTAURANT_REDUX_ACTIVE || ! URESTAURANT_BEST_RESTAURANT_ACTIVE) {
    // ACF plugin and/or Contact form 7 are required plugins.
    $result['status']  = 500;
    $result['message'] = sprintf(__('Some plugins are required, please install or activate them from %s', 'urestaurant'), '<a href="'. esc_url(admin_url('themes.php?page=tgmpa-install-plugins')) .'">' . __('here', 'urestaurant') . '</a>');

    // Send response and die;
    wp_send_json($result);
}

/*
 * Import Home page demo.
 */
if (! in_array('home', $imported_pages)) {
    array_push($imported_pages, 'home');

    include_once URESTAURANT_INC_DIR . 'import/demo/pages/demo-home.php';
    // Import home page function call.
    urestaurant_import_demo_home_page();

    // Adds home page to imported pages option.
    update_option('urestaurant_imported_demo_pages', $imported_pages);
}

/*
 * Import About page demo.
 */
if (! in_array('about', $imported_pages)) {
    array_push($imported_pages, 'about');

    include_once URESTAURANT_INC_DIR . 'import/demo/pages/demo-about.php';
    // Import about page function call.
    urestaurant_import_demo_about_page();

    // Adds about page to imported pages option.
    update_option('urestaurant_imported_demo_pages', $imported_pages);
}

/*
 * Import Location page demo.
 */
if (! in_array('location', $imported_pages)) {
    array_push($imported_pages, 'location');

    include_once URESTAURANT_INC_DIR . 'import/demo/pages/demo-location.php';
    // Import location page function call.
    urestaurant_import_demo_location_page();

    // Adds location page to imported pages option.
    update_option('urestaurant_imported_demo_pages', $imported_pages);
}

/*
 * Import Menu page demo.
 */
if (! in_array('menu', $imported_pages)) {
    array_push($imported_pages, 'menu');

    include_once URESTAURANT_INC_DIR . 'import/demo/pages/demo-menu.php';
    // Import menu page function call.
    urestaurant_import_demo_menu_page();

    // Adds menu page to imported pages option.
    update_option('urestaurant_imported_demo_pages', $imported_pages);
}

/*
 * Import ext images.
 */
include_once URESTAURANT_INC_DIR . 'import/demo/img/ext-images.php';
urestaurant_import_demo_external_images();

/*
 * Import demo contact form 7.
 */
require_once ABSPATH . 'wp-admin/includes/post.php';
if (URESTAURANT_CONTACT_FORM_7_ACTIVE && ! post_exists('Restaurant Contact Form', '', '', 'wpcf7_contact_form')) {
    include_once URESTAURANT_INC_DIR . 'import/demo/contact-form-7/contact-form-template.php';
    include_once URESTAURANT_INC_DIR . 'import/demo/contact-form-7/contact-form.php';
}

/*
 * Import Contact page demo.
 */
if (! in_array('contact', $imported_pages)) {
    array_push($imported_pages, 'contact');

    include_once URESTAURANT_INC_DIR . 'import/demo/pages/demo-contact.php';
    // Import contact page function call.
    urestaurant_import_demo_contact_page();

    // Adds contact page to imported pages option.
    update_option('urestaurant_imported_demo_pages', $imported_pages);
}

/*
 * Validate pages exist.
 */
if (function_exists('urestaurant_get_template_page_id')  
    && urestaurant_get_template_page_id('page-home.php')  
    && urestaurant_get_template_page_id('page-about.php')  
    && urestaurant_get_template_page_id('page-contact.php')  
    && urestaurant_get_template_page_id('page-menu.php')  
    && urestaurant_get_template_page_id('page-location.php') 
) {
    /*
    * Import Menus.
    */
    include_once URESTAURANT_INC_DIR . 'import/demo/menus/main-menu.php';
    include_once URESTAURANT_INC_DIR . 'import/demo/menus/footer-menu.php';
    include_once URESTAURANT_INC_DIR . 'import/demo/menus/top-right-menu.php';
    include_once URESTAURANT_INC_DIR . 'import/demo/menus/top-left-menu.php';
}

/*
 * Adds is imported demo option.
 */
update_option('urestaurant_is_demo_imported', 'yes');