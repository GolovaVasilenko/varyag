<?php
add_shortcode('coach_list', 'get_coach_list');

function get_coach_list()
{

    $coaches = new WP_Term_Query( [
        'taxonomy'   => 'coach',
        'hide_empty' => false,
    ] );

    ob_start();
    get_template_part('template-parts/content', 'coach_home', [ 'coaches' => $coaches]);

    return ob_get_clean();
}

add_shortcode('block_list_disciplines', 'list_disciplines_callback');

function list_disciplines_callback($atts)
{
    $atts = shortcode_atts( array(
        'page' => 'services',
    ), $atts );


    $args_deti = [
        'post_type' => 'discipline',
        'post_status' => 'publish',
        'order' => 'ASC',
        'orderby' => 'ID',
        'tax_query' => [
            'relation' => 'OR',
            [
                'taxonomy' => 'services',
                'field'    => 'slug',
                'terms'    => ['dlya-detej']
            ]
        ]
    ];
    $args_mug = [
        'post_type' => 'discipline',
        'post_status' => 'publish',
        'order' => 'ASC',
        'orderby' => 'ID',
        'tax_query' => [
            'relation' => 'OR',
            [
                'taxonomy' => 'services',
                'field'    => 'slug',
                'terms'    => ['dlya-muzhchin']
            ]
        ]
    ];
    $args_dev = [
        'post_type' => 'discipline',
        'post_status' => 'publish',
        'order' => 'ASC',
        'orderby' => 'ID',
        'tax_query' => [
            'relation' => 'OR',
            [
                'taxonomy' => 'services',
                'field'    => 'slug',
                'terms'    => ['dlya-devushek']
            ]
        ]
    ];
    $query_dev = new WP_Query($args_dev);
    $query_mug = new WP_Query($args_mug);
    $query_deti = new WP_Query($args_deti);
    ob_start();
    get_template_part('template-parts/content', 'services', ['deti' => $query_deti->posts, 'mug' => $query_mug->posts, 'dev' => $query_dev->posts, 'current_page' => $atts['page']]);
    return ob_get_clean();
}

add_shortcode('products_list_home', 'product_list_home_callback');

