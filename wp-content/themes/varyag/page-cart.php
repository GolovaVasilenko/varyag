<?php

if(WC()->cart->is_empty()) {
    wp_redirect('/shop/'); exit;
}

get_header();

the_content();

get_footer();
