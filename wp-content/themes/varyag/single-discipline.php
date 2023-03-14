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
            <?php get_template_part('template-parts/content', 'abon-block', ['preimushestva_title' => $preimushestva_title, 'preimushestva_text' => $preimushestva_text]); ?>
        </div>
    </div>

    <?php get_template_part('template-parts/content', 'discipline_block');?>

<?php get_footer();
