<?php
defined( 'ABSPATH' ) || exit;

global $product;
$userBonuses = new \inc\Classes\UserBonuses();
$resultBonuses = $userBonuses->getAllUserBonuses();

$featured_product_ids = wc_get_featured_product_ids();
$product_on_sale_ids = wc_get_product_ids_on_sale();

$bonus_for_product = get_field('bonus_za_pokupku_tovara', $product->get_id());
?>
<div class="col-12">
    <?php do_action( 'woocommerce_before_single_product' ); ?>
</div>
<div id="product-<?php the_ID(); ?>" <?php wc_product_class( 'inner-cart__top custom-product-cart', $product ); ?>>
    <div class="inner-cart__img">
        <?php do_action( 'woocommerce_before_single_product_summary' ); ?>
    </div>
    <div class="inner-cart__right">
        <div class="inner-cart__name">
            <?=$product->get_title();?>
        </div>
        <div class="inner-cart__art">
            <?php woocommerce_template_single_excerpt(); ?>
        </div>
        <div class="inner-cart__middle">
            <div class="inner-cart__bonuses">
                <img src="<?=get_template_directory_uri();?>/img/bonus.png" alt="logo" width="32" height="32" />
                <span>У вас есть <span><?php echo $resultBonuses->bonuses ?? 0;?> бонусов</span></span>
            </div>
            <div class="inner-cart__price-block">
                <?php woocommerce_template_single_price(); ?>
            </div>
        </div>
        <div class="inner-cart__size">
            <img src="<?=get_template_directory_uri();?>/img/tshirt.png" alt="tshirt" width="32" height="32" />
            <div class="inner-cart__size-body">
                <span>Какой у меня размер</span>
                Пожалуйста, проверьте таблицу размеров на вкладке руководоства по Размерам ниже!
            </div>
        </div>

        <div class="inner-cart__buy">
            <?php woocommerce_template_single_add_to_cart();?>
            <div class="inner-cart__textb">За покупку будет начислено <span><?=$bonus_for_product;?> бонусов</span></div>
        </div>
    </div>

