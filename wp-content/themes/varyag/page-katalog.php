<?php

$query = new WC_Product_Query();
$products = $query->get_products();

get_header();
?>

    <div class="top-block top-block--short" style="background-image: url(/wp-content/themes/varyag/img/basketback.jpg)">
        <div class="top-block__body container">
            <div class="top-block__middle">
                <div class="breadcrumbs breadcrumbs">
                    <a href="/" class="breadcrumbs__link">
                        <img src="/wp-content/themes/varyag/img/home.png" alt="logo" width="14" height="14">
                    </a>
                    <a class="breadcrumbs__link"><?php the_title(); ?></a>
                </div>
                <h1 class="top-block__title"><?php the_title(); ?></h1>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="big-slider" data-slider="1">
            <div class="big-slider__slider">
                <div class="owl-carousel js-owl-carousel-big owl-theme">
                    <div class="big-slider__item">
                        <div class="big-slider__item-img">
                            <img src="<?= get_template_directory_uri(); ?>/img/pic2.jpg" alt="pic2" width="1920"
                                 height="600"/>
                        </div>
                        <div class="big-slider__item-body">
                            <span>Новая колекция</span>
                            <span>Перчатки для тайского бокса</span>
                        </div>
                    </div>
                    <div class="big-slider__item">
                        <div class="big-slider__item-img">
                            <img src="<?= get_template_directory_uri(); ?>/img/slide1.jpg" alt="slide1" width="1920"
                                 height="600"/>
                        </div>
                        <div class="big-slider__item-body">
                            <span>Новая колекция</span>
                            <span>Шорты для тайского бокса</span>
                        </div>
                    </div>
                    <div class="big-slider__item">
                        <div class="big-slider__item-img">
                            <img src="<?= get_template_directory_uri(); ?>/img/pic2.jpg" alt="pic2" width="1920"
                                 height="600"/>
                        </div>
                        <div class="big-slider__item-body">
                            <span>Новая колекция</span>
                            <span>Перчатки для тайского бокса</span>
                        </div>
                    </div>
                </div>
                <div class="nav-next" data-slider="1"></div>
                <div class="nav-prev" data-slider="1"></div>
            </div>
        </div>
        <div class="sale-banner">
            <div class="sale-banner__title">
                Не пропустите распродажу Скидка - 20%
            </div>
            <div class="sale-banner__sub-title">
                Наша распродажа 2022 года уже началась, с огромной скидкой 5-20% на ВСЕ товары в онлайн-магазине Варяг
            </div>
        </div>
        <div class="products-block products-block--catalog">
            <div class="products-block__top">
                <div class="title title--big title--black">
                    Новинки
                </div>
                <!--<a href="#" class="link link--watch">
                    <span>Смотреть всё</span>
                    <span class="link__arrow"> </span>
                </a>-->
            </div>
            <div class="slider-block slider-block--prod" data-slider="11">
                <div class="slider-block__slider">
                    <div class="owl-carousel js-owl-carousel-items owl-theme">
                        <?php foreach($products as $product):?>
                            <?php if(in_array(65, $product->category_ids)) {
                            continue;
                            }?>
                        <div class="prod-item prod-item--prod">
                            <div class="prod-item__img">
                                <img class="lazyload" data-src="<?= get_the_post_thumbnail_url($product->id); ?>"
                                     alt="img5" width="221" height="297"/>
                                <span><?=$product->name;?></span>
                            </div>
                            <span class="prod-item__body">
                            <span><?=$product->name;?></span>
                            <span><?=$product->short_description;?></span>
                            <a href="<?= get_permalink($product->id); ?>" class="button button--small button--full">ПОДРОБНЕЕ</a>
                        </span>
                        </div>
                        <?php endforeach;?>
                    </div>
                    <div class="nav-next" data-slider="11"></div>
                    <div class="nav-prev" data-slider="11"></div>
                </div>
            </div>
        </div>
        <div class="products-block products-block--catalog">
            <div class="products-block__top">
                <div class="title title--big title--black">
                    для тайского бокса
                </div>
                <!--<a href="#" class="link link--watch">
                    <span>Смотреть всё</span>
                    <span class="link__arrow"> </span>
                </a>-->
            </div>
            <div class="slider-block slider-block--prod" data-slider="12">
                <div class="slider-block__slider">
                    <div class="owl-carousel js-owl-carousel-items owl-theme">
                        <?php foreach($products as $product): ?>
                            <?php if(in_array(65, $product->category_ids)) {
                                continue;
                            }?>
                            <?php if(in_array(49, $product->category_ids)):?>
                                <div class="prod-item prod-item--prod">
                            <div class="prod-item__img">
                                <img class="lazyload" data-src="<?=get_the_post_thumbnail_url($product->id); ?>"
                                     alt="img5" width="221" height="297"/>
                                <span><?=$product->name;?></span>
                            </div>
                            <span class="prod-item__body">
                    <span><?=$product->name;?></span>
                    <span><?=$product->short_description;?></span>
                    <a href="<?= get_permalink($product->id); ?>" class="button button--small button--full">ПОДРОБНЕЕ</a>
                  </span>
                        </div>
                            <?php endif;?>
                        <?php endforeach;?>
                    </div>
                    <div class="nav-next" data-slider="12"></div>
                    <div class="nav-prev" data-slider="12"></div>
                </div>
            </div>
        </div>
        <div class="products-block products-block--catalog">
            <div class="products-block__top">
                <div class="title title--big title--black">
                    Для Грэплинга
                </div>
                <!--<a href="#" class="link link--watch">
                    <span>Смотреть всё</span>
                    <span class="link__arrow"> </span>
                </a>-->
            </div>
            <div class="slider-block slider-block--prod" data-slider="13">
                <div class="slider-block__slider">
                    <div class="owl-carousel js-owl-carousel-items owl-theme">
                        <?php foreach($products as $product): ?>
                            <?php if(in_array(65, $product->category_ids)) {
                                continue;
                            }?>
                            <?php if(in_array(48, $product->category_ids)):?>
                                <div class="prod-item prod-item--prod">
                                    <div class="prod-item__img">
                                        <img class="lazyload" data-src="<?=get_the_post_thumbnail_url($product->id); ?>"
                                             alt="img5" width="221" height="297"/>
                                        <span><?=$product->name;?></span>
                                    </div>
                                    <span class="prod-item__body">
                    <span><?=$product->name;?></span>
                    <span><?=$product->short_description;?></span>
                    <a href="<?= get_permalink($product->id); ?>" class="button button--small button--full">ПОДРОБНЕЕ</a>
                  </span>
                                </div>
                            <?php endif;?>
                        <?php endforeach;?>
                    </div>
                    <div class="nav-next" data-slider="13"></div>
                    <div class="nav-prev" data-slider="13"></div>
                </div>
            </div>
        </div>
        <div class="products-block products-block--catalog">
            <div class="products-block__top">
                <div class="title title--big title--black">
                    Аксессуары
                </div>
                <!--<a href="#" class="link link--watch">
                    <span>Смотреть всё</span>
                    <span class="link__arrow"> </span>
                </a>-->
            </div>
            <div class="slider-block slider-block--prod" data-slider="14">
                <div class="slider-block__slider">
                    <div class="owl-carousel js-owl-carousel-items owl-theme">
                        <?php foreach($products as $product): ?>
                            <?php if(in_array(65, $product->category_ids)) {
                                continue;
                            }?>
                            <?php if(in_array(47, $product->category_ids)):?>
                                <div class="prod-item prod-item--prod">
                                    <div class="prod-item__img">
                                        <img class="lazyload" data-src="<?=get_the_post_thumbnail_url($product->id); ?>"
                                             alt="img5" width="221" height="297"/>
                                        <span><?=$product->name;?></span>
                                    </div>
                                    <span class="prod-item__body">
                    <span><?=$product->name;?></span>
                    <span><?=$product->short_description;?></span>
                    <a href="<?= get_permalink($product->id); ?>" class="button button--small button--full">ПОДРОБНЕЕ</a>
                  </span>
                                </div>
                            <?php endif;?>
                        <?php endforeach;?>
                    </div>
                    <div class="nav-next" data-slider="14"></div>
                    <div class="nav-prev" data-slider="14"></div>
                </div>
            </div>
        </div>
        <div class="sale-banner sale-banner--bottom">
            <div class="sale-banner__sub-title">
                Интернет магазин спортивных товаров Варяг предлагает выбор профессиональной одежды, защиты и аксессуаров
                для
                начинающих и уже профессиональных спортсвменов
            </div>
        </div>
    </div>

<?php get_footer();
