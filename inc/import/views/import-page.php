<?php
/**
 * Template: Import demo page.
 *
 * @package Ultimate_Restaurant
 * @author  PriceListo
 */
?>

<div class="urestaurant_demo_page">
    <div class="urestaurant_demo_template_container">
        <p class="urestaurant__demo-template">
            <?php printf(__('Template %s is ready for importing, you can change it from %s', 'urestaurant'), '<span class="urestaurant__template-name">'. urestaurant_get_active_theme_template() .'</span>', '<a href="'. esc_url(admin_url('admin.php?page=urestaurant_options&tab=1')) .'">'. __('General Theme Options', 'urestaurant') .'</a>'); ?>
        </p>
    </div>

    <div>
        <p class="urestaurant__button-container">
            <button class="urestaurant__import-button button button-primary button-hero"><?php esc_html_e('Import Demo', 'urestaurant'); ?></button>
        </p>

        <p class="urestaurant__ajax-loader  js-urestaurant-ajax-loader">
            <span class="spinner"></span> <?php esc_html_e('Importing, please wait!', 'pt-urestaurant'); ?>
        </p>
    </div>

    <div class="urestaurant__response  js-urestaurant-ajax-response"></div>
</div>