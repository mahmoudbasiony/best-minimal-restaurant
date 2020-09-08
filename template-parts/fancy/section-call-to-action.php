<?php
/**
 * Template part for displaying a cta in custom templates pages.
 *
 * @global array $ultimate_restaurant_settings.
 *
 * @package Ultimate_Restaurant
 * @author  PriceListo
 */

global $ultimate_restaurant_settings;

/**
 * Get the active template name.
 *
 * @var string
 */
$template_name = urestaurant_get_active_theme_template();
?>

<section class="cta_wrap v4" style="background-image: url(<?php echo esc_url( $ultimate_restaurant_settings['cta-background']['background-image'] ); ?>);">
    <img src="<?php echo esc_attr( URESTAURANT_THEME_URI ); ?>/assets/img/<?php echo esc_html( $template_name ); ?>/shape_3.png" alt="Image" class="abs_img_8">
    <img src="<?php echo esc_attr( URESTAURANT_THEME_URI ); ?>/assets/img/<?php echo esc_html( $template_name ); ?>/shape_4.png" alt="Image" class="abs_img_9">
    <div class="overlay v1"></div>
    <div class="container">
        <img src="<?php echo esc_attr( URESTAURANT_THEME_URI ); ?>/assets/img/<?php echo esc_html( $template_name ); ?>/bg_shape_1.png" alt="Image" class="abs_img_6">
        <div class="row">
            <div class="col-xl-7 col-lg-6  col-md-7">
                <div class="cta_info_box">
                    <div class="cta_info_wrap">
                        <?php if ( isset( $ultimate_restaurant_settings['start-time'] ) && isset( $ultimate_restaurant_settings['end-time'] ) ) : ?>
                            <div class="cta_info">
                                <h4><?php _e( 'Open', 'urestaurant' ); ?>:</h4>
                                <span><?php esc_html_e( $ultimate_restaurant_settings['start-time'], 'urestaurant' ); ?> - <?php esc_html_e( $ultimate_restaurant_settings['end-time'], 'urestaurant' ); ?></span>
                            </div>
                        <?php endif; ?>
                        <?php if ( isset( $ultimate_restaurant_settings['large-group-txt'] ) && ! empty( $ultimate_restaurant_settings['large-group-txt'] ) ) : ?>
                            <p><?php esc_html_e( $ultimate_restaurant_settings['large-group-txt'] ); ?></p>
                        <?php endif; ?>
                        <?php if ( isset( $ultimate_restaurant_settings['phone'] ) && ! empty( $ultimate_restaurant_settings['phone'] ) ) : ?>
                            <div class="cta_info">
                                <h4><?php _e( 'Phone', 'urestaurant' ); ?>:</h4>
                                <a href="tel:<?php echo esc_attr( $ultimate_restaurant_settings['phone'] ); ?>"><?php esc_html_e( $ultimate_restaurant_settings['phone'] ); ?></a>
                            </div>
                        <?php endif; ?>
                        <?php if ( isset( $ultimate_restaurant_settings['email'] ) && ! empty( $ultimate_restaurant_settings['email'] ) ) : ?>
                            <div class="cta_info">
                                <h4><?php _e( 'Email', 'urestaurant' ); ?>:</h4>
                                <a href="mailto:<?php echo esc_attr( $ultimate_restaurant_settings['email'] ); ?>"><?php esc_html_e( $ultimate_restaurant_settings['email'] ); ?></a>
                            </div>
                        <?php endif; ?>
                        <button type="submit" class="btn v3">make reservation</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
