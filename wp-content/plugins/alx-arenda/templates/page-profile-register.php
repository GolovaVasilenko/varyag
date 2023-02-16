<?php
/*
 * Template Name: Page Register Profile
 * Template Post Type: page
 */

get_header();
?>
    <div class="top-block top-block--short" style="background-image: url(<?=get_template_directory_uri();?>/img/basketback.jpg)">
        <div class="top-block__body container">
            <div class="top-block__middle">
                <div class="breadcrumbs breadcrumbs">
                    <a href="/" class="breadcrumbs__link">
                        <img src="<?=get_template_directory_uri();?>/img/home.png" alt="logo" width="14" height="14">
                    </a>
                    <a class="breadcrumbs__link">
                        Регистрация новой учетной записи
                    </a>
                </div>
                <h1 class="top-block__title">
                    Регистрация
                </h1>
            </div>
        </div>
    </div>
    <div class="reg-block reg-block-wrapp">
        <diev class="button-popup-close">&times;</diev>
        <div class="reg-block__right">
            <div class="reg-block__top">
                <h3>Регистрация</h3>
                <form id="alx-reg-form" method="post" action="/wp-admin/admin-post.php" class="form">
                    <div class="error-message"></div>
                    <div class="reg-block__top-left">
                        <div class="form__input">
                            <div class="form__input-name">Укажите имя<span>*</span></div>
                            <input type="text" name="first_name" id="first_name" required>
                        </div>
                        <div class="form__input">
                            <div class="form__input-name">Укажите фамилию<span>*</span></div>
                            <input type="text" name="last_name" id="last_name" required>
                        </div>
                        <div class="form__input">
                            <div class="form__input-name">Укажите логин<span>*</span></div>
                            <input type="text" name="login" id="reg-name" required>
                        </div>
                        <div class="form__input">
                            <div class="form__input-name">Укажите номер телефона:<span>*</span></div>
                            <input type="text" name="phone" id="reg-phone" class="js-input-mask" inputmode="text" placeholder="+7(___)___-__-__">
                        </div>
                        <div class="form__input">
                            <div class="form__input-name">Укажите адрес электронной почты:<span>*</span></div>
                            <input type="email" name="email" id="reg-email" required>
                        </div>
                        <div class="btn-block-wrap">
                            <input type="hidden" name="action" value="alx_register_user">
                            <input type="hidden" name="flag" value="page">
                            <input type="hidden" name="redirect" value="<?=site_url();?>">
                            <button class="button button--full button--big" type="submit">
                                <span>Зарегистрироваться</span>
                            </button>
                            <a href="/profile-login/" class="go-login">Уже есть аккаунт</a>
                        </div>
                        <p>Продолжая вы согласны с политикой конфиденциальности и обработкой персональных данных</p>
                    </div>

                </form>
            </div>
        </div>
    </div>

<?php get_footer();