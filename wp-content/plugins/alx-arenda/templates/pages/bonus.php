<?php

$bonus = (new \inc\Classes\UserBonuses())->getAllUserBonuses();
$bonus = $bonus->bonuses !== NULL ? $bonus->bonuses : 'Нет';
?>
<div class="reg-block__right">
    <div class="open-lk">Открыть меню</div>
    <div class="reg-block__title">
        Мои бонусы
    </div>
    <div class="reg-block__top reg-block__top--inner">
        <div class="my-bonuses">
            <div class="my-bonuses__top-wrap">
                <div class="my-bonuses__top">
                    <div class="my-bonuses__title">
                        На вашем балансе:
                    </div>
                    <div class="my-bonuses__bon"><span><?php echo $bonus ?></span> бонусов</div>
                </div>
                <div class="my-bonuses__info">
                    <span>1 бонус = 1 рубль</span>
                    Бонусы используются для оплаты товаров из каталога на сайте
                    <a href="https://varyagclub.ru" target="_blank">varyagclub.ru</a>
                </div>
            </div>
            <div class="my-bonuses__invite">
                <span> Пригласи друга в наш клуб и <span>получи 300 бонусов себе и 300 бонусов другу</span> на счет</span>
                <div class="my-bonuses__link">
                    <div class="button button--buy button--border js-open-form">
                        <span>Ваша ссылка на приглашение</span>
                    </div>
                    <div hidden="">
                        <div id="popup-sale" class="popup popup--sale"></div>
                        <div id="popup-form" class="popup popup--abon">
                            <div class="callback-block callback-block--popup">
                                <div class="title title--small title--black">
                                    Пригласи друга в наш клуб и получи 300 бонусов себе и 300 бонусов другу на счет
                                </div>
                                <form action="" method="post" class="form form--black">
                                    <div class="form__item">
                                        <input type="text" name="name" placeholder="Как зовут вашего друга?">
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
                    <div class="my-bonuses__copy" id="btn">копировать</div>
                </div>
            </div>
            <div class="my-bonuses__invite">
              <span
              >Бонусами может быть оплачено <span> до 30% от стоимости покупки</span> товаров в разделе
                <a href="#" target="_blank">каталог</a></span
              >
            </div>
        </div>
    </div>
</div>
