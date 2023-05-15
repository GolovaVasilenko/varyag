<?php
/**
 * The Template for displaying all single products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     1.6.4
 */

function alx_varyag_scripts() {
    wp_enqueue_style( 'varyag-single-product', get_template_directory_uri() . '/css/single_product.css', array(), _S_VERSION );
}
add_action( 'wp_enqueue_scripts', 'alx_varyag_scripts' );

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

get_header('shop');?>
<div class="inner-cart-page">
    <div class="container">
    <?php do_action( 'woocommerce_before_main_content' );?>

    <?php while ( have_posts() ) : ?>
        <?php the_post(); ?>

        <?php wc_get_template_part( 'content', 'single-product' ); ?>

    <?php endwhile; // end of the loop. ?>

    <?php
    do_action( 'woocommerce_after_main_content' );
    do_action( 'woocommerce_sidebar' );
    ?>
    </div>
</div>

<?php
get_footer();

