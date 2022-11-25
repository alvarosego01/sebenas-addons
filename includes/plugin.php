<?php
namespace Sebenas_Addons;

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

/**
 * Plugin class.
 *
 * The main class that initiates and runs the addon.
 *
 * @since 1.0.0
 */
final class Plugin
{
    /**
     * Addon Version.
     *
     * @since 1.0.0
     *
     * @var string The addon version.
     */
    const VERSION = '1.200.325';

    /**
     * Minimum Elementor Version.
     *
     * @since 1.0.0
     *
     * @var string Minimum Elementor version required to run the addon.
     */
    const MINIMUM_ELEMENTOR_VERSION = '3.5.0';

    /**
     * Minimum PHP Version.
     *
     * @since 1.0.0
     *
     * @var string Minimum PHP version required to run the addon.
     */
    const MINIMUM_PHP_VERSION = '7.0';

    /**
     * Instance.
     *
     * @since 1.0.0
     * @static
     *
     * @var \Sebenas_Addons\Plugin The single instance of the class.
     */
    private static $_instance = null;

    /**
     * Instance.
     *
     * Ensures only one instance of the class is loaded or can be loaded.
     *
     * @since 1.0.0
     * @static
     *
     * @return \Sebenas_Addons\Plugin An instance of the class.
     */
    public static function instance()
    {
        if (is_null(self::$_instance)) {
            self::$_instance = new self();
        }

        return self::$_instance;
    }

    /**
     * Constructor.
     *
     * Perform some compatibility checks to make sure basic requirements are meet.
     * If all compatibility checks pass, initialize the functionality.
     *
     * @since 1.0.0
     */
    public function __construct()
    {
        if ($this->is_compatible()) {
            add_action('elementor/init', [$this, 'init']);
        }
    }

    /**
     * Compatibility Checks.
     *
     * Checks whether the site meets the addon requirement.
     *
     * @since 1.0.0
     */
    public function is_compatible()
    {
        // Check if Elementor installed and activated
        if (!did_action('elementor/loaded')) {
            add_action('admin_notices', [$this, 'admin_notice_missing_main_plugin']);

            return false;
        }

        // Check for required Elementor version
        if (!version_compare(ELEMENTOR_VERSION, self::MINIMUM_ELEMENTOR_VERSION, '>=')) {
            add_action('admin_notices', [$this, 'admin_notice_minimum_elementor_version']);

            return false;
        }

        // Check for required PHP version
        if (version_compare(PHP_VERSION, self::MINIMUM_PHP_VERSION, '<')) {
            add_action('admin_notices', [$this, 'admin_notice_minimum_php_version']);

            return false;
        }

        return true;
    }

