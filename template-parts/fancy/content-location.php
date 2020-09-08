<?php
/**
 * Template part for displaying page location content.
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
$visible_sections = apply_filters( 'urestaurant_location_visible_sections', ( get_field( 'location-visible-sections' ) && is_array( get_field( 'location-visible-sections' ) ) ) ? get_field( 'location-visible-sections' ) : array() );
?>

<!-- Breadcrumb area Start -->
<?php if ( apply_filters( 'urestaurant_location_show_breadcrumb_section', in_array( 'breadcrumb', $visible_sections ) ) ) : ?>
    <section class="breadcrumb_wrap v4" style="background-image: url(<?php get_field( 'background-breadcrump-location' ) ? esc_url( the_field( 'background-breadcrump-location' ) ) : ''; ?>);">
        <img src="<?php echo URESTAURANT_THEME_URI ?>/assets/img/<?php echo esc_html( $template_name ); ?>/shape_2.png" alt="Image" class="abs_img_4">
        <div class="overlay v1"></div>
        <div class="container">
            <?php if ( get_field( 'heading-breadcrump-location' ) ) : ?>
                <div class="breadcrumb_text">
                    <h3><?php esc_html( the_field( 'heading-breadcrump-location' ) ); ?></h3>
                </div>
            <?php endif; ?>
        </div>
    </section>
<?php endif; ?>
<!-- Breadcrumb area End -->

<?php if ( apply_filters( 'urestaurant_location_show_location_section', in_array( 'our-location', $visible_sections ) ) ) : ?>
    <!-- Contact Info section starts -->
    <section class="contact_info_wrap">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="map_title">
                        <?php if ( get_field( 'our-location-title' ) ) : ?>
                            <h2 class="title"><?php esc_html( the_field( 'our-location-title' ) ); ?></h2>
                        <?php endif; ?>
                        <?php if ( get_field( 'location-address' ) ) : ?>
                            <p><?php esc_html( the_field( 'location-address' ) ); ?></p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact Info section ends -->

    <!-- Google Map starts -->
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
    <!-- Google Map ends -->
<?php endif; ?>