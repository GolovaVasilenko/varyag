<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package varyag
 */

?>
<div class="map-block">
    <a
            href="https://yandex.ru/maps/org/sportivny_klub_boyevykh_iskusstv_varyag/1172045747/?ll=37.531249%2C55.422689&mode=search&sll=37.544737%2C55.431177&sspn=0.246506%2C0.075844&text=%D0%BF%D0%BE%D0%B4%D0%BE%D0%BB%D1%8C%D1%81%D0%BA%20%D0%B2%D0%B0%D1%80%D1%8F%D0%B3&utm_source=share&z=15"
            class="map-block__taxi"
            target="_blank"
    >
        <img src="<?=get_template_directory_uri();?>/img/taxi.png" alt="taxi" width="182" height="50" />
    </a>
    <div class="block-anchor" id="map-block"></div>
    <div id="map" class="map-block__map"></div>
</div>
<?php if(is_home() || is_front_page()):?>
    <div class="container">
        <?php echo get_field('seo_tekst_na_glavnoj', $post->ID); ?>
    </div>
<?php endif; ?>
<div class="register-layout">
    <?php get_template_part('template-parts/content', 'registration')?>
</div>
<div class="login-layout">
    <?php get_template_part('template-parts/content', 'login')?>
</div>
<?php if(isset($_SESSION['reg-success'])):?>
    <script>
        jQuery(document).ready(function($) {
            $('.header__log--login').click();
        });
    </script>
<?php endif;?>
<div hidden="">
    <div id="popup-sale" class="popup popup--sale"></div>
    <div id="popup-form" class="popup popup--abon">
        <div class="callback-block callback-block--popup">
            <div class="title title--small title--black">
                Запишитесь на пробное занятие бесплатно, и подберите, что подходит Вам и Вашему ребенку. Вы сможете
                посетить разные занятия бесплатно, пока не выберите подходящее
            </div>
            <form action="" method="post" class="form form--black">
                <div class="form__item">
                    <input type="text" name="name" placeholder="Как вас зовут?">
                </div>
                <div class="form__item form__item--mask">
                    <div class="form__item-pic">
                        <img src="<?php echo get_template_directory_uri(); ?>/img/rus.jpg" alt="rus" width="27" height="18">
                    </div>
                    <input type="text" class="js-input-mask" name="phone" inputmode="text">
                    <input type="hidden" name="action" value="alx_send_mail">
                </div>
                <div class="form__bottom">
                    <button class="button button--full button--big">
                        <span>ПЕРЕЗВОНИТЕ МНЕ</span>
                    </button>
                    <span>Нажимая на кнопку «Перезвоните мне» вы соглашаетесь на обработку персональных данных в соответствии с
                  ФЗ №152</span>
                </div>
            </form>
        </div>
    </div>
    <div id="popup-ban1" class="popup popup--abon">
        <div class="callback-block callback-block--popup">
            <div class="title title--small title--black">
                Запишитесь на пробное занятие бесплатно, и подберите, что подходит Вам и Вашему ребенку. Вы сможете
                посетить разные занятия бесплатно, пока не выберите подходящее
            </div>
            <form action="" method="post" class="form form--black">
                <div class="form__item">
                    <input type="text" name="name" placeholder="Как вас зовут?">
                </div>
                <div class="form__item form__item--mask">
                    <div class="form__item-pic">
                        <img src="<?php echo get_template_directory_uri(); ?>/img/rus.jpg" alt="rus" width="27" height="18">
                    </div>
                    <input type="text" class="js-input-mask" name="phone" inputmode="text">
                    <input type="hidden" name="action" value="alx_send_mail">
                </div>
                <div class="form__bottom">
                    <button class="button button--full button--big">
                        <span>ПЕРЕЗВОНИТЕ МНЕ</span>
                    </button>
                    <span>Нажимая на кнопку «Перезвоните мне» вы соглашаетесь на обработку персональных данных в соответствии с
                  ФЗ №152</span>
                </div>
            </form>
        </div>
    </div>
    <div id="popup-ban2" class="popup popup--abon">
        <div class="callback-block callback-block--popup">
            <div class="title title--small title--black">
                Правильное питание в спорте - это 70% твоего успеха. записывайтесь на пробное занятие и получи
                консультацию по Своему питанию
            </div>
            <form action="" method="post" class="form form--black">
                <div class="form__item">
                    <input type="text" name="name" placeholder="Как вас зовут?">
                </div>
                <div class="form__item form__item--mask">
                    <div class="form__item-pic">
                        <img src="<?php echo get_template_directory_uri(); ?>/img/rus.jpg" alt="rus" width="27" height="18">
                    </div>
                    <input type="text" class="js-input-mask" inputmode="text">
                    <input type="hidden" name="action" value="alx_send_mail">
                </div>
                <div class="form__bottom">
                    <button class="button button--full button--big">
                        <span>ПЕРЕЗВОНИТЕ МНЕ</span>
                    </button>
                    <span>Нажимая на кнопку «Перезвоните мне» вы соглашаетесь на обработку персональных данных в соответствии с
                  ФЗ №152</span>
                </div>
            </form>
        </div>
    </div>
    <div id="popup-dop2" class="popup popup--abon">
        <div class="callback-block callback-block--popup">
            <div class="title title--small title--black">
                В зависимости от Ваших целей и уровня физической подготовки, а так же индивидуальных особенностей
                здоровья, наши опытные мастера подберут индивидуальный план тренировок
            </div>
            <form action="" method="post" class="form form--black">
                <div class="form__item">
                    <input type="text" name="name" placeholder="Как вас зовут?">
                </div>
                <div class="form__item form__item--mask">
                    <div class="form__item-pic">
                        <img src="<?php echo get_template_directory_uri(); ?>/img/rus.jpg" alt="rus" width="27" height="18">
                    </div>
                    <input type="text" class="js-input-mask" inputmode="text">
                    <input type="hidden" name="action" value="alx_send_mail">
                </div>
                <div class="form__bottom">
                    <button class="button button--full button--big">
                        <span>ПЕРЕЗВОНИТЕ МНЕ</span>
                    </button>
                    <span>Нажимая на кнопку «Перезвоните мне» вы соглашаетесь на обработку персональных данных в соответствии с
                  ФЗ №152</span>
                </div>
            </form>
        </div>
    </div>
    <div id="popup-sales" class="popup popup--sales">
        <a class="popup__image js-close-open">
            <img src="<?=get_template_directory_uri();?>/img/sale-popup.png" alt="rus" />
        </a>
    </div>
