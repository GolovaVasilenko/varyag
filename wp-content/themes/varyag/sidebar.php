<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package varyag
 */

if ( !is_active_sidebar( 'sidebar-filter' ) ) {

return;
}
?>
<form class="filter-block__form">
        <div class="filter-close">
            <img src="<?php echo get_template_directory_uri(); ?>/img/close.svg" alt="close" width="25" height="25">
        </div>
        <div class="filter">
            <a href="/" class="filter__shower js-filter-shower show">
                <div class="filter__shower-body">
                    <div class="filter__shower-count">27</div>
                    <span>Показать</span>
                </div>
            </a>
            <div class="accordion-blocks">
            <?php dynamic_sidebar( 'sidebar-filter' ); ?>
            </div>

            <div class="filter-mob-btn">
                <div class="button button--blue-dark">
                    Сбросить
                </div>
                <div class="button button--blue-dark">
                    Показать (26)
                </div>
            </div>

            <div class="button button--reset button--blue-dark">
                Сбросить
            </div>

        </div>
    </form>
<!--<aside id="secondary" class="widget-area">
	<?php //dynamic_sidebar( 'sidebar-1' ); ?>
</aside>-->
