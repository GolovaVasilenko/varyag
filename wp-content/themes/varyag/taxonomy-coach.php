<?php
get_header();

$coach = get_queried_object();
$ticket_list = [];
$discipline_ids = [];
$discipline_name = [];
$allowed_display_month_group = [
    '1 месяц' => 'one-group',
    '3 месяца' => 'three_group',
    '6 месяцев' => 'six-group',
    '8 месяцев' => 'eight-group',
    '10 месяцев' => 'ten-group',
    '1 год' => 'twelv-group',
];

$disciplines = alx_get_disciplines_by_coach_id($coach->term_id);
foreach($disciplines as $discipline) {
    $discipline_ids[] = $discipline->ID;
    $discipline_name[$discipline->ID] = $discipline->post_title;
}
$season_ticket = new \inc\Profile\SeasonTicket();
$ticket_list = $season_ticket->getAbonementsByDisciplineIds($discipline_ids);

$count_month_personal = [];
$count_month_group = [];
foreach($ticket_list as $item) {
    if($item->type_trening == 2) {
        if(!in_array($item->count_month, $count_month_group)) {
            $count_month_group[] = $item->count_month;
        }
    } else {
        if(!in_array($item->count_month, $count_month_personal)) {
            $count_month_personal[] = $item->count_month;
        }
    }
}

$coaches = new WP_Term_Query( [
    'taxonomy'   => 'coach',
    'hide_empty' => false,
] );

