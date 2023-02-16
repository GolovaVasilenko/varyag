<?php

if(! defined('ABSPATH') ) {
    die;
}

$units = get_posts([
    'post_type' => 'unit',
    'numberposts' => -1,
]);

foreach($units as $unit) {
    wp_delete_post($unit->ID, true);
}