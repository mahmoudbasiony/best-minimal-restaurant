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
 * @package Ultimate_Restaurant
 * @author  PriceListo
 */

// Exit if accessed directly.
if (! defined('ABSPATH') ) {
    exit;
}

// Core Constants.
define('URESTAURANT_THEME_DIR', get_template_directory());
define('URESTAURANT_THEME_URI', get_template_directory_uri());

// Theme version.
define('URESTAURANT_THEME_VERSION', '1.0.0');

// Javascript and CSS Paths.
define('URESTAURANT_JS_DIR_URI', URESTAURANT_THEME_URI . '/assets/js/');
define('URESTAURANT_CSS_DIR_URI', URESTAURANT_THEME_URI . '/assets/css/');

// Include Paths.
define('URESTAURANT_INC_DIR', URESTAURANT_THEME_DIR . '/inc/');
define('URESTAURANT_INC_DIR_URI', URESTAURANT_THEME_URI . '/inc/');

// External Image Source Paths.
define('URESTAURANT_EXT_IMAGES_SOURCE', esc_url('https://www.pricelisto.com/assets/urestaurant/'));

// Check If Plugins Are Active.
define('URESTAURANT_REDUX_ACTIVE', class_exists('ReduxFrameworkPlugin'));
define('URESTAURANT_ACF_ACTIVE', class_exists('ACF'));
define('URESTAURANT_BEST_RESTAURANT_ACTIVE', class_exists('Best_Restaurant_Menu'));
define('URESTAURANT_CONTACT_FORM_7_ACTIVE', class_exists('WPCF7'));


if (! function_exists('urestaurant_setup')) :
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
    function urestaurant_setup() {
        /*
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         * If you're building a theme based on Ultimate Restaurant, use a find and replace
         * to change 'urestaurant' to the name of your theme in all the template files.
         */
        load_theme_textdomain('urestaurant', get_template_directory() . '/languages');

        // Add default posts and comments RSS feed links to head.
        add_theme_support('automatic-feed-links');

        /*
         * Let WordPress manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded <title> tag in the document head, and expect WordPress to
         * provide it for us.
         */
        add_theme_support('title-tag');

        /*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
         */
        add_theme_support('post-thumbnails');

        // Register navigation menus.
        register_nav_menus(
            array(
            'urestaurant_main_menu'      => esc_html__('Main Menu', 'urestaurant'),
            'urestaurant_top_right_menu' => esc_html__('Top Right Menu', 'urestaurant'),
            'urestaurant_top_left_menu'  => esc_html__('Top Left Menu', 'urestaurant'),
            'urestaurant_footer_menu'    => esc_html__('Footer Menu', 'urestaurant'),
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
                'urestaurant_custom_background_args',
                array(
                'default-color' => 'ffffff',
                'default-image' => '',
                )
            )
        );

        // Add theme support for selective refresh for widgets.
        add_theme_support('customize-selective-refresh-widgets');

        /**
         * Add support for core custom logo.
         *
         * @link https://codex.wordpress.org/Theme_Logo
         */
        add_theme_support(
            'custom-logo',
            array(
            'height'      => 110,
            'width'       => 570,
            'flex-width'  => true,
            'flex-height' => true,
            )
        );
    }
endif;

add_action('after_setup_theme', 'urestaurant_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 *
 * @return array $GLOBALS
 */
function urestaurant_content_width() {
    $GLOBALS['content_width'] = apply_filters('urestaurant_content_width', 1200);
}
add_action('after_setup_theme', 'urestaurant_content_width', 0);

/*
 * Helper functions
 */
require URESTAURANT_INC_DIR . 'core/theme-utilities.php';

/*
 * Enqueue scripts and styles.
 */
require URESTAURANT_INC_DIR . 'core/theme-scripts.php';

/*
 * Custom template tags for this theme.
 */
require URESTAURANT_INC_DIR . 'template-tags.php';

/*
 * Functions which enhance the theme by hooking into WordPress.
 */
require URESTAURANT_INC_DIR . 'template-functions.php';

/*
 * Required and recommended plugins.
 */
require_once URESTAURANT_INC_DIR . 'plugins/class-tgm-plugin-activation.php';
require_once URESTAURANT_INC_DIR . 'plugins/required-plugins.php';

/*
 * Theme options powered by redux framework.
 */
require_once URESTAURANT_INC_DIR . 'framework/theme-options.php';

/*
 * ACF for templates custom fields
 */
require_once URESTAURANT_INC_DIR . 'acf/home.php';
require_once URESTAURANT_INC_DIR . 'acf/about.php';
require_once URESTAURANT_INC_DIR . 'acf/menu.php';
require_once URESTAURANT_INC_DIR . 'acf/location.php';
require_once URESTAURANT_INC_DIR . 'acf/contact.php';

/*
 * Import demo page
 */
if (is_admin()) {
    include_once URESTAURANT_INC_DIR . 'import/import-demo-page.php';
}

/*
 * Load Jetpack compatibility file.
 */
if (defined('JETPACK__VERSION')) {
    include URESTAURANT_INC_DIR() . 'jetpack.php';
}

/**
 * Register google map api key for ACF
 *
 * @param array $api The API array
 *
 * @since 1.0.0
 *
 * @return array $api
 */
function urestaurant_google_map_api( $api ) {
    // Get google maps api key.
    $google_map_api_key = urestaurant_get_google_map_api_key();

    if(isset($google_map_api_key)) {
        // Set the google map api key for acf map.
        $api['key'] = $google_map_api_key;
    }

    return $api;
}

add_filter('acf/fields/google_map/api', 'urestaurant_google_map_api');

/**
 * Hide some acf custom fields for certain templates.
 *
 * @since 1.0.0
 *
 * @return void
 */
function urestaurant_acf_conditional_fields() {
    $template_name = urestaurant_get_active_theme_template();
    ?>
    <script type="text/javascript">
        jQuery(document).ready(function(){
            var template = "<?php echo $template_name ?>";
            // Hide home about subtitle field for minimal and colorful template.
            if('minimal'===template || 'colorful'===template){
                jQuery('.acf-field-home5f4bc27e5f2a4').hide();
            }

            // Hide about about subtitle field for minimal template.
            if('minimal'===template){
                jQuery('.acf-field-about5f4979537be66').hide();
            }

            // Hide about promo video title and content. for minimal and colorful templates.
            if('minimal'===template || 'colorful'===template){
                jQuery('.acf-field-about5f497c5bcd95b').hide();
                jQuery('.acf-field-about5f497ec8fa1e7').hide();
            }

            // Hide about about2 section. for bold and fancy templates.
            if('bold'===template || 'fancy'===template){
                jQuery('.acf-field-about5f1a0975acc17').hide();
                jQuery('.acf-field-about5f1a099eacc18').hide();
                jQuery('.acf-field-about5f1a0964acc16').hide();
            }
        });
    </script>
    <?php
}

add_action('acf/input/admin_head', 'urestaurant_acf_conditional_fields');

