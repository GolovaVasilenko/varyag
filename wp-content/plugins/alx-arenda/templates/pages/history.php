<?php

$user_id = get_current_user_id();

$orders = wc_get_orders(array(
    'customer' => $user_id,
));

$all_items_history = [];

$element_of_history = [];

foreach ($orders as $order) {

    $order_total = $order->get_total();
    $order_date = $order->get_date_created()->format('d.m.Y');

    $elements_name_of_history = [];
    $element_of_history['order_total'] = $order_total;
    $element_of_history['order_date'] = $order_date;

    foreach ($order->get_items() as $item) {
        $product = $item->get_product();
        $product_link = $product->get_permalink();
        $product_name = $item->get_name();
        $get_id = $item->get_product_id();

        $product_price = $item->get_total();

        $elements_name_of_history[$get_id] = [
            'id' => $get_id,
            'quantity_items' => $item->get_quantity(),
            'product_name' => $product_name,
            'product_price' => $product_price,
            'price_ones' => $product_price / $item->get_quantity(),
            'product_link' => $product_link
        ];

    }
    $element_of_history['items'] = $elements_name_of_history;

    array_push($all_items_history, $element_of_history);

}
?>


<div class="reg-block__right">
    <div class="open-lk">Открыть меню</div>
    <div class="reg-block__title">
        История покупок
    </div>
    <div class="reg-block__top reg-block__top--inner">
        <div class="abons-wrap">
            <div class="abons-list">
                <?php
                foreach ($all_items_history as $colections_item) {
                    foreach ($colections_item['items'] as $item) {
                        ?>
                        <div class="abons-item">
                            <div class="abons-item__body">
                                <div class="abons-item__name">
                                    <?php echo $item['product_name']; ?>
                                </div>
                                <div class="abons-item__cost"><?php echo $item['price_ones'] !== $item['product_price']
                                        ? $item['quantity_items'] . ' X ' . $item['price_ones'] . ' = ' . $item['product_price']
                                        : $item['price_ones']; ?>
                                    <span>руб</span></div>
                            </div>
                            <div class="abons-item__bottom">
                                <div class="abons-item__span">ID заказа: <span><?php echo $item['id']; ?></span></div>
                                <div class="abons-item__span">Дата заказа: <span> <?php echo $colections_item['order_date'] ?></span>
                                </div>
                                <a href="<?php echo $item['product_link']; ?>" class="abons-item__repeat">
                                    <img src="<?php echo get_template_directory_uri(); ?>/img/reload.png" alt=""
                                         width="32"
                                         height="32">
                                    <span>Повторить заказ</span>
                                </a>
                            </div>
                        </div>
                        <?php
                    }
                }
                ?>

                <div class="abons-item">
                    <div class="abons-item__body">
                        <div class="abons-item__name">
                            Абонемент на групповые тренировки по тайскому боксу 1 мес (безлимит)
                        </div>
                        <div class="abons-item__cost">6000 <span>руб</span></div>
                    </div>
                    <div class="abons-item__bottom">
                        <div class="abons-item__span">ID заказа: <span>7778887778</span></div>
                        <div class="abons-item__span">Дата заказа: <span>02.05.2022</span></div>
                        <a href="#" class="abons-item__repeat">
                            <img src="<?= get_template_directory_uri(); ?>/img/reload.png" alt="" width="32"
                                 height="32">
                            <span>Повторить заказ</span>
                        </a>
                    </div>
                </div>

            </div>
            <a href="" class="abons-wrap__link">
                Перейти ко всем абонементам
            </a>
        </div>
    </div>
</div>
