<div class="container">
    <div class="sports-block">
        <div class="title title--big title--black">
            Наши спортсмены
        </div>
        <div class="sports-block__body popup-gallery">
            <a href="<?php echo get_template_directory_uri();?>/img/team1.jpeg" class="sports-block__img">
                <img class="lazyload" data-src="<?php echo get_template_directory_uri();?>/img/team1.jpeg" alt="team1" width="1160" height="590" />
            </a>
            <a href="<?php echo get_template_directory_uri();?>/img/team2.jpeg" class="sports-block__img">
                <img class="lazyload" data-src="<?php echo get_template_directory_uri();?>/img/team2.jpeg" alt="team2" width="446" height="297" />
            </a>
            <a href="<?php echo get_template_directory_uri();?>/img/team3.jpeg" class="sports-block__img">
                <img class="lazyload" data-src="<?php echo get_template_directory_uri();?>/img/team3.jpeg" alt="team3" width="226" height="296" />
            </a>
            <a href="<?php echo get_template_directory_uri();?>/img/team4.jpeg" class="sports-block__img">
                <img class="lazyload" data-src="<?php echo get_template_directory_uri();?>/img/team4.jpeg" alt="team4" width="226" height="296" />
            </a>
            <a href="<?php echo get_template_directory_uri();?>/img/team5.jpeg" class="sports-block__img">
                <img class="lazyload" data-src="<?php echo get_template_directory_uri();?>/img/team5.jpeg" alt="team5" width="226" height="296" />
            </a>
        </div>
    </div>
</div>
<div class="container">
    <div class="call-wrap">
        <div class="block-anchor" id="callback"></div>
        <div class="callback-block callback-block--inner">
            <div class="title title--big title--black">
                Оставить заявку
            </div>
            <div class="title title--small title--black">
                Оставляйте заявку и уточняйте наличие мест!
            </div>
            <form action="" method="post" class="form form--black">
                <div class="form__item">
                    <input type="text" name="name" id="name" placeholder="Как вас зовут?" />
                </div>
                <div class="form__item form__item--mask">
                    <div class="form__item-pic">
                        <img src="<?php echo get_template_directory_uri();?>/img/rus.jpg" alt="rus" width="27" height="18" />
                    </div>
                    <input type="text" class="js-input-mask" name="phone" id="disc-phone" />
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
        <div class="call-wrap__block">
            <span>или звоните по номеру телефону:</span>
            <div class="footer__connect">
                <a href="tel:+79037284090" class="footer__number"> +7 903 728-40-90</a>
                <a href="https://wa.me/79037284090" target="_blank" class="footer__soc">
                    <img src="<?php echo get_template_directory_uri();?>/img/whatsap.png" alt="logo" width="17" height="17" />
                </a>
                <a href="https://t.me/varyag_podolsk" target="_blank" class="footer__soc">
                    <img src="<?php echo get_template_directory_uri();?>/img/telegram.png" alt="logo" width="17" height="17" />
                </a>
                <a href="mailto: varyagclub-pd@yandex.ru">varyagclub-pd@yandex.ru</a>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <?php echo do_shortcode('[coach_list]');?>
</div>
<div class="container">
    <div class="dop-block dop-block--inner">
        <div class="title title--big title--black">
            ДОПОЛНИТЕЛЬНО
        </div>
        <div class="dop-block__body">
            <div class="dop-item js-dop1">
                <div class="dop-item__img">
                    <img class="lazyload" data-src="<?php echo get_template_directory_uri();?>/img/dop1.jpg" alt="img5" width="573" height="292" />
                </div>
                <div class="dop-item__text">
                    Подбор персонального питания
                </div>
            </div>
            <div class="dop-item js-dop2">
                <div class="dop-item__img">
                    <img class="lazyload" data-src="<?php echo get_template_directory_uri();?>/img/dop2.jpg" alt="img5" width="573" height="292" />
                </div>
                <div class="dop-item__text">
                    Подбор плана тренировок
                </div>
            </div>
        </div>
        <a href="/services" class="button button--big button--full">
            <span>посмотреть все услуги</span>
        </a>
    </div>
</div>
