<?php
/**
 * Import top left menu - for bold theme template.
 *
 * @package Ultimate_Restaurant
 * @author  PriceListo
 */

// Get theme name.
$theme      = wp_get_theme();
$theme_name = $theme->get('Name');

// Define menu name and location.
$menu_name     = $theme_name . ' Top Left Menu';
$menu_location = 'urestaurant_top_left_menu';

// Does the menu exist already?
$menu_exists = wp_get_nav_menu_object($menu_name);

// If it doesn't exist, let's create it.
if (! $menu_exists) {
    $menu_id = wp_create_nav_menu($menu_name);

    /*
    * Initialize nav menu items array.
    */
    $nav_menu_items = apply_filters(
        'urestaurant_demo_top_left_menu_nav_items',
        array(
            'home' => array(
                'menu-item-title'     => 'Home',
                'menu-item-object'    => 'page',
                'menu-item-object-id' => urestaurant_get_template_page_id('page-home.php'),
                'menu-item-type'      => 'post_type',
                'menu-item-status'    => 'publish',
            ),
            'about' => array(
                'menu-item-title'     => 'About',
                'menu-item-object'    => 'page',
                'menu-item-object-id' => urestaurant_get_template_page_id('page-about.php'),
                'menu-item-type'      => 'post_type',
                'menu-item-status'    => 'publish',
            ),
            'menu' => array(
                'menu-item-title'     => 'Menu',
                'menu-item-object'    => 'page',
                'menu-item-object-id' => urestaurant_get_template_page_id('page-menu.php'),
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
