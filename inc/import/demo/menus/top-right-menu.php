<?php
/**
 * Import top right menu - for bold theme template.
 *
 * @package Ultimate_Restaurant
 * @author  PriceListo
 */

// Get theme name.
$theme      = wp_get_theme();
$theme_name = $theme->get('Name');

// Define menu name and location.
$menu_name     = $theme_name . ' Top Right Menu';
$menu_location = 'urestaurant_top_right_menu';

// Does the menu exist already?
$menu_exists = wp_get_nav_menu_object($menu_name);

// If it doesn't exist, let's create it.
if (! $menu_exists) {
    $menu_id = wp_create_nav_menu($menu_name);

    /*
    * Initialize nav menu items array.
    */
    $nav_menu_items = apply_filters(
        'urestaurant_demo_top_right_menu_nav_items',
        array(
            'location' => array(
                'menu-item-title'     => 'Location',
                'menu-item-object'    => 'page',
                'menu-item-object-id' => urestaurant_get_template_page_id('page-location.php'),
                'menu-item-type'      => 'post_type',
                'menu-item-status'    => 'publish',
            ),
            'contact' => array(
                'menu-item-title'     => 'Contact',
                'menu-item-object'    => 'page',
                'menu-item-object-id' => urestaurant_get_template_page_id('page-contact.php'),
                'menu-item-type'      => 'post_type',
                'menu-item-status'    => 'publish',
            ),
        )
    );

    if ($menu_id && ! empty($nav_menu_items)) {
        foreach ($nav_menu_items as $item) {
            /*
            * Insert Nav menu items
            */
            wp_update_nav_menu_item($menu_id, 0, $item);
        }
    }

    /*
    * Grab the theme locations and assign our newly-created menu
    */
    if (! has_nav_menu($menu_location)) {
        // Get theme menu locations.
        $locations = get_nav_menu_locations();

        // Assign newly created menu to theme locations.
        $locations[$menu_location] = $menu_id;
        set_theme_mod('nav_menu_locations', $locations);
    }
}