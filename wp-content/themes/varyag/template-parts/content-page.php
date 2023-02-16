<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package varyag
 */

?>
<div class="top-block top-block--shorter" style="background-image: url(<?=get_template_directory_uri();?>/img/celebrate.jpg)">
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
        </div>
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
