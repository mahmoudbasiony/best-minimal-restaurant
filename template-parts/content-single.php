<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Best_Minimal_Restaurant
 * @author  PriceListo
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="entry-header alignwide">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
		<?php best_minimal_restaurant_post_thumbnail(); ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
		the_content();

		wp_link_pages(
			array(
				'before'   => '<nav class="page-links" aria-label="' . esc_attr__( 'Page', 'best-minimal-restaurant' ) . '">',
				'after'    => '</nav>',
				/* translators: %: Page number. */
				'pagelink' => esc_html__( 'Page %', 'best-minimal-restaurant' ),
			)
		);
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer default-max-width">
		<?php best_minimal_restaurant_entry_meta_footer(); ?>

		<?php if ( ! is_singular( 'attachment' ) && post_type_supports( get_post_type( get_the_ID() ), 'author' ) ) : ?>
			<?php get_template_part( 'template-parts/entry-author-bio' ); ?>
		<?php endif; ?>
	</footer><!-- .entry-footer -->


</article><!-- #post-<?php the_ID(); ?> -->