$speczializaczii = get_field('speczializaczii', $coach);
$dostizheniya = get_field('dostizheniya', $coach);
$biografiya = get_field('biografiya', $coach);
$vid_deyatelnosti = get_field('vid_deyatelnosti', $coach);
$short_description = get_field('kratkoe_opisanie_deyatelnosti', $coach);
$polnoe_opisanie = get_field('polnoe_opisanie', $coach);
$foto_dlya_polnogo_opisaniya = get_field('foto_dlya_polnogo_opisaniya', $coach);
?>
    <div class="top-block top-block--coach">
        <div class="top-block__body container">
            <div class="top-block__middle">
                <div class="breadcrumbs breadcrumbs">
                    <a href="/" class="breadcrumbs__link">
                        <img src="<?= get_template_directory_uri(); ?>/img/home.png" alt="logo" width="14" height="14"/>
                    </a>
                    <a href="/coach/" class="breadcrumbs__link">
                        Тренера
                    </a>
                    <a class="breadcrumbs__link">
                        <?=$coach->name;?>
                    </a>
                </div>
                <div class="coach-inner">
                    <div class="coach-inner__left">
                        <div class="coach-inner__top-text">
                            <?=$vid_deyatelnosti;?>
                        </div>
                        <div class="coach-inner__name">
                            <?=str_replace(" ", " <br> ", $coach->name);?>
                        </div>
                        <div class="coach-inner__bottom">
                            <?=$short_description?>
                        </div>
                    </div>
                    <!--<div class="coach-inner__logo">
                        <img src="<?= get_template_directory_uri(); ?>/img/coach-logo.png" alt=""/>
                    </div>-->
                    <div class="coach-inner__img">
                        <img src="<?=$foto_dlya_polnogo_opisaniya; ?>" alt=""/>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="prog-block">
            <div class="prog-block__top">
                <div class="prog-block__title">
                    Программы и комплексы
                </div>
            </div>
            <div class="prog-block__list">
                <div class="owl-carousel js-owl-carousel-prog owl-theme" data-slider="1">
                    <?php if($ticket_list) : foreach ($ticket_list as $tl) : if($tl->count_trening == 8 && $tl->count_month == "1 месяц") : ?>
                    <div class="prog-item">
                        <div class="prog-item__img">
                            <img src="<?= get_field("izobrazhenie_dlya_glavnoj_straniczy", $tl->discipline_id); ?>" alt="logo" width="269" height="256"/>
                        </div>
                        <div class="prog-item__name">
                            <?=$discipline_name[$tl->discipline_id];?>
                        </div>
                        <div class="prog-item__price">
                            <span class="prog-item__price-old"></span>
                            <span class="prog-item__price-cur"><?=$tl->total_price;?></span>
                        </div>
                        <div class="button button--border js-open-form">
                            <span>Добавить в корзину</span>
                        </div>
                    </div>

                    <?php endif; endforeach; endif; ?>
                </div>
                <div class="nav-next" data-slider="1"></div>
                <div class="nav-prev" data-slider="1"></div>
            </div>
        </div>
    </div>
    <div class="about-block about-block--black about-block--coach">
        <div class="container">
            <div class="abon-block abon-block--uniq">
                <div class="block-anchor" id="abon-block"></div>
                <div class="about-block__title about-block__title--center">
                    Тренировки
                </div>
                <div class="abon-block__buttons ">
                    <button class="button button--tab-uniq button--border js-tabTop-btn active" data-id="taba">
                        <span>Tabata</span>
                    </button>
                    <button class="button button--tab-uniq button--border js-tabTop-btn " data-id="sil">
                        <span>Силовые</span>
                    </button>
                    <button class="button button--tab-uniq button--border js-tabTop-btn" data-id="emc">
                        <span>EMC</span>
                    </button>
                </div>
                <div class="abon-block__all active js-tabTop-block" data-id="taba">
                    <div class="tab-mob">
                        <div class="tab-mob__triger">
                            <span>Персональные тренировки</span>
                            <img src="<?= get_template_directory_uri(); ?>/img/arr.png" alt="logo" width="12" height="10"/>
                        </div>

                        <div class="tab-mob__list">
                            <div class="tab-mob__btn js-tabBig-btn" data-id="personal">Персональные тренировки</div>
                            <div class="tab-mob__btn js-tabBig-btn" data-id="group">Групповые тренировки</div>
                        </div>
                    </div>
                    <div class="abon-block__buttons tab-desk">
                        <button class="button button--tab button--border js-tabBig-btn" data-id="personal">
                            <span>Персональные тренировки</span>
                        </button>
                        <button class="button button--tab button--border js-tabBig-btn active" data-id="group">
                            <span>Групповые тренировки</span>
                        </button>
                    </div>
                    <div class="abon-block__big js-tabBig-block " data-id="personal">
                        <div class="abon-block__buttons">
                            <button class="button button--tab button--border js-tab-btn " data-id="pers-one">
                                <span>1 месяц</span>
                            </button>
                        </div>
                        <div class="abon-block__text">
                            Индивидуальные тренировки с тренером высокой квалификации, дадут высокий результат и
                            замотивируют
                            побеждать
                        </div>
                        <div class="abon-block__list js-tab-block active" data-id="pers-one">
                            <div class="abon-item">
                                <div class="abon-item__title">
                                    1 занятие
                                </div>
                                <div class="abon-item__char">Итого: <span>2000 руб.</span></div>
                                <div class="abon-item__char">Кол-во тренировок: <span>1 шт.</span></div>
                                <div class="button button--buy button--border js-open-form">
                                    <span>Добавить в корзину</span>
                                </div>
                            </div>
                            <div class="abon-item">
                                <div class="abon-item__title">
                                    1 месяц
                                    <span>скидка 10%</span>
                                </div>
                                <div class="abon-item__char">1 тренировка: <span>1800 руб.</span></div>
                                <div class="abon-item__char">Итого: <span>9000 руб.</span></div>
                                <div class="abon-item__char">Кол-во тренировок: <span>5 шт.</span></div>
                                <div class="button button--buy button--border js-open-form">
                                    <span>Добавить в корзину</span>
                                </div>
                            </div>
                            <div class="abon-item">
                                <div class="abon-item__title">
                                    1 месяц
                                    <span>скидка 25%</span>
                                </div>
                                <div class="abon-item__char">1 тренировка: <span>1500 руб.</span></div>
                                <div class="abon-item__char">Итого: <span>15000 руб.</span></div>
                                <div class="abon-item__char">Кол-во тренировок: <span>10 шт.</span></div>
                                <div class="button button--buy button--border js-open-form">
                                    <span>Добавить в корзину</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="abon-block__big js-tabBig-block active" data-id="group">
                        <div class="abon-block__buttons">
                            <button class="button button--tab button--border active js-tab-btn" data-id="all-group">
                                <span>Все</span>
                            </button>
                            <button class="button button--tab button--border js-tab-btn" data-id="one-group">
                                <span>1 месяц</span>
                            </button>
                            <button class="button button--tab button--border js-tab-btn" data-id="three-group">
                                <span>3 месяца</span>
                            </button>
                            <button class="button button--tab button--border js-tab-btn" data-id="six-group">
                                <span>6 месяцев</span>
                            </button>
                            <button class="button button--tab button--border js-tab-btn" data-id="twelv-group">
                                <span>1 год</span>
                            </button>
                        </div>
                        <div class="abon-block__list js-tab-block active" data-id="all-group">
                            <div class="abon-item">
                                <div class="abon-item__title">
                                    1 месяц
                                </div>
                                <div class="abon-item__char">1 тренировка: <span>500 руб.</span></div>
                                <div class="abon-item__char">Итого: <span>4000 руб.</span></div>
                                <div class="abon-item__char">Кол-во тренировок: <span>8 шт.</span></div>
                                <div class="button button--buy button--border js-open-form">
                                    <span>Добавить в корзину</span>
                                </div>
                            </div>
                            <div class="abon-item">
                                <div class="abon-item__title">
                                    1 месяц
                                    <span>скидка 25%</span>
                                </div>
                                <div class="abon-item__char">1 тренировка: <span>375 руб.</span></div>
                                <div class="abon-item__char">Итого: <span>4500 руб.</span></div>
                                <div class="abon-item__char">Кол-во тренировок: <span>12 шт.</span></div>
                                <div class="button button--buy button--border js-open-form">
                                    <span>Добавить в корзину</span>
                                </div>
                            </div>
                            <div class="abon-item">
                                <div class="abon-item__title">
                                    1 месяц
                                    <span>40%</span>
                                    <span>(на все единоборства в клубе)</span>
                                </div>
                                <div class="abon-item__char">1 тренировка: <span>260 руб.</span></div>
                                <div class="abon-item__char">Итого: <span>6000 руб.</span></div>
                                <div class="abon-item__char">Кол-во тренировок: <span>Безлимитный</span></div>
                                <div class="button button--buy button--border js-open-form">
                                    <span>Добавить в корзину</span>
                                </div>
                            </div>
                            <div class="abon-item">
                                <div class="abon-item__title">
                                    3 месяца
                                    <span>скидка 10%</span>
                                </div>
                                <div class="abon-item__char abon-item__char">Итого: <span>10800 руб.</span></div>

                                <div class="abon-item__char">Кол-во тренировок: <span>24 шт. (8 шт./мес)</span></div>
                                <div class="abon-item__title">
                                    <span>заморозка на 2 недели,</span>
                                    <span> 1 персональная тренировка в подарок!</span>
                                </div>
                                <div class="button button--buy button--border js-open-form">
                                    <span>Добавить в корзину</span>
                                </div>
                            </div>
                            <div class="abon-item">
                                <div class="abon-item__title">
                                    3 месяца
                                    <span>скидка 32%</span>
                                </div>
                                <div class="abon-item__char abon-item__char">Итого: <span>12150 руб.</span></div>

                                <div class="abon-item__char">Кол-во тренировок: <span>36 шт. (12 шт./мес)</span></div>
                                <div class="abon-item__char">1 тренировка: <span>338 руб.</span></div>
                                <div class="abon-item__title">
                                    <span>заморозка на 2 недели,</span>
                                    <span> 1 персональная тренировка в подарок!</span>
                                </div>
                                <div class="button button--buy button--border js-open-form">
                                    <span>Добавить в корзину</span>
                                </div>
                            </div>
                            <div class="abon-item">
                                <div class="abon-item__title">
                                    6 месяцев
                                    <span>скидка 36%</span>
                                </div>
                                <div class="abon-item__char">1 тренировка: <span>319 руб.</span></div>
                                <div class="abon-item__char">Итого: <span>22950 руб.</span></div>
                                <div class="abon-item__char">Кол-во тренировок: <span>72 шт. (12 шт./мес)</span></div>
                                <div class="abon-item__title">
                                    <span>заморозка на 3 недели,</span>
                                    <span>2 персональных тренировки в подарок!</span>
                                </div>
                                <div class="button button--buy button--border js-open-form">
                                    <span>Добавить в корзину</span>
                                </div>
                            </div>
                            <div class="abon-item">
                                <div class="abon-item__title">
                                    6 месяцев
                                    <span>скидка 15%</span>
                                </div>
                                <div class="abon-item__char">1 тренировка: <span>425 руб.</span></div>
                                <div class="abon-item__char">Итого: <span>20400 руб.</span></div>
                                <div class="abon-item__char">Кол-во тренировок: <span>48 шт. (8 шт./мес) </span></div>
                                <div class="abon-item__title">
                                    <span>заморозка на 3 недели,</span>
                                    <span>2 персональных тренировки в подарок!</span>
                                </div>
                                <div class="button button--buy button--border js-open-form">
                                    <span>Добавить в корзину</span>
                                </div>
                            </div>
                            <div class="abon-item">
                                <div class="abon-item__title">
                                    6 месяцев
                                </div>
                                <div class="abon-item__char">Итого: <span>30000 руб.</span></div>
                                <div class="abon-item__char">Кол-во тренировок:
                                    <span>безлимитный на все единоборства </span></div>
                                <div class="abon-item__title">
                                    <span>заморозка на 3 недели,</span>
                                    <span>2 персональных тренировки в подарок!</span>
                                </div>
                                <div class="button button--buy button--border js-open-form">
                                    <span>Добавить в корзину</span>
                                </div>
                            </div>
                            <div class="abon-item">
                                <div class="abon-item__title">
                                    1 год
                                    <span>скидка 40%</span>
                                </div>
                                <div class="abon-item__char">1 тренировка: <span>300 руб.</span></div>
                                <div class="abon-item__char">Итого: <span>43200 руб.</span></div>
                                <div class="abon-item__char">Кол-во тренировок: <span>144 шт. (12 шт./мес) </span></div>
                                <div class="abon-item__title">
                                    <span>заморозка на 4 недели</span>
                                    <span>3 персональных тренировки в подарок!</span>
                                </div>
                                <div class="button button--buy button--border js-open-form">
                                    <span>Добавить в корзину</span>
                                </div>
                            </div>
                            <div class="abon-item">
                                <div class="abon-item__title">
                                    1 год
                                    <span>скидка 20%</span>
                                </div>
                                <div class="abon-item__char">1 тренировка: <span>400 руб.</span></div>
                                <div class="abon-item__char">Итого: <span>38400 руб.</span></div>
                                <div class="abon-item__char">Кол-во тренировок: <span>96 шт. (8 шт./мес) </span></div>
                                <div class="abon-item__title">
                                    <span>заморозка на 4 недели</span>
                                    <span>3 персональных тренировки в подарок!</span>
                                </div>
                                <div class="button button--buy button--border js-open-form">
                                    <span>Добавить в корзину</span>
                                </div>
                            </div>
                            <div class="abon-item">
                                <div class="abon-item__title">
                                    1 год
                                </div>
                                <div class="abon-item__char">Итого: <span>50000 руб.</span></div>
                                <div class="abon-item__char">Кол-во тренировок:
                                    <span>безлимитный на все единоборства </span></div>
                                <div class="abon-item__title">
                                    <span>заморозка на 4 недели,</span>
                                    <span>3 персональных тренировки в подарок!</span>
                                </div>
                                <div class="button button--buy button--border js-open-form">
                                    <span>Добавить в корзину</span>
                                </div>
                            </div>
                        </div>
                        <div class="abon-block__list js-tab-block" data-id="one-group">
                            <div class="abon-item">
                                <div class="abon-item__title">
                                    1 месяц
                                </div>
                                <div class="abon-item__char">1 тренировка: <span>500 руб.</span></div>
                                <div class="abon-item__char">Итого: <span>4000 руб.</span></div>
                                <div class="abon-item__char">Кол-во тренировок: <span>8 шт.</span></div>
                                <div class="button button--buy button--border js-open-form">
                                    <span>Добавить в корзину</span>
                                </div>
                            </div>
                            <div class="abon-item">
                                <div class="abon-item__title">
                                    1 месяц
                                    <span>скидка 25%</span>
                                </div>
                                <div class="abon-item__char">1 тренировка: <span>375 руб.</span></div>
                                <div class="abon-item__char">Итого: <span>4500 руб.</span></div>
                                <div class="abon-item__char">Кол-во тренировок: <span>12 шт.</span></div>
                                <div class="button button--buy button--border js-open-form">
                                    <span>Добавить в корзину</span>
                                </div>
                            </div>
                            <div class="abon-item">
                                <div class="abon-item__title">
                                    1 месяц
                                    <span>40%</span>
                                    <span>(на все единоборства в клубе)</span>
                                </div>
                                <div class="abon-item__char">1 тренировка: <span>260 руб.</span></div>
                                <div class="abon-item__char">Итого: <span>6000 руб.</span></div>
                                <div class="abon-item__char">Кол-во тренировок: <span>Безлимитный</span></div>
                                <div class="button button--buy button--border js-open-form">
                                    <span>Добавить в корзину</span>
                                </div>
                            </div>
                        </div>
                        <div class="abon-block__list js-tab-block" data-id="three-group">
                            <div class="abon-item">
                                <div class="abon-item__title">
                                    3 месяца
                                    <span>скидка 10%</span>
                                </div>
                                <div class="abon-item__char abon-item__char">Итого: <span>10800 руб.</span></div>

                                <div class="abon-item__char">Кол-во тренировок: <span>24 шт. (8 шт./мес)</span></div>
                                <div class="abon-item__title">
                                    <span>заморозка на 2 недели,</span>
                                    <span> 1 персональная тренировка в подарок!</span>
                                </div>
                                <div class="button button--buy button--border js-open-form">
                                    <span>Добавить в корзину</span>
                                </div>
                            </div>
                            <div class="abon-item">
                                <div class="abon-item__title">
                                    3 месяца
                                    <span>скидка 32%</span>
                                </div>
                                <div class="abon-item__char abon-item__char">Итого: <span>12150 руб.</span></div>

                                <div class="abon-item__char">Кол-во тренировок: <span>36 шт. (12 шт./мес)</span></div>
                                <div class="abon-item__char">1 тренировка: <span>338 руб.</span></div>
                                <div class="abon-item__title">
                                    <span>заморозка на 2 недели,</span>
                                    <span> 1 персональная тренировка в подарок!</span>
                                </div>
                                <div class="button button--buy button--border js-open-form">
                                    <span>Добавить в корзину</span>
                                </div>
                            </div>
                        </div>
                        <div class="abon-block__list js-tab-block" data-id="six-group">
                            <div class="abon-item">
                                <div class="abon-item__title">
                                    6 месяцев
                                    <span>скидка 36%</span>
                                </div>
                                <div class="abon-item__char">1 тренировка: <span>319 руб.</span></div>
                                <div class="abon-item__char">Итого: <span>22950 руб.</span></div>
                                <div class="abon-item__char">Кол-во тренировок: <span>72 шт. (12 шт./мес)</span></div>
                                <div class="abon-item__title">
                                    <span>заморозка на 3 недели,</span>
                                    <span>2 персональных тренировки в подарок!</span>
                                </div>
                                <div class="button button--buy button--border js-open-form">
                                    <span>Добавить в корзину</span>
                                </div>
                            </div>
                            <div class="abon-item">
                                <div class="abon-item__title">
                                    6 месяцев
                                    <span>скидка 15%</span>
                                </div>
                                <div class="abon-item__char">1 тренировка: <span>425 руб.</span></div>
                                <div class="abon-item__char">Итого: <span>20400 руб.</span></div>
                                <div class="abon-item__char">Кол-во тренировок: <span>48 шт. (8 шт./мес) </span></div>
                                <div class="abon-item__title">
                                    <span>заморозка на 3 недели,</span>
                                    <span>2 персональных тренировки в подарок!</span>
                                </div>
                                <div class="button button--buy button--border js-open-form">
                                    <span>Добавить в корзину</span>
                                </div>
                            </div>
                            <div class="abon-item">
                                <div class="abon-item__title">
                                    6 месяцев
                                </div>
                                <div class="abon-item__char">Итого: <span>30000 руб.</span></div>
                                <div class="abon-item__char">Кол-во тренировок:
                                    <span>безлимитный на все единоборства </span></div>
                                <div class="abon-item__title">
                                    <span>заморозка на 3 недели,</span>
                                    <span>2 персональных тренировки в подарок!</span>
                                </div>
                                <div class="button button--buy button--border js-open-form">
                                    <span>Добавить в корзину</span>
                                </div>
                            </div>
                        </div>
                        <div class="abon-block__list js-tab-block" data-id="twelv-group">
                            <div class="abon-item">
                                <div class="abon-item__title">
                                    1 год
                                    <span>скидка 40%</span>
                                </div>
                                <div class="abon-item__char">1 тренировка: <span>300 руб.</span></div>
                                <div class="abon-item__char">Итого: <span>43200 руб.</span></div>
                                <div class="abon-item__char">Кол-во тренировок: <span>144 шт. (12 шт./мес) </span></div>
                                <div class="abon-item__title">
                                    <span>заморозка на 4 недели</span>
                                    <span>3 персональных тренировки в подарок!</span>
                                </div>
                                <div class="button button--buy button--border js-open-form">
                                    <span>Добавить в корзину</span>
                                </div>
                            </div>
                            <div class="abon-item">
                                <div class="abon-item__title">
                                    1 год
                                    <span>скидка 20%</span>
                                </div>
                                <div class="abon-item__char">1 тренировка: <span>400 руб.</span></div>
                                <div class="abon-item__char">Итого: <span>38400 руб.</span></div>
                                <div class="abon-item__char">Кол-во тренировок: <span>96 шт. (8 шт./мес) </span></div>
                                <div class="abon-item__title">
                                    <span>заморозка на 4 недели</span>
                                    <span>3 персональных тренировки в подарок!</span>
                                </div>
                                <div class="button button--buy button--border js-open-form">
                                    <span>Добавить в корзину</span>
                                </div>
                            </div>
                            <div class="abon-item">
                                <div class="abon-item__title">
                                    1 год
                                </div>
                                <div class="abon-item__char">Итого: <span>50000 руб.</span></div>
                                <div class="abon-item__char">Кол-во тренировок:
                                    <span>безлимитный на все единоборства </span></div>
                                <div class="abon-item__title">
                                    <span>заморозка на 4 недели,</span>
                                    <span>3 персональных тренировки в подарок!</span>
                                </div>
                                <div class="button button--buy button--border js-open-form">
                                    <span>Добавить в корзину</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="abon-block__all js-tabTop-block" data-id="sil">
                    <div class="tab-mob">
                        <div class="tab-mob__triger">
                            <span>Персональные тренировки</span>
                            <img src="<?= get_template_directory_uri(); ?>/img/arr.png" alt="logo" width="12" height="10"/>
                        </div>

                        <div class="tab-mob__list">
                            <div class="tab-mob__btn js-tabBig-btn" data-id="personal2">Персональные тренировки</div>
                            <div class="tab-mob__btn js-tabBig-btn" data-id="group2">Групповые тренировки</div>
                        </div>
                    </div>
                    <div class="abon-block__buttons tab-desk">
                        <button class="button button--tab button--border js-tabBig-btn" data-id="personal2">
                            <span>Персональные тренировки</span>
                        </button>
                        <?php if(!empty($count_month_group)) : ?>
                        <button class="button button--tab button--border js-tabBig-btn active" data-id="group2">
                            <span>Групповые тренировки</span>
                        </button>
                        <?php endif; ?>
                    </div>
                    <div class="abon-block__big js-tabBig-block " data-id="personal2">
                        <div class="abon-block__buttons">
                            <button class="button button--tab button--border js-tab-btn " data-id="pers-one">
                                <span>1 месяц</span>
                            </button>
                        </div>
                        <div class="abon-block__text">
                            Индивидуальные тренировки с тренером высокой квалификации, дадут высокий результат и
                            замотивируют
                            побеждать
                        </div>
                        <div class="abon-block__list js-tab-block active" data-id="pers-one">
                            <?php foreach($ticket_list as $ticket) : ?>
                                <?php if($ticket->type_trening == \inc\Profile\SeasonTicket::PERSONAL) : ?>
                                    <div class="abon-item">
                                        <div class="abon-item__title">
                                            <?=$ticket->count_month;?>
                                            <?php if($ticket->discount) :?>
                                                <span><?=$ticket->discount;?></span>
                                            <?php endif; ?>
                                        </div>
                                        <?php if($ticket->one_trening_price) :?>
                                            <div class="abon-item__char">1 тренировка: <span><?=$ticket->one_trening_price?></span></div>
                                        <?php endif; ?>
                                        <div class="abon-item__char">Итого: <span><?=$ticket->totsl_price;?></span></div>
                                        <div class="abon-item__char">Кол-во тренировок: <span><?=$ticket->count_trening;?> шт.</span></div>
                                        <div class="button button--buy button--border js-open-form">
                                            <span>Добавить в корзину</span>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <div class="abon-block__big js-tabBig-block active" data-id="group2">
                        <div class="abon-block__buttons">
                            <button class="button button--tab button--border active js-tab-btn" data-id="all-group">
                                <span>Все</span>
                            </button>
                            <button class="button button--tab button--border js-tab-btn" data-id="one-group">
                                <span>1 месяц</span>
                            </button>
                            <button class="button button--tab button--border js-tab-btn" data-id="three-group">
                                <span>3 месяца</span>
                            </button>
                            <button class="button button--tab button--border js-tab-btn" data-id="six-group">
                                <span>6 месяцев</span>
                            </button>
                            <button class="button button--tab button--border js-tab-btn" data-id="twelv-group">
                                <span>1 год</span>
                            </button>
                        </div>
                        <div class="abon-block__list js-tab-block active" data-id="all-group">
                            <div class="abon-item">
                                <div class="abon-item__title">
                                    1 месяц
                                </div>
                                <div class="abon-item__char">1 тренировка: <span>500 руб.</span></div>
                                <div class="abon-item__char">Итого: <span>4000 руб.</span></div>
                                <div class="abon-item__char">Кол-во тренировок: <span>8 шт.</span></div>
                                <div class="button button--buy button--border js-open-form">
                                    <span>Добавить в корзину</span>
                                </div>
                            </div>
                            <div class="abon-item">
                                <div class="abon-item__title">
                                    1 месяц
                                    <span>скидка 25%</span>
                                </div>
                                <div class="abon-item__char">1 тренировка: <span>375 руб.</span></div>
                                <div class="abon-item__char">Итого: <span>4500 руб.</span></div>
                                <div class="abon-item__char">Кол-во тренировок: <span>12 шт.</span></div>
                                <div class="button button--buy button--border js-open-form">
                                    <span>Добавить в корзину</span>
                                </div>
                            </div>
                            <div class="abon-item">
                                <div class="abon-item__title">
                                    1 месяц
                                    <span>40%</span>
                                    <span>(на все единоборства в клубе)</span>
                                </div>
                                <div class="abon-item__char">1 тренировка: <span>260 руб.</span></div>
                                <div class="abon-item__char">Итого: <span>6000 руб.</span></div>
                                <div class="abon-item__char">Кол-во тренировок: <span>Безлимитный</span></div>
                                <div class="button button--buy button--border js-open-form">
                                    <span>Добавить в корзину</span>
                                </div>
                            </div>
                            <div class="abon-item">
                                <div class="abon-item__title">
                                    3 месяца
                                    <span>скидка 10%</span>
                                </div>
                                <div class="abon-item__char abon-item__char">Итого: <span>10800 руб.</span></div>

                                <div class="abon-item__char">Кол-во тренировок: <span>24 шт. (8 шт./мес)</span></div>
                                <div class="abon-item__title">
                                    <span>заморозка на 2 недели,</span>
                                    <span> 1 персональная тренировка в подарок!</span>
                                </div>
                                <div class="button button--buy button--border js-open-form">
                                    <span>Добавить в корзину</span>
                                </div>
                            </div>
                            <div class="abon-item">
                                <div class="abon-item__title">
                                    3 месяца
                                    <span>скидка 32%</span>
                                </div>
                                <div class="abon-item__char abon-item__char">Итого: <span>12150 руб.</span></div>

                                <div class="abon-item__char">Кол-во тренировок: <span>36 шт. (12 шт./мес)</span></div>
                                <div class="abon-item__char">1 тренировка: <span>338 руб.</span></div>
                                <div class="abon-item__title">
                                    <span>заморозка на 2 недели,</span>
                                    <span> 1 персональная тренировка в подарок!</span>
                                </div>
                                <div class="button button--buy button--border js-open-form">
                                    <span>Добавить в корзину</span>
                                </div>
                            </div>
                            <div class="abon-item">
                                <div class="abon-item__title">
                                    6 месяцев
                                    <span>скидка 36%</span>
                                </div>
                                <div class="abon-item__char">1 тренировка: <span>319 руб.</span></div>
                                <div class="abon-item__char">Итого: <span>22950 руб.</span></div>
                                <div class="abon-item__char">Кол-во тренировок: <span>72 шт. (12 шт./мес)</span></div>
                                <div class="abon-item__title">
                                    <span>заморозка на 3 недели,</span>
                                    <span>2 персональных тренировки в подарок!</span>
                                </div>
                                <div class="button button--buy button--border js-open-form">
                                    <span>Добавить в корзину</span>
                                </div>
                            </div>
                            <div class="abon-item">
                                <div class="abon-item__title">
                                    6 месяцев
                                    <span>скидка 15%</span>
                                </div>
                                <div class="abon-item__char">1 тренировка: <span>425 руб.</span></div>
                                <div class="abon-item__char">Итого: <span>20400 руб.</span></div>
                                <div class="abon-item__char">Кол-во тренировок: <span>48 шт. (8 шт./мес) </span></div>
                                <div class="abon-item__title">
                                    <span>заморозка на 3 недели,</span>
                                    <span>2 персональных тренировки в подарок!</span>
                                </div>
                                <div class="button button--buy button--border js-open-form">
                                    <span>Добавить в корзину</span>
                                </div>
                            </div>
                            <div class="abon-item">
                                <div class="abon-item__title">
                                    6 месяцев
                                </div>
                                <div class="abon-item__char">Итого: <span>30000 руб.</span></div>
                                <div class="abon-item__char">Кол-во тренировок:
                                    <span>безлимитный на все единоборства </span></div>
                                <div class="abon-item__title">
                                    <span>заморозка на 3 недели,</span>
                                    <span>2 персональных тренировки в подарок!</span>
                                </div>
                                <div class="button button--buy button--border js-open-form">
                                    <span>Добавить в корзину</span>
                                </div>
                            </div>
                            <div class="abon-item">
                                <div class="abon-item__title">
                                    1 год
                                    <span>скидка 40%</span>
                                </div>
                                <div class="abon-item__char">1 тренировка: <span>300 руб.</span></div>
                                <div class="abon-item__char">Итого: <span>43200 руб.</span></div>
                                <div class="abon-item__char">Кол-во тренировок: <span>144 шт. (12 шт./мес) </span></div>
                                <div class="abon-item__title">
                                    <span>заморозка на 4 недели</span>
                                    <span>3 персональных тренировки в подарок!</span>
                                </div>
                                <div class="button button--buy button--border js-open-form">
                                    <span>Добавить в корзину</span>
                                </div>
                            </div>
                            <div class="abon-item">
                                <div class="abon-item__title">
                                    1 год
                                    <span>скидка 20%</span>
                                </div>
                                <div class="abon-item__char">1 тренировка: <span>400 руб.</span></div>
                                <div class="abon-item__char">Итого: <span>38400 руб.</span></div>
                                <div class="abon-item__char">Кол-во тренировок: <span>96 шт. (8 шт./мес) </span></div>
                                <div class="abon-item__title">
                                    <span>заморозка на 4 недели</span>
                                    <span>3 персональных тренировки в подарок!</span>
                                </div>
                                <div class="button button--buy button--border js-open-form">
                                    <span>Добавить в корзину</span>
                                </div>
                            </div>
                            <div class="abon-item">
                                <div class="abon-item__title">
                                    1 год
                                </div>
                                <div class="abon-item__char">Итого: <span>50000 руб.</span></div>
                                <div class="abon-item__char">Кол-во тренировок:
                                    <span>безлимитный на все единоборства </span></div>
                                <div class="abon-item__title">
                                    <span>заморозка на 4 недели,</span>
                                    <span>3 персональных тренировки в подарок!</span>
                                </div>
                                <div class="button button--buy button--border js-open-form">
                                    <span>Добавить в корзину</span>
                                </div>
                            </div>
                        </div>
                        <div class="abon-block__list js-tab-block" data-id="one-group">
                            <div class="abon-item">
                                <div class="abon-item__title">
                                    1 месяц
                                </div>
                                <div class="abon-item__char">1 тренировка: <span>500 руб.</span></div>
                                <div class="abon-item__char">Итого: <span>4000 руб.</span></div>
                                <div class="abon-item__char">Кол-во тренировок: <span>8 шт.</span></div>
                                <div class="button button--buy button--border js-open-form">
                                    <span>Добавить в корзину</span>
                                </div>
                            </div>
                            <div class="abon-item">
                                <div class="abon-item__title">
                                    1 месяц
                                    <span>скидка 25%</span>
                                </div>
                                <div class="abon-item__char">1 тренировка: <span>375 руб.</span></div>
                                <div class="abon-item__char">Итого: <span>4500 руб.</span></div>
                                <div class="abon-item__char">Кол-во тренировок: <span>12 шт.</span></div>
                                <div class="button button--buy button--border js-open-form">
                                    <span>Добавить в корзину</span>
                                </div>
                            </div>
                            <div class="abon-item">
                                <div class="abon-item__title">
                                    1 месяц
                                    <span>40%</span>
                                    <span>(на все единоборства в клубе)</span>
                                </div>
                                <div class="abon-item__char">1 тренировка: <span>260 руб.</span></div>
                                <div class="abon-item__char">Итого: <span>6000 руб.</span></div>
                                <div class="abon-item__char">Кол-во тренировок: <span>Безлимитный</span></div>
                                <div class="button button--buy button--border js-open-form">
                                    <span>Добавить в корзину</span>
                                </div>
                            </div>
                        </div>
                        <div class="abon-block__list js-tab-block" data-id="three-group">
                            <div class="abon-item">
                                <div class="abon-item__title">
                                    3 месяца
                                    <span>скидка 10%</span>
                                </div>
                                <div class="abon-item__char abon-item__char">Итого: <span>10800 руб.</span></div>

                                <div class="abon-item__char">Кол-во тренировок: <span>24 шт. (8 шт./мес)</span></div>
                                <div class="abon-item__title">
                                    <span>заморозка на 2 недели,</span>
                                    <span> 1 персональная тренировка в подарок!</span>
                                </div>
                                <div class="button button--buy button--border js-open-form">
                                    <span>Добавить в корзину</span>
                                </div>
                            </div>
                            <div class="abon-item">
                                <div class="abon-item__title">
                                    3 месяца
                                    <span>скидка 32%</span>
                                </div>
                                <div class="abon-item__char abon-item__char">Итого: <span>12150 руб.</span></div>

                                <div class="abon-item__char">Кол-во тренировок: <span>36 шт. (12 шт./мес)</span></div>
                                <div class="abon-item__char">1 тренировка: <span>338 руб.</span></div>
                                <div class="abon-item__title">
                                    <span>заморозка на 2 недели,</span>
                                    <span> 1 персональная тренировка в подарок!</span>
                                </div>
                                <div class="button button--buy button--border js-open-form">
                                    <span>Добавить в корзину</span>
                                </div>
                            </div>
                        </div>
                        <div class="abon-block__list js-tab-block" data-id="six-group">
                            <div class="abon-item">
                                <div class="abon-item__title">
                                    6 месяцев
                                    <span>скидка 36%</span>
                                </div>
                                <div class="abon-item__char">1 тренировка: <span>319 руб.</span></div>
                                <div class="abon-item__char">Итого: <span>22950 руб.</span></div>
                                <div class="abon-item__char">Кол-во тренировок: <span>72 шт. (12 шт./мес)</span></div>
                                <div class="abon-item__title">
                                    <span>заморозка на 3 недели,</span>
                                    <span>2 персональных тренировки в подарок!</span>
                                </div>
                                <div class="button button--buy button--border js-open-form">
                                    <span>Добавить в корзину</span>
                                </div>
                            </div>
                            <div class="abon-item">
                                <div class="abon-item__title">
                                    6 месяцев
                                    <span>скидка 15%</span>
                                </div>
                                <div class="abon-item__char">1 тренировка: <span>425 руб.</span></div>
                                <div class="abon-item__char">Итого: <span>20400 руб.</span></div>
                                <div class="abon-item__char">Кол-во тренировок: <span>48 шт. (8 шт./мес) </span></div>
                                <div class="abon-item__title">
                                    <span>заморозка на 3 недели,</span>
                                    <span>2 персональных тренировки в подарок!</span>
                                </div>
                                <div class="button button--buy button--border js-open-form">
                                    <span>Добавить в корзину</span>
                                </div>
                            </div>
                            <div class="abon-item">
                                <div class="abon-item__title">
                                    6 месяцев
                                </div>
                                <div class="abon-item__char">Итого: <span>30000 руб.</span></div>
                                <div class="abon-item__char">Кол-во тренировок:
                                    <span>безлимитный на все единоборства </span></div>
                                <div class="abon-item__title">
                                    <span>заморозка на 3 недели,</span>
                                    <span>2 персональных тренировки в подарок!</span>
                                </div>
                                <div class="button button--buy button--border js-open-form">
                                    <span>Добавить в корзину</span>
                                </div>
                            </div>
                        </div>
                        <div class="abon-block__list js-tab-block" data-id="twelv-group">
                            <div class="abon-item">
                                <div class="abon-item__title">
                                    1 год
                                    <span>скидка 40%</span>
                                </div>
                                <div class="abon-item__char">1 тренировка: <span>300 руб.</span></div>
                                <div class="abon-item__char">Итого: <span>43200 руб.</span></div>
                                <div class="abon-item__char">Кол-во тренировок: <span>144 шт. (12 шт./мес) </span></div>
                                <div class="abon-item__title">
                                    <span>заморозка на 4 недели</span>
                                    <span>3 персональных тренировки в подарок!</span>
                                </div>
                                <div class="button button--buy button--border js-open-form">
                                    <span>Добавить в корзину</span>
                                </div>
                            </div>
                            <div class="abon-item">
                                <div class="abon-item__title">
                                    1 год
                                    <span>скидка 20%</span>
                                </div>
                                <div class="abon-item__char">1 тренировка: <span>400 руб.</span></div>
                                <div class="abon-item__char">Итого: <span>38400 руб.</span></div>
                                <div class="abon-item__char">Кол-во тренировок: <span>96 шт. (8 шт./мес) </span></div>
                                <div class="abon-item__title">
                                    <span>заморозка на 4 недели</span>
                                    <span>3 персональных тренировки в подарок!</span>
                                </div>
                                <div class="button button--buy button--border js-open-form">
                                    <span>Добавить в корзину</span>
                                </div>
                            </div>
                            <div class="abon-item">
                                <div class="abon-item__title">
                                    1 год
                                </div>
                                <div class="abon-item__char">Итого: <span>50000 руб.</span></div>
                                <div class="abon-item__char">Кол-во тренировок:
                                    <span>безлимитный на все единоборства </span></div>
                                <div class="abon-item__title">
                                    <span>заморозка на 4 недели,</span>
                                    <span>3 персональных тренировки в подарок!</span>
                                </div>
                                <div class="button button--buy button--border js-open-form">
                                    <span>Добавить в корзину</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="abon-block__all js-tabTop-block" data-id="emc">
                    <div class="tab-mob">
                        <div class="tab-mob__triger">
                            <span>Персональные тренировки</span>
                            <img src="<?= get_template_directory_uri(); ?>/img/arr.png" alt="logo" width="12" height="10"/>
                        </div>

                        <div class="tab-mob__list">
                            <div class="tab-mob__btn js-tabBig-btn" data-id="personal3">Персональные тренировки</div>
                            <div class="tab-mob__btn js-tabBig-btn" data-id="group3">Групповые тренировки</div>
                        </div>
                    </div>
                    <div class="abon-block__buttons tab-desk">
                        <button class="button button--tab button--border js-tabBig-btn" data-id="personal3">
                            <span>Персональные тренировки</span>
                        </button>
                        <?php if(!empty($count_month_group)) : ?>
                        <button class="button button--tab button--border js-tabBig-btn active" data-id="group3">
                            <span>Групповые тренировки</span>
                        </button>
                        <?php endif; ?>
                    </div>
                    <div class="abon-block__big js-tabBig-block " data-id="personal3">
                        <div class="abon-block__buttons">
                            <button class="button button--tab button--border js-tab-btn " data-id="pers-one">
                                <span>1 месяц</span>
                            </button>
                        </div>
                        <div class="abon-block__text">
                            Индивидуальные тренировки с тренером высокой квалификации, дадут высокий результат и
                            замотивируют
                            побеждать
                        </div>
                        <div class="abon-block__list js-tab-block active" data-id="pers-one">
                            <?php foreach($ticket_list as $ticket) : ?>
                            <?php if($ticket->type_trening == \inc\Profile\SeasonTicket::PERSONAL) : ?>
                            <div class="abon-item">
                                <div class="abon-item__title">
                                    <?=$ticket->count_month;?>
                                    <?php if($ticket->discount) :?>
                                    <span><?=$ticket->discount;?></span>
                                    <?php endif; ?>
                                </div>
                                <?php if($ticket->one_trening_price) :?>
                                <div class="abon-item__char">1 тренировка: <span><?=$ticket->one_trening_price?></span></div>
                                <?php endif; ?>
                                <div class="abon-item__char">Итого: <span><?=$ticket->totsl_price;?></span></div>
                                <div class="abon-item__char">Кол-во тренировок: <span><?=$ticket->count_trening;?> шт.</span></div>
                                <div class="button button--buy button--border js-open-form">
                                    <span>Добавить в корзину</span>
                                </div>
                            </div>
                            <?php endif; ?>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <div class="abon-block__big js-tabBig-block active" data-id="group3">
                        <div class="abon-block__buttons">
                            <button class="button button--tab button--border active js-tab-btn" data-id="all-group">
                                <span>Все</span>
                            </button>
                            <?php foreach($count_month_group as $cmg) : ?>
                                <?php if(in_array($cmg, array_keys($allowed_display_month_group))) : ?>
                                    <button class="button button--tab button--border js-tab-btn" data-id="<?=$allowed_display_month_group[$cmg];?>">
                                        <span><?=$cmg;?></span>
                                    </button>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </div>
                        <div class="abon-block__list js-tab-block active" data-id="all-group">
                        <?php foreach($ticket_list as $ticket) : ?>
                            <?php if($ticket->type_trening == \inc\Profile\SeasonTicket::GROUP) : ?>
                            <div class="abon-item">
                                <div class="abon-item__title">
                                    <?=$ticket->count_month;?>
                                    <?php if($ticket->discount) :?>
                                        <span><?=$ticket->discount;?></span>
                                    <?php endif; ?>
                                </div>
                                <?php if($ticket->one_trening_price) :?>
                                    <div class="abon-item__char">1 тренировка: <span><?=$ticket->one_trening_price?></span></div>
                                <?php endif; ?>
                                <div class="abon-item__char abon-item__char">Итого: <span><?=$ticket->total_price;?></span></div>

                                <div class="abon-item__char">Кол-во тренировок: <span><?=$ticket->count_trening;?></span></div>
                                <div class="abon-item__title">
                                    <?php if($ticket->frozen_info) : ?>
                                    <span><?=$ticket->frozen_info?></span>
                                    <?php endif; ?>
                                </div>
                                <div class="button button--buy button--border js-open-form">
                                    <span>Добавить в корзину</span>
                                </div>
                            </div>
                            <?php endif; ?>
                        <?php endforeach; ?>
                        </div>
                        <?php foreach($count_month_group as $cmg) : ?>
                            <div class="abon-block__list js-tab-block" data-id="<?=$allowed_display_month_group[$cmg];?>">
                                <?php foreach($ticket_list as $abonement) : ?>
                                    <?php if($abonement->type_trening == \inc\Profile\SeasonTicket::GROUP && $cmg == $abonement->count_month) : ?>
                                        <div class="abon-item">
                                            <div class="abon-item__title">
                                                <?=$abonement->count_month;?>
                                                <span><?=$abonement->discount;?></span>
                                            </div>
                                            <?php if($abonement->one_trening_price) : ?>
                                                <div class="abon-item__char">1 тренировка: <span><?=$abonement->one_trening_price;?></span></div>
                                            <?php endif; ?>
                                            <!--<div class="abon-item__char">2 раза в неделю <span>10500 руб.</span></div>-->
                                            <?php if($abonement->action_info) : ?>
                                                <div class="abon-item__char abon-item__char--old">Итого: <span><?=$abonement->total_price;?></span></div>
                                                <div class="abon-item__title abon-item__title--sec">
                                                    <span><?=$abonement->action_info;?></span>
                                                </div>
                                            <?php else:?>
                                                <div class="abon-item__char">Итого: <span><span><?=$abonement->total_price;?></span></div>
                                            <?php endif; ?>
                                            <div class="abon-item__char">Кол-во тренировок: <span><?=$abonement->count_trening;?> </span></div>
                                            <div class="abon-item__title">
                                                <?php if($abonement->frozen_info) : ?>
                                                    <span><?=$abonement->frozen_info;?></span>
                                                <?php endif; ?>
                                            </div>
                                            <div class="button button--buy button--border js-open-form">
                                                <span>Оформить абонемент</span>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </div>
                        <?php endforeach; ?>

                        <div class="abon-block__list js-tab-block" data-id="twelv-group">
                            <?php foreach($ticket_list as $ticket) : ?>
                                <?php if($ticket->type_trening == \inc\Profile\SeasonTicket::GROUP && $ticket->count_month == "1 год") : ?>
                                    <div class="abon-item">
                                        <div class="abon-item__title">
                                            <?=$ticket->count_month;?>
                                            <?php if($ticket->discount) :?>
                                                <span><?=$ticket->discount;?></span>
                                            <?php endif; ?>
                                        </div>
                                        <?php if($ticket->one_trening_price) :?>
                                            <div class="abon-item__char">1 тренировка: <span><?=$ticket->one_trening_price?></span></div>
                                        <?php endif; ?>
                                        <div class="abon-item__char abon-item__char">Итого: <span><?=$ticket->total_price;?></span></div>

                                        <div class="abon-item__char">Кол-во тренировок: <span><?=$ticket->count_trening;?></span></div>
                                        <div class="abon-item__title">
                                            <?php if($ticket->frozen_info) : ?>
                                                <span><?=$ticket->frozen_info?></span>
                                            <?php endif; ?>
                                        </div>
                                        <div class="button button--buy button--border js-open-form">
                                            <span>Добавить в корзину</span>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="about-coach">
        <div class="container">
            <div class="about-coach__top">
                <div class="about-coach__title">
                    О тренере
                </div>
            </div>
            <div class="about-coach__list">
                <div class="about-coach__left">
                    <div class="about-coach__column">
                        <?php if($speczializaczii): ?>
                        <div class="about-coach__mtitle">
                            Специализации
                        </div>
                        <?=$speczializaczii;?>
                        <?php endif; ?>
                    </div>
                    <div class="about-coach__column">
                    <?php if($dostizheniya): ?>
                        <div class="about-coach__mtitle">
                            Достижения
                        </div>
                        <?=$dostizheniya;?>
                    <?php endif; ?>
                    </div>
                </div>
                <div class="about-coach__left">
                    <div class="about-coach__column">
                        <?php if($biografiya) : ?>
                        <div class="about-coach__mtitle">
                            Биография
                        </div>
                        <?=$biografiya;?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="coach-block">
            <div class="about-coach__top">
                <div class="about-coach__title">
                    Другие тренера
                </div>
            </div>
            <div class="slider-block" data-slider="4">
                <div class="slider-block__slider">
                    <div class="owl-carousel js-owl-carousel-items owl-theme">
                        <?php foreach($coaches->terms as $coachPerson) {
                        $image_src = get_field('foto-trenera', $coachPerson); ?>
                        <a href="/coach/<?=$coachPerson->slug;?>" class="prod-item prod-item--coach">
                            <img class="owl-lazy" data-src="<?=$image_src;?>" alt="img5" width="280" height="363"/>
                            <span class="prod-item__body">
                            <span><?=$coachPerson->name;?></span>
                            <span><?=$coach->description;?></span>
                                <div class="button button--small button--full">ПОДРОБНЕЕ</div>
                            </span>
                        </a>


                        <?php } ?>

                    </div>
                    <div class="nav-next" data-slider="4"></div>
                    <div class="nav-prev" data-slider="4"></div>
                </div>
            </div>
        </div>
    </div>
    <!--<div class="top-block top-block--short" style="background-image: url(<?=get_template_directory_uri();?>/img/basketback.jpg)">
        <div class="top-block__body container">
            <div class="top-block__middle">
                <div class="breadcrumbs breadcrumbs">
                    <a href="/" class="breadcrumbs__link">
                        <img src="<?=get_template_directory_uri();?>/img/home.png" alt="logo" width="14" height="14">
                    </a>
                    <a href="/coach/" class="breadcrumbs__link">
                        Тренера
                    </a>
                    <a class="breadcrumbs__link">
                        <?=$coach->name;?>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="coach-page">
            <div class="coach-page__title">
                <?=$coach->name;?>
            </div>
            <div class="coach-page__sub-title">
                <?=$coach->description;?>
            </div>
            <div class="coach-page__body">
                <div class="coach-page__text">
                    <?=$polnoe_opisanie;?>
                </div>
                <div class="coach-page__img">
                    <img class="lazyload load" alt="img5" width="500" height="570" src="<?=$foto_dlya_polnogo_opisaniya?>" style="">
                </div>
            </div>
        </div>
    </div>-->
<?php get_footer();
