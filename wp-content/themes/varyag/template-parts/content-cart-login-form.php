<div class="cart-login-layout">
    <div class="reg-block reg-block-wrapp">
        <diev class="button-cart-popup-close">×</diev>
        <div class="reg-block__right">
            <div class="reg-block__top">
                <h3>Вход в личный кабинет</h3>
                <form id="alx-login-cart-form" method="post" action="" class="form">
                    <div class="error-message" style="color: white;"></div>
                    <div class="form__input">
                        <div class="form__input-name">Email <span>*</span></div>
                        <input type="email" name="email" id="cart-login-email" required="">
                    </div>
                    <div class="form__input">
                        <div class="form__input-name">Пароль <span>*</span></div>
                        <input type="password" name="password" id="cart-login-password" required="">
                    </div>
                    <div class="btn-block-wrap">
                        <input type="hidden" name="action" class="form-action" value="alx_cart_login_user">
                        <input type="hidden" name="flag" class="form-flag" value="ajax">
                        <input type="hidden" name="redirect" class="form-redirect" value="cart">
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
</div>