</div>
<div class="inner-cart__bottom">
    <div class="tab-inner">
        <div class="tab-inner__top">
            <div class="tab-inner__button js-tab-btn active" data-id="1">
                <span>Характеристики</span>
            </div>
            <div class="tab-inner__button js-tab-btn" data-id="2">
                <span>Рукщводство по размерам</span>
            </div>
            <div class="tab-inner__button js-tab-btn" data-id="3">
                <span>Задате вопрос, коментарий или отзыв</span>
            </div>
        </div>
        <div class="tab-inner__body">
            <div class="tab-inner__block js-tab-block active" data-id="1">
                <div class="inner-cart__text">
                    <?php echo $product->get_description(); ?>
                </div>
            </div>
            <div class="tab-inner__block js-tab-block" data-id="2">
                <div class="inner-cart__size-pic">
                    <img src="<?=get_template_directory_uri();?>/img/table.jpg" alt="logo" width="1000" height="500" />
                </div>
            </div>
            <div class="tab-inner__block js-tab-block" data-id="3">
                <form action="" id="reggfeg" class="form form--rev form--black">
                    <div class="star-choose" data-rate="">
                        <div class="star-choose__text">
                            Оцените товар
                        </div>
                        <div class="star-choose__body">
                            <input type="radio" class="star-choose__input" id="1" name="mark" value="1" />
                            <div class="star-choose__svg-holder">
                                <svg
                                        class="star-choose__svg"
                                        width="14"
                                        height="13"
                                        viewBox="0 0 14 13"
                                        xmlns="http://www.w3.org/2000/svg"
                                >
                                    <path
                                            d="M7.56988 0.20337L9.21678 4.10129L13.433 4.4635C13.7255 4.48875 13.8444 4.85362 13.6225 5.04569L10.4244 7.81644L11.3827 11.9383C11.4492 12.2248 11.1388 12.4501 10.8876 12.2979L7.26416 10.1127L3.64072 12.2979C3.38884 12.4494 3.07913 12.2241 3.14559 11.9383L4.10396 7.81644L0.905203 5.04503C0.683225 4.85296 0.801525 4.48809 1.09462 4.46283L5.31088 4.10062L6.95778 0.20337C7.07209 -0.0677899 7.45557 -0.0677899 7.56988 0.20337Z"
                                    />
                                </svg>
                            </div>
                            <input type="radio" class="star-choose__input" id="2" name="mark" value="2" />
                            <div class="star-choose__svg-holder">
                                <svg
                                        class="star-choose__svg"
                                        width="14"
                                        height="13"
                                        viewBox="0 0 14 13"
                                        xmlns="http://www.w3.org/2000/svg"
                                >
                                    <path
                                            d="M7.56988 0.20337L9.21678 4.10129L13.433 4.4635C13.7255 4.48875 13.8444 4.85362 13.6225 5.04569L10.4244 7.81644L11.3827 11.9383C11.4492 12.2248 11.1388 12.4501 10.8876 12.2979L7.26416 10.1127L3.64072 12.2979C3.38884 12.4494 3.07913 12.2241 3.14559 11.9383L4.10396 7.81644L0.905203 5.04503C0.683225 4.85296 0.801525 4.48809 1.09462 4.46283L5.31088 4.10062L6.95778 0.20337C7.07209 -0.0677899 7.45557 -0.0677899 7.56988 0.20337Z"
                                    />
                                </svg>
                            </div>
                            <input type="radio" class="star-choose__input" id="3" name="mark" value="3" />
                            <div class="star-choose__svg-holder">
                                <svg
                                        class="star-choose__svg"
                                        width="14"
                                        height="13"
                                        viewBox="0 0 14 13"
                                        xmlns="http://www.w3.org/2000/svg"
                                >
                                    <path
                                            d="M7.56988 0.20337L9.21678 4.10129L13.433 4.4635C13.7255 4.48875 13.8444 4.85362 13.6225 5.04569L10.4244 7.81644L11.3827 11.9383C11.4492 12.2248 11.1388 12.4501 10.8876 12.2979L7.26416 10.1127L3.64072 12.2979C3.38884 12.4494 3.07913 12.2241 3.14559 11.9383L4.10396 7.81644L0.905203 5.04503C0.683225 4.85296 0.801525 4.48809 1.09462 4.46283L5.31088 4.10062L6.95778 0.20337C7.07209 -0.0677899 7.45557 -0.0677899 7.56988 0.20337Z"
                                    />
                                </svg>
                            </div>
                            <input type="radio" class="star-choose__input" id="4" name="mark" value="4" />
                            <div class="star-choose__svg-holder">
                                <svg
                                        class="star-choose__svg"
                                        width="14"
                                        height="13"
                                        viewBox="0 0 14 13"
                                        xmlns="http://www.w3.org/2000/svg"
                                >
                                    <path
                                            d="M7.56988 0.20337L9.21678 4.10129L13.433 4.4635C13.7255 4.48875 13.8444 4.85362 13.6225 5.04569L10.4244 7.81644L11.3827 11.9383C11.4492 12.2248 11.1388 12.4501 10.8876 12.2979L7.26416 10.1127L3.64072 12.2979C3.38884 12.4494 3.07913 12.2241 3.14559 11.9383L4.10396 7.81644L0.905203 5.04503C0.683225 4.85296 0.801525 4.48809 1.09462 4.46283L5.31088 4.10062L6.95778 0.20337C7.07209 -0.0677899 7.45557 -0.0677899 7.56988 0.20337Z"
                                    />
                                </svg>
                            </div>
                            <input type="radio" class="star-choose__input" id="5" name="mark" value="5" />
                            <div class="star-choose__svg-holder">
                                <svg
                                        class="star-choose__svg"
                                        width="14"
                                        height="13"
                                        viewBox="0 0 14 13"
                                        xmlns="http://www.w3.org/2000/svg"
                                >
                                    <path
                                            d="M7.56988 0.20337L9.21678 4.10129L13.433 4.4635C13.7255 4.48875 13.8444 4.85362 13.6225 5.04569L10.4244 7.81644L11.3827 11.9383C11.4492 12.2248 11.1388 12.4501 10.8876 12.2979L7.26416 10.1127L3.64072 12.2979C3.38884 12.4494 3.07913 12.2241 3.14559 11.9383L4.10396 7.81644L0.905203 5.04503C0.683225 4.85296 0.801525 4.48809 1.09462 4.46283L5.31088 4.10062L6.95778 0.20337C7.07209 -0.0677899 7.45557 -0.0677899 7.56988 0.20337Z"
                                    />
                                </svg>
                            </div>
                        </div>
                    </div>
                    <div class="form__item">
                        <input type="text" name="name" placeholder="Ваше имя*" />
                    </div>
                    <div class="form__item">
                        <input type="text" name="email" placeholder="Email *" />
                    </div>
                    <div class="form__item">
                      <textarea
                              name="text"
                              class="form__field form__field--textarea"
                              placeholder="Напишите отзыв *"
                      ></textarea>
                    </div>
                    <button class="button button--full button--middle">
                        Добавить отзыв
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="recomend-block">
    <div class="title title--mid title--main">
        Вас так же может заинтерисовать
    </div>
    <div class="services-block__list">
        <?php foreach($featured_product_ids as $featured_product_id) :
            $_prod = wc_get_product( $featured_product_id );
        ?>
        <a href="<?=get_post_permalink($featured_product_id);?>" class="slider-block__item">
            <img class="lazyload" data-src="<?=get_the_post_thumbnail_url($featured_product_id, 'thumbnail')?>" alt="img5" width="280" height="363" />
            <span><?php echo $_prod->get_price(); ?></span>
        </a>
        <?php endforeach; ?>
    </div>
