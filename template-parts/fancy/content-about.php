<?php
/**
 * Template part for displaying page about content.
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
$visible_sections = apply_filters( 'urestaurant_about_visible_sections', ( get_field( 'about-visible-sections' ) && is_array( get_field( 'about-visible-sections' ) ) ) ? get_field( 'about-visible-sections' ) : array() );
?>

<!-- Breadcrumb area Start -->
<?php if ( apply_filters( 'urestaurant_about_show_breadcrumb_section', in_array( 'breadcrumb', $visible_sections ) ) ) : ?>
    <section class="breadcrumb_wrap V4" style="background-image: url(<?php get_field( 'background-breadcrump' ) ? esc_url( the_field( 'background-breadcrump' ) ) : ''; ?>);">
        <img src="<?php echo urestaurany_get_attachment_url_by_title("{$template_name}-shape_2"); ?>" alt="Image" class="abs_img_4">
        <div class="overlay v1"></div>
        <div class="container">
            <?php if ( get_field( 'heading-breadcrump' ) ) : ?>
                <div class="breadcrumb_text">
                    <h3><?php esc_html( the_field( 'heading-breadcrump' ) ); ?></h3>
                </div>
            <?php endif; ?>
        </div>
    </section>
<?php endif; ?>
<!-- Breadcrumb area End -->

<!-- About section starts -->
<?php if ( apply_filters( 'urestaurant_about_show_about_section', in_array( 'about', $visible_sections ) ) ) : ?>
    <section class="about_wrap v4 style1">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6  col-md-12 order-lg-1 order-md-2 order-2">
                    <div class="about_text">
                        <?php if ( get_field( 'about-title' ) ) : ?>
                            <h2 class="title"><?php esc_html( the_field( 'about-title' ) ); ?></h2>
                        <?php endif; ?>
                        <?php if ( get_field( 'about-subtitle' ) ) : ?>
                            <h4><?php esc_html( the_field( 'about-subtitle' ) ); ?></h4>
                        <?php endif; ?>
                        <?php if ( get_field( 'about-content' ) ) : ?>
                            <?php esc_html( the_field( 'about-content' ) ); ?>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 order-lg-2 order-md-1 order-1">
                    <?php if ( get_field( 'about-image' ) ) : $image = get_field( 'about-image' ); ?>
                        <div class="about_img">
                            <img src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ); ?>">
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>
<!-- About section ends -->

<!-- Promo Video section starts -->
<?php if ( apply_filters( 'urestaurant_about_show_video_section', in_array( 'video', $visible_sections ) ) ) : ?>
    <section class="promo_video_wrap v3 bg_cl">
        <div class="zigzag_top v2"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <?php if ( get_field( 'about-promo-title' ) ) : ?>
                        <div class="promo_title">
                            <h2><?php esc_html( the_field( 'about-promo-title' ) ); ?></h2>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="col-md-12">
                    <div class="promo_video" style="background-image: url(<?php get_field( 'video-background-image' ) ? esc_url( the_field( 'video-background-image' ) ) : ''; ?>);">
                        <div class="overlay v2"></div>
                        <div class="video_btn">
                            <?php if ( get_field( 'about-promo-video' ) ) :
                                $url = get_field( 'about-promo-video', FALSE, FALSE );
                            ?>
                                <a href="<?php echo esc_url( $url ); ?>" class="play_btn hvr-ripple-out"><img src="<?php echo urestaurany_get_attachment_url_by_title("{$template_name}-play"); ?>" alt="Image"></a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <?php if ( get_field( 'about-promo-content' ) ) : ?>
                        <div class="promo_text">
                            <?php esc_html( the_field( 'about-promo-content' ) ); ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>
<!-- Promo Video section ends -->
