<?php
/*
 * Template Name: Page Login Profile
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
                        Вход в личный кабинет
                    </a>
                </div>
                <h1 class="top-block__title">
                    Вход в личный кабинет
                </h1>
            </div>
        </div>
    </div>
    <div class="reg-block reg-block-wrapp">
        <diev class="button-popup-close">&times;</diev>
        <div class="reg-block__right">
            <div class="reg-block__top">
                <h3>Вход в личный кабинет</h3>
                <?php
                if(isset($_SESSION['reg-success'])){
                    $mess = $_SESSION['reg-success'];
                    unset($_SESSION['reg-success']);
                    echo $mess;
                }
                ?>
                <form id="alx-login-form" method="post" action="/wp-admin/admin-post.php" class="form">
                    <div class="error-message"></div>
                    <div class="form__input">
                        <div class="form__input-name">Email <span>*</span></div>
                        <input type="email" name="email" id="login-email" required>
                    </div>
                    <div class="form__input">
                        <div class="form__input-name">Пароль <span>*</span></div>
                        <input type="password" name="password" id="login-password" required>
                    </div>
                    <div class="btn-block-wrap">
                        <input type="hidden" name="action" value="alx_login_user">
                        <input type="hidden" name="flag" value="page">
                        <input type="hidden" name="redirect" value="profile">
                        <button class="button button--full button--big log-button" type="submit">
                            <span>Войти</span>
                        </button>
                        <a href="/forgot-password/" class="lost-password">Забыли пароль?</a>
                    </div>
                    <a href="/profile-register/" class="go-reg">Нет учетной записи? СОЗДАЙТЕ УЧЕТНУЮ ЗАПИСЬ</a>
                    <p>Продолжая вы согласны с политикой конфиденциальности и обработкой персональных данных</p>
                </form>
            </div>
        </div>
    </div>

<?php get_footer();