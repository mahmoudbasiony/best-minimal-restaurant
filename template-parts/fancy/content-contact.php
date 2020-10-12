<?php
/**
 * Template part for displaying page contact content.
 *
 * @package Ultimate_Restaurant
 * @author  PriceListo
 */

/**
 * Get the active template name.
 *
 * @var string
 */
$template_name = urestaurant_get_active_theme_template();

/**
 * Get the visible sections on this template
 *
 * @var array
 */
$visible_sections = apply_filters( 'urestaurant_contact_visible_sections', ( get_field( 'contact-visible-sections' ) && is_array( get_field( 'contact-visible-sections' ) ) ) ? get_field( 'contact-visible-sections' ) : array() );
?>

<!-- Breadcrumb area Start -->
<?php if ( apply_filters( 'urestaurant_contact_show_breadcrumb_section', in_array( 'breadcrumb', $visible_sections ) ) ) : ?>
    <section class="breadcrumb_wrap v4" style="background-image: url(<?php get_field( 'background-breadcrump-contact' ) ? esc_url( the_field( 'background-breadcrump-contact' ) ) : ''; ?>);">
        <img src="<?php echo urestaurany_get_attachment_url_by_title("{$template_name}-shape_2"); ?>" alt="Image" class="abs_img_4">
        <div class="overlay v2"></div>
        <div class="container">
            <?php if ( get_field( 'heading-breadcrump-contact' ) ) : ?>
                <div class="breadcrumb_text">
                    <h3><?php esc_html( the_field( 'heading-breadcrump-contact' ) ); ?></h3>
                </div>
            <?php endif; ?>
        </div>
    </section>
<?php endif; ?>
<!-- Breadcrumb area End -->

<!-- Contact Info section starts -->
<?php if ( apply_filters( 'urestaurant_contact_show_contact_info_section', in_array( 'contact-info', $visible_sections ) ) ) : ?>
    <section class="contact_info_wrap">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <?php if ( get_field( 'contact-info-title' ) ) : ?>
                        <div class="contact_title">
                            <h2 class="title"><?php esc_html( the_field( 'contact-info-title' ) ); ?></h2>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="col-md-12">
                    <?php 
                    if ( get_field( 'contact-info' ) ) :
                        $contact_info = get_field( 'contact-info' );
                        ?>
                        <div class="contact_info_box_wrap">
                            <div class="contact_info_box">
                                <?php if ( $contact_info['phone-image'] ) : ?>
                                    <img src="<?php echo esc_url( $contact_info['phone-image']['url'] ); ?>" alt="<?php echo esc_attr( $contact_info['phone-image']['alt'] ); ?>">
                                <?php endif; ?>
                                <?php if ( $contact_info['phone'] ) : ?>
                                    <a href="tel:<?php echo esc_attr( str_replace( '-', '', $contact_info['phone'] ) ); ?>"><?php echo esc_html( $contact_info['phone'] ); ?></a>
                                <?php endif; ?>
                            </div>
                            <div class="contact_info_box">
                                <?php if ( $contact_info['email-image'] ) : ?>
                                    <img src="<?php echo esc_url( $contact_info['email-image']['url'] ); ?>" alt="<?php echo esc_attr( $contact_info['email-image']['alt'] ); ?>">
                                <?php endif; ?>
                                <?php if ( $contact_info['email'] ) : ?>
                                    <a href="mailto:<?php echo esc_url( $contact_info['email'] ); ?>"><?php echo esc_html( $contact_info['email'] ); ?></a>
                                <?php endif; ?>
                            </div>
                            <div class="contact_info_box">
                                <?php if ( $contact_info['location-image'] ) : ?>
                                    <img src="<?php echo esc_url( $contact_info['location-image']['url'] ); ?>" alt="<?php echo esc_attr( $contact_info['location-image']['alt'] ); ?>">
                                <?php endif; ?>
                                <?php if ( $contact_info['location'] ) : ?>
                                    <p><?php echo esc_html( $contact_info['location'] ); ?></p>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>
<!-- Contact Info section ends -->

<!-- Contact form starts -->
<?php if ( apply_filters( 'urestaurant_contact_show_contact_form_section', in_array( 'contact-form', $visible_sections ) ) ) : ?>
    <section class="contact_form_wrap" style="background-image: url(<?php get_field( 'contact-form-background' ) ? esc_url( the_field( 'contact-form-background' ) ) : ''; ?>);">
        <img src="<?php echo urestaurany_get_attachment_url_by_title("{$template_name}-shape_3"); ?>" alt="Image" class="abs_img_10">
        <img src="<?php echo urestaurany_get_attachment_url_by_title("{$template_name}-mail_shape"); ?>" alt="image" class="abs_img_3">
        <div class="overlay v1"></div>

        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="form_wrapper">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="contact_form_title">
                                    <h2 class="title"><?php esc_html_e( 'Contact us', 'urestaurant' ); ?></h2>
                                </div>
                            </div>
                            <?php if ( get_field( 'contact-form-shortcode' ) ) : ?>
                                <div class="col-xl-8 offset-xl-2 col-lg-10 offset-lg-1">
                                    <?php echo do_shortcode( get_field( 'contact-form-shortcode' ) ); ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>
<!-- Contact form ends -->

<!-- Google Map starts -->
<?php if ( apply_filters( 'urestaurant_contact_show_map_section', in_array( 'map', $visible_sections ) ) ) : ?>
    <section class="google_maps">
    <?php 
        $location = get_field( 'location-map' );

        if ( $location ) : 
        ?>
            <div class="acf-map" data-zoom="16">
                <div class="marker" data-lat="<?php echo esc_attr( $location['lat'] ); ?>" data-lng="<?php echo esc_attr( $location['lng'] ); ?>"></div>
            </div>
        <?php 
        endif;
    ?>
    </section>
<?php endif; ?>
<!-- Google Map ends -->