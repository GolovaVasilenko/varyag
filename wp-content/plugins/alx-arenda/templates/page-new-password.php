<?php
if(!isset($_GET['token']) && $_GET['token'] !== $_SESSION['forgot_token']) {
    $_SESSION['errors'] = "Ссылка для восстановления пароля не действительна! Попробуйте еще раз.";
    wp_redirect('forgot-password'); die;
}
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
                    <?php the_title();?>
                </a>
            </div>
            <h1 class="top-block__title">
                <?php the_title();?>
            </h1>
        </div>
    </div>
</div>
<div class="container">
    <div class="reg-block reg-block-wrapp">
        <div class="reg-block__right">
            <div class="reg-block__top">
                <h3>Забыли пароль?</h3>
                <p>Укажите ваш email для получения инструкций по смене пароля.</p>
                <?php
                if(isset($_SESSION['errors'])) {
                    $error = $_SESSION['errors'];
                    unset($_SESSION['errors']);
                    echo "<p>{$error}</p>";
                }
                ?>
                <?php
                if(isset($_SESSION['success'])) {
                    $error = $_SESSION['success'];
                    unset($_SESSION['success']);
                    echo "<p>{$error}</p>";
                }
                ?>
                <form id="alx_forgot_form" method="post" action="/wp-admin/admin-post.php" class="form">
                    <div class="error-message"></div>
                    <div class="form__input">
                        <div class="form__input-name">Новый пароль <span>*</span></div>
                        <input type="password" name="password" id="new-password" required>
                    </div>
                    <div class="btn-block-wrap">
                        <input type="hidden" name="action" value="alx_new_pass">
                        <input type="hidden" name="flag" value="ajax">
                        <input type="hidden" name="redirect" value="profile">
                        <button class="button button--full button--big log-button" type="submit">
                            <span>Отправить</span>
                        </button>
                    </div>
                    <p>Продолжая вы согласны с политикой конфиденциальности и обработкой персональных данных</p>
                </form>
            </div>
        </div>
    </div>
</div>
<?php get_footer();
