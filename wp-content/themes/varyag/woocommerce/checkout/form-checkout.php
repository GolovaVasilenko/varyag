<?php
/**
 * Checkout Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/form-checkout.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.5.0
 */

if (!defined('ABSPATH')) {
    exit;
}


$cart = WC()->cart;


do_action('woocommerce_before_checkout_form', $checkout); ?>

<?php if (!$checkout->is_registration_enabled() && $checkout->is_registration_required() && !is_user_logged_in()) : ?>
    <div class="container">
        <?php echo esc_html(apply_filters('woocommerce_checkout_must_be_logged_in_message', __('You must be logged in to checkout.', 'woocommerce'))); ?>
    </div>
    <?php return; endif; ?>

<div class="container">
    <div class="checkout-block">
        <form name="checkout" action="" class="form checkout woocommerce-checkout" method="post"
              action="<?php echo esc_url(wc_get_checkout_url()); ?>" enctype="multipart/form-data">
            <?php if ($checkout->get_checkout_fields()) : ?>

            <?php do_action('woocommerce_checkout_before_customer_details'); ?>
            <div class="checkout-block__title">
                Статус заказа
            </div>
            <div class="checkout-block__top">
                <?php do_action('woocommerce_checkout_before_order_review_heading'); ?>
                <div class="checkout-block__left">
                    <div class="checkout-block__pays">
                        <div class="checkout-block__pay">
                            <div class="checkout-block__title">
                                Оплата
                            </div>

                        </div>
                        <div class="checkout-block__pay">
                            <div class="checkout-block__title">
                                Доставка
                            </div>
                            <?php do_action('woocommerce_checkout_shipping'); ?>
                        </div>
                    </div>
                </div>
                <div class="total-block">
                    <?php do_action('woocommerce_checkout_order_review'); ?>
                </div>
                <?php do_action('woocommerce_checkout_after_order_review'); ?>
            </div>
            <div class="checkout-block__reg">
                <div class="checkout-block__title">
                    Регистрационные данные
                </div>
                <?php do_action('woocommerce_checkout_billing'); ?>

            </div>
        </form>
        <?php do_action('woocommerce_after_checkout_form', $checkout); ?>
        <div class="checkout-block__prods">
            <div class="checkout-block__title">
                Товары в заказе
            </div>
            <button class="recalculate-cost button--full button--middle recalculate-cost-js">
                <spsn>Применить Бонусы</spsn>
            </button>

            <form class="woocommerce-cart-form" action="<?php echo esc_url(wc_get_cart_url()); ?>" method="post">
                <?php do_action('woocommerce_before_cart_table'); ?>
                <div class="basket__list">
                    <div class="basket-item basket-item--head">
                        <div class="basket-item__text"><?php esc_html_e('Product', 'woocommerce'); ?></div>
                        <!--<div class="basket-item__text">Скидка</div>-->
                        <div class="basket-item__text"><?php esc_html_e('Quantity', 'woocommerce'); ?></div>
                        <div class="basket-item__text"><?php esc_html_e('Price', 'woocommerce'); ?> за 1 шт.</div>
                        <div class="basket-item__text">Сумма</div>
                        <div class="basket-item__text"></div>
                    </div>
                    <div class="basket-items-body">
                        <?php do_action('woocommerce_before_cart_contents'); ?>

                        <?php
                        foreach (WC()->cart->get_cart() as $cart_item_key => $cart_item) {
                        $_product = apply_filters('woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key);
                        $product_id = apply_filters('woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key);

                        if ($_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters('woocommerce_cart_item_visible', true, $cart_item, $cart_item_key)) {
                        $product_permalink = apply_filters('woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink($cart_item) : '', $cart_item, $cart_item_key);
                        ?>
                        <div class="basket-item">
                            <div class="basket-item__name">
                                <div class="basket-item__img product-thumbnail">
                                    <?php
                                    $thumbnail = apply_filters('woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key);

                                    if (!$product_permalink) {
                                        echo $thumbnail; // PHPCS: XSS ok.
                                    } else {
                                        printf('<a href="%s">%s</a>', esc_url($product_permalink), $thumbnail); // PHPCS: XSS ok.
                                    }
                                    ?>
                                </div>
                                <div class="product-name" data-title="<?php esc_attr_e('Product', 'woocommerce'); ?>">
                                    <a href="<?= get_post_permalink($cart_item['product_id']) ?>">
                                        <?php
                                        if (!$product_permalink) {
                                            echo wp_kses_post(apply_filters('woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key) . '&nbsp;');
                                        } else {
                                            echo wp_kses_post(apply_filters('woocommerce_cart_item_name', sprintf('<a href="%s">%s</a>', esc_url($product_permalink), $_product->get_name()), $cart_item, $cart_item_key));
                                        }

                                        do_action('woocommerce_after_cart_item_name', $cart_item, $cart_item_key);

                                        // Meta data.
                                        echo wc_get_formatted_cart_item_data($cart_item); // PHPCS: XSS ok.

                                        // Backorder notification.
                                        if ($_product->backorders_require_notification() && $_product->is_on_backorder($cart_item['quantity'])) {
                                            echo wp_kses_post(apply_filters('woocommerce_cart_item_backorder_notification', '<p class="backorder_notification">' . esc_html__('Available on backorder', 'woocommerce') . '</p>', $product_id));
                                        }
                                        ?>
                                    </a>
                                </div>
                            </div>
                            <!--<div class="basket-item__sale">
                                10%
                            </div>-->
                            <div class="basket-item__count product-quantity"
                                 data-id="<?php echo $_product->get_id(); ?>"
                                 data-title="<?php esc_attr_e('Quantity', 'woocommerce'); ?>">
                                <?php
                                if ($_product->is_sold_individually()) {
                                    $min_quantity = 1;
                                    $max_quantity = 1;
                                } else {
                                    $min_quantity = 0;
                                    $max_quantity = $_product->get_max_purchase_quantity();
                                }

                                $product_quantity = woocommerce_quantity_input(
                                    array(
                                        'input_name' => "cart[{$cart_item_key}][qty]",
                                        'input_value' => $cart_item['quantity'],
                                        'max_value' => $max_quantity,
                                        'min_value' => $min_quantity,
                                        'product_name' => $_product->get_name(),
                                    ),
                                    $_product,
                                    false
                                );
                                echo apply_filters('woocommerce_cart_item_quantity', $product_quantity, $cart_item_key, $cart_item); // PHPCS: XSS ok.
                                ?>
                            </div>
                            <div class="basket-item__price product-price data-title="<?php esc_attr_e('Price', 'woocommerce'); ?>
                            "">
                            <?php
                            echo apply_filters('woocommerce_cart_item_price', WC()->cart->get_product_price($_product), $cart_item, $cart_item_key); // PHPCS: XSS ok.
                            ?>
                        </div>
                        <div class="basket-item__price product-subtotal"
                             data-title="<?php esc_attr_e('Subtotal', 'woocommerce'); ?>">
                            <?php
                            echo apply_filters('woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal($_product, $cart_item['quantity']), $cart_item, $cart_item_key); // PHPCS: XSS ok.
                            ?>
                        </div>
                        <div class="remove-item-wrapper">
                            <?php
                            $product_thumbnail = '<img src="' . get_template_directory_uri() . '/img/delete.png" alt="remove item" width="25" height="25"/>';
                            echo apply_filters( // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
                                'woocommerce_cart_item_remove_link',
                                sprintf(
                                    '<a href="%s" class="remove basket-item__delete product-remove" aria-label="%s" data-product_id="%s" data-product_sku="%s">&times;</a>',
                                    esc_url(wc_get_cart_remove_url($cart_item_key)),
                                    esc_attr($product_thumbnail),
                                    esc_attr($product_id),
                                    esc_attr($_product->get_sku())
                                ),
                                $cart_item_key
                            );
                            ?>
                        </div>

                    </div>
                    <?php
                    }
                    }
//                    WC()->cart->calculate_totals();
//                    WC()->cart->set_session();

                    ?>
                </div>

            </form>
        </div>
    </div>
    <?php endif; ?>
</div>

<?php
return;
// If checkout registration is disabled and not logged in, the user cannot checkout.
if (!$checkout->is_registration_enabled() && $checkout->is_registration_required() && !is_user_logged_in()) {
    echo esc_html(apply_filters('woocommerce_checkout_must_be_logged_in_message', __('You must be logged in to checkout.', 'woocommerce')));
    return;
}

?>

<form name="checkout" method="post" class="checkout woocommerce-checkout"
      action="<?php echo esc_url(wc_get_checkout_url()); ?>" enctype="multipart/form-data">

    <?php if ($checkout->get_checkout_fields()) : ?>

        <?php do_action('woocommerce_checkout_before_customer_details'); ?>

        <div class="col2-set" id="customer_details">
            <div class="col-1">
                <?php do_action('woocommerce_checkout_billing'); ?>
            </div>

            <div class="col-2">
                <?php do_action('woocommerce_checkout_shipping'); ?>
            </div>
        </div>

        <?php do_action('woocommerce_checkout_after_customer_details'); ?>

    <?php endif; ?>

    <?php do_action('woocommerce_checkout_before_order_review_heading'); ?>

    <h3 id="order_review_heading"><?php esc_html_e('Your order', 'woocommerce'); ?></h3>

    <?php do_action('woocommerce_checkout_before_order_review'); ?>

    <div id="order_review" class="woocommerce-checkout-review-order">
        <?php do_action('woocommerce_checkout_order_review'); ?>
    </div>

    <?php do_action('woocommerce_checkout_after_order_review'); ?>

</form>

<?php do_action('woocommerce_after_checkout_form', $checkout); ?>