    /**
     * Admin notice.
     *
     * Warning when the site doesn't have Elementor installed or activated.
     *
     * @since 1.0.0
     */
    public function admin_notice_missing_main_plugin()
    {
        if (isset($_GET['activate'])) {
            unset($_GET['activate']);
        }

        $message = sprintf(
            /* translators: 1: Plugin name 2: Elementor */
            esc_html__('"%1$s" requires "%2$s" to be installed and activated.', 'elementor-test-addon'),
            '<strong>'.esc_html__('Elementor Test Addon', 'elementor-test-addon').'</strong>',
            '<strong>'.esc_html__('Elementor', 'elementor-test-addon').'</strong>'
        );

        printf('<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message);
    }

    /**
     * Admin notice.
     *
     * Warning when the site doesn't have a minimum required Elementor version.
     *
     * @since 1.0.0
     */
    public function admin_notice_minimum_elementor_version()
    {
        if (isset($_GET['activate'])) {
            unset($_GET['activate']);
        }

        $message = sprintf(
            /* translators: 1: Plugin name 2: Elementor 3: Required Elementor version */
            esc_html__('"%1$s" requires "%2$s" version %3$s or greater.', 'elementor-test-addon'),
            '<strong>'.esc_html__('Elementor Test Addon', 'elementor-test-addon').'</strong>',
            '<strong>'.esc_html__('Elementor', 'elementor-test-addon').'</strong>',
             self::MINIMUM_ELEMENTOR_VERSION
        );

        printf('<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message);
    }

    /**
     * Admin notice.
     *
     * Warning when the site doesn't have a minimum required PHP version.
     *
     * @since 1.0.0
     */
    public function admin_notice_minimum_php_version()
    {
        if (isset($_GET['activate'])) {
            unset($_GET['activate']);
        }

        $message = sprintf(
            /* translators: 1: Plugin name 2: PHP 3: Required PHP version */
            esc_html__('"%1$s" requires "%2$s" version %3$s or greater.', 'elementor-test-addon'),
            '<strong>'.esc_html__('Elementor Test Addon', 'elementor-test-addon').'</strong>',
            '<strong>'.esc_html__('PHP', 'elementor-test-addon').'</strong>',
             self::MINIMUM_PHP_VERSION
        );

        printf('<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message);
    }

    /**
     * Initialize.
     *
     * Load the addons functionality only after Elementor is initialized.
     *
     * Fired by `elementor/init` action hook.
     *
     * @since 1.0.0
     */
    public function init()
    {
        $this->add_actions();
    }

    /**
     * Register Widgets.
     *
     * Load widgets files and register new Elementor widgets.
     *
     * Fired by `elementor/widgets/register` action hook.
     *
     * @param \Elementor\Widgets_Manager $widgets_manager Elementor widgets manager.
     */
    public function register_widgets($widgets_manager)
    {
        require_once SEBENAS_PATH.'/includes/widgets/windgets_main.php';

        sebenas_register_widgets($widgets_manager);
    }

    /**
     * Register Controls.
     *
     * Load controls files and register new Elementor controls.
     *
     * Fired by `elementor/controls/register` action hook.
     *
     * @param \Elementor\Controls_Manager $controls_manager Elementor controls manager.
     */
    public function register_controls($controls_manager)
    {
        // require_once SEBENAS_PATH . '/includes/controls/controls_main.php';
        // sebenas_register_controls_template($controls_manager);
    }

    public function frontend_styles()
    {
        // wp_enqueue_style('sb_addons_Main.Css', SEBENAS_URL . 'assets/dist/styles/main.css', false, PLUGIN_VERSION);
    }

    public function frontend_scripts()
    {
        wp_enqueue_script('Magnific-Popup.js', SEBENAS_URL.'resources/assets/library/Magnific-Popup/jquery.magnific-popup.min.js', ['jquery'], true);

        wp_enqueue_style('Magnific-Popup.css', SEBENAS_URL.'resources/assets/library/Magnific-Popup/magnific-popup.css', [], rand(), 'all');

        // lightbox2
        wp_enqueue_style('lightbox2.css', SEBENAS_URL.'resources/assets/library/lightbox2/lightbox.min.css', [], rand(), 'all');
        wp_enqueue_script('lightbox2.js', SEBENAS_URL.'resources/assets/library/lightbox2/lightbox.min.js', ['jquery'], PLUGIN_VERSION, true);

        // --------------------

        // sweetalert 2
        wp_enqueue_style('sweetAlert.css', SEBENAS_URL.'resources/assets/library/sweetalert2/sweetalert2.min.css', [], rand(), 'all');
        wp_enqueue_script('sweetAlert.js', SEBENAS_URL.'resources/assets/library/sweetalert2/sweetalert2.all.min.js', ['jquery'], PLUGIN_VERSION, true);

        // --------------------

        // wp_enqueue_script('sb_addons_Main.js', SEBENAS_URL.'assets/dist/scripts/main.js', [
        //     'jquery',
        // ], PLUGIN_VERSION, true);

        // wp_enqueue_script('sbn_popupsControl.js', SEBENAS_URL.'assets/dist/scripts/functions/popupsControl.js', [
        //     'jquery',
        // ], PLUGIN_VERSION, true);

        // wp_enqueue_script('sbn_checkout_functions.js', SEBENAS_URL.'assets/dist/scripts/functions/checkout_functions.js', [
        //     'jquery',
        // ], PLUGIN_VERSION, true);
    }

    protected function add_actions()
    {
        add_action('elementor/frontend/after_enqueue_styles', [$this, 'frontend_styles']);
        add_action('elementor/frontend/after_register_scripts', [$this, 'frontend_scripts']);

        add_action('elementor/elements/categories_registered', [$this, 'add_elementor_widget_categories']);
        add_action('elementor/controls/register', [$this, 'register_controls']);
        add_action('elementor/widgets/register', [$this, 'register_widgets']);
    }

    public function add_elementor_widget_categories($elements_manager)
    {
        $elements_manager->add_category(
            'sebenas_widgets_modules',
            [
                'title' => esc_html__('Sebenas Modules', 'Sebenas_Addons'),
                'icon' => 'eicon-star-o',
            ]
        );
        $elements_manager->add_category(
            'sebenas_widgets_modules_info',
            [
                'title' => esc_html__('Sebenas Modules - Info', 'Sebenas_Addons'),
                'icon' => 'eicon-star-o',
            ]
        );
        $elements_manager->add_category(
            'sebenas_widgets_modules_ctas',
            [
                'title' => esc_html__('Sebenas Modules - CTAs', 'Sebenas_Addons'),
                'icon' => 'eicon-star-o',
            ]
        );
        $elements_manager->add_category(
            'sebenas_widgets_modules_features',
            [
                'title' => esc_html__('Sebenas Modules - Features', 'Sebenas_Addons'),
                'icon' => 'eicon-star-o',
            ]
        );
    }
}
