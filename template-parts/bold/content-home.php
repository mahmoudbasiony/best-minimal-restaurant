<?php
/**
 * Template part for displaying page home content.
 *
 * @package Ultimate_Restaurant
 * @author  PriceListo
 */

/**
 * Get the visible sections on this template
 *
 * @var array
 */
$visible_sections = apply_filters( 'urestaurant_home_visible_sections', ( get_field( 'home-visible-sections' ) && is_array( get_field( 'home-visible-sections' ) ) ) ? get_field( 'home-visible-sections' ) : array() );
?>

<!-- Hero area Start -->
<?php if ( apply_filters( 'urestaurant_home_show_hero_section', in_array( 'hero', $visible_sections ) ) ) : ?>
    <section class="hero_wrap v3" style="background-image: url(<?php get_field( 'background-hero' ) ? esc_attr( the_field( 'background-hero' ) ) : ''; ?>);">
        <div class="overlay v3"></div>
        <div class="container">
            <div class="hero_text">
                <?php if ( get_field( 'heading-hero' ) ) : ?>
                    <h2 class="text_wh"><?php echo esc_html( get_field( 'heading-hero' ) ); ?></h2>
                <?php endif; ?>
                <?php if ( get_field( 'subheading-hero' ) ) : ?>
                    <p><?php echo esc_html( get_field( 'subheading-hero' ) ); ?></p>
                <?php endif; ?>
            </div>
        </div>
    </section>
<?php endif; ?>
<!-- Hero area End -->

<!-- About section starts -->
<?php if ( apply_filters( 'urestaurant_home_show_about_section', in_array( 'about', $visible_sections ) ) ) : ?>
    <section class="about_wrap v3">
        <div class="container">
            <div class="row align-items-start">
                <div class="col-lg-5 col-md-5">
                    <div class="about_img">
                        <div class="br_one v3"></div>
                        <img src="<?php get_field( 'about_image' ) ? esc_attr( the_field( 'about_image' ) ) : ''; ?>" alt="Image">
                    </div>
                </div>
                <div class="col-lg-6 offset-lg-1 col-md-7">
                    <div class="about_text">
                        <?php if ( get_field( 'title-about' ) ) : ?>
                            <h2 class="title"><?php esc_html( the_field( 'title-about' ) ); ?></h2>
                        <?php endif; ?>
                        <?php if ( get_field( 'content-about' ) ) : ?>
                            <?php esc_html( the_field( 'content-about' ) ); ?>
                        <?php endif; ?>
                        <?php if ( get_field( 'button-text-about' ) ) : ?>
                            <a href="<?php get_field( 'button-link-about' ) ? esc_attr( the_field( 'button-link-about' ) ) : ''; ?>" class="btn v5"><?php esc_html( the_field( 'button-text-about' ) ); ?></a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>
<!-- About section ends -->

<!-- Feature section starts -->
<?php if ( apply_filters( 'urestaurant_home_show_feature_section', in_array( 'feature', $visible_sections ) ) ) : ?>
    <section class="feature_wrap v3 bg_cl">
        <div class="zigzag_top v2"></div>
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-5 col-lg-6 col-md-6 col-12 order-xl-1 order-lg-1 order-md-1 order-2">
                    <div class="feature_text_wrap">
                        <div class="feature_text">
                            <?php if ( get_field( 'title-feature' ) ) : ?>
                                <h2 class="title"><?php esc_html( the_field( 'title-feature' ) ); ?></h2>
                            <?php endif; ?>
                            <?php if ( get_field( 'content-feature' ) ) : ?>
                                <p><?php esc_html( the_field( 'content-feature' ) ); ?></p>
                            <?php endif; ?>
                            <?php if ( get_field( 'button-text-feature' ) ) : ?>
                                <a href="<?php get_field( 'button-link-feature' ) ? esc_attr( the_field( 'button-link-feature' ) ) : ''; ?>" class="btn v6"><?php esc_html( the_field( 'button-text-feature' ) ); ?></a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 offset-xl-1 col-lg-6 col-md-6 col-12 order-xl-2 order-lg-2 order-md-2 order-1">
                    <div class="feature_img">
                        <img src="<?php get_field( 'background-feature' ) ? esc_attr( the_field( 'background-feature' ) ) : ''; ?>" alt="Image">
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>
<!-- Feature section ends -->

<!-- Offer section starts -->
<?php if ( apply_filters( 'urestaurant_home_show_offer_section', in_array( 'offer', $visible_sections ) ) ) : ?>
    <section class="offer_wrap v3">
        <div class="zigzag_top"></div>
        <div class="container">
            <div class="row">
                <div class="col-xl-8 offset-xl-2 col-lg-10 offset-lg-1">
                    <div class="offer_text">
                        <?php if ( get_field( 'title-offer' ) ) : ?>
                            <h2 class="title"><?php esc_html( the_field( 'title-offer' ) ); ?></h2>
                        <?php endif; ?>
                        <?php if ( get_field( 'content-offer' ) ) : ?>
                            <?php esc_html( the_field( 'content-offer' ) ); ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <?php
            $food_categories = get_field( 'food-categories' );

            if ( $food_categories ) :
                ?>
                <div class="row">
                    <?php for ( $i = 1; $i <= 4; $i++ ) : ?>
                        <?php 
                        if ( $food_categories[ "food-category-icon-{$i}" ] ) :
                            $icon = $food_categories[ "food-category-icon-{$i}" ]; 
                            ?>
                        <div class="col-lg-3 col-md-6 col-6">
                            <a href="<?php echo $food_categories[ "food-category-target-url-{$i}" ] ? esc_url( $food_categories[ "food-category-target-url-{$i}" ] ) : '#'; ?>" class="food_cat">
                                <img src="<?php echo esc_url( $icon['url'] ); ?>" alt="<?php echo esc_attr( $icon['alt'] ); ?>">

                                <?php if ( $food_categories[ "food-category-title-{$i}" ] ) : ?>
                                    <span><?php echo esc_html( $food_categories[ "food-category-title-{$i}" ] ); ?></span>
                                <?php endif; ?>
                            </a>
                        </div>
                        <?php endif; ?>
                    <?php endfor; ?>
                </div>
            <?php endif; ?>
        </div>
    </section>
<?php endif; ?>
<!-- Offer section ends -->