</div>
<div class="recomend-block">
    <div class="title title--mid title--main">
        Купившие этот товар, так же покупают
    </div>
    <div class="services-block__list">
        <?php woocommerce_related_products();?>
    </div>
</div>



<?php
return;

?>


<div id="product-<?php the_ID(); ?>" <?php wc_product_class(  $product ); ?>>

<?php

/**
 * Hook: woocommerce_before_single_product.
 *
 * @hooked woocommerce_output_all_notices - 10
 */
do_action( 'woocommerce_before_single_product' );

if ( post_password_required() ) {
	echo get_the_password_form(); // WPCS: XSS ok.
	return;
}
?>

	<?php
	/**
	 * Hook: woocommerce_before_single_product_summary.
	 *
	 * @hooked woocommerce_show_product_sale_flash - 10
	 * @hooked woocommerce_show_product_images - 20
	 */
	do_action( 'woocommerce_before_single_product_summary' );
	?>

	<div class="summary entry-summary">
		<?php
		/**
		 * Hook: woocommerce_single_product_summary.
		 *
		 * @hooked woocommerce_template_single_title - 5
		 * @hooked woocommerce_template_single_rating - 10
		 * @hooked woocommerce_template_single_price - 10
		 * @hooked woocommerce_template_single_excerpt - 20
		 * @hooked woocommerce_template_single_add_to_cart - 30
		 * @hooked woocommerce_template_single_meta - 40
		 * @hooked woocommerce_template_single_sharing - 50
		 * @hooked WC_Structured_Data::generate_product_data() - 60
		 */
		do_action( 'woocommerce_single_product_summary' );
		?>
	</div>

	<?php
	/**
	 * Hook: woocommerce_after_single_product_summary.
	 *
	 * @hooked woocommerce_output_product_data_tabs - 10
	 * @hooked woocommerce_upsell_display - 15
	 * @hooked woocommerce_output_related_products - 20
	 */
	do_action( 'woocommerce_after_single_product_summary' );
	?>
</div>

<?php do_action( 'woocommerce_after_single_product' ); ?>
