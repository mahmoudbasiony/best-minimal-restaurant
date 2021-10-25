<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Ultimate_Restaurant
 * @author  PriceListo
 */

get_header();
?>

    <main id="primary" class="site-main">
        <section class="latest_post_wrap v1"></section>

        <div id="primary site-content" class="content-area">
            <?php
            if ( have_posts() ) :

                /* Start the Loop */
                while ( have_posts() ) :

                    the_post();
                    get_template_part( 'template-parts/content'  );
                endwhile;

                // Previous/next page navigation.
	            urestaurant_the_posts_navigation();
            else :

                get_template_part( 'template-parts/content', 'none' );

            endif;
            ?>
        </div>

    </main><!-- #main -->

<?php

get_footer();
