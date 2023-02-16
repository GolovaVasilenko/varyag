<?php
get_header();

$coach = get_queried_object();

$polnoe_opisanie = get_field('polnoe_opisanie', $coach);
$foto_dlya_polnogo_opisaniya = get_field('foto_dlya_polnogo_opisaniya', $coach);
?>
    <div class="top-block top-block--shorter" style="background-image: url(<?=get_template_directory_uri();?>/img/basketback.jpg)">
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
    </div>
<?php get_footer();
