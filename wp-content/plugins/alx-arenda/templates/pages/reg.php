<?php
$disciplines = get_posts(['post_type' => 'discipline', 'numberposts' => -1]);
$discounts = get_posts(['post_type' => 'sales', 'numberposts' => -1]);
?>
<div class="reg-block__right">
    <div class="open-lk">Открыть меню</div>
    <div class="reg-block__title">
        СОЗДАНИЕ И РЕДАКТИРОВАНИЕ АККАУНТА
    </div>
    <div class="panel-toggle-form">
        <h3>Индивидуальная тренировка для нового пользователя</h3>
    </div>
    <div class="reg-block__top hidden-form">
        <form action="/wp-admin/admin-post.php" method="post" class="form">
            <div class="reg-block__top-left">
                <div class="form__input">
                    <div class="form__input-name">Укажите адрес электронной почты:<span>*</span></div>
                    <input type="email" name="email" id="user_mail" required>
                </div>
                <div class="form__input">
                    <div class="form__input-name">Укажите номер телефона:<span>*</span></div>
                    <input type="text" name="phone" id="phone" class="js-input-mask" required inputmode="text" placeholder="+7(___)___-__-__">
                </div>
                <div class="form__input">
                    <div class="form__input-name">Укажите логин<span>*</span></div>
                    <input type="text" name="login" id="name" required>
                </div>
                <div class="form__input">
                    <div class="form__input-name">Укажите Имя<span>*</span></div>
                    <input type="text" name="first_name" id="first_name" required>
                </div>
                <div class="form__input">
                    <div class="form__input-name">Укажите Фамилию<span>*</span></div>
                    <input type="text" name="last_name" id="last_name" required>
                </div>
                <input type="hidden" name="action" value="alx_set_personal_abonement">
            </div>
            <div class="reg-block__top-right">
                <div class="form__input form__input--select">
                    <div class="form__input-name">Выберите Дисциплину:</div>
                    <select name="discipline_id" class="select-discipline-id select-discipline-id-js"> <!--id="ggrgr" aria-labelledby="ggrgr" class="js-select select-box" style="width:100%;height: 56px;color: #272a34;border: 1px solid #dcdcdc;padding: 0 25px;border-radius: 0;">-->
                        <?php foreach($disciplines as $discipline) : ?>
                            <option value="<?=$discipline->ID;?>"><?=$discipline->post_title;?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form__input form__input--select">
                    <div class="form__input-name">Выберите абонемент:</div>
                    <select name="abonement_id" class="select-abonement-id select-abonement-id-js">
                        <option>Прежде следует выбрать дисциплину</option>
                    </select>
                </div>
                <div class="form__input form__input--select">
                    <div class="form__input-name">Выберите доступные акции:</div>
                    <select name="action_id[]" class="selected-discount-id" multiple>
                        <?php foreach($discounts as $action) : ?>
                            <option value="<?=$action->ID ;?>"><?=$action->post_title; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <input type="hidden" name="redirect" value="<?=site_url();?>/profile/?p=reg" />
                <button type="submit" class="button button--full button--big button-send-js">
                    <span>Добавить аккаунт</span>
                </button>
            </div>
        </form>
    </div>
    <div class="reg-block__bottom">
        <div class="reg-block__b-title">
            РЕДАКТИРОВАНИЕ АККАУНТА
        </div>
        <div class="red-wrap">
            <div class="red-list">
                <div class="red-item red-item--top">
                    <div class="red-item__numb"></div>
                    <div class="form__input form__input--text">
                        Имя
                    </div>
                    <div class="form__input form__input--text">
                        Права доступа
                    </div>
                    <div class="form__input form__input--text">
                        Абонемент
                    </div>
                    <div class="form__input form__input--text">
                        Счет
                    </div>
                    <div class="del-block del-block--fake"></div>
                </div>
                <div class="red-item">
                    <div class="red-item__numb">
                        01
                    </div>
                    <div class="form__input">
                        <input type="text" name="name" id="name2" placeholder="Введите имя">
                    </div>
                    <div class="form__input form__input--select">
                        <div class="form__input-arr"><img src="<?=get_template_directory_uri();?>/img/arr.png" alt="logo" width="12" height="10"></div>
                        <select name="states[]" id="98489" multiple="" aria-labelledby="ggrgr" class="js-select select2-hidden-accessible" data-select2-id="98489" tabindex="-1" aria-hidden="true">
                            <option value="1">Бокс</option>
                            <option value="2">Карате</option>
                            <option value="3">Тайский бокс</option>
                        </select><span class="select2 select2-container select2-container--default" dir="ltr" data-select2-id="3" style="width: 93.1875px;"><span class="selection"><span class="select2-selection select2-selection--multiple" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="-1" aria-disabled="false"><ul class="select2-selection__rendered"><li class="select2-search select2-search--inline"><input class="select2-search__field" type="search" tabindex="0" autocomplete="off" autocorrect="off" autocapitalize="none" spellcheck="false" role="searchbox" aria-autocomplete="list" placeholder="" style="width: 0.75em;"></li></ul></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                        <label class="form__input-label js-multi-label" for="ggrgr">Выбрать</label>
                    </div>
                    <div class="form__input form__input--select">
                        <div class="form__input-arr"><img src="<?=get_template_directory_uri();?>/img/arr.png" alt="logo" width="12" height="10"></div>
                        <select name="states[]" id="NGFGN" multiple="" aria-labelledby="ggrgr" class="js-select select2-hidden-accessible" data-select2-id="NGFGN" tabindex="-1" aria-hidden="true">
                            <option value="1">Бокс</option>
                            <option value="2">Карате</option>
                            <option value="3">Тайский бокс</option>
                        </select><span class="select2 select2-container select2-container--default" dir="ltr" data-select2-id="4" style="width: 93.1875px;"><span class="selection"><span class="select2-selection select2-selection--multiple" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="-1" aria-disabled="false"><ul class="select2-selection__rendered"><li class="select2-search select2-search--inline"><input class="select2-search__field" type="search" tabindex="0" autocomplete="off" autocorrect="off" autocapitalize="none" spellcheck="false" role="searchbox" aria-autocomplete="list" placeholder="" style="width: 0.75em;"></li></ul></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                        <label class="form__input-label js-multi-label" for="ggrgr">Выбрать</label>
                    </div>
                    <div class="form__input">
                        <input type="text" name="name" id="namHTTHe2" placeholder="Введите счет">
                    </div>
                    <div class="del-block">
                        <div class="change-pass">Сменить пароль</div>
                        <div class="del-item">
                            <img src="<?=get_template_directory_uri();?>/img/del.png" alt="logo" width="26" height="26">
                            <span>Удалить</span>
                        </div>
                    </div>
                </div>
                <div class="red-item">
                    <div class="red-item__numb">
                        02
                    </div>
                    <div class="form__input">
                        <input type="text" name="name" id="name233" placeholder="Введите имя">
                    </div>
                    <div class="form__input form__input--select">
                        <div class="form__input-arr"><img src="<?=get_template_directory_uri();?>/img/arr.png" alt="logo" width="12" height="10"></div>
                        <select name="states[]" id="55875" multiple="" aria-labelledby="ggrgr" class="js-select select2-hidden-accessible" data-select2-id="55875" tabindex="-1" aria-hidden="true">
                            <option value="1">Бокс</option>
                            <option value="2">Карате</option>
                            <option value="3">Тайский бокс</option>
                        </select><span class="select2 select2-container select2-container--default" dir="ltr" data-select2-id="5" style="width: 93.1875px;"><span class="selection"><span class="select2-selection select2-selection--multiple" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="-1" aria-disabled="false"><ul class="select2-selection__rendered"><li class="select2-search select2-search--inline"><input class="select2-search__field" type="search" tabindex="0" autocomplete="off" autocorrect="off" autocapitalize="none" spellcheck="false" role="searchbox" aria-autocomplete="list" placeholder="" style="width: 0.75em;"></li></ul></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                        <label class="form__input-label js-multi-label" for="ggrgr">Выбрать</label>
                    </div>
                    <div class="form__input form__input--select">
                        <div class="form__input-arr"><img src="<?=get_template_directory_uri();?>/img/arr.png" alt="logo" width="12" height="10"></div>
                        <select name="states[]" id="NGkuykFGN" multiple="" aria-labelledby="ggrgr" class="js-select select2-hidden-accessible" data-select2-id="NGkuykFGN" tabindex="-1" aria-hidden="true">
                            <option value="1">Бокс</option>
                            <option value="2">Карате</option>
                            <option value="3">Тайский бокс</option>
                        </select><span class="select2 select2-container select2-container--default" dir="ltr" data-select2-id="6" style="width: 93.1875px;"><span class="selection"><span class="select2-selection select2-selection--multiple" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="-1" aria-disabled="false"><ul class="select2-selection__rendered"><li class="select2-search select2-search--inline"><input class="select2-search__field" type="search" tabindex="0" autocomplete="off" autocorrect="off" autocapitalize="none" spellcheck="false" role="searchbox" aria-autocomplete="list" placeholder="" style="width: 0.75em;"></li></ul></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                        <label class="form__input-label js-multi-label" for="ggrgr">Выбрать</label>
                    </div>
                    <div class="form__input">
                        <input type="text" name="name" id="kuykuy" placeholder="Введите счет">
                    </div>
                    <div class="del-block">
                        <div class="change-pass">Сменить пароль</div>
                        <div class="del-item">
                            <img src="<?=get_template_directory_uri();?>/img/del.png" alt="logo" width="26" height="26">
                            <span>Удалить</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="popup-layout-edit-user">
// TODO: PopUp for edit contributor
</div>

<script>
    jQuery(document).ready(function($) {
        $('.panel-toggle-form').on('click', function() {
            let form = $('.reg-block__top');
            if(form.hasClass('hidden-form')) {
                form.removeClass('hidden-form');
            } else {
                form.addClass('hidden-form');
            }
        });

        $('#user_mail').on('blur', function() {
            $('.button-send-js').attr("disabled", true);
            let user_email = $('#user_mail').val();

            $.ajax({
                type: 'post',
                url: '/wp-admin/admin-ajax.php',
                data: {'action': 'alx_user_exists', 'user_email': user_email},
                success: function(response) {
                    let result = JSON.parse(response);
                    console.log(result.status);
                }
            });
        });
    });
</script>
