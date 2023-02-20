<?php

namespace inc\System;

class InitAssets
{
    public function register()
    {
        add_action('admin_enqueue_scripts', [$this, 'enqueue_admin']);
        add_action('wp_enqueue_scripts', [$this, 'enqueue_front']);
    }

    public function enqueue_admin()
    {
        wp_enqueue_style('unit_admin_styles', plugins_url('/assets/css/admin/main.css', dirname(__DIR__)));
        wp_enqueue_script('unit_admin_scripts', plugins_url('/assets/js/admin/main.js', dirname(__DIR__)), ['jquery'],'0.1', true);
    }

    public function enqueue_front()
    {
        if ( ! did_action( 'wp_enqueue_media' ) ) {
            wp_enqueue_media();
        }
        wp_enqueue_style('unit_front_styles', plugins_url('/assets/css/front/main.css', dirname(__DIR__)));
        wp_enqueue_script('unit_front_scripts', plugins_url('/assets/js/front/main.js', dirname(__DIR__)), ['jquery'],'0.1', true);

    }

}
