<?php
/**
 * Plugin Name: Sebenas Addons
 * Plugin URI: http://sebenas.com
 * Description: Extra elements for Elementor. Built for Sebenas stores.
 * Version: 1.1.6
 * Author: Álvaro Segovia
 * Author URI: http://sebenas.com
 * License: GPL2+
 * Text Domain: sebenas
 */
if (! defined('ABSPATH')) {
    die('-1');
}

if (! defined('SEBENAS_PATH')) {
    define('SEBENAS_PATH', plugin_dir_path(__FILE__));
}

if (! defined('SEBENAS_URL')) {
    define('SEBENAS_URL', plugin_dir_url(__FILE__));
}

if (! defined('PLUGIN_VERSION')) {
    define('PLUGIN_VERSION', '1.1.6');
}


function sebenas_init_loaded()
{
    // Check if Elementor installed and activated
    if (! did_action('elementor/loaded')) {
        return;
    }

    // Check for required Elementor version
    if (! version_compare(ELEMENTOR_VERSION, '2.0.0', '>=')) {
        return;
    }

    // Check for required PHP version
    if (version_compare(PHP_VERSION, '5.4', '<')) {
        return;
    }


    // include_once( SEBENAS_PATH . 'includes/widgets-manager.php' );
    // include_once( SEBENAS_PATH . 'includes/controls-manager.php' );

    // Load plugin file
    require_once(SEBENAS_PATH . 'includes/plugin.php');

    // Run the plugin
    \Sebenas_Addons\Plugin::instance();

}

add_action('plugins_loaded', 'sebenas_init_loaded');
