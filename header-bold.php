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

global $active_template;
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
        <header class="header-bar-area  v3">
            <div class="zigzag_bottom"></div>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <nav class="navbar navbar-expand-md">
                            <div class="navbar-collapse collapse w-100 order-1 order-md-0 dual-collapse2">
                                <?php
                                if ( has_nav_menu( 'urestaurant_top_left_menu' ) ) {
                                    wp_nav_menu(
                                        array(
                                            'theme_location' => 'urestaurant_top_left_menu',
                                            'container'  => false,
                                            'menu_class' => 'navbar-nav mr-auto',
                                        ) 
                                    );
                                }
                                ?>
                            </div>
            
                            <div class="menu_wrapper order-0">
                                <?php if ( has_custom_logo() ) : ?>
                                    <?php the_custom_logo(); ?>
                                <?php else : ?>
                                    <a class="navbar-brand mx-auto" href="<?php bloginfo( 'url' ); ?>">
                                        <h1><?php bloginfo( 'name' ); ?></h1>
                                    </a>
                                <?php endif; ?>
                                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".dual-collapse2">
                                    <span class="navbar-toggler-icon"><i class="ion-android-menu"></i></span>
                                </button>
                            </div>

                            <div class="navbar-collapse collapse w-100 order-3 dual-collapse2">
                                <?php
                                if ( has_nav_menu( 'urestaurant_top_right_menu' ) ) {
                                    wp_nav_menu(
                                        array(
                                            'theme_location' => 'urestaurant_top_right_menu',
                                            'container'  => false,
                                            'menu_class' => 'navbar-nav ml-auto',
                                        ) 
                                    );
                                }
                                ?>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </header>
        <!-- Header bar area End -->