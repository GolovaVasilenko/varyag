<?php
$contributors = (new \inc\Profile\Contributor())->getContributorsIndividualTrening();
$disciplines = (new \inc\Classes\Discipline())->getDisciplineForIndividualTrening();
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
                        <option value="0">Выбрать дисциплину</option>
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
                <input type="hidden" name="count_trening" class="count-trening-str" value="" />
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
                        Дмсциплина
                    </div>
                    <div class="form__input form__input--text">
                        Абонемент
                    </div>
                    <div class="del-block del-block--fake"></div>
                </div>
                <?php $count = 1; ?>
                <?php foreach($contributors as $contributor) : ?>
                <form id="form-edit-abonement_<?=$contributor->id;?>" method="post" action="/wp-admin/admin-post.php">
                <div class="red-item">
                    <div class="red-item__numb">
                        <?php
                         if($count < 10) {
                             echo "0" . $count;
                         } else {
                             echo $count;
                         }
                        ?>
                    </div>
                    <div class="form__input">
                        <input type="text" name="display_name" id="edit_name" value="<?php if($contributor->display_name) { echo $contributor->display_name; } else { echo $contributor->user_login; } ?>">
                    </div>
                    <div class="form__select">
                        <select name="discipline_id" id="edit_discipline_id" class="edit-discipline-select">
                            <option value="0">Выбрать дисциплину</option>
                            <?php foreach($disciplines as $discipline) : ?>
                                <?php
                                $selected = "";
                                if($discipline->ID == $contributor->ID) {
                                    $selected = "selected";
                                }
                                ?>
                                <option value="<?=$discipline->ID;?>" <?=$selected?>><?=$discipline->post_title;?></option>
                            <?php endforeach; ?>
                        </select>

                    </div>
                    <div class="form__input">
                        <select id="edit_abonement" name="abonement_id" class="edit-discipline-select" disabled>
                            <option><?php echo $contributor->abonement_full_info;?></option>
                        </select>
                    </div>

                    <div class="del-block">
                        <input type="hidden" name="id" value="<?php echo $contributor->main_id; ?>">
                        <input type="hidden" name="action" value="alx_edit_personal_abonement">
                        <input type="hidden" name="user_id" value="<?php echo $contributor->user_id; ?>">
                        <input type="hidden" name="redirect" value="<?php echo site_url() . '/profile/?p=reg'; ?>">
                        <div class="edit-button"><button class="edit_item_button">Изменить</button></div>
                        <div class="del-item" data-id="<?php echo $contributor->abonement_id; ?>">
                            <img src="<?=get_template_directory_uri();?>/img/del.png" alt="logo" width="26" height="26">
                            <span>Удалить</span>
                        </div>
                    </div>

                </div>
                </form>
                <?php $count++; endforeach; ?>
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
