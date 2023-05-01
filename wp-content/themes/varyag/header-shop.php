<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <link rel="apple-touch-icon" sizes="180x180" href="<?=get_template_directory_uri();?>/favicon/apple-touch-icon.png" />
    <link rel="icon" type="image/png" sizes="32x32" href="<?=get_template_directory_uri();?>/favicon/favicon-32x32.png" />
    <link rel="icon" type="image/png" sizes="16x16" href="<?=get_template_directory_uri();?>/favicon/favicon-16x16.png" />
    <link rel="manifest" href="<?=get_template_directory_uri();?>/favicon/site.webmanifest" />
    <!--<meta name="msapplication-TileColor" content="#ffffff" />
    <meta name="theme-color" content="#533939" />-->

    <?php wp_head(); ?>
    <!-- Yandex.Metrika counter -->
    <script type="text/javascript">
        (function(m, e, t, r, i, k, a) {
            m[i] =
                m[i] ||
                function() {
                    (m[i].a = m[i].a || []).push(arguments);
                };
            m[i].l = 1 * new Date();
            for (var j = 0; j < document.scripts.length; j++) {
                if (document.scripts[j].src === r) {
                    return;
                }
            }
            (k = e.createElement(t)),
                (a = e.getElementsByTagName(t)[0]),
                (k.async = 1),
                (k.src = r),
                a.parentNode.insertBefore(k, a);
        })(window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

        ym(90723758, "init", {
            clickmap: true,
            trackLinks: true,
            accurateTrackBounce: true,
            webvisor: true
        });
    </script>
    <noscript
    ><div><img src="https://mc.yandex.ru/watch/90723758" style="position:absolute; left:-9999px;" alt="" /></div
        ></noscript>
    <!-- /Yandex.Metrika counter -->
    <meta name="google-site-verification" content="HupIVvJZ3xezYN9kUedeB5JOwWSyODdndKh7sZmVESk" />
    <script type="text/javascript">
        !(function() {
            var t = document.createElement("script");
            (t.type = "text/javascript"),
                (t.async = !0),
                (t.src = "https://vk.com/js/api/openapi.js?169"),
                (t.onload = function() {
                    VK.Retargeting.Init("VK-RTRG-1555476-gmBsf"), VK.Retargeting.Hit();
                }),
                document.head.appendChild(t);
        })();
    </script>
    <noscript
    ><img src="https://vk.com/rtrg?p=VK-RTRG-1555476-gmBsf" style="position:fixed; left:-999px;" alt=""
        /></noscript>
</head>
<body <?php body_class(); ?> >
<?php wp_body_open(); ?>
<a href="https://yandex.ru/maps/org/varyag/1172045747/?ll=37.531249%2C55.422689&amp;mode=search&amp;sll=37.544737%2C55.431177&amp;sspn=0.246506%2C0.075844&amp;text=%D0%BF%D0%BE%D0%B4%D0%BE%D0%BB%D1%8C%D1%81%D0%BA%20%D0%B2%D0%B0%D1%80%D1%8F%D0%B3&amp;utm_source=share&amp;z=15" target="_blank" class="build-route show">
      <span class="build-route__text">
        Построить маршрут
      </span>
    <span class="build-route__img">
        <img src="<?=get_template_directory_uri();?>/img/yandex-icon.png" alt="logo" width="22" height="22">
      </span>
</a>
<a href="https://yandex.ru/maps/org/varyag/1172045747/?ll=37.531249%2C55.422689&amp;mode=search&amp;sll=37.544737%2C55.431177&amp;sspn=0.246506%2C0.075844&amp;text=%D0%BF%D0%BE%D0%B4%D0%BE%D0%BB%D1%8C%D1%81%D0%BA%20%D0%B2%D0%B0%D1%80%D1%8F%D0%B3&amp;utm_source=share&amp;z=15" target="_blank" class="yandex-maps show">
    <img src="<?=get_template_directory_uri();?>/img/yandex-maps2.png" alt="logo" width="47" height="56">
</a>
<div class="wrapper">
    <div class="big-menu">
        <div class="container">
            <div class="big-menu__body">
                <div class="big-menu__close js-full-close">
                    <span>Закрыть</span>
                    <img src="<?php echo get_template_directory_uri(); ?>/img/close2.png" alt="logo" width="20" height="20" />
                </div>
                <div class="big-menu__top">
                    <div class="big-menu__left">
                        <a href="/" class="logo">
                            <img src="<?php echo get_template_directory_uri(); ?>/img/logo.png" alt="logo" width="120" height="120" />
                            <span>Клуб спортивных боевых исскуств</span>
                        </a>
                    </div>
                    <div class="big-menu__subscribe">
                        <div class="subscribe-big">
                            <img src="<?php echo get_template_directory_uri(); ?>/img/footer-big.png" alt="logo" width="300" height="612" />
                            <div class="subscribe-big__body">
                                <div class="subscribe-big__text">
                                    Запишись на бесплатное занятие
                                </div>
                                <a class="button button--full button--small js-open-form">
                                    <span>Записаться</span>
                                </a>
                            </div>
                        </div>
                        <a href="/sales/" class="big-menu__reg">
                            Скидка 20% многодетным семьям
                        </a>
                    </div>
                    <div class="big-menu__right">
                        <div class="big-menu__column">
                            <div class="big-menu__title">
                                ИНФОРМАЦИЯ
                            </div>
                            <a href="/services/" class="link link--footer">
                                О клубе
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
                            <a href="/sbory/" class="link link--footer">
                                Мероприятия
                            </a>
                            <a href="#" class="link link--footer">
                                Способы оплаты
                            </a>
                        </div>
                        <div class="big-menu__column">
                            <div class="big-menu__title">
                                КОНТАКТЫ
                            </div>
                            <div class="big-menu__connect">
                                <a href="tel:<?=get_option('tel_2');?>" class="big-menu__number"> <?=get_option('tel_1');?></a>
                                <a href="mailto:<?=get_option('email');?>"><?=get_option('email');?></a>
                            </div>
                            <div class="big-menu__address work-schedule">
                                <span> Режим работы:</span>
                                <?=get_option('work_schedule');?>
                            </div>
                            <div class="big-menu__address">
                                <span>Адрес:</span>
                                <?=get_option('address');?>
                            </div>
                        </div>
                        <div class="big-menu__column">
                            <div class="big-menu__title">
                                Услуги
                            </div>
                            <a href="/dlya-detej/" class="link link--footer">
                                Для детей
                            </a>
                            <a href="/discipline/dlya-detej-tajskij-boks/" class="link link--footer">
                                Тайский бокс
                            </a>
                            <a href="/discipline/silovye-trenirovki-dlya-muzhchin-v-mini-gruppah/" class="link link--footer">
                                Силовые тренировки
                            </a>
                            <a href="/discipline/dlya-detej-mma/" class="link link--footer">
                                ММА
                            </a>
                            <a href="/discipline/intervalnye-trenirovki-hiit/" class="link link--footer">
                                HIIT (интервальные тренировки) для девушек
                            </a>
                            <a href="/discipline/dlya-detej-greppling/" class="link link--footer">
                                Грэпплинг
                            </a>
                            <a href="/discipline/fitnes-dlya-devushek-v-podolske-2/" class="link link--footer">
                                Силовые функциональные тренировки для девушек и женщин
                            </a>
                            <a href="/discipline/tabata-trenirovki-dlya-devushek/" class="link link--footer">
                                Tabata для девушек
                            </a>
                            <a href="/discipline/fitnes-dlya-devushek-v-podolske/" class="link link--footer">
                                Здоровая спина и гибкое тело, functional flow
                            </a>
                            <a href="/discipline/dlya-muzhchin-brazilskoe-dzhiu-dzhitsu/" class="link link--footer">
                                Бразильское Джиу Джитсу
                            </a>
                            <a href="#" class="link link--footer">
                                Бокс
                            </a>
                            <a href="/services/" class="big-menu__link">
                                Смотреть все услуги
                            </a>
                        </div>
                    </div>
                </div>
                <div class="big-menu__bottom">
                    <div class="big-menu__left">
                        <div class="big-menu__text">2008 - 2023 © Варяг Все права защищены</div>
                    </div>
                    <div class="big-menu__column">
                        <?php
                        $tel_display = get_option('tel_1');
                        $tel_link = preg_replace('#([ \-])#', '', $tel_display);
                        ?>
                        <div class="big-menu__text">
                            ИНН: 7702775114, ОГРН: 770901001<br> Тел.: <a class="tel-info-link" href="tel:<?=$tel_link;?>"><?=$tel_display;?></a> ИП Норов Рустам
                        </div>
                    </div>
                    <div class="big-menu__column">
                        <div class="big-menu__text">
                            <a href="/politika-cookie/">Политика использования файлов «cookie»</a>
                            <a href="/politika-konfidenczialnosti/">Политика конфиденциальности</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="mobile-menu js-mmenu">
        <div class="mobile-menu__body">
            <div class="mobile-menu__top">
                <a href="/" class="logo">
                    <img src="<?php echo get_template_directory_uri(); ?>/img/logo.png" alt="logo" width="110" height="110" />
                    <span>Клуб спортивных боевых исскуств</span>
                </a>
                <div class="mobile-menu__top-links">
                    <?php if(is_user_logged_in()) : ?>
                        <div class="mobile-menu__log">
                            <a href="/profile/">
                                <img src="<?php echo get_template_directory_uri(); ?>/img/user.png" alt="logo" width="21" height="21">
                                <span>Войти</span>
                            </a>
                        </div>
                    <?php else: ?>
                        <div class="mobile-menu__log mobile-menu__log--login">
                            <img src="<?php echo get_template_directory_uri(); ?>/img/user.png" alt="logo" width="21" height="21">
                            <span>Войти</span>
                        </div>
                    <?php endif; ?>
                    <div class="mobile-menu__log mobile-menu__log--basket">
                        <a href="<?=wc_get_cart_url();?>">
                            <img src="<?php echo get_template_directory_uri(); ?>/img/basket.png" alt="logo" width="20" height="18">
                            <span>Корзина</span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="mobile-menu__main js-main-menu">
                <div class="mobile-menu__items">
                    <!--<a href="/for-child-main.html" class="mobile-menu__link">
                        <span>Для детей</span>
                    </a>-->
                    <a href="/katalog/" class="mobile-menu__link">
                        <span>Каталог</span>
                    </a>
                    <div class="mobile-menu__link js-inner-link" data-id="services">
                        <span>Услуги</span>
                        <div class="mobile-menu__link-ar">
                            <img src="<?php echo get_template_directory_uri(); ?>/img/mini-arrow-right.svg" alt="arrow" width="14" height="14" />
                        </div>
                    </div>
                    <a href="/raspisanie/" class="mobile-menu__link">
                        <span>Расписание тренировок</span>
                    </a>
                    <a href="/sales/" class="mobile-menu__link">
                        <span>Акции</span>
                    </a>
                    <a href="/coach/" class="mobile-menu__link">
                        <span>Тренеры</span>
                    </a>
                    <a href="/sbory/" class="mobile-menu__link">
                        <span>Сборы</span>
                    </a>
                    <a href="/kontakty/" class="mobile-menu__link">
                        <span>Контакты</span>
                    </a>
                </div>
            </div>
            <div class="mobile-menu__inner js-inner-wrap">
                <div class="mobile-menu__inner-menu js-inn-menu js-inn-main" data-menu="services">
                    <div class="mobile-menu__back js-inn-back">
                        <div class="mobile-menu__link-ar">
                            <img src="<?php echo get_template_directory_uri(); ?>/img/mini-arrow-right.svg" alt="arrow" width="14" height="14" />
                        </div>
                        <span>Назад</span>
                    </div>
                    <div class="mobile-menu__links">
                        <div class="mobile-menu__link js-inner-link" data-id="services-kid">
                            <span>Для детей</span>
                            <div class="mobile-menu__link-ar">
                                <img src="<?php echo get_template_directory_uri(); ?>/img/mini-arrow-right.svg" alt="arrow" width="14" height="14" />
                            </div>
                        </div>
                        <div class="mobile-menu__link js-inner-link" data-id="services-man">
                            <span>Для мужчин</span>
                            <div class="mobile-menu__link-ar">
                                <img src="<?php echo get_template_directory_uri(); ?>/img/mini-arrow-right.svg" alt="arrow" width="14" height="14" />
                            </div>
                        </div>
                        <div class="mobile-menu__link js-inner-link" data-id="services-woman">
                            <span>Для женщин</span>
                            <div class="mobile-menu__link-ar">
                                <img src="<?php echo get_template_directory_uri(); ?>/img/mini-arrow-right.svg" alt="arrow" width="14" height="14" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mobile-menu__inner-menu js-inn-menu" data-menu="services-kid">
                    <div class="mobile-menu__back js-inn-back js-inn-third">
                        <div class="mobile-menu__link-ar">
                            <img src="<?php echo get_template_directory_uri(); ?>/img/mini-arrow-right.svg" alt="arrow" width="14" height="14" />
                        </div>
                        <span>Назад</span>
                    </div>
                    <div class="mobile-menu__links">
                        <a href="/discipline/dlya-detej-mma/" class="mobile-menu__link">
                            <span>ММА</span>
                        </a>
                        <a href="/discipline/dlya-detej-tajskij-boks/" class="mobile-menu__link">
                            <span>Тайский бокс</span>
                        </a>
                        <a href="/discipline/dlya-detej-boks/" class="mobile-menu__link">
                            <span>Бокс (только персональные) </span>
                        </a>
                        <a href="/discipline/dlya-detej-brazilskoe-dzhiu-dzhitsu/" class="mobile-menu__link">
                            <span>Бразильское джиу джитсу </span>
                        </a>
                        <a href="/discipline/dlya-detej-greppling" class="mobile-menu__link">
                            <span>Грэплинг</span>
                        </a>
                        <a href="/discipline/obshhaya-fizicheskaya-podgotovka-dlya-detej/" class="mobile-menu__link">
                            <span>ОФП</span>
                        </a>
                    </div>
                </div>
                <div class="mobile-menu__inner-menu js-inn-menu" data-menu="services-man">
                    <div class="mobile-menu__back js-inn-back js-inn-third">
                        <div class="mobile-menu__link-ar">
                            <img src="<?php echo get_template_directory_uri(); ?>/img/mini-arrow-right.svg" alt="arrow" width="14" height="14" />
                        </div>
                        <span>Назад</span>
                    </div>
                    <div class="mobile-menu__links">
                        <a href="/discipline/dlya-muzhchin-mma/" class="mobile-menu__link">
                            <span>ММА</span>
                        </a>
                        <a href="/discipline/dlya-muzhchin-tajskij-boks/" class="mobile-menu__link">
                            <span>Тайский бокс</span>
                        </a>
                        <a href="/discipline/dlya-muzhchin-boks/" class="mobile-menu__link">
                            <span>Бокс (только персональные) </span>
                        </a>
                        <a href="/discipline/dlya-muzhchin-brazilskoe-dzhiu-dzhitsu/" class="mobile-menu__link">
                            <span>Бразильское джиу джитсу </span>
                        </a>
                        <a href="/discipline/sekcziya-po-grepplingu-dlya-muzhchin-v-podolske/" class="mobile-menu__link">
                            <span>Грэплинг</span>
                        </a>
                        <a href="/discipline/silovye-trenirovki-dlya-muzhchin-v-mini-gruppah/" class="mobile-menu__link">
                            <span>Силовые тренировки</span>
                        </a>
                        <a href="/discipline/silovye-trenirovki-dlya-muzhchin/" class="mobile-menu__link">
                            <span>Тренажерный зал</span>
                        </a>
                    </div>
                </div>
                <div class="mobile-menu__inner-menu js-inn-menu" data-menu="services-woman">
                    <div class="mobile-menu__back js-inn-back js-inn-third">
                        <div class="mobile-menu__link-ar">
                            <img src="<?php echo get_template_directory_uri(); ?>/img/mini-arrow-right.svg" alt="arrow" width="14" height="14" />
                        </div>
                        <span>Назад</span>
                    </div>
                    <div class="mobile-menu__links">
                        <a href="/discipline/functional-flow-dya-devushek/" class="mobile-menu__link">
                            <span>Functional flow фитнес для девушек</span>
                        </a>
                        <a href="/discipline/fitnes-dlya-devushek-v-podolske/" class="mobile-menu__link">
                            <span>Здоровая спина и гибкое тело для девушек</span>
                        </a>
                        <a href="/discipline/intervalnye-trenirovki-hiit/" class="mobile-menu__link">
                            <span>Hiit интервальные тренировки для девушек</span>
                        </a>
                        <a href="/discipline/tabata-trenirovki-dlya-devushek/" class="mobile-menu__link">
                            <span>Tabata для девушек</span>
                        </a>
                        <a href="/discipline/tajskij-boks-dlya-devushek/" class="mobile-menu__link">
                            <span>Тайский бокс</span>
                        </a>
                        <a href="/discipline/boks-dlya-devushek/" class="mobile-menu__link">
                            <span>Бокс (только персональные)</span>
                        </a>
                        <a href="/discipline/silovye-intervalnye-trenirovki-dlya-devushek/" class="mobile-menu__link">
                            <span>Тренажерный зал</span>
                        </a>
                        <a href="/discipline/fitnes-dlya-devushek/" class="mobile-menu__link">
                            <span>Занятия фитнесом для женщин в мини-группах с персональным подходом</span>
                        </a>
                        <a href="/discipline/silovye-intervalnye-trenirovki-dlya-devushek-2/" class="mobile-menu__link">
                            <span>Силовые интервальные тренировки</span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="mobile-menu__connect">
                <a href="tel:<?=get_option('tel_2');?>" class="mobile-menu__number"> <?=get_option('tel_1');?></a>
                <a href="<?=get_option('whatsaap_link');?>" class="mobile-menu__soc" target="_blank">
                    <img src="<?php echo get_template_directory_uri(); ?>/img/whatsap.png" alt="logo" width="17" height="17">
                </a>
                <a href="<?=get_option('telegram_link');?>" class="mobile-menu__soc" target="_blank">
                    <img src="<?php echo get_template_directory_uri(); ?>/img/telegram.png" alt="logo" width="17" height="17">
                </a>
            </div>
            <div class="address-block">
                <div class="address-block__icon">
                    <img src="<?php echo get_template_directory_uri(); ?>/img/location.png" alt="" width="22" height="26">
                </div>
                <div class="address-block__body">
                    <span>Наш адрес:</span>
                    <span><?=get_option('address');?></span>
                </div>
            </div>
            <div class="mobile-menu__social">
                <a href="https://vk.com/podolskvaryagclub" class="chanel-block">
                    <img src="<?php echo get_template_directory_uri(); ?>/img/vk.png" alt="" width="33" height="33">
                </a>
                <a href="https://t.me/+NKqaQz9z2UoyMTUy" class="chanel-block">
                    <img src="<?php echo get_template_directory_uri(); ?>/img/telegram.png" alt="" width="27" height="23">
                </a>
            </div>
        </div>
        <div class="mobile-menu__close">
            <div class="js-mmenu-hide">
                <img src="<?php echo get_template_directory_uri(); ?>/img/close-white.svg" alt="" width="26" height="26">
            </div>
        </div>
    </div>
    <header class="header">
        <div class="container">
            <div class="header__body">
                <a href="<?php echo site_url(); ?>" class="logo">
                    <img src="<?php echo get_template_directory_uri(); ?>/img/logo.png" alt="logo" width="146" height="146">
                    <img src="<?php echo get_template_directory_uri(); ?>/img/mini-logo.png" alt="logo" width="131" height="29">
                </a>
                <div class="header__content">
                    <div class="header__top">
                        <div class="header__text">
                            Клуб спортивных <br />
                            боевых искусств
                        </div>
                        <div class="header__connect">
                            <a href="tel:<?=get_option('tel_2');?>" class="header__number"> <?=get_option('tel_1');?></a>
                            <a href="<?=get_option('whatsaap_link');?>" class="header__soc" target="_blank">
                                <img src="<?php echo get_template_directory_uri(); ?>/img/whatsap.png" alt="logo" width="17" height="17">
                            </a>
                            <a href="<?=get_option('telegram_link');?>" class="header__soc" target="_blank">
                                <img src="<?php echo get_template_directory_uri(); ?>/img/telegram.png" alt="logo" width="17" height="17">
                            </a>
                        </div>
                        <?php if(is_user_logged_in()) : ?>
                            <a href="/profile/" class="header__log">
                                <img src="<?php echo get_template_directory_uri(); ?>/img/user.png" alt="logo" width="21" height="21">
                                <span>Войти</span>
                            </a>
                        <?php else: ?>
                            <a href="/" class="header__log header__log--login">
                                <img src="<?php echo get_template_directory_uri(); ?>/img/user.png" alt="logo" width="21" height="21">
                                <span>Войти</span>
                            </a>
                        <?php endif; ?>
                        <div class="header__log header__log--basket">
                            <a href="<?=wc_get_cart_url();?>">
                                <img src="<?php echo get_template_directory_uri(); ?>/img/basket.png" alt="logo" width="20" height="18">
                                <span>Корзина</span>
                            </a>
                        </div>
                        <div class="center-mobile">
                            <a href="#" class="logo-mobile">
                                <img src="<?php echo get_template_directory_uri(); ?>/img/logo.png" alt="logo" width="95" height="95">
                                <span>Клуб спортивных боевых искусств</span>
                            </a>
                            <div class="header__connect header__connect--mobile">
                                <a href="tel:<?=get_option('tel_2');?>" class="header__number"> <?=get_option('tel_1');?></a>
                                <a href="<?=get_option('whatsaap_link');?>" class="header__soc">
                                    <img src="<?php echo get_template_directory_uri(); ?>/img/whatsap.png" alt="logo" width="17" height="17">
                                </a>
                                <a href="<?=get_option('telegram_link');?>" class="header__soc">
                                    <img src="<?php echo get_template_directory_uri(); ?>/img/telegram.png" alt="logo" width="17" height="17">
                                </a>
                            </div>
                        </div>
                        <a class="link link--line _ml-auto js-open-form">
                            <span>Бесплатное занятие</span>
                        </a>
                        <div class="burger burger--desk _ml-auto js-full-menu">
                            <span></span>
                        </div>
                        <div class="burger burger--mob _ml-auto js-open-menu">
                            <span></span>
                        </div>
                    </div>
                    <div class="header__bottom">
                        <div class="header__menu">
                            <a href="/katalog/" class="link--menu is-current">Каталог</a>
                            <div class="drop-wrap">
                                <a href="/services/" class="link--menu link--dropdown">
                                    Услуги
                                </a>
                                <span class="drop-menu">
                      <a href="/dlya-detej/"><span>для детей</span></a>
                      <a href="/services/#for-man"><span>для мужчин</span></a>
                      <a href="/services/#for-woman"><span>для девушек</span></a>
                    </span>
                            </div>
                            <a href="/raspisanie/" class="link--menu">Расписание тренировок</a>
                            <a href="/sales/" class="link--menu">Акции</a>
                            <a href="/coach/" class="link--menu">Тренера</a>
                            <div class="drop-wrap drop-wrap--tablet">
                                <a class="link--menu link--dropdown">
                                    ...
                                </a>
                                <span class="drop-menu">
                      <a href="/sbory/"><span>Сборы</span></a>
                      <a href="/kontakty/"><span>Контакты</span></a>
                    </span>
                            </div>
                            <a href="/sbory/" class="link--menu">Сборы</a>
                            <a href="/kontakty/" class="link--menu">Контакты</a>
                        </div>
                        <div class="header__full js-full-menu">
                            <span>Полное меню</span>
                            <div class="burger">
                                <span></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div class="top-block top-block--shorter" style="background-image: url(<?php echo get_template_directory_uri();?>/img/basketback.jpg)">
        <div class="top-block__body container">
            <div class="top-block__middle">
                <div class="breadcrumbs breadcrumbs">
                    <?php woocommerce_breadcrumb(); ?>
                </div>
                <?php if(is_shop()): ?>
                    <h1 class="top-block__title">Каталог товаров</h1>
                <?php else: ?>
                <h1 class="top-block__title">
                    <?php the_title(); ?>
                </h1>
                <?php endif; ?>
            </div>
        </div>
    </div>
