<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package varyag
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>

	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
    <link rel="apple-touch-icon" sizes="180x180" href="<?=get_template_directory_uri();?>/favicon/apple-touch-icon.png" />
    <link rel="icon" type="image/png" sizes="32x32" href="<?=get_template_directory_uri();?>/favicon/favicon-32x32.png" />
    <link rel="icon" type="image/png" sizes="16x16" href="<?=get_template_directory_uri();?>/favicon/favicon-16x16.png" />
    <link rel="manifest" href="<?=get_template_directory_uri();?>/favicon/site.webmanifest" />

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
    <noscript><div><img src="https://mc.yandex.ru/watch/90723758" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
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
    <noscript><img src="https://vk.com/rtrg?p=VK-RTRG-1555476-gmBsf" style="position:fixed; left:-999px;" alt=""/></noscript>
</head>

<body <?php body_class(); ?> >
<?php wp_body_open(); ?>

<div class="wrapper">
    <div class="big-menu" style="display: none;">
        <div class="container">
            <div class="big-menu__body">
                <div class="big-menu__close js-full-close">
                    <span>??????????????</span>
                    <img src="<?php echo get_template_directory_uri(); ?>/img/close2.png" alt="logo" width="20" height="20">
                </div>
                <div class="big-menu__top">
                    <div class="big-menu__left">
                        <a href="/" class="logo">
                            <img src="<?php echo get_template_directory_uri(); ?>/img/logo.png" alt="logo" width="120" height="120">
                            <span>???????? ???????????????????? ???????????? ????????????????</span>
                        </a>
                    </div>
                    <div class="big-menu__subscribe">
                        <div class="subscribe-big">
                            <img src="<?php echo get_template_directory_uri(); ?>/img/footer-big.png" alt="logo" width="300" height="612">
                            <div class="subscribe-big__body">
                                <div class="subscribe-big__text">
                                    ???????????????? ???? ???????????????????? ??????????????
                                </div>
                                <a href="#callback" class="button button--full button--small js-full-close">
                                    <span>????????????????????</span>
                                </a>
                            </div>
                        </div>
                        <a href="/reg.html" class="big-menu__reg">
                            ???????????? 20% ?????????????????????? ????????????
                        </a>
                    </div>
                    <div class="big-menu__right">
                        <div class="big-menu__column">
                            <div class="big-menu__title">
                                ????????????????????
                            </div>
                            <a href="/services/" class="big-menu__link">
                                ?? ??????????
                            </a>
                            <a href="/raspisanie/" class="link link--footer">
                                ???????????????????? ????????????????????
                            </a>
                            <a href="/sales/" class="link link--footer">
                                ??????????
                            </a>
                            <a href="/coach/" class="link link--footer">
                                ??????????????
                            </a>
                            <a href="#" class="link link--footer">
                                ??????????????
                            </a>
                            <a class="link link--footer">
                                ???????????????? ????????????
                            </a>
                            <a class="link link--footer">
                                ?????????????? ??????????
                            </a>
                            <a href="/sbory/" class="link link--footer">
                                ??????????????????-?????????????????????????????? ??????????
                            </a>
                            <a href="/pravila-kluba-varyag/" class="link link--footer">
                                ?????????????? ??????????
                            </a>
                            <a href="/kontakty/" class="link link--footer">
                                ????????????????
                            </a>
                            <a href="/sbory/" class="link link--footer">
                                ??????????????????????
                            </a>
                            <a href="#" class="link link--footer">
                                ?????????????? ????????????
                            </a>
                        </div>
                        <div class="big-menu__column">
                            <div class="big-menu__title">
                                ????????????????
                            </div>
                            <div class="big-menu__connect">
                                <a href="tel:<?=get_option('tel_2');?>" class="big-menu__number"> <?=get_option('tel_1');?></a>
                                <a href="mailto:<?=get_option('email');?>"><?=get_option('email');?></a>
                            </div>
                            <div class="big-menu__address">
                                <span> ?????????? ????????????:</span>
                                <?=get_option('work_schedule');?>
                            </div>
                            <div class="big-menu__address">
                                <span>??????????:</span>
                                <?=get_option('address');?>
                            </div>
                        </div>
                        <div class="big-menu__column">
                            <div class="big-menu__title">
                                ????????????
                            </div>
                            <a href="#" class="link link--footer">
                                ?????? ??????????
                            </a>
                            <a href="/discipline/dlya-detej-tajskij-boks/" class="link link--footer">
                                ?????????????? ????????
                            </a>
                            <a href="/discipline/silovye-trenirovki-dlya-muzhchin-v-mini-gruppah/" class="link link--footer">
                                ?????????????? ????????????????????
                            </a>
                            <a href="/discipline/dlya-detej-mma/" class="link link--footer">
                                ??????
                            </a>
                            <a href="/discipline/intervalnye-trenirovki-hiit/" class="link link--footer">
                                HIIT (???????????????????????? ????????????????????) ?????? ??????????????
                            </a>
                            <a href="/discipline/dlya-detej-greppling/" class="link link--footer">
                                ??????????????????
                            </a>
                            <a href="/discipline/fitnes-dlya-devushek-v-podolske-2/" class="link link--footer">
                                ?????????????? ???????????????????????????? ???????????????????? ?????? ?????????????? ?? ????????????
                            </a>
                            <a href="/discipline/tabata-trenirovki-dlya-devushek/" class="link link--footer">
                                Tabata ?????? ??????????????
                            </a>
                            <a href="/discipline/fitnes-dlya-devushek-v-podolske/" class="link link--footer">
                                ???????????????? ?????????? ?? ???????????? ????????, functional flow
                            </a>
                            <a href="/discipline/dlya-muzhchin-brazilskoe-dzhiu-dzhitsu/" class="link link--footer">
                                ?????????????????????? ???????? ????????????
                            </a>
                            <a href="#" class="link link--footer">
                                ????????
                            </a>
                            <a href="/services/" class="big-menu__link">
                                ???????????????? ?????? ????????????
                            </a>
                        </div>
                    </div>
                </div>
                <div class="big-menu__bottom">
                    <div class="big-menu__left">
                        <div class="big-menu__text">2008 - 2023 ?? ?????????? ?????? ?????????? ????????????????</div>
                    </div>
                    <div class="big-menu__column">
                        <div class="big-menu__text">
                            ??????: 7702775114, ????????: 770901001 ??????.: <?=get_option('tel_1')?> ???? ?????????? ????????????
                        </div>
                    </div>
                    <div class="big-menu__column">
                        <div class="big-menu__text">
                            <a href="/politika-cookie/">???????????????? ?????????????????????????? ???????????? ??cookie??</a>
                            <a href="/politika-konfidenczialnosti/">???????????????? ????????????????????????????????????</a>
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
                    <img src="<?php echo get_template_directory_uri(); ?>/img/logo.png" alt="logo" width="110" height="110">
                    <span>???????? ???????????????????? ???????????? ????????????????</span>
                </a>
                <div class="mobile-menu__top-links">
                    <div class="mobile-menu__log mobile-menu__log--login">
                        <img src="<?php echo get_template_directory_uri(); ?>/img/user.png" alt="logo" width="21" height="21">
                        <span>??????????</span>
                    </div>
                    <div class="mobile-menu__log mobile-menu__log--basket">
                        <a href="<?=wc_get_cart_url();?>">
                        <img src="<?php echo get_template_directory_uri(); ?>/img/basket.png" alt="logo" width="20" height="18">
                        <span>??????????????</span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="mobile-menu__main js-main-menu">
                <div class="mobile-menu__items">
                    <a href="/catalog.html" class="mobile-menu__link">
                        <span>??????????????</span>
                    </a>
                    <div class="mobile-menu__link js-inner-link" data-id="services">
                        <span>????????????</span>
                        <div class="mobile-menu__link-ar">
                            <img src="<?php echo get_template_directory_uri(); ?>/img/mini-arrow-right.svg" alt="arrow" width="14" height="14">
                        </div>
                    </div>
                    <a href="/schedule.html" class="mobile-menu__link">
                        <span>???????????????????? ????????????????????</span>
                    </a>
                    <a href="/sales.html" class="mobile-menu__link">
                        <span>??????????</span>
                    </a>
                    <a href="/treners.html" class="mobile-menu__link">
                        <span>??????????????</span>
                    </a>
                    <a href="/sbory.html" class="mobile-menu__link">
                        <span>??????????</span>
                    </a>
                    <a href="/contacts.html" class="mobile-menu__link">
                        <span>????????????????</span>
                    </a>
                </div>
            </div>
            <div class="mobile-menu__inner js-inner-wrap">
                <div class="mobile-menu__inner-menu js-inn-menu js-inn-main" data-menu="services">
                    <div class="mobile-menu__back js-inn-back">
                        <div class="mobile-menu__link-ar">
                            <img src="<?php echo get_template_directory_uri(); ?>/img/mini-arrow-right.svg" alt="arrow" width="14" height="14">
                        </div>
                        <span>??????????</span>
                    </div>
                    <div class="mobile-menu__link js-inner-link" data-id="services-kid">
                        <span>?????? ??????????</span>
                        <div class="mobile-menu__link-ar">
                            <img src="<?php echo get_template_directory_uri(); ?>/img/mini-arrow-right.svg" alt="arrow" width="14" height="14">
                        </div>
                    </div>
                    <div class="mobile-menu__link js-inner-link" data-id="services-man">
                        <span>?????? ????????????</span>
                        <div class="mobile-menu__link-ar">
                            <img src="<?php echo get_template_directory_uri(); ?>/img/mini-arrow-right.svg" alt="arrow" width="14" height="14">
                        </div>
                    </div>
                    <div class="mobile-menu__link js-inner-link" data-id="services-woman">
                        <span>?????? ????????????</span>
                        <div class="mobile-menu__link-ar">
                            <img src="<?php echo get_template_directory_uri(); ?>/img/mini-arrow-right.svg" alt="arrow" width="14" height="14">
                        </div>
                    </div>
                </div>
                <div class="mobile-menu__inner-menu js-inn-menu" data-menu="services-kid">
                    <div class="mobile-menu__back js-inn-back js-inn-third">
                        <div class="mobile-menu__link-ar">
                            <img src="<?php echo get_template_directory_uri(); ?>/img/mini-arrow-right.svg" alt="arrow" width="14" height="14">
                        </div>
                        <span>??????????</span>
                    </div>
                    <a href="/for-child.html" class="mobile-menu__link">
                        <span>??????</span>
                    </a>
                    <a href="/child-ty.html" class="mobile-menu__link">
                        <span>?????????????? ????????</span>
                    </a>
                    <a href="/child-box.html" class="mobile-menu__link">
                        <span>???????? (???????????? ????????????????????????) </span>
                    </a>
                    <a href="/child-brazil.html" class="mobile-menu__link">
                        <span>?????????????????????? ???????? ???????????? </span>
                    </a>
                    <a href="/child-grap.html" class="mobile-menu__link">
                        <span>????????????????</span>
                    </a>
                    <a href="/child-ofp.html" class="mobile-menu__link">
                        <span>??????</span>
                    </a>
                </div>
                <div class="mobile-menu__inner-menu js-inn-menu" data-menu="services-man">
                    <div class="mobile-menu__back js-inn-back js-inn-third">
                        <div class="mobile-menu__link-ar">
                            <img src="<?php echo get_template_directory_uri(); ?>/img/mini-arrow-right.svg" alt="arrow" width="14" height="14">
                        </div>
                        <span>??????????</span>
                    </div>
                    <a href="/man-mma.html" class="mobile-menu__link">
                        <span>??????</span>
                    </a>
                    <a href="/man-ty.html" class="mobile-menu__link">
                        <span>?????????????? ????????</span>
                    </a>
                    <a href="/man-box.html" class="mobile-menu__link">
                        <span>???????? (???????????? ????????????????????????) </span>
                    </a>
                    <a href="/man-brazil.html" class="mobile-menu__link">
                        <span>?????????????????????? ???????? ???????????? </span>
                    </a>
                    <a href="/man-grap.html" class="mobile-menu__link">
                        <span>????????????????</span>
                    </a>
                    <a href="/child-ofp.html" class="mobile-menu__link">
                        <span>?????????????? ????????????????????</span>
                    </a>
                    <a href="/man-gym.html" class="mobile-menu__link">
                        <span>?????????????????????? ??????</span>
                    </a>
                </div>
                <div class="mobile-menu__inner-menu js-inn-menu" data-menu="services-woman">
                    <div class="mobile-menu__back js-inn-back js-inn-third">
                        <div class="mobile-menu__link-ar">
                            <img src="<?php echo get_template_directory_uri(); ?>/img/mini-arrow-right.svg" alt="arrow" width="14" height="14">
                        </div>
                        <span>??????????</span>
                    </div>
                    <a href="/ff-girl.html" class="mobile-menu__link">
                        <span>Functional flow ???????????? ?????? ??????????????</span>
                    </a>
                    <a href="/strong-girl.html" class="mobile-menu__link">
                        <span>???????????????? ?????????? ?? ???????????? ???????? ?????? ??????????????</span>
                    </a>
                    <a href="/hiit-girl.html" class="mobile-menu__link">
                        <span>Hiit ???????????????????????? ???????????????????? ?????? ??????????????</span>
                    </a>
                    <a href="/tabata-girl.html" class="mobile-menu__link">
                        <span>Tabata ?????? ??????????????</span>
                    </a>
                    <a href="/muaytuy-girl.html" class="mobile-menu__link">
                        <span>?????????????? ????????</span>
                    </a>
                    <a href="/box-girl.html" class="mobile-menu__link">
                        <span>???????? (???????????? ????????????????????????)</span>
                    </a>
                    <a href="/train-girl.html" class="mobile-menu__link">
                        <span>?????????????????????? ??????</span>
                    </a>
                    <a href="/fitnes-girl.html" class="mobile-menu__link">
                        <span>?????????????? ???????????????? ?????? ???????????? ?? ????????-?????????????? ?? ???????????????????????? ????????????????</span>
                    </a>
                    <a href="/fitnes-girl.html" class="mobile-menu__link">
                        <span>?????????????? ???????????????????????? ????????????????????</span>
                    </a>
                </div>
            </div>
            <div class="mobile-menu__connect">
                <a href="tel:<?=get_option('tel_2');?>" class="mobile-menu__number"> <?=get_option('tel_1');?></a>
                <a href="<?=get_option('whatsaap_link');?>" class="mobile-menu__soc">
                    <img src="<?php echo get_template_directory_uri(); ?>/img/whatsap.png" alt="logo" width="17" height="17">
                </a>
                <a href="<?=get_option('telegram_link');?>" class="mobile-menu__soc">
                    <img src="<?php echo get_template_directory_uri(); ?>/img/telegram.png" alt="logo" width="17" height="17">
                </a>
            </div>
            <div class="address-block">
                <div class="address-block__icon">
                    <img src="<?php echo get_template_directory_uri(); ?>/img/location.png" alt="" width="22" height="26">
                </div>
                <div class="address-block__body">
                    <span>?????? ??????????:</span>
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
                            ???????? ???????????????????? <br>
                            ???????????? ????????????????
                        </div>
                        <div class="header__connect">
                            <a href="tel:<?=get_option('tel_2');?>" class="header__number"> <?=get_option('tel_1');?></a>
                            <a href="<?=get_option('whatsaap_link');?>" class="header__soc">
                                <img src="<?php echo get_template_directory_uri(); ?>/img/whatsap.png" alt="logo" width="17" height="17">
                            </a>
                            <a href="<?=get_option('telegram_link');?>" class="header__soc">
                                <img src="<?php echo get_template_directory_uri(); ?>/img/telegram.png" alt="logo" width="17" height="17">
                            </a>
                        </div>
                        <a href="/" class="header__log header__log--login">
                            <img src="<?php echo get_template_directory_uri(); ?>/img/user.png" alt="logo" width="21" height="21">
                            <span>??????????</span>
                        </a>
                        <div class="header__log header__log--basket">
                            <a href="<?=wc_get_cart_url();?>">
                            <img src="<?php echo get_template_directory_uri(); ?>/img/basket.png" alt="logo" width="20" height="18">
                            <span>??????????????</span>
                            </a>
                        </div>
                        <div class="center-mobile">
                            <a href="#" class="logo-mobile">
                                <img src="<?php echo get_template_directory_uri(); ?>/img/logo.png" alt="logo" width="95" height="95">
                                <span>???????? ???????????????????? ???????????? ????????????????</span>
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
                        <a class="link link--line _ml-auto js-open-form" href="#">
                            <span>???????????????????? ??????????????</span>
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
                            <a href="/katalog/" class="link--menu is-current">??????????????</a>
                            <div class="drop-wrap">
                                <a href="/services/" class="link--menu link--dropdown">
                                    ????????????
                                </a>
                                <span class="drop-menu">
                                  <a href="/for-child-main.html"><span>?????? ??????????</span></a>
                                  <a href="/services.html#for-man"><span>?????? ????????????</span></a>
                                  <a href="/services.html#for-woman"><span>?????? ??????????????</span></a>
                                </span>
                            </div>
                            <a href="/raspisanie/" class="link--menu">???????????????????? ????????????????????</a>
                            <a href="/sales/" class="link--menu">??????????</a>
                            <a href="/coach/" class="link--menu">??????????????</a>
                            <div class="drop-wrap drop-wrap--tablet">
                                <a class="link--menu link--dropdown">
                                    ...
                                </a>
                                <span class="drop-menu">
                                  <a href="/sbory/"><span>??????????</span></a>
                                  <a href="/kontakty/"><span>????????????????</span></a>
                                </span>
                            </div>
                            <a href="/sbory/" class="link--menu">??????????</a>
                            <a href="/kontakty/" class="link--menu">????????????????</a>
                        </div>
                        <!--<div class="header__menu">
                            <?php
                            $items_menu = wp_get_nav_menu_items(30);
                            foreach($items_menu as $item) :?>
                                <a href="<?=$item->url;?>" class="link--menu"><?=$item->title;?></a>
                            <?php endforeach ?>

                        </div>-->
                        <div class="header__full js-full-menu">
                            <span>???????????? ????????</span>
                            <div class="burger">
                                <span></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

