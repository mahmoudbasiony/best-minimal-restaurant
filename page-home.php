<?php
/**
 * Template Name: Home Page Template
 *
 * @package Ultimate_Restaurant
 * @author  PriceListo
 */
?>

    <!---- Header ---->
    <?php urestaurant_get_header(); ?>

    <main id="primary" class="site-main">

        <?php
            // Home page template parts.
            get_template_part( "template-parts/{$active_template}/content", "home" );

            // CTA section.
            if ( apply_filters( 'urestaurant_home_show_cta_section', true ) ) :
                get_template_part( "template-parts/{$active_template}/section", "call-to-action" );
            endif;

            // If comments are open or we have at least one comment, load up the comment template.
            if ( comments_open() || get_comments_number() ) :
                comments_template();
            endif;

        ?>

    </main>

    <!---- Footer ---->
    <?php get_footer(); ?>
