<?php
/**
 * Theme functions and definitions.
 *
 * Sets up the theme and provides some helper functions
 *
 * When using a child theme (see http://codex.wordpress.org/Theme_Development
 * and http://codex.wordpress.org/Child_Themes), you can override certain
 * functions (those wrapped in a function_exists() call) by defining them first
 * in your child theme's functions.php file. The child theme's functions.php
 * file is included before the parent theme's file, so the child theme
 * functions would be used.
 *
 *
 * For more information on hooks, actions, and filters,
 * see http://codex.wordpress.org/Plugin_API
 *
 * @package Best_Minimal_Restaurant
 * @author  PriceListo
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Core Constants.
define( 'BMR_MINIMAL_THEME_DIR', get_template_directory() );
define( 'BMR_MINIMAL_THEME_URI', get_template_directory_uri() );

// Theme version.
define( 'BMR_MINIMAL_THEME_VERSION', '1.0.0' );

// Javascript and CSS Paths.
define( 'BMR_MINIMAL_JS_DIR_URI', BMR_MINIMAL_THEME_URI . '/assets/js/' );
define( 'BMR_MINIMAL_CSS_DIR_URI', BMR_MINIMAL_THEME_URI . '/assets/css/' );

// Images folder path.
define( 'BMR_MINIMAL_IMAGES_DIR_URI', BMR_MINIMAL_THEME_URI . '/assets/img/' );

// Include Paths.
define( 'BMR_MINIMAL_INC_DIR', BMR_MINIMAL_THEME_DIR . '/inc/' );
define( 'BMR_MINIMAL_INC_DIR_URI', BMR_MINIMAL_THEME_URI . '/inc/' );

// Check If Plugins Are Active.
define( 'BMR_MINIMAL_REDUX_ACTIVE', class_exists( 'ReduxFrameworkPlugin' ) );
define( 'BMR_MINIMAL_ACF_ACTIVE', class_exists( 'ACF' ) );
define( 'BMR_MINIMAL_BEST_RESTAURANT_ACTIVE', class_exists( 'Best_Restaurant_Menu' ) );
define( 'BMR_MINIMAL_CONTACT_FORM_7_ACTIVE', class_exists( 'WPCF7' ) );


if ( ! function_exists( 'best_minimal_restaurant_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	function best_minimal_restaurant_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Best Minimal Restaurant, use a find and replace
		 * to change 'best-minimal-restaurant' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'best-minimal-restaurant', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// Register navigation menus.
		register_nav_menus(
			array(
				'best_minimal_restaurant_main_menu'   => esc_html__( 'Main Menu', 'best-minimal-restaurant' ),
				'best_minimal_restaurant_footer_menu' => esc_html__( 'Footer Menu', 'best-minimal-restaurant' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'best_minimal_restaurant_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/*
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		$logo_width  = 300;
		$logo_height = 100;

		add_theme_support(
			'custom-logo',
			array(
				'height'               => $logo_height,
				'width'                => $logo_width,
				'flex-width'           => true,
				'flex-height'          => true,
				'unlink-homepage-logo' => true,
			)
		);

		/*
		* Adds starter content to highlight the theme on fresh sites.
		* This is done conditionally to avoid loading the starter content on every
		* page load, as it is a one-off operation only needed once in the customizer.
		*/
		if ( is_customize_preview() ) {
			require BMR_MINIMAL_INC_DIR . 'starter-content.php';
			add_theme_support( 'starter-content', best_minimal_restaurant_get_starter_content() );
		}
	}
endif;

add_action( 'after_setup_theme', 'best_minimal_restaurant_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @since 1.0.0
 *
 * @global int $content_width Content width.
 *
 * @return void
 */
function best_minimal_restaurant_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'best_minimal_restaurant_content_width', 1200 );
}
add_action( 'after_setup_theme', 'best_minimal_restaurant_content_width', 0 );

/**
 * Register widget area.
 *
 * @since 1.0.0
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function best_minimal_restaurant_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'best-minimal-restaurant' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'best-minimal-restaurant' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'best_minimal_restaurant_widgets_init' );

/**
 * Enqueue editor styles.
 *
 * @since 1.0.0
 *
 * @return void
 */
function best_minimal_restaurant_editor_styles() {
	add_editor_style();
}
add_action( 'init', 'best_minimal_restaurant_editor_styles' );

/*
 * Helper functions.
 */
require BMR_MINIMAL_INC_DIR . 'core/theme-utilities.php';

/*
 * Enqueue scripts and styles.
 */
require BMR_MINIMAL_INC_DIR . 'core/theme-scripts.php';

/*
 * Custom template tags for this theme.
 */
require BMR_MINIMAL_INC_DIR . 'template-tags.php';

/*
 * Functions which enhance the theme by hooking into WordPress.
 */
require BMR_MINIMAL_INC_DIR . 'template-functions.php';

/*
 * Required and recommended plugins.
 */
require_once BMR_MINIMAL_INC_DIR . 'plugins/class-tgm-plugin-activation.php';
require_once BMR_MINIMAL_INC_DIR . 'plugins/required-plugins.php';

/*
 * Theme options powered by redux framework.
 */
require_once BMR_MINIMAL_INC_DIR . 'framework/theme-options.php';

/*
 * ACF for templates custom fields
 */
require_once BMR_MINIMAL_INC_DIR . 'acf/home.php';
require_once BMR_MINIMAL_INC_DIR . 'acf/about.php';
require_once BMR_MINIMAL_INC_DIR . 'acf/menu.php';
require_once BMR_MINIMAL_INC_DIR . 'acf/location.php';
require_once BMR_MINIMAL_INC_DIR . 'acf/contact.php';


/**
 * Register google map api key for ACF
 *
 * @param array $api The API array.
 *
 * @since 1.0.0
 *
 * @return array $api
 */
function best_minimal_restaurant_google_map_api( $api ) {
	// Get google maps api key.
	$google_map_api_key = best_minimal_restaurant_get_google_map_api_key();

	if ( isset( $google_map_api_key ) ) {
		// Set the google map api key for acf map.
		$api['key'] = $google_map_api_key;
	}

	return $api;
}

add_filter( 'acf/fields/google_map/api', 'best_minimal_restaurant_google_map_api' );
