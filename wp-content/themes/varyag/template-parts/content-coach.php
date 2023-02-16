<?php
/**
 * @var $args
 */
$output = '';
$coaches = $args['coaches'];

echo '<div class="container">
        <div class="coach-inner">
          <div class="coach-inner__list">
                ';

foreach($coaches->terms as $coach) {
    $image_src = get_field('foto-trenera', $coach);
    echo '<a href="/coach/' . $coach->slug . '" class="prod-item prod-item--coach">
                        <img class="owl-lazy" src="' . $image_src . '" data-src="' . $image_src . '" alt="' . $coach->name . '" width="280" height="363" />
                        <span class="prod-item__body">
                    <span>' . $coach->name . '</span>
                    <span>' . $coach->description . '</span>
                    <div class="button button--small button--full">ПОДРОБНЕЕ</div>
                  </span>
                    </a>';
}


echo '
        </div>
    </div>
    </div>';
