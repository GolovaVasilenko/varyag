<?php
/**
 * @var $args
 */
$output = '';
$coaches = $args['coaches'];

$output .= '<div class="container"><div class="coach-block">
        <div class="coach-block__top coach-block__top--mob">
            <div class="title title--big title--black">
                тренера
            </div>
            <a href="/coach/" class="link link--watch">
                <span>Смотреть всё</span>
                <span class="link__arrow"> </span>
            </a>
        </div>
        <div class="slider-block" data-slider="4">
            <div class="slider-block__slider">
                <div class="owl-carousel js-owl-carousel-items owl-theme">
                ';

foreach($coaches->terms as $coach) {
    $image_src = get_field('foto-trenera', $coach);
    $output .= '<a href="/coach/' . $coach->slug . '" class="prod-item prod-item--coach">
                        <img class="owl-lazy" data-src="' . $image_src . '" alt="img5" width="280" height="363" />
                        <span class="prod-item__body">
                    <span>' . $coach->name . '</span>
                    <span>' . $coach->description . '</span>
                    <div class="button button--small button--full">ПОДРОБНЕЕ</div>
                  </span>
                    </a>';
}


$output .= '</div>
                <div class="nav-next" data-slider="4"></div>
                <div class="nav-prev" data-slider="4"></div>
            </div>
        </div>
    </div></div>';
echo $output;