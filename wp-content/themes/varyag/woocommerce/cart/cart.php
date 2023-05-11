<?php
/**
 * Cart Page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cart.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 7.4.0
 */

defined('ABSPATH') || exit;

$finish = false;

if(isset($_COOKIE['_recalculate']) && !empty($_COOKIE['_recalculate'])) {
    $user_id = (int)wp_get_current_user()->id;
    $cookie_info = json_decode(base64_decode($_COOKIE['_recalculate']), true)[$user_id];

    $cart = WC()->cart;
    $item_count = $cart->get_cart_contents_count();
    $finish = $cookie_info['item_count'] !== $item_count ? false : true;
}


?>
<div class="top-block top-block—shorter" style="background-image: url(<?= get_template_directory_uri(); ?>/img/basketback.jpg)">
    <div class="top-block__body container">
        <div class="top-block__middle">
            <div class="breadcrumbs breadcrumbs">
                <a href="/" class="breadcrumbs__link">
                    <img src="<?= get_template_directory_uri(); ?>/img/home.png" alt="logo" width="14" height="14"/>
                </a>
                <a class="breadcrumbs__link">
                    Моя корзина
                </a>
            </div>
            <h1 class="top-block__title">
                Моя корзина
            </h1>
        </div>
    </div>
</div>

<div class="container">
    <p><?php do_action('woocommerce_before_cart'); ?></p>
    <div class="basket">
        <?php do_action('woocommerce_cart_contents'); ?>
        <div class="basket__top">
            <?php if(is_user_logged_in()) : ?>
            <?php
                $bonuses = 0;
                $user_id = (int)wp_get_current_user()->id;
                $userBonuses = new \inc\Classes\UserBonuses();
                $result = (int) $userBonuses->getAllUserBonuses($user_id);
                $res_bonus_calculate = get_bonuses_info();
            ?>
            <form id="bonus-product-form" class="basket__form" action="" method="post">
                <?php if($result) : ?>
                    <div class="basket__input">
                        <label class="user-bonuses-label">Ваши бонусы: <span><?php echo $result->bonuses - $cookie_info['allowed_user_bonuses']; ?></span></label>
                        <input type="hidden" name="bonuses" id="user-bonuses" value="<?php echo $result->bonuses; ?>" />
                        <?php if(!empty($res_bonus_calculate) && !$finish): ?>
                        <button class="recalculate-cost button--full button--middle recalculate-cost-js"><spsn>Применить Бонусы</spsn></button>
                        <?php elseif($finish) : ?>
                            <div> &nbsp; Скидка успешно пресчитана!</div>
                        <?php else: ?>
                            <div> &nbsp; У вас недостаточное количество бонусов!</div>
                        <?php endif;?>
                    </div>
                <?php else : ?>
                    <h3>Ваши бонусы: 0 </h3>
                <?php endif; ?>

            </form>
            <?php else : ?>
                <p>Для получения скидки по системе<br> бонусов вы должны
                    <a href="#" class="basket-login-link basket-show-form-js">авторизоваться</a>!</p>
            <?php endif; ?>
            <div class="basket__text">
                <div class="price-total-block">Итого: &nbsp; <?php echo WC()->cart->get_cart_contents_total() - $cookie_info['allowed_user_bonuses'];?> руб.</div>
                <div style="clear: both"></div>

                <?php if(is_user_logged_in() && !empty($res_bonus_calculate)) : ?>

                <div class="bonus-total-results">
                    <div class="total-results"><span><?php echo $res_bonus_calculate['total_cost'];?></span> руб.</div>
                    <div class="different-results">Экономия: <span><?php echo $finish ?   $cookie_info['allowed_user_bonuses'] : 0;?></span> руб.</div>
                </div>
                <?php endif; ?>
            </div>
            <div class="basket__buttons">
                <a href="<?php site_url(); ?>/checkout/" class="button button--middle button--full">
                    <span>Оформить заказ</span>
                </a>
                <button class="button button--middle button--white button--bottom button-transparent button-clear-cart-js">
                    <span>Очистить корзину</span>
                </button>
            </div>
        </div>
        <div class="basket__title">
            В корзине: <?php echo WC()->cart->get_cart_contents_count(); ?>
        </div>
        <form class="woocommerce-cart-form" action="<?php echo esc_url(wc_get_cart_url()); ?>" method="post">
            <?php do_action('woocommerce_before_cart_table'); ?>
            <div class="basket__list">
                <div class="basket-item basket-item--head">
                    <div class="basket-item__text"><?php esc_html_e('Product', 'woocommerce'); ?></div>

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
                                <div class="basket-item__count product-quantity" data-id="<?php echo $_product->get_id();?>" data-title="<?php esc_attr_e('Quantity', 'woocommerce'); ?>">
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
                                <div class="basket-item__price product-price data-title="<?php esc_attr_e('Price', 'woocommerce'); ?>">
                                    <?php
                                    echo apply_filters('woocommerce_cart_item_price', WC()->cart->get_product_price($_product), $cart_item, $cart_item_key); // PHPCS: XSS ok.
                                    ?>
                                </div>
                                <div class="basket-item__price product-subtotal" data-title="<?php esc_attr_e('Subtotal', 'woocommerce'); ?>">
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
                    ?>
                </div>
            </div>
        </form>
    </div>
</div>
<?php do_action('woocommerce_after_cart'); ?>
<?php get_template_part('template-parts/content', 'cart-login-form'); ?>





