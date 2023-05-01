<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

// Ensure visibility.
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}
?>

<div class="prod-item prod-item--list">
  <div class="prod-item__img">
    <img class="lazyload" data-src="<?php echo get_the_post_thumbnail_url($post->ID) ?>" alt="img5" width="221" height="297" />
    <span><?=$post->post_title;?></span>
  </div>
  <span class="prod-item__body">
    <span><?=$post->post_title;?></span>
    <span><?=$post->post_excerpt;?></span>
    <a href="<?=get_post_permalink($post->ID);?>" class="button button--small button--full">ПОДРОБНЕЕ</a>
  </span>
</div>
