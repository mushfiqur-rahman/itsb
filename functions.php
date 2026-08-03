<?php

function itsupportbee_assets() {
    wp_enqueue_style(
        'theme-style',
        get_template_directory_uri() . '/assets/css/output.css',
        [],
        filemtime(get_template_directory() . '/assets/css/output.css')
    );
}

add_action('wp_enqueue_scripts', 'itsupportbee_assets');