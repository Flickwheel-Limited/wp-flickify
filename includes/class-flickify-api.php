<?php

class Flickify_API {

    public static function call_api_step1($data) {
        $response = wp_remote_post('https://api.flickauto.com/api/v2/press/flickify/step_one', array(
        // $response = wp_remote_post('https://3po5vizq9z.sharedwithexpose.com/api/v2/press/flickify/step_one', array(
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
