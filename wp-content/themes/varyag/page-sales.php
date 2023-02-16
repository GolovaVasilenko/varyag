<?php
get_header();

$query = new WP_Query(['post_type' => 'sales']);

?>
    <div class="top-block top-block--short" style="background-image: url(<?=get_template_directory_uri();?>/img/basketback.jpg)">
        <div class="top-block__body container">
            <div class="top-block__middle">
                <div class="breadcrumbs breadcrumbs">
                    <a href="/" class="breadcrumbs__link">
                        <img src="<?=get_template_directory_uri();?>/img/home.png" alt="logo" width="14" height="14">
                    </a>
                    <a class="breadcrumbs__link">
                        <?php the_title();?>
                    </a>
                </div>
                <h1 class="top-block__title">
                    <?php the_title();?>
                </h1>
            </div>
        </div>
    </div>
    <div class="sales-block">
        <div class="container">
            <div class="sales-block__text">
                <div class="title title--big title--black">
                    «Акции в клубе спортивных боевых искусств в Подольске «Варяг»
                </div>
                <div class="title title--sub title--black">
                    – «Приглашаем в наш клуб и предлагаем ознакомиться со скидками и спецпредложениями на покупку абонементов
                    наш зал и комплектов защиты и экипировки для занятия спортом.
                </div>
            </div>
            <div class="sales-block__body">
                <?php foreach($query->posts as $sale):?>
                <div class="sales-item js-sale-item">
                    <a class="sales-item__img">
                        <img src="<?=get_the_post_thumbnail_url($sale->ID, 'full');?>" alt="<?=$sale->post_title;?>" width="260" height="260">
                    </a>
                    <div class="sales-item__body">
                        <a class="sales-item__name">
                            <?=$sale->post_title;?>
                        </a>
                        <div class="sales-item__text">
                            <?=$sale->post_content;?>
                        </div>
                    </div>
                    <div class="sale-popup">
                        <div class="sale-popup__img">
                            <img src="<?=get_the_post_thumbnail_url($sale->ID, 'full');?>" alt="<?=$sale->post_title;?>" width="260" height="260">
                        </div>
                        <div class="sale-popup__body">
                            <div class="sale-popup__title">
                                <?=$sale->post_title;?>
                            </div>
                            <div class="sale-popup__text">
                                <?=$sale->post_content;?>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach;?>
            </div>
        </div>
    </div>
<?php get_footer();
