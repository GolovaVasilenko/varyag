<?php
get_header();
$page_id = get_the_ID();
$otdel_prodazh = get_field('otdel_prodazh', $page_id);
$otdel_zhalob_i_predlozhenij = get_field('otdel_zhalob_i_predlozhenij', $page_id);
$po_voprosam_ozdorovitelnyh_sborov = get_field('po_voprosam_ozdorovitelnyh_sborov', $page_id);
$otdel_po_rabote_s_korporativnymi_klientami = get_field('otdel_po_rabote_s_korporativnymi_klientami', $page_id);
$po_srochnym_i_neotlozhnym_voprosam = get_field('po_srochnym_i_neotlozhnym_voprosam', $page_id);
$inn = get_field('inn', $page_id);
$ogrn = get_field('ogrn', $page_id);
$ip = get_field('ip', $page_id);
$adres = get_field('adres', $page_id);
?>
<?php the_content();?>
    <div class="container">
        <div class="contact-block">
            <div class="contact-block__left">
                <div class="contact-block__item">Отдел продаж - <a href="tel:<?=$otdel_prodazh?>"><?=$otdel_prodazh?></a></div>
                <div class="contact-block__item">
                    Отдел жалоб и предложений <a href="mailto:<?=$otdel_zhalob_i_predlozhenij?>"><?=$otdel_zhalob_i_predlozhenij?></a>
                </div>
                <div class="contact-block__item">
                    По вопросам оздоровительных сборов <a href="tel:<?=$po_voprosam_ozdorovitelnyh_sborov;?>"><?=$po_voprosam_ozdorovitelnyh_sborov;?></a>
                </div>
                <div class="contact-block__item">
                    Отдел по работе с корпоративными клиентами
                    <a href="mailto:<?=$otdel_po_rabote_s_korporativnymi_klientami?>"><?=$otdel_po_rabote_s_korporativnymi_klientami?></a>
                </div>
                <div class="contact-block__item">
                    По срочным и неотложным вопросам <a href="mailto:<?=$po_srochnym_i_neotlozhnym_voprosam;?>"><?=$po_srochnym_i_neotlozhnym_voprosam;?></a>
                </div>
            </div>
            <div class="contact-block__right">
                <div class="contact-block__btns">
                    <a href="https://vk.com/podolskvaryagclub" target="_blank" class="chanel-block">
                        <img src="/wp-content/themes/varyag/img/vk.png" alt="" width="33" height="33">
                        <span>Наша группа Вконтакте</span>
                    </a>
                    <a href="https://t.me/+NKqaQz9z2UoyMTUy" target="_blank" class="chanel-block">
                        <img src="/wp-content/themes/varyag/img/telegram.png" alt="" width="27" height="23">
                        <span>Наш канал Telegram</span>
                    </a>
                </div>
                <div class="contact-block__item-small">
                    <div>ИНН <?=$inn?></div>
                    <div>ОГРН <?=$ogrn?></div>
                    <div>ИП <?=$ip?></div>
                    <div>Адрес: <?=$adres?></div>
                </div>
            </div>
        </div>
    </div>
<?php get_footer();
