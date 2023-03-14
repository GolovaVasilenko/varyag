<?php
/**
 * @var $args
 */

?>
<?php if($args['current_page'] == 'home'): ?>
<div class="services-block">
    <div class="container">
        <div class="services-block__top">
            <div class="title title--big title--white">
                Наши услуги
            </div>
            <a href="/services" class="link link--watch">
                <span>Смотреть всё</span>
                <span class="link__arrow"> </span>
            </a>
        </div>
        <div class="slider-block" data-slider="1">
            <div class="title title--mid title--main">
                для детей
            </div>
            <div class="slider-block__slider">
                <div class="owl-carousel js-owl-carousel-items owl-theme">
                    <?php foreach($args['deti'] as $ddeti): ?>
                    <a href="<?php echo get_post_permalink($ddeti->ID);?>" class="slider-block__item">
                        <?php $image_for_home = get_field('izobrazhenie_dlya_glavnoj_straniczy', $ddeti->ID);?>
                        <img class="lazyload" data-src="<?php echo $image_for_home;?>" alt="<?php echo $ddeti->post_title;?>" width="280" height="363" />
                        <span><?php echo $ddeti->post_excerpt;?></span>
                    </a>
                    <?php endforeach;?>

                </div>
                <div class="nav-next" data-slider="1"></div>
                <div class="nav-prev" data-slider="1"></div>
            </div>
        </div>
        <div id="for-man" class="slider-block" data-slider="2">
            <div class="title title--mid title--main">
                для мужчин
            </div>
            <div class="slider-block__slider">
                <div class="owl-carousel js-owl-carousel-items owl-theme">
                    <?php foreach($args['mug'] as $mug): ?>
                        <a href="<?php echo get_post_permalink($mug->ID);?>" class="slider-block__item">
                            <?php $image_for_home = get_field('izobrazhenie_dlya_glavnoj_straniczy', $mug->ID);?>
                            <img class="lazyload" data-src="<?php echo $image_for_home;?>" alt="<?php echo $mug->post_title;?>" width="280" height="363" />
                            <span><?php echo $mug->post_excerpt;?></span>
                        </a>
                    <?php endforeach;?>
                </div>
                <div class="nav-next" data-slider="2"></div>
                <div class="nav-prev" data-slider="2"></div>
            </div>
        </div>
        <div id="for-woman" class="slider-block" data-slider="3">
            <div class="title title--mid title--main">
                для ДЕВУШЕК
            </div>
            <div class="slider-block__slider">
                <div class="owl-carousel js-owl-carousel-items owl-theme">
                    <?php foreach($args['dev'] as $dev): ?>
                        <a href="<?php echo get_post_permalink($dev->ID);?>" class="slider-block__item">
                            <?php $image_for_home = get_field('izobrazhenie_dlya_glavnoj_straniczy', $dev->ID);?>
                            <img class="lazyload" data-src="<?php echo $image_for_home;?>" alt="<?php echo $dev->post_title;?>" width="280" height="363" />
                            <span><?php echo $dev->post_excerpt;?></span>
                        </a>
                    <?php endforeach;?>

                </div>
                <div class="nav-next" data-slider="3"></div>
                <div class="nav-prev" data-slider="3"></div>
            </div>
        </div>
    </div>
</div>
<?php else : ?>

    <div class="services-block services-block--inner" id="servblock">
        <div class="container">
            <div class="services-block__top">
                <div class="title title--big title--white">
                    Наши услуги
                </div>
            </div>
            <div class="slider-block" data-slider="1">
                <div class="block-anchor" id="for-child"></div>
                <div class="title title--mid title--main">
                    для детей
                </div>
                <div class="services-block__list">
                    <?php foreach($args['deti'] as $ddeti): ?>
                        <a href="<?php echo get_post_permalink($ddeti->ID);?>" class="slider-block__item">
                            <?php $image_for_home = get_field('izobrazhenie_dlya_glavnoj_straniczy', $ddeti->ID);?>
                            <img class="lazyload" data-src="<?php echo $image_for_home;?>" alt="<?php echo $ddeti->post_title;?>" width="280" height="363" />
                            <span><?php echo $ddeti->post_excerpt;?></span>
                        </a>
                    <?php endforeach;?>
                </div>
            </div>
            <div class="slider-block" data-slider="2">
                <div class="block-anchor" id="for-man"></div>
                <div class="title title--mid title--main">
                    для мужчин
                </div>
                <div class="services-block__list">
                    <?php foreach($args['mug'] as $mug): ?>
                        <a href="<?php echo get_post_permalink($mug->ID);?>" class="slider-block__item">
                            <?php $image_for_home = get_field('izobrazhenie_dlya_glavnoj_straniczy', $mug->ID);?>
                            <img class="lazyload" data-src="<?php echo $image_for_home;?>" alt="<?php echo $mug->post_title;?>" width="280" height="363" />
                            <span><?php echo $mug->post_excerpt;?></span>
                        </a>
                    <?php endforeach;?>
                </div>
            </div>
            <div class="slider-block" data-slider="3">
                <div class="block-anchor" id="for-woman"></div>
                <div class="title title--mid title--main">
                    для ДЕВУШЕК
                </div>
                <div class="services-block__list">
                    <?php foreach($args['dev'] as $dev): ?>
                        <a href="<?php echo get_post_permalink($dev->ID);?>" class="slider-block__item">
                            <?php $image_for_home = get_field('izobrazhenie_dlya_glavnoj_straniczy', $dev->ID);?>
                            <img class="lazyload" data-src="<?php echo $image_for_home;?>" alt="<?php echo $dev->post_title;?>" width="280" height="363" />
                            <span><?php echo $dev->post_excerpt;?></span>
                        </a>
                    <?php endforeach;?>
                </div>
            </div>
            <div class="services-block__bottom">
                <div class="services-block__bottom-title">
                    записывайтесь <br />
                    на бесплатное пробное занятие
                </div>
                <a class="button button--full button--big js-open-form">
                    <span>ЗАПИСАТЬСЯ</span>
                </a>
            </div>
            <div class="choose-service">
                <div class="container">
                    <div class="choose-service__body">
                        <div class="choose-service__img">
                            <img class="lazyload" data-src="<?=get_template_directory_uri()?>/img/pic3.jpg" alt="rus" width="760" height="513" />
                        </div>
                        <div class="choose-service__block">
                            <div class="title title--mini title--black">
                                Подбери себе услугу
                            </div>
                            <div class="title title--sub title--black">
                                Пройди тест и подбери персональные условия и консультацию
                            </div>
                            <a href="http://chnlendi36096.q1.chost.com.ua/" class="button button--full button--mini"
                            ><span>Пройти тест</span></a
                            >
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>
