<?php

// Add the menu item and page for the plugin settings
add_action('admin_menu', 'flickify_add_admin_menu');
add_action('admin_init', 'flickify_settings_init');

function flickify_add_admin_menu() {
    add_options_page('Flickify Settings', 'Flickify Settings', 'manage_options', 'flickify', 'flickify_options_page');
}

function flickify_settings_init() {
    register_setting('flickify_settings', 'flickify_settings');

    add_settings_section(
        'flickify_settings_section',
        __('Flickify Settings', 'wordpress'),
        'flickify_settings_section_callback',
        'flickify_settings'
    );

    add_settings_field(
        'flickify_live_url',
        __('Live URL', 'wordpress'),
        'flickify_live_url_render',
        'flickify_settings',
        'flickify_settings_section'
    );

    add_settings_field(
        'flickify_staging_url',
        __('Staging URL', 'wordpress'),
        'flickify_staging_url_render',
        'flickify_settings',
        'flickify_settings_section'
    );

    add_settings_field(
        'flickify_environment',
        __('Environment', 'wordpress'),
        'flickify_environment_render',
        'flickify_settings',
        'flickify_settings_section'
    );
}

function flickify_live_url_render() {
    $options = get_option('flickify_settings');
    $options = $options ? $options : array(); // Initialize options if false
    $live_url = $options['flickify_live_url'] ?? '';
    ?>
    <input type='text' name='flickify_settings[flickify_live_url]' value='<?php echo esc_attr($live_url); ?>'>
    <?php
}

function flickify_staging_url_render() {
    $options = get_option('flickify_settings');
    $options = $options ? $options : array(); // Initialize options if false
    $staging_url = isset($options['flickify_staging_url']) ? $options['flickify_staging_url'] : '';
    ?>
    <input type='text' name='flickify_settings[flickify_staging_url]' value='<?php echo esc_attr($staging_url); ?>'>
    <?php
}

function flickify_environment_render() {
    $options = get_option('flickify_settings');
    $options = $options ? $options : array(); // Initialize options if false
    $environment = isset($options['flickify_environment']) ? $options['flickify_environment'] : 'live';
    ?>
    <select name='flickify_settings[flickify_environment]'>
        <option value='live' <?php selected($environment, 'live'); ?>>Live</option>
        <option value='staging' <?php selected($environment, 'staging'); ?>>Staging</option>
    </select>
    <?php
}

function flickify_settings_section_callback() {
    echo __('Enter the base URLs for both live and staging environments and select the environment to use.', 'wordpress');
}

function flickify_options_page() {
    ?>
    <form action='options.php' method='post'>
        <?php
        settings_fields('flickify_settings');
        do_settings_sections('flickify_settings');
        submit_button();
        ?>
    </form>
    <?php
}