</div>
<div class="cookie">
    <div class="cookie__text">
        Для удобства работы с сайтом <br />
        мы используем файлы cookie! <a href="/politika-cookie/">Что это значит?</a>
    </div>
    <button class="button button--full button--mini js-close-cookie">
        <span>Принимаю</span>
    </button>
</div>
<footer class="footer">
    <div class="container">
        <div class="footer__body">
            <div class="footer__top">
                <div class="footer__left">
                    <a href="#" class="logo">
                        <img src="<?php echo get_template_directory_uri(); ?>/img/logo.png" alt="logo" width="120" height="120">
                        <span>Спортивный клуб боевых искусств </span>
                    </a>
                    <div class="subscribe">
                        <img src="<?php echo get_template_directory_uri(); ?>/img/footer.png" alt="logo" width="200" height="200">
                        <div class="subscribe__body">
                            <div class="subscribe__text">
                                Запишитесь на бесплатное пробное занятие прямо сейчас
                            </div>
                            <a href="#form-block" class="link link--small">
                                <span>Записаться</span>
                                <span class="link__arrow"></span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="footer__column">
                    <div class="footer__title">
                        ИНФОРМАЦИЯ
                    </div>
                    <a href="/katalog/" class="link link--footer">
                        Каталог
                    </a>
                    <a href="/raspisanie/" class="link link--footer">
                        Расписание тренировок
                    </a>
                    <a href="/sales/" class="link link--footer">
                        Акции
                    </a>
                    <a href="/coach/" class="link link--footer">
                        Тренеры
                    </a>
                    <a href="#" class="link link--footer">
                        Галерея
                    </a>
                    <a class="link link--footer">
                        Полезные статьи
                    </a>
                    <a class="link link--footer">
                        Новости клуба
                    </a>
                    <a href="/sbory/" class="link link--footer">
                        Спортивно-оздоровительные сборы
                    </a>
                    <a href="/pravila-kluba-varyag/" class="link link--footer">
                        Правила клуба
                    </a>
                    <a href="/kontakty/" class="link link--footer">
                        Контакты
                    </a>
                    <a href="/sbory.html" class="link link--footer">
                        Мероприятия
                    </a>
                    <a href="/kontakty/" class="link link--footer">
                        Способы оплаты
                    </a>
                </div>
                <div class="footer__column">
                    <div class="footer__title">
                        Услуги
                    </div>
                    <a href="#" class="link link--footer">
                        Для детей
                    </a>
                    <a href="/discipline/dlya-detej-tajskij-boks/" class="link link--footer">
                        Тайский бокс
                    </a>
                    <a href="/discipline/dlya-detej-mma/" class="link link--footer">
                        ММА
                    </a>
                    <a href="/discipline/dlya-detej-greppling/" class="link link--footer">
                        Греплинг
                    </a>
                    <a href="/discipline/tabata-trenirovki-dlya-devushek/" class="link link--footer">
                        Tabata для девушек
                    </a>
                    <a href="/discipline/dlya-muzhchin-brazilskoe-dzhiu-dzhitsu/" class="link link--footer">
                        Бразильское Джиу Джитсу
                    </a>
                    <a href="/discipline/silovye-trenirovki-dlya-muzhchin-v-mini-gruppah/" class="link link--footer">
                        Силовые тренировки
                    </a>
                    <a href="/discipline/intervalnye-trenirovki-hiit/" class="link link--footer">
                        HIIT (интервальные тренировки) для девушек
                    </a>
                    <a href="/discipline/fitnes-dlya-devushek-v-podolske-2/" class="link link--footer">
                        Силовые функциональные тренировки для девушек и женщин
                    </a>
                    <a href="/discipline/fitnes-dlya-devushek-v-podolske/" class="link link--footer">
                        Здоровая спина и гибкое тело, functional flow
                    </a>
                    <a href="/services/" class="footer__link">
                        Смотреть все услуги
                    </a>
                </div>
                <div class="footer__column">
                    <div class="footer__title">
                        КОНТАКТЫ
                    </div>
                    <div class="footer__connect">
                        <a href="tel:+79675553288" class="footer__number"> +7 967 555-32-88</a>
                        <a href="https://wa.me/79037284090" target="_blank" class="footer__soc">
                            <img src="<?php echo get_template_directory_uri(); ?>/img/whatsap.png" alt="logo" width="17" height="17">
                        </a>
                        <a href="https://t.me/varyag_podolsk" target="_blank" class="footer__soc">
                            <img src="<?php echo get_template_directory_uri(); ?>/img/telegram.png" alt="logo" width="17" height="17">
                        </a>
                        <a href="mailto: varyagclub-pd@yandex.ru">varyagclub-pd@yandex.ru</a>
                    </div>
                    <div class="footer__address">
                        <span> Режим работы:</span>
                        <span> Будни 10:00 – 22:30</span>
                        <span>Выходные 10:00 – 18:00</span>
                    </div>
                    <div class="footer__address">
                        <span>Адрес:</span>
                        <span>Спортивный Комплекс "ТРУД" Россия,</span>
                        <span> Московская область, Подольск, улица Клемента Готвальда, 4. 1, , 142114</span>
                    </div>
                    <a href="https://yandex.ru/maps/org/sportivny_klub_boyevykh_iskusstv_varyag/1172045747/?ll=37.531249%2C55.422689&amp;mode=search&amp;sll=37.544737%2C55.431177&amp;sspn=0.246506%2C0.075844&amp;text=%D0%BF%D0%BE%D0%B4%D0%BE%D0%BB%D1%8C%D1%81%D0%BA%20%D0%B2%D0%B0%D1%80%D1%8F%D0%B3&amp;utm_source=share&amp;z=15" class="footer__link">
                        Построить маршрут
                    </a>
                    <a href="https://vk.com/podolskvaryagclub" target="_blank" class="footer__social">
                        <img src="<?php echo get_template_directory_uri(); ?>/img/vk.png" alt="" width="28" height="28">
                        <span>Наша группа Вконтакте</span>
                    </a>
                    <a href="https://www.youtube.com/channel/UCtP3pHTWxVKOilakODEU2RQ" target="_blank" class="footer__social">
                        <img src="<?php echo get_template_directory_uri(); ?>/img/youtube.png" alt="" width="28" height="28">
                        <span>Канал на YouTube</span>
                    </a>
                </div>
            </div>
            <div class="footer__bottom">
                <div class="footer__left">
                    <div class="footer__text">2008 - 2022 © Варяг Все права защищены</div>
                </div>
                <div class="footer__column">
                    <div class="footer__text">
                        ИНН 503012728428, ОГРН 322508100503649 Тел.: <a href="tel: +79675553288">+7 (967) 555-32-88</a> ИП
                        НОРОВ РУСТАМ БАХТИЕРОВИЧ
                    </div>
                </div>
                <div class="footer__column">
                    <div class="footer__text">
                        <a href="/politika-cookie/">Политика использования файлов «cookie»</a>
                        <a href="/politika-konfidenczialnosti/">Политика конфиденциальности</a>
                    </div>
                </div>
                <div class="footer__column">
                    <div class="footer-pay">
                        <div class="footer-pay__item">
                            <img src="<?php echo get_template_directory_uri(); ?>/img/visa.png" alt="logo" width="36" height="12">
                        </div>
                        <div class="footer-pay__item">
                            <img src="<?php echo get_template_directory_uri(); ?>/img/mastercard.svg" alt="logo" width="40" height="16">
                        </div>
                        <div class="footer-pay__item">
                            <img src="<?php echo get_template_directory_uri(); ?>/img/mir.png" alt="logo" width="36" height="12">
                        </div>
                        <div class="footer-pay__item">
                            <img src="<?php echo get_template_directory_uri(); ?>/img/mir.png" alt="logo" width="36" height="12">
                        </div>
                        <div class="footer-pay__item">
                            <img src="<?php echo get_template_directory_uri(); ?>/img/visa.png" alt="logo" width="36" height="12">
                        </div>
                    </div>
                </div>
                <a href="http://quantm.ru/?utm_source=varuag" target="_blank" class="footer__column">
                    <div class="footer__mini-text">
                        Разработка сайта и маркетинг
                    </div>
                    <img src="<?php echo get_template_directory_uri(); ?>/img/quamt.png" alt="quamt" width="143" height="23">
                </a>
            </div>
        </div>
    </div>