function product_list_home_callback()
{

    $query = new WC_Product_Query(['exclude_category' => 'abonementy']);
    $products_all = $query->get_products();

    $output = '<div class="products-block">
        <div class="container">
          <div class="products-block__top products-block__top--mob">
            <div class="title title--big title--black">
              ТОВАРЫ
            </div>
            <a href="/katalog/" class="link link--md-show link--watch">
              <span>Смотреть всё</span>
              <span class="link__arrow"> </span>
            </a>
          </div>
          <div class="products-block__top products-block__top--tab">
            <div class="products-block__tabs-wrap">
              <div class="products-block__tabs">
                <div class="tab-carousel js-tab-carousel active" data-tab="all">
                  Все
                </div>
                <div class="tab-carousel js-tab-carousel" data-tab="protect">
                  ЗАЩИТА
                </div>
                <div class="tab-carousel js-tab-carousel" data-tab="tshirt">
                  ФУТБОЛКИ
                </div>
                <div class="tab-carousel js-tab-carousel" data-tab="shrot">
                  ШОРТЫ
                </div>
                <div class="tab-carousel js-tab-carousel" data-tab="aksesuars">
                  аксессуары
                </div>
              </div>
            </div>
            <a href="/katalog/" class="link link--watch link--md-hide">
              <span>Смотреть всё</span>
              <span class="link__arrow"> </span>
            </a>
          </div>';

    $output .= '<div class="products-block__sliders">
            <div class="slider-block js-slider-block slider-block--prod active" data-slider="all" data-tab="all">
              <div class="slider-block__slider">
                <div class="owl-carousel js-owl-carousel-items owl-theme">';

    foreach($products_all as $product ) {
        if(in_array(65, $product->category_ids)) {
            continue;
        }
        $output .= '<div class="prod-item prod-item--prod">
                    <div class="prod-item__img">
                      <img class="lazyload" data-src="' . get_the_post_thumbnail_url($product->id) . '" alt="img5" width="221" height="297" />
                      <span>' . $product->name . '</span>
                    </div>
                    <span class="prod-item__body">
                      <span>' . $product->name . '</span>
                      <span
                        >' . $product->short_description . '</span
                      >
                      <a href="' . get_post_permalink($product->id) . '" class="button button--small button--full">ПОДРОБНЕЕ</a>
                    </span>
                  </div>';
    }

    $output .= '<div class="nav-next" data-slider="all"></div>
                <div class="nav-prev" data-slider="all"></div>';
    $output .= '</div></div></div></div>';
    $output .= '<div class="products-block__sliders">
            <div class="slider-block js-slider-block slider-block--prod" data-slider="protect" data-tab="protect">
              <div class="slider-block__slider">
                <div class="owl-carousel js-owl-carousel-items owl-theme">';
    foreach( $products_all as $product ) {
        if(in_array(65, $product->category_ids)) {
            continue;
        }
        if(in_array(50, $product->tag_ids)) {
            $output .= '<div class="prod-item prod-item--prod">
                    <div class="prod-item__img">
                      <img class="lazyload" data-src="' . get_the_post_thumbnail_url($product->id) . '" alt="img5" width="221" height="297" />
                      <span>' . $product->name . '</span>
                    </div>
                    <span class="prod-item__body">
                      <span>' . $product->name . '</span>
                      <span
                        >' . $product->short_description . '</span
                      >
                      <a href="' . get_post_permalink($product->id) . '" class="button button--small button--full">ПОДРОБНЕЕ</a>
                    </span>
                  </div>';
        }

    }

    $output .= '<div class="nav-next" data-slider="protect"></div>
                <div class="nav-prev" data-slider="protect"></div>';
    $output .= '</div></div></div></div>';

    $output .= '<div class="products-block__sliders">
            <div class="slider-block js-slider-block slider-block--prod" data-slider="tshirt" data-tab="tshirt">
              <div class="slider-block__slider">
                <div class="owl-carousel js-owl-carousel-items owl-theme">';
    foreach($products_all as $product ) {
        if(in_array(65, $product->category_ids)) {
            continue;
        }
        if(in_array(51, $product->tag_ids)) {
            $output .= '<div class="prod-item prod-item--prod">
                    <div class="prod-item__img">
                      <img class="lazyload" data-src="' . get_the_post_thumbnail_url($product->id) . '" alt="img5" width="221" height="297" />
                      <span>' . $product->name . '</span>
                    </div>
                    <span class="prod-item__body">
                      <span>' . $product->name . '</span>
                      <span
                        >' . $product->short_description . '</span
                      >
                      <a href="' . get_post_permalink($product->id) . '" class="button button--small button--full">ПОДРОБНЕЕ</a>
                    </span>
                  </div>';
        }
    }

    $output .= '<div class="nav-next" data-slider="tshirt"></div>
                <div class="nav-prev" data-slider="tshirt"></div>';
    $output .= '</div></div></div></div>';
    $output .= '<div class="products-block__sliders">
            <div class="slider-block js-slider-block slider-block--prod" data-slider="shrot" data-tab="shrot">
              <div class="slider-block__slider">
                <div class="owl-carousel js-owl-carousel-items owl-theme">';
    foreach($products_all as $product ) {
        if(in_array(65, $product->category_ids)) {
            continue;
        }
        if(in_array(52, $product->tag_ids)) {
            $output .= '<div class="prod-item prod-item--prod">
                    <div class="prod-item__img">
                      <img class="lazyload" data-src="' . get_the_post_thumbnail_url($product->id) . '" alt="img5" width="221" height="297" />
                      <span>' . $product->name . '</span>
                    </div>
                    <span class="prod-item__body">
                      <span>' . $product->name . '</span>
                      <span
                        >' . $product->short_description . '</span
                      >
                      <a href="' . get_post_permalink($product->id) . '" class="button button--small button--full">ПОДРОБНЕЕ</a>
                    </span>
                  </div>';
        }
    }

    $output .= '<div class="nav-next" data-slider="shrot"></div>
                <div class="nav-prev" data-slider="shrot"></div>';
    $output .= '</div></div></div></div>';
    $output .= '<div class="products-block__sliders">
            <div class="slider-block js-slider-block slider-block--prod" data-slider="aksesuars" data-tab="aksesuars">
              <div class="slider-block__slider">
                <div class="owl-carousel js-owl-carousel-items owl-theme">';

    foreach($products_all as $product ) {
        if(in_array(65, $product->category_ids)) {
            continue;
        }
        if(in_array(47, $product->category_ids)) {
            $output .= '<div class="prod-item prod-item--prod">
                    <div class="prod-item__img">
                      <img class="lazyload" data-src="' . get_the_post_thumbnail_url($product->id) . '" alt="img5" width="221" height="297" />
                      <span>' . $product->name . '</span>
                    </div>
                    <span class="prod-item__body">
                      <span>' . $product->name . '</span>
                      <span
                        >' . $product->short_description . '</span
                      >
                      <a href="' . get_post_permalink($product->id) . '" class="button button--small button--full">ПОДРОБНЕЕ</a>
                    </span>
                  </div>';
        }
    }

    $output .= '<div class="nav-next" data-slider="aksesuars"></div>
                <div class="nav-prev" data-slider="aksesuars"></div>';
    $output .= '</div></div></div></div>';


    $output .= '</div></div>';

    return $output;
}
