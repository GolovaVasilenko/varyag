<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package varyag
 */

get_header();
?>

    <div class="error-page">
        <img src="<?=get_template_directory_uri();?>/img/404.jpg" alt="logo" width="1920" height="1077" />
        <div class="error-page__title">
            404
        </div>
        <div class="error-page__body">
            <div class="error-page__text">
                Кажется, что-то пошло не так! Страница которую вы запрашиваете, не существует. Возможно она устарела, была
                удалена или был введен неправильный адрес в адресной строке
            </div>
            <a href="/" class="button button--big button--border js-open-form">
                <span>на главную</span>
            </a>
        </div>
    </div>

<?php
get_footer();
