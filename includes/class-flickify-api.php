<?php

class Flickify_API {

    public static function call_api_step1($data) {
        $response = wp_remote_post('https://gsjkatweqa.sharedwithexpose.com/api/v2/press/flickify/step_one', array(
            'method' => 'POST',
            'body' => json_encode($data),
            'headers' => array(
                'Content-Type' => 'application/json',
                'Accept' => 'application/json'
            ),
        ));

        if (is_wp_error($response)) {
            return array('error' => $response->get_error_message());
        }

        return json_decode(wp_remote_retrieve_body($response), true);
    }

    public static function call_api_step2($slug) {
        $response = wp_remote_get('https://gsjkatweqa.sharedwithexpose.com/api/v2/press/flickify/step_two/' . $slug, array(
            'headers' => array(
                'Content-Type' => 'application/json'
            ),
        ));

        if (is_wp_error($response)) {
            return array('error' => $response->get_error_message());
        }

        return json_decode(wp_remote_retrieve_body($response), true);
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

