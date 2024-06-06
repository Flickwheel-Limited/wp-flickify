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

// Enqueue scripts and styles.
add_action('wp_enqueue_scripts', 'flickify_enqueue_scripts');
function flickify_enqueue_scripts() {
    wp_enqueue_style('flickify-style', FLICKIFY_URL . 'assets/css/flickify.css');
    wp_enqueue_script('flickify-script', FLICKIFY_URL . 'assets/js/flickify.js', array('jquery'), null, true);
    wp_localize_script('flickify-script', 'flickifyAjax', array(
        'ajaxurl' => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce('flickify_nonce')
    ));
}

// Add rewrite rules.
add_action('init', 'flickify_add_rewrite_rules');
function flickify_add_rewrite_rules() {
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

// Handle AJAX requests.
add_action('wp_ajax_flickify_submit_form', 'flickify_submit_form');
add_action('wp_ajax_nopriv_flickify_submit_form', 'flickify_submit_form');
function flickify_submit_form() {
    check_ajax_referer('flickify_nonce', 'security');

    $data = array(
        'membership_option' => sanitize_text_field($_POST['membership_option']),
        'first_name' => sanitize_text_field($_POST['first_name']),
        'last_name' => sanitize_text_field($_POST['last_name']),
        'phone' => sanitize_text_field($_POST['phone']),
        'email' => sanitize_email($_POST['email']),
    );

    $response = Flickify_API::call_api_step1($data);

    if (isset($response['error'])) {
        wp_send_json_error(array('message' => $response['error']));
    } else {
        wp_send_json_success(array('message' => 'Form submitted successfully', 'data' => $response['data']));
    }
}

add_action('init', 'flickify_init');
function flickify_init(): void
{
    Flickify_Shortcodes::register();
}
