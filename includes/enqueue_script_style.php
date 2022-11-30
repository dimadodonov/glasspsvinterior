<?php

if ( ! defined( 'ABSPATH')) {
    exit;
}

/**
 * Enqueue scripts and styles.
 */

add_action( 'wp_enqueue_scripts', 'mi_style' );
function mi_style() {
    $css_update_time = filemtime(get_stylesheet_directory(). '/assets/css/app.min.css');
    wp_enqueue_style( 'main-style', get_template_directory_uri() . '/assets/css/app.min.css', array(), $css_update_time, 'all' );
}

add_action( 'wp_enqueue_scripts', 'mi_scripts' );
function mi_scripts() {
    wp_enqueue_script( 'app-js', get_template_directory_uri() . '/assets/js/app.min.js', array(), null, true );

    // if (is_page('contacts')) {
    //     wp_enqueue_script( 'maps_yandex', 'https://api-maps.yandex.ru/2.1/?lang=ru-RU&amp;apikey=fb63deee-104d-4c98-84fb-6c7b3a7e8125', array( 'jquery' ), '2.1', true );
    // }
}