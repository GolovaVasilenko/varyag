<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package varyag
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="entry-content">
		<?php the_content(); ?>
	</div><!-- .entry-content -->

    <div class="container">
        <div class="call-wrap">
            <div class="block-anchor" id="callback"></div>
            <div class="callback-block callback-block--inner">
                <div class="title title--big title--black">
                    Оставить заявку
                </div>
                <div class="title title--small title--black">
                    Оставляйте заявку и уточняйте наличие мест!
                </div>
                <form action="" method="post" class="form form--black js-send-form">
                    <div class="form__item">
                        <input type="text" name="name" id="name" placeholder="Как вас зовут?" />
                    </div>
                    <div class="form__item form__item--mask">
                        <div class="form__item-pic">
                            <img src="<?=get_template_directory_uri()?>/img/rus.jpg" alt="rus" width="27" height="18" />
                        </div>
                        <input type="text" class="js-input-mask" name="phone" id="phone" />
                    </div>
                    <div class="form__bottom">
                        <button class="button button--full button--big">
                            <span>ПЕРЕЗВОНИТЕ МНЕ</span>
                        </button>
                        <span
                        >Нажимая на кнопку «Перезвоните мне» вы соглашаетесь на обработку персональных данных в соответствии с
                  ФЗ №152</span
                        >
                    </div>
                </form>
            </div>
            <div class="call-wrap__block">
                <span>или звоните по номеру телефона:</span>
                <div class="footer__connect">
                    <a href="tel:+79675553288" class="footer__number"> +7 967 555-32-88</a>
                    <a
                            href="https://api.whatsapp.com/send/?phone=79647816824&text&type=phone_number&app_absent=0"
                            target="_blank"
                            class="footer__soc"
                    >
                        <img src="<?=get_template_directory_uri()?>/img/whatsap.png" alt="logo" width="17" height="17" />
                    </a>
                    <a href="https://t.me/varyag_pd" target="_blank" class="footer__soc">
                        <img src="<?=get_template_directory_uri()?>/img/telegram.png" alt="logo" width="17" height="17" />
                    </a>
                    <a href="mailto: varyagclub-pd@yandex.ru">varyagclub-pd@yandex.ru</a>
                </div>
            </div>
        </div>
    </div>
    <?=do_shortcode('[coach_list]');?>
    <div class="container">
        <div class="dop-block dop-block--inner">
            <div class="title title--big title--black">
                ДОПОЛНИТЕЛЬНО
            </div>
            <div class="dop-block__body">
                <div class="dop-item js-dop1">
                    <div class="dop-item__img">
                        <img class="lazyload" data-src="<?=get_template_directory_uri()?>/img/dop1.jpg" alt="img5" width="573" height="292" />
                    </div>
                    <div class="dop-item__text">
                        Подбор персонального питания
                    </div>
                </div>
                <div class="dop-item js-dop2">
                    <div class="dop-item__img">
                        <img class="lazyload" data-src="<?=get_template_directory_uri()?>/img/dop2.jpg" alt="img5" width="573" height="292" />
                    </div>
                    <div class="dop-item__text">
                        Подбор плана тренировок
                    </div>
                </div>
            </div>
            <a href="/services/" class="button button--big button--full">
                <span>посмотреть все услуги</span>
            </a>
        </div>
    </div>
</article>
