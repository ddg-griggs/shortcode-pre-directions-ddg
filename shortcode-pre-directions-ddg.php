<?php

/*
Plugin Name: Shortcode Pre-Directions by DDG - site go-studio.pro
Plugin URI: https://github.com/ddg-griggs/shortcode-pre-directions-ddg
Description: Профессиональный виджет перенаправления обратного отсчета для Elementor с полным контролем стиля.
Author: Dankov Dorel
Version: 2.2 : 31.05.25
*/

defined('ABSPATH') || exit;

add_action('elementor/widgets/register', function($widgets_manager) {
    require_once __DIR__ . '/includes/elementor-widget.php';
    $widgets_manager->register(new SPDDG_Elementor_Widget());
});