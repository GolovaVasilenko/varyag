<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package varyag
 */

$imageBg = get_template_directory_uri() . "/img/celebrate.jpg";
if(is_page('o-klube-varyag')) {
    $imageBg = get_template_directory_uri() . "/img/pic.jpg";
}
?>
<div class="top-block top-block--shorter" style="background-image: url(<?=$imageBg;?>)">
    <div class="top-block__body container">
        <?php if(is_page('o-klube-varyag')):?>
        <div class="top-block__middle">
            <div class="breadcrumbs">
                <a href="/" class="breadcrumbs__link">
                    <img src="<?=get_template_directory_uri();?>/img/home.png" alt="logo" width="14" height="14">
                </a>
                <a class="breadcrumbs__link">
                    О клубе «Варяг»
                </a>
            </div>
            <h1 class="top-block__title">
                О клубе «Варяг»
            </h1>
            <div class="top-block__sub-title">Клуб спортивных боевых искусств «Варяг» в г. Подольск</div>
            <div class="top-block__buttons">
                <button class="button button--big button--border js-open-form">
                    <span>ПОДРОБНЕЕ</span>
                </button>
            </div>
        </div>
        <?php else : ?>
        <div class="top-block__middle">
            <div class="breadcrumbs breadcrumbs">
                <a href="/" class="breadcrumbs__link">
                    <img src="<?=get_template_directory_uri();?>/img/home.png" alt="logo" width="14" height="14">
                </a>
                <a class="breadcrumbs__link">
                    <?php the_title();?>
                </a>
            </div>
        </div>
        <?php endif; ?>
    </div>
</div>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="entry-content">
        <div class="container">

            <div class="text-block text-block--inner">
                <h1><?php the_title();?></h1>
                <?php the_content(); ?>
            </div>
        </div>
	</div>
</article>
