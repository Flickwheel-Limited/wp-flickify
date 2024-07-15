<?php
/*
Plugin Name: Flickify
Description: A plugin to display premium maintenance membership forms.
Version: 1.0
Author: Paul Edward, Grace Effiong
*/

// Exit if accessed directly.
if (!defined('ABSPATH')) {
    exit;
}

// Define plugin URL.
define('FLICKIFY_URL', plugin_dir_url(__FILE__));

// Include necessary files.
require_once plugin_dir_path(__FILE__) . 'includes/class-flickify-api.php';
require_once plugin_dir_path(__FILE__) . 'includes/class-flickify-shortcodes.php';
// Include admin options page.
require_once plugin_dir_path(__FILE__) . 'includes/admin-options.php';

// Enqueue scripts and styles.
add_action('wp_enqueue_scripts', 'flickify_enqueue_scripts');

function flickify_enqueue_scripts(): void
{
    wp_enqueue_style('flickify-style', FLICKIFY_URL . 'assets/css/flickify.css');
    wp_enqueue_script('flickify-script', FLICKIFY_URL . 'assets/js/flickify.js', array('jquery'), null, true);

    $options = get_option('flickify_settings');

    if(!isset($options['flickify_environment'])){
        $base_url = null;
    } else {
        $base_url = $options['flickify_environment'] === 'live' ? $options['flickify_live_url'] : $options['flickify_staging_url'];
    }
    wp_localize_script('flickify-script', 'flickifyAjax', array(
        'ajaxurl' => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce('flickify_nonce'),
        'base_url' => $base_url
    ));
}


// Add rewrite rules.
add_action('init', 'flickify_add_rewrite_rules');
function flickify_add_rewrite_rules(): void
{
    add_rewrite_rule('^flickify-page/?', 'index.php?flickify_page=1', 'top');
    flush_rewrite_rules(); // Ensure rewrite rules are flushed.
}

// Add query variables.
add_filter('query_vars', 'flickify_add_query_vars');
function flickify_add_query_vars($query_vars) {
    $query_vars[] = 'flickify_page';
    return $query_vars;
}

// Template redirection.
add_action('template_redirect', 'flickify_template_redirect');
function flickify_template_redirect() {
    if (get_query_var('flickify_page')) {
        include plugin_dir_path(__FILE__) . 'templates/flickify-full-width-template.php';
        exit;
    }
}

require_once plugin_dir_path(__FILE__) . 'includes/ajax-request.php';

add_action('init', 'flickify_init');
function flickify_init(): void
{
    Flickify_Shortcodes::register();
}


