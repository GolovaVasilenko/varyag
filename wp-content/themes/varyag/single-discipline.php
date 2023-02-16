<?php
get_header();

$post_img = get_the_post_thumbnail_url(get_the_ID(), 'full');
$other_image = get_field('dopolnitelnoe_izobrazhenie', get_the_ID());
$title_h1 = get_field('zagolovok_dlya_disczipliny', get_the_ID());
$sub_title = get_field('podzagolovok_dlya_disczipliny', get_the_ID());
$full_description = get_field('polnoe_opisanie', get_the_ID());
$preimushestva_title = get_field('preimushhestva-title', get_the_ID());
$preimushestva_text = get_field('preimushhestva_tekst', get_the_ID());
?>

    <div class="top-block top-block--bread" style="background-image: url(<?=$post_img?>)">
        <div class="top-block__body container">
            <div class="top-block__middle">
                <div class="breadcrumbs">
                    <a href="/" class="breadcrumbs__link">
                        <img src="<?=get_template_directory_uri();?>/img/home.png" alt="logo" width="14" height="14" />
                    </a>
                    <a href="/services" class="breadcrumbs__link">
                        Услуги
                    </a>
                    <a class="breadcrumbs__link">
                        <?=the_title();?>
                    </a>
                </div>
                <h1 class="top-block__title">
                    <?=$title_h1?>
                </h1>
                <div class="top-block__sub-title">
                    <?=$sub_title?>
                </div>

                <div class="top-block__buttons">
                    <a href="#abon-block" class="button button--big button--border">
                        <span>Оформить абонемент</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <?php include_once __DIR__ . "/blocks/lazyblock-vidy-trenirovok/block.php";?>

    <div class="about-block about-block--black">

        <div class="about-block__mid container">
            <div class="about-block__text">
                <?=$full_description?>
            </div>
            <div class="about-block__slider">
                <img class="lazyload" data-src="<?=$other_image?>" alt="slide1" width="924" height="600" />
            </div>
        </div>
        <div class="container">
            <div class="abon-block">
                <div class="block-anchor" id="abon-block"></div>
                <div class="about-block__title about-block__title--center">
                    Выберите свой абонемент
                </div>
                <div class="abon-block__buttons">
                    <button class="button button--tab button--border active js-tabBig-btn" data-id="personal">
                        <span>Персональные тренировки</span>
                    </button>
                    <button class="button button--tab button--border js-tabBig-btn" data-id="group">
                        <span>Групповые тренировки</span>
                    </button>
                </div>
                <div class="abon-block__big js-tabBig-block active" data-id="personal">
                    <div class="abon-block__text">
                        Индивидуальные тренировки с тренером высокой квалификации, дадут высокий результат и замотивируют
                        побеждать
                    </div>
                    <div class="abon-block__buttons">
                        <button class="button button--tab button--border active js-tab-btn" data-id="all-pers">
                            <span>Все</span>
                        </button>
                        <button class="button button--tab button--border js-tab-btn" data-id="pers-one">
                            <span>1 месяц</span>
                        </button>
                    </div>
                    <div class="abon-block__list active js-tab-block" data-id="all-pers">
                        <div class="abon-item">
                            <div class="abon-item__title">
                                1 тренировка
                            </div>
                            <div class="abon-item__char">1 занятие: <span>2500 руб.</span></div>
                            <div class="abon-item__char">Итого: <span>2500 руб.</span></div>
                            <div class="abon-item__char">Кол-во тренировок: <span>1 шт.</span></div>
                            <div class="button button--buy button--border js-open-form">
                                <span>Оформить абонемент</span>
                            </div>
                        </div>
                        <div class="abon-item">
                            <div class="abon-item__title">
                                1 месяц
                                <span>скидка 8%</span>
                            </div>
                            <div class="abon-item__char">1 тренировка: <span>2300 руб.</span></div>
                            <div class="abon-item__char">Итого: <span>11500 руб.</span></div>
                            <div class="abon-item__char">Кол-во тренировок: <span>5 шт.</span></div>
                            <div class="button button--buy button--border js-open-form">
                                <span>Оформить абонемент</span>
                            </div>
                        </div>
                        <div class="abon-item">
                            <div class="abon-item__title">
                                1 месяц
                                <span>скидка 20%</span>
                            </div>
                            <div class="abon-item__char">1 тренировка: <span>2000 руб.</span></div>
                            <div class="abon-item__char">Итого: <span>20000 руб.</span></div>
                            <div class="abon-item__char">Кол-во тренировок: <span>10 шт.</span></div>
                            <div class="button button--buy button--border js-open-form">
                                <span>Оформить абонемент</span>
                            </div>
                        </div>
                        <div class="abon-item">
                            <div class="abon-item__title">
                                1 месяц
                                <span>скидка 23%</span>
                            </div>
                            <div class="abon-item__char">1 тренировка: <span>1925 руб.</span></div>
                            <div class="abon-item__char">Итого: <span>25000 руб.</span></div>
                            <div class="abon-item__char">Кол-во тренировок: <span>13 шт.</span></div>
                            <div class="button button--buy button--border js-open-form">
                                <span>Оформить абонемент</span>
                            </div>
                        </div>
                        <div class="abon-item">
                            <div class="abon-item__title">
                                1 месяц
                            </div>
                            <div class="abon-item__char">1 сплит-тренировка (до 2 чел.): <span>4000 руб.</span></div>
                            <div class="abon-item__char">Итого: <span>4000 руб.</span></div>
                            <div class="abon-item__char">Кол-во тренировок: <span>1 шт.</span></div>
                            <div class="button button--buy button--border js-open-form">
                                <span>Оформить абонемент</span>
                            </div>
                        </div>
                    </div>
                    <div class="abon-block__list js-tab-block" data-id="pers-one">
                        <div class="abon-item">
                            <div class="abon-item__title">
                                1 тренировка
                            </div>
                            <div class="abon-item__char">1 занятие: <span>2500 руб.</span></div>
                            <div class="abon-item__char">Итого: <span>2500 руб.</span></div>
                            <div class="abon-item__char">Кол-во тренировок: <span>1 шт.</span></div>
                            <div class="button button--buy button--border js-open-form">
                                <span>Оформить абонемент</span>
                            </div>
                        </div>
                        <div class="abon-item">
                            <div class="abon-item__title">
                                1 месяц
                                <span>скидка 8%</span>
                            </div>
                            <div class="abon-item__char">1 тренировка: <span>2300 руб.</span></div>
                            <div class="abon-item__char">Итого: <span>11500 руб.</span></div>
                            <div class="abon-item__char">Кол-во тренировок: <span>5 шт.</span></div>
                            <div class="button button--buy button--border js-open-form">
                                <span>Оформить абонемент</span>
                            </div>
                        </div>
                        <div class="abon-item">
                            <div class="abon-item__title">
                                1 месяц
                                <span>скидка 20%</span>
                            </div>
                            <div class="abon-item__char">1 тренировка: <span>2000 руб.</span></div>
                            <div class="abon-item__char">Итого: <span>20000 руб.</span></div>
                            <div class="abon-item__char">Кол-во тренировок: <span>10 шт.</span></div>
                            <div class="button button--buy button--border js-open-form">
                                <span>Оформить абонемент</span>
                            </div>
                        </div>
                        <div class="abon-item">
                            <div class="abon-item__title">
                                1 месяц
                                <span>скидка 23%</span>
                            </div>
                            <div class="abon-item__char">1 тренировка: <span>1925 руб.</span></div>
                            <div class="abon-item__char">Итого: <span>25000 руб.</span></div>
                            <div class="abon-item__char">Кол-во тренировок: <span>13 шт.</span></div>
                            <div class="button button--buy button--border js-open-form">
                                <span>Оформить абонемент</span>
                            </div>
                        </div>
                        <div class="abon-item">
                            <div class="abon-item__title">
                                1 месяц
                            </div>
                            <div class="abon-item__char">1 сплит-тренировка (до 2 чел.): <span>4000 руб.</span></div>
                            <div class="abon-item__char">Итого: <span>4000 руб.</span></div>
                            <div class="abon-item__char">Кол-во тренировок: <span>1 шт.</span></div>
                            <div class="button button--buy button--border js-open-form">
                                <span>Оформить абонемент</span>
                            </div>
                        </div>
                    </div>
                    <div class="abon-block__advantages">
                        <div class="advantage-abon js-abon-first" style="background-image: url(<?=get_template_directory_uri();?>/img/abon1.png)">
                            <span>1 Занятие БЕСПЛАТНО</span>
                        </div>
                        <div class="advantage-abon js-abon-second" style="background-image: url(<?=get_template_directory_uri();?>/img/abon2.png)">
                            <span>Подбор питания в подарок</span>
                        </div>
                    </div>
                </div>
                <div class="abon-block__big js-tabBig-block" data-id="group">
                    <div class="abon-block__buttons">
                        <button class="button button--tab button--border active js-tab-btn" data-id="all-group">
                            <span>Все</span>
                        </button>
                        <button class="button button--tab button--border js-tab-btn" data-id="pers-group">
                            <span>1 месяц</span>
                        </button>
                    </div>
                    <div class="abon-block__list active js-tab-block" data-id="all-group">
                        <div class="abon-item">
                            <div class="abon-item__title">
                                1 месяц
                            </div>
                            <div class="abon-item__char">1 тренировка: <span>437 руб.</span></div>
                            <div class="abon-item__char">Итого: <span>3500 руб.</span></div>
                            <div class="abon-item__char">Кол-во тренировок: <span>8 шт.</span></div>
                            <div class="button button--buy button--border js-open-form">
                                <span>Оформить абонемент</span>
                            </div>
                        </div>
                        <div class="abon-item">
                            <div class="abon-item__title">
                                1 месяц
                                <span>скидка 23%</span>
                            </div>
                            <div class="abon-item__char">1 тренировка: <span>333 руб.</span></div>
                            <div class="abon-item__char">Итого: <span>4000 руб.</span></div>
                            <div class="abon-item__char">Кол-во тренировок: <span>12 шт.</span></div>
                            <div class="button button--buy button--border js-open-form">
                                <span>Оформить абонемент</span>
                            </div>
                        </div>
                        <div class="abon-item">
                            <div class="abon-item__title">
                                1 месяц
                            </div>
                            <div class="abon-item__char">Итого: <span>6000 руб.</span></div>
                            <div class="abon-item__char">Кол-во тренировок: <span>Безлимитный</span></div>
                            <div class="button button--buy button--border js-open-form">
                                <span>Оформить абонемент</span>
                            </div>
                        </div>
                    </div>
                    <div class="abon-block__list js-tab-block" data-id="pers-group">
                        <div class="abon-item">
                            <div class="abon-item__title">
                                1 месяц
                            </div>
                            <div class="abon-item__char">1 тренировка: <span>437 руб.</span></div>
                            <div class="abon-item__char">Итого: <span>3500 руб.</span></div>
                            <div class="abon-item__char">Кол-во тренировок: <span>8 шт.</span></div>
                            <div class="button button--buy button--border js-open-form">
                                <span>Оформить абонемент</span>
                            </div>
                        </div>
                        <div class="abon-item">
                            <div class="abon-item__title">
                                1 месяц
                                <span>скидка 23%</span>
                            </div>
                            <div class="abon-item__char">1 тренировка: <span>333 руб.</span></div>
                            <div class="abon-item__char">Итого: <span>4000 руб.</span></div>
                            <div class="abon-item__char">Кол-во тренировок: <span>12 шт.</span></div>
                            <div class="button button--buy button--border js-open-form">
                                <span>Оформить абонемент</span>
                            </div>
                        </div>
                        <div class="abon-item">
                            <div class="abon-item__title">
                                1 месяц
                            </div>
                            <div class="abon-item__char">Итого: <span>6000 руб.</span></div>
                            <div class="abon-item__char">Кол-во тренировок: <span>Безлимитный</span></div>
                            <div class="button button--buy button--border js-open-form">
                                <span>Оформить абонемент</span>
                            </div>
                        </div>
                    </div>
                    <div class="abon-block__advantages">
                        <div class="advantage-abon js-abon-first" style="background-image: url(<?=get_template_directory_uri();?>/img/abon1.png)">
                            <span>1 Занятие БЕСПЛАТНО</span>
                        </div>
                        <div class="advantage-abon js-abon-second" style="background-image: url(<?=get_template_directory_uri();?>/img/abon2.png)">
                            <span>Подбор питания в подарок</span>
                        </div>
                    </div>
                    <div class="abon-block__description">
                        <h3><?=$preimushestva_title;?></h3>
                        <?=$preimushestva_text?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php get_template_part('template-parts/content', 'discipline_block');?>

<?php get_footer();
