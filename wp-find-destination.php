<?php
/**
 * Plugin Name: Encontrar destinos
 * Description: Plugin para enciontrar destinos de viagens.
 * Version: 1.0.0
 * Author: Carolina Ahn
 * * Text-Domain: wp-find-destination
 */

// No direct access allowed
if (!defined('ABSPATH')) {
	die;
}

/**
 * Define Plugins Constants
 */
define ( 'WP_FD_PATH', trailingslashit(plugin_dir_path(__FILE__)) );
define ( 'WP_FD_URL', trailingslashit(plugins_url('/', __FILE__)) );

/**
 * Loading Necessary Scripts
 */
add_action('admin_enqueue_scripts', 'load_scripts');
function load_scripts() {
    wp_enqueue_script('wp-find-destination', WP_FD_URL . 'dist/bundle.js', ['jquery', 'wp-element'], wp_rand(), true); 
    wp_localize_script('wp-find-destination', 'appLocalizer', [
        'apiUrl' => home_url('/wp-json'),
        'nonce' => wp_create_nonce('wp_rest'),
    ]);
}

require_once WP_FD_PATH . 'classes/class-create-admin-menu.php';
require_once WP_FD_PATH . 'classes/class-create-settings-routes.php';