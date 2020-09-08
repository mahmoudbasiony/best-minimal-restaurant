<?php
/**
 * Import demo class.
 *
 * @package urestaurant
 * @author  PriceListo
 */

if (! class_exists('URESTAURANT_Import_Demo')) :
    /**
     * .
     */
    class URESTAURANT_Import_Demo {
        /**
         * The instance *Singleton* of this class
         *
         * @var object
         */
        private static $instance;

        /**
         * The resulting page's hook_suffix, or false if the user does not have the capability required.
         *
         * @var boolean or string
         */
        private $import_page;

        /**
         * The path of the log file.
         *
         * @var string
         */
        public $log_file_path;

        /**
         * Make import page options available to other methods.
         *
         * @var array
         */
        private $import_page_setup = array();

        /**
         * Returns the *Singleton* instance of this class.
         *
         * @return URESTAURANT_Import_Demo the *Singleton* instance.
         */
        public static function get_instance() {
            if (null === static::$instance ) {
                static::$instance = new static();
            }

            return static::$instance;
        }

        /**
         * Class construct function, to initiate the plugin.
         * Protected constructor to prevent creating a new instance of the
         * *Singleton* via the `new` operator from outside of this class.
         *
         * @since 1.0.0
         *
         * @return void
         */
        protected function __construct() {
            // Actions.
            add_action('admin_menu', array( $this, 'create_import_page' ));
            add_action('admin_enqueue_scripts', array( $this, 'admin_enqueue_scripts' ));
            add_action('wp_ajax_urestaurant_import_demo_data', array( $this, 'import_demo_data_ajax_callback' ));
        }

        /**
         * Private clone method to prevent cloning of the instance of the *Singleton* instance.
         *
         * @return void
         */
        private function __clone() {
        }

        /**
         * Private unserialize method to prevent unserializing of the *Singleton* instance.
         *
         * @return void
         */
        private function __wakeup() {
        }

        /**
         * Creates the import page and a submenu item in WP Appearance menu.
         *
         * @since 1.0.0
         *
         * @return void
         */
        public function create_import_page() {
            $this->import_page_setup = apply_filters(
                'urestaurant_import_page_setup',
                array(
                    'parent_slug' => 'themes.php',
                    'page_title'  => esc_html__('Demo Import', 'urestaurant'),
                    'menu_title'  => esc_html__('Import Demo', 'urestaurant'),
                    'capability'  => 'import',
                    'menu_slug'   => 'urestaurant-demo-import',
                ) 
            );

            $this->import_page = add_submenu_page(
                $this->import_page_setup['parent_slug'],
                $this->import_page_setup['page_title'],
                $this->import_page_setup['menu_title'],
                $this->import_page_setup['capability'],
                $this->import_page_setup['menu_slug'],
                apply_filters('urestaurant_import_page_display_callback_function', array( $this, 'display_import_page' ))
            );

            register_importer($this->import_page_setup['menu_slug'], $this->import_page_setup['page_title'], $this->import_page_setup['menu_title'], apply_filters('urestaurant_import_page_display_callback_function', array( $this, 'display_import_page' )));
        }

        /**
         * Import demo page display.
         * Output (HTML) is in another file.
         *
         * @since 1.0.0
         *
         * @return mixed
         */
        public function display_import_page() {
            include_once URESTAURANT_INC_DIR . 'import/views/import-page.php';
        }

        /**
         * Enqueue admin scripts (JS and CSS)
         *
         * @param string $hook holds info on which admin page you are currently loading.
         *
         * @since 1.0.0
         *
         * @return void
         */
        public function admin_enqueue_scripts( $hook ) {
            // Enqueue the scripts only on the plugin page.
            if ($this->import_page === $hook || ('admin.php' === $hook && $this->import_page_setup['menu_slug'] === esc_attr($_GET['import']))) {
                wp_enqueue_script('sweetalert2', URESTAURANT_JS_DIR_URI . 'third/sweetalert2.all.min.js', array('jquery'));
                wp_enqueue_script('urestaurant-demo-js', URESTAURANT_JS_DIR_URI . 'admin/demo.js', array('sweetalert2'), URESTAURANT_THEME_VERSION);

                wp_localize_script(
                    'urestaurant-demo-js', 'urestaurantDemo',
                    array(
                        'ajax_url'         => admin_url('admin-ajax.php'),
                        'ajax_nonce'       => wp_create_nonce('urestaurant-ajax-verification'),
                        'texts'            => array(
                            'dialog_title' => esc_html__('Are you sure?', 'urestaurant'),
                            'dialog_text'  => __('You won\'t be able to revert this!', 'urestaurant'),
                            'dialog_no'    => esc_html__('Cancel', 'urestaurant'),
                            'dialog_yes'   => esc_html__('Yes, import!', 'urestaurant'),
                        ),
                    )
                );

                wp_enqueue_style('urestaurant-demo-css', URESTAURANT_CSS_DIR_URI . 'admin/demo.css', array(), URESTAURANT_THEME_VERSION);
            }
        }

        /**
         * Import demo data.
         *
         * @since 1.0.0
         *
         * @return array $response The ajax response.
         */
        public function import_demo_data_ajax_callback() {
            $response = array();
            if (isset($_POST) && isset($_POST['action']) && 'urestaurant_import_demo_data' === $_POST['action']) {
                // Verify if the AJAX call is valid (checks nonce and current_user_can).
                self::verify_ajax_call();

                // Check if demo already imported before.
                $is_demo_imported = get_option('urestaurant_is_demo_imported');
                if (isset($is_demo_imported) && 'yes' === $is_demo_imported) {
                    $response['status']  = 509;
                    $response['message'] = esc_html__('Demo content is imported already!', 'urestaurant');

                    // Send response and die.
                    wp_send_json($response);
                }

                if (include_once URESTAURANT_INC_DIR . 'import/import.php') {
                    $response['status']  = 200;
                    $response['message'] = esc_html__('Demo imported successfully!', 'urestaurant');

                    // Send response and die.
                    wp_send_json($response);
                }
            }

            $response['status']  = 500;
            $response['message'] = esc_html__('Something went wrong!', 'urestaurant'); 
            wp_send_json_error($response);
        }

        /**
         * Check if the AJAX call is valid.
         *
         * @since 1.0.0
         *
         * @return bool|error
         */
        public static function verify_ajax_call() {
            check_ajax_referer('urestaurant-ajax-verification', 'security');

            // Check if user has the WP capability to import data.
            if (! current_user_can('import')) {
                wp_die(
                    sprintf(
                        __('%1$sYour user role isn\'t high enough. You don\'t have permission to import demo data.%2$s', 'urestaurant'),
                        '<div class="notice  notice-error"><p>',
                        '</p></div>'
                    )
                );
            }
        }
    }

    // Get instance of the class.
    URESTAURANT_Import_Demo::get_instance();

endif;

