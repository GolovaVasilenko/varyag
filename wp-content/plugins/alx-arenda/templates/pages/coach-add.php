<?php

?>
<div class="reg-block__right">
    <div class="open-lk">Открыть меню</div>
    <div class="reg-block__title">
        Профиль Менеджера
    </div>
    <div class="reg-block__top reg-block__top--inner">
        <div class="profile-block-header">
            <div class="profile-block__title">
                Изменение данных тренера
            </div>

        </div>
        <div class="profile-block">

            <form method="post" action="/wp-admin/admin-post.php" enctype="multipart/form-data">
                <h3>Пользовательские данные</h3>
                <div class="form-row">
                    <div class="form-input-text"><input type="text" name="user_login" value="" placeholder="Логин" required></div>
                </div>
                <div class="form-row">
                    <div class="form-input-text"><input type="text" name="first_name" placeholder="Имя" value="" required></div>
                    <div class="form-input-text"><input type="text" name="last_name" placeholder="Фамилия" value="" required></div>
                </div>

                <div class="form-row">
                    <div class="form-input-text"><input type="email" name="email" placeholder="Email" value="" required></div>
                    <div class="form-input-text"><input class="js-input-mask" type="text" name="phone" placeholder="Телефон" value="" required></div>
                </div>

                <h3>Данные для публикации на сайте</h3>
                <div class="form-row">
                    <div class="form-input-text">
                        <input type="text" name="tag-name" placeholder="Фамилия Имя" value="">
                    </div>
                </div>
                <div class="form-row">
                    <div><h4>Краткое описание</h4><?php wp_editor('', 'description', ['textarea_name' => 'description', 'textarea_rows' => 4, 'media_buttons' => false]);?></div>
                </div>
                <div class="form-row">
                    <div><h4>Полное описание</h4><?php wp_editor('', 'polnoe_opisanie', ['textarea_name' => 'polnoe_opisanie', 'textarea_rows' => 4, 'media_buttons' => false]);?></div>
                </div>
                <div class="form-row">
                    <?php
                        echo '<div class="form-image">
                                <input type="file" name="foto-trenera">
                                <h4>Фото тренера для главной страницы</h4>
                                </div>';

                        echo '<div class="form-image">
                            <input type="file" name="foto_dlya_polnogo_opisaniya">
                            <h4>Изображение для публикации</h4>
                                </div>';
                    ?>
                </div>
                <input type="hidden" name="action" value="alx_add_coach">
                <input type="hidden" name="redirect" value="<?=site_url();?>/profile/">
                <input type="submit" value="Сохранить" class="btn btn-submit btn-big">
            </form>
        </div>
    </div>
</div>

