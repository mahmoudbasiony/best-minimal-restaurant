<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Ultimate_Restaurant
 */

global $ultimate_restaurant_settings, $active_template;
?>
        <!-- Footer section starts -->
        <footer>
            <div class="footer_wrap <?php echo esc_attr( $active_template ); ?>">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="footer_menu">
                                <ul>
                                    <?php
                                    if ( has_nav_menu( 'urestaurant_footer_menu' ) ) {
                                        wp_nav_menu(
                                            array(
                                                'theme_location' => 'urestaurant_footer_menu',
                                                'container'      => false,
                                                'menu_class'     => '',
                                            )
                                        );
                                    }
                                    ?>
                                </ul>
                            </div>
                            <div class="copyright">

                                <p class="">&copy;
                                    <?php
                                    echo date_i18n(
                                        /* translators: Copyright date format, see https://www.php.net/date */
                                        _x( 'Y', 'copyright date format', 'urestaurant' )
                                    );
                                    ?>
                                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html( bloginfo( 'name' ) ); ?></a>
                                    <?php esc_html_e( ' | Powered by ', 'urestaurant' ); ?>
                                    <a href="<?php echo esc_url( 'https://www.pricelisto.com/', 'urestaurant' ); ?>">
                                        <?php esc_html_e( 'PriceListo', 'urestaurant' ); ?>
                                    </a>
                                </p><!-- .footer-copyright -->
                            </div>
                            <div class="social_profile">
                                <ul>
                                    <li><a href="<?php echo esc_url( $ultimate_restaurant_settings['facebook'] ); ?>"><i class="ion-social-facebook"></i></a></li>
                                    <li><a href="<?php echo esc_url( $ultimate_restaurant_settings['twitter'] ); ?>"><i class="ion-social-twitter"></i></a></li>
                                    <li><a href="<?php echo esc_url( $ultimate_restaurant_settings['instagram'] ); ?>"><i class="ion-social-instagram-outline"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- Footer section ends -->
    </div>
    <!--====== BACK TO TOP START ======-->
    <a href="#" class="back-to-top"><i class="ion-arrow-up-c"></i></a>
    <!--====== BACK TO TOP ENDS ======-->
    <?php wp_footer(); ?>
</body>

</html>
