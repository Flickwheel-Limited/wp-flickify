<?php

class Flickify_API {

    public static function call_api_step1($data) {
        $make = $data['make'];
        $model = $data['model'];
        $url = "https://api.flickauto.com/api/v2/press/flickify/step_one/make/$make/model/$model";

        $response = wp_remote_post($url, array(
            'method' => 'POST',
            'body' => json_encode($data),
            'headers' => array(
                'Content-Type' => 'application/json',
                'Accept' => 'application/json'
            ),
        ));

        // Check for errors and log the response
        if (is_wp_error($response)) {
            return array('error' => $response->get_error_message());
        }

        $response_code = wp_remote_retrieve_response_code($response);
        $response_body = wp_remote_retrieve_body($response);


        if ($response_code >= 400) {
            return array('error' => json_decode($response_body));
        }

        return json_decode($response_body, true);
    }

    public static function call_api_step2($slug) {
        $response = wp_remote_get('https://api.flickauto.com/api/v2/press/flickify/step_two/' . $slug, array(
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
