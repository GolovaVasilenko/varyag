<?php

/**
 * Plugin Name: Alx Cabinet Profile
 * Plugin URI: https://alex.com
 * Description: Personal private profile for users
 * Version: 1.0
 * Author: Aleksey Vasilenko
 * Author URI: https://alex.com
 * Licence: GPLv2 or later
 * Text Domain: alx-arenda
 * Domain Path: /lang
 */

if(! defined('ABSPATH') ) {
    die;
}

define('PLUGIN_UNIT_PATH', plugin_dir_path(__FILE__));

require_once PLUGIN_UNIT_PATH . '/bootstrap.php';

$init = new \inc\System\Init();

register_activation_hook(__FILE__, [$init, 'activation']);
register_deactivation_hook(__FILE__, [$init, 'deactivation']);

$init->run();