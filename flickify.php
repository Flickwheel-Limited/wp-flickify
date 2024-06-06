<?php
/*
Plugin Name: Flickify
Description: A plugin to display premium maintenance membership forms.
Version: 1.0
Author: Paul Edward
*/

// Exit if accessed directly.
if (!defined('ABSPATH')) {
    exit;
}
// Define plugin URL.
define('FLICKIFY_URL', plugin_dir_url(__FILE__));

// Include necessary files.
require_once plugin_dir_path(__FILE__) . 'includes/class-flickify-shortcodes.php';
require_once plugin_dir_path(__FILE__) . 'includes/class-flickify-api.php';


// Initialize the shortcodes.
add_action('init', 'flickify_init');
function flickify_init() {
    Flickify_Shortcodes::register();
}

// Enqueue scripts and styles.
add_action('wp_enqueue_scripts', 'flickify_enqueue_scripts');
add_action('wp_enqueue_scripts', 'flickify_enqueue_scripts');
function flickify_enqueue_scripts(): void
{
    wp_enqueue_style('flickify-style', FLICKIFY_URL . 'assets/css/flickify.css');
    wp_enqueue_script('flickify-script', FLICKIFY_URL . 'assets/js/flickify.js', array('jquery'), null, true);
    wp_localize_script('flickify-script', 'flickifyAjax', array(
        'ajaxurl' => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce('flickify_nonce')
    ));
}
