<?php

// Handle AJAX requests.
add_action('wp_ajax_flickify_submit_form', 'flickify_submit_form');
add_action('wp_ajax_nopriv_flickify_submit_form', 'flickify_submit_form');
function flickify_submit_form(): void
{
    check_ajax_referer('flickify_nonce', 'security');

    $data = array(
        'membership_option' => sanitize_text_field($_POST['membership_option']),
        'first_name' => sanitize_text_field($_POST['first_name']),
        'last_name' => sanitize_text_field($_POST['last_name']),
        'phone' => sanitize_text_field($_POST['phone']),
        'email' => sanitize_email($_POST['email']),
        'make' => sanitize_text_field($_POST['make']),
        'model' => sanitize_text_field($_POST['model']),
        'year' => sanitize_text_field($_POST['year']),
    );

    error_log(print_r($data, true));

    $response = Flickify_API::call_api_step1($data);

    if (isset($response['error'])) {
        wp_send_json_error(array('message' => $response['error']), 400);
    } else {
        wp_send_json_success(array('message' => 'Form submitted successfully', 'data' => $response['data']));
    }
}