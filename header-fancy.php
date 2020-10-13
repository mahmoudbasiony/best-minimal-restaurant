<?php
/**
 * The header for Bold theme Template
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Ultimate_Restaurant
 * @author  PriceListo
 */

global $ultimate_restaurant_settings, $active_template;
$active_template = urestaurant_get_active_theme_template();
?>

<!doctype html>
<html <?php language_attributes(); ?>>
<head>

    <!--====== Required meta tags ======-->
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Restaurant Template">
    <meta name="keywords" content="Restaurant,food">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="profile" href="https://gmpg.org/xfn/11">

    <!--====== Title ======-->
    <title><?php wp_title( '' ); ?></title>

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <!-- Preloader Start -->
    <div class="proloader">
        <div class="loader_34">
            <!-- Preloader Elements -->
            <div class="ytp-spinner">
                <div class="ytp-spinner-container">
                    <div class="ytp-spinner-rotator">
                        <!-- Preloader Container Left Begin -->
                        <div class="ytp-spinner-left">
                            <!-- Preloader Body Left -->
                            <div class="ytp-spinner-circle"></div>
                        </div>
                        <!-- Preloader Container Left End -->
                        <!-- Preloader Container Right Begin -->
                        <div class="ytp-spinner-right">
                            <!-- Preloader Body Right -->
                            <div class="ytp-spinner-circle"></div>
                        </div>
                        <!-- Preloader Container Right End -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Preloader End -->
    <div class="page_wrapper">
        <!-- Header  Start -->
        <header class="header-bar-area w-100  v4">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-5 col-8">
                        <div class="logo">
                            <?php if (has_custom_logo()) : ?>
                                <?php the_custom_logo(); ?>
                            <?php else : ?>
                                <h1>
                                    <a class="text_ph" href="<?php echo esc_url(home_url()); ?>">
                                        <?php esc_html(bloginfo('name')); ?>
                                    </a>
                                </h1>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-7 col-4">
                        <div class="site-navbar">
                            <nav class="site-navigation">
                                <?php
                                if (has_nav_menu( 'urestaurant_main_menu' )) {
                                    wp_nav_menu(
                                        array(
                                            'theme_location' => 'urestaurant_main_menu',
                                            'container'  => false,
                                            'menu_class' => 'site-menu js-clone-nav d-none d-lg-block',
                                        ) 
                                    );
                                }
                                ?>
                            </nav>
                            <div class="d-lg-none sm-right">
                                <a href="#" class="mobile-bar js-menu-toggle">
                                    <i class="ion-android-menu"></i>
                                </a>
                            </div>
                            <!--mobile-menu starts -->
                            <div class="site-mobile-menu">
                                <div class="site-mobile-menu-header">
                                    <div class="site-mobile-menu-close  js-menu-toggle">
                                        <i class="ion-ios-close-empty"></i>
                                    </div>
                                </div>
                                <?php if(isset($ultimate_restaurant_settings) && isset($ultimate_restaurant_settings['reservation-button-url']) && !empty($ultimate_restaurant_settings['reservation-button-url'])) : ?>
                                    <div class="site-mobile-menu-body">
                                        <div class="header_btn">
                                            <a href="<?php echo esc_url($ultimate_restaurant_settings['reservation-button-url']); ?>" class="btn v4"><?php echo esc_html($ultimate_restaurant_settings['reservation-button-text']); ?></a>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <!--mobile-menu ends-->
                            <?php if(isset($ultimate_restaurant_settings) && isset($ultimate_restaurant_settings['reservation-button-url']) && !empty($ultimate_restaurant_settings['reservation-button-url'])) : ?>
                                <div class="header_btn md-none">
                                    <a href="<?php echo esc_url($ultimate_restaurant_settings['reservation-button-url']); ?>" class="btn v4"><?php echo esc_html($ultimate_restaurant_settings['reservation-button-text']); ?></a>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Header bar area End -->