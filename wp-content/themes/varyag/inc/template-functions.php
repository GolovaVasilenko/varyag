<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package varyag
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function varyag_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter( 'body_class', 'varyag_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function varyag_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'varyag_pingback_header' );

if( wp_doing_ajax() ) {
    add_action('wp_ajax_alx_cart_login_user', 'alx_cart_login_user');
    add_action('wp_ajax_nopriv_alx_cart_login_user', 'alx_cart_login_user');
}
function alx_cart_login_user()
{
    $email = strip_tags(trim($_POST['email']));
    $pass = strip_tags(trim($_POST['pass']));
    $redirect = '/' . $_POST['redirect'] . '/';

    $credentials = [
        'user_login'    => $email,
        'user_password' => $pass,
    ];
    $user = wp_signon( $credentials, false );

    if ( is_wp_error($user) ) {
        echo json_encode(["status" => 0, "data" => $user->get_error_message()]);
    } else {
        echo json_encode(["status" => 1, "redirect" => site_url() . $redirect]);
    }
    wp_die();
}

/*add_action( 'woocommerce_before_calculate_totals', 'your_function_for_calculate_cart_totals', 10, 1 );
function your_function_for_calculate_cart_totals( $cart ){
    // перебор в цикле всех товаров в корзине, примерно так:
    foreach ( $cart->get_cart() as $cart_item ) {
        // получаете значения переменных:
        $rangeby1 = get_post_meta( $cart_item['data']->get_ID(), 'rangeby1', true );
        // прописываете логику перерасчета цен... тут уже всё индивидуально...
    }
}*/
