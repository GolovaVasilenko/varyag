<?php
get_header();
?>
<div class="error-page">
    <img src="<?=get_template_directory_uri();?>/img/thanks_bg.png" alt="logo" width="1920" height="1077" />
    <div class="error-page__title">
        <?php the_title(); ?>
    </div>
    <div class="error-page__body">
        <div class="error-page__text">
            <?php the_content(); ?>
        </div>
        <a href="/" class="button button--big button--border ">
            <span>на главную</span>
        </a>
    </div>
</div>
<?php get_footer();
