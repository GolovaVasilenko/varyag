<?php
/**
 * @var $args
 */

?>
<div class="services-block">
    <div class="container">
        <div class="services-block__top">
            <div class="title title--big title--white">
                Наши услуги
            </div>
            <?php if($args['current_page'] == 'home'): ?>
            <a href="/services" class="link link--watch">
                <span>Смотреть всё</span>
                <span class="link__arrow"> </span>
            </a>
            <?php endif; ?>
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
        <div class="slider-block" data-slider="2">
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
        <div class="slider-block" data-slider="3">
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
