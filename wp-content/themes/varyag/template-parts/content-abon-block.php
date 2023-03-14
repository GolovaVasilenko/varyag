<?php
/**
 * @var array $args
 */
$preimushestva_text = $args['preimushestva_text'] ?? '';
$preimushestva_title = $args['preimushestva_title'] ?? '';

$abonements = \inc\Profile\SeasonTicket::getAbonementsByDisciplineId(get_the_ID());
$allowed_display_month_group = [
    '1 месяц' => 'one-group',
    '3 месяца' => '',
    '6 месяцев' => 'six-group',
    '8 месяцев' => 'eight-group',
    '10 месяцев' => 'ten-group',
    '1 год' => 'twelv-group',
];
$allowed_display_month_personal = ['1 месяц' => 'all-pers'];
$count_month_personal = [];
$count_month_group = [];
foreach($abonements as $item) {
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

?>
<div class="abon-block">
    <div class="block-anchor" id="abon-block"></div>
    <div class="about-block__title about-block__title--center">
        Выберите свой абонемент
    </div>
    <div class="abon-block__buttons">
        <button class="button button--tab button--border active js-tabBig-btn" data-id="personal">
            <span>Персональные тренировки</span>
        </button>
        <?php if(!empty($count_month_group)) : ?>
        <button class="button button--tab button--border js-tabBig-btn" data-id="group">
            <span>Групповые тренировки</span>
        </button>
        <?php endif; ?>
    </div>
    <div class="abon-block__big js-tabBig-block active" data-id="personal">
        <div class="abon-block__text">
            Индивидуальные тренировки с тренером высокой квалификации, дадут высокий результат и замотивируют
            побеждать
        </div>
        <div class="abon-block__buttons">
            <!--<button class="button button--tab button--border active js-tab-btn" data-id="all-pers">
                <span>Все</span>
            </button>-->
            <?php foreach($count_month_personal as $cmp) : ?>
                <?php if(in_array($cmp, array_keys($allowed_display_month_personal))) : ?>
                <button class="button button--tab button--border js-tab-btn" data-id="<?=$allowed_display_month_personal[$cmp]?>">
                    <span><?=$cmp;?></span>
                </button>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
        <div class="abon-block__list active js-tab-block" data-id="all-pers">
            <?php foreach($abonements as $abonement) : ?>
            <?php if($abonement->type_trening == \inc\Profile\SeasonTicket::PERSONAL): ?>
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
            <?php foreach($count_month_group as $cmg) : ?>
            <?php if(in_array($cmg, array_keys($allowed_display_month_group))) : ?>
            <button class="button button--tab button--border js-tab-btn" data-id="<?=$allowed_display_month_group[$cmg];?>">
                <span><?=$cmg;?></span>
            </button>
            <?php endif; ?>
            <?php endforeach; ?>
        </div>
        <div class="abon-block__list active js-tab-block" data-id="all-group">
            <?php foreach($abonements as $abonement) : ?>
            <?php if($abonement->type_trening == \inc\Profile\SeasonTicket::GROUP): ?>
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
        <?php foreach($count_month_group as $cmg) : ?>
        <div class="abon-block__list js-tab-block" data-id="<?=$allowed_display_month_group[$cmg];?>">
            <?php foreach($abonements as $abonement) : ?>
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
        <div class="abon-block__advantages">
            <div class="advantage-abon js-abon-first" style="background-image: url(<?=get_template_directory_uri();?>/img/abon1.png)">
                <span>1 Занятие БЕСПЛАТНО</span>
            </div>
            <div class="advantage-abon js-abon-second" style="background-image: url(<?=get_template_directory_uri();?>/img/abon2.png)">
                <span>Подбор питания в подарок</span>
            </div>
        </div>

    </div>
    <div class="abon-block__description">
        <h3><?=$preimushestva_title;?></h3>
        <?=$preimushestva_text?>
    </div>
</div>