</footer>
<script
        src="https://api-maps.yandex.ru/2.1/?lang=ru_RU&amp;apikey=6be5698f-d1e7-4a41-b2bf-c37a919c4247"
        type="text/javascript"
></script>
<!--<script src="icon_customImage.js" type="text/javascript"></script>-->

<script type="text/javascript">
    ymaps.ready(function() {
        var myMap = new ymaps.Map(
                "map",
                {
                    center: [55.422012, 37.531352],
                    zoom: 12
                },
                {
                    searchControlProvider: "yandex#search"
                }
            ),
            // Создаём макет содержимого.
            MyIconContentLayout = ymaps.templateLayoutFactory.createClass(
                '<div style="color: #FFFFFF; font-weight: bold;">$[properties.iconContent]</div>'
            ),
            myPlacemark = new ymaps.Placemark(
                myMap.getCenter(),
                {
                    hintContent: "Собственный значок метки",
                    balloonContent: "Это красивая метка"
                },
                {
                    // Опции.
                    // Необходимо указать данный тип макета.
                    iconLayout: "default#image",
                    // Своё изображение иконки метки.
                    iconImageHref: "<?=get_template_directory_uri();?>/img/logo.png",
                    // Размеры метки.
                    iconImageSize: [100, 100],
                    // Смещение левого верхнего угла иконки относительно
                    // её "ножки" (точки привязки).
                    iconImageOffset: [-5, -38]
                }
            ),
            myPlacemarkWithContent = new ymaps.Placemark(
                [55.661574, 37.573856],
                {
                    hintContent: "Собственный значок метки с контентом",
                    balloonContent: "А эта — новогодняя",
                    iconContent: "12"
                },
                {
                    // Опции.
                    // Необходимо указать данный тип макета.
                    iconLayout: "default#imageWithContent",
                    // Своё изображение иконки метки.
                    iconImageHref: "images/ball.png",
                    // Размеры метки.
                    iconImageSize: [48, 48],
                    // Смещение левого верхнего угла иконки относительно
                    // её "ножки" (точки привязки).
                    iconImageOffset: [-24, -24],
                    // Смещение слоя с содержимым относительно слоя с картинкой.
                    iconContentOffset: [15, 15],
                    // Макет содержимого.
                    iconContentLayout: MyIconContentLayout
                }
            );

        myMap.geoObjects.add(myPlacemark).add(myPlacemarkWithContent);
    });
</script>
</div><!-- #page -->
<script>
    (function() {
        var widget = document.createElement("script");
        widget.dataset.pfId = "7dbbb9fc-1140-4b29-aabd-fa752e53ff11";
        widget.src =
            "https://widget.profeat.team/script/widget.js?id=7dbbb9fc-1140-4b29-aabd-fa752e53ff11&now=" + Date.now();
        document.head.appendChild(widget);
    })();
</script>
<?php wp_footer(); ?>

</body>
</html>
