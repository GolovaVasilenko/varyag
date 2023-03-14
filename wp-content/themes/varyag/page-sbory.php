<?php
get_header();
?>
    <main id="primary" class="site-main">

        <div class="top-block top-block--bread">
            <div class="top-block__back">
                <picture>
                    <source media="(min-width:640px)" srcset="<?=get_template_directory_uri();?>/img/celebrate.jpg">
                    <img src="<?=get_template_directory_uri();?>/img/celebrate.jpg" alt="Flowers">
                </picture>
            </div>
            <div class="top-block__body container">
                <div class="top-block__middle">
                    <div class="breadcrumbs">
                        <a href="/" class="breadcrumbs__link">
                            <img src="<?=get_template_directory_uri();?>/img/home.png" alt="logo" width="14" height="14">
                        </a>
                        <a class="breadcrumbs__link">
                            Сборы
                        </a>
                    </div>
                    <h1 class="top-block__title">
                        Спортивно-оздоровительные сборы
                    </h1>
                    <div class="top-block__sub-title">Улучшите навыки своих спортивных показателей за 14 дней</div>
                    <div class="top-block__buttons">
                        <a href="#second" class="button button--big button--border">
                            <span>ПОДРОБНЕЕ</span>
                        </a>
                    </div>
                </div>
                <div class="top-block__bottom">
                    <div class="top-block__address">
                        <div class="address-block">
                            <div class="address-block__icon">
                                <img src="<?=get_template_directory_uri();?>/img/location.png" alt="" width="22" height="26">
                            </div>
                            <div class="address-block__body">
                                <span>Наш адрес:</span>
                                <span>Подольск, ул. Клемента Готвальда, 4. 1</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <div class="entry-content">
                <div class="text-block text-block--inner">
                    <?php the_content(); ?>
                </div>
            </div>
        </article>
    </main>

<?php

get_footer();
