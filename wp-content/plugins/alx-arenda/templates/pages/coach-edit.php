<?php

$term_id = isset($_GET['term_id']) ? (int)$_GET['term_id'] : null;
$user_id = isset($_GET['user_id']) ? (int)$_GET['user_id'] : null;
if($term_id) {
    $term_coach = get_term_by('id', $term_id, 'coach');
}
if($user_id) {
    $user_coach = get_user_by('ID', $user_id);
    $user_info = get_user_meta($user_id);
    $first_name = $user_info['first_name'][0] ?? null;
    $last_name = $user_info['last_name'][0] ?? null;
    $phone = $user_info['user_phone'][0] ?? null;
}

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
                    <div class="form-input-text"><input type="text" name="user_login" value="<?= (!empty($user_coach)) ? $user_coach->data->user_login : null;?>"></div>
                </div>
                <div class="form-row">
                    <div class="form-input-text"><input type="text" name="first_name" placeholder="Имя" value="<?= (!empty($first_name)) ? $first_name : null;?>"></div>
                    <div class="form-input-text"><input type="text" name="last_name" placeholder="Фамилия" value="<?= (!empty($last_name)) ? $last_name : null;?>"></div>
                </div>

                <div class="form-row">
                    <div class="form-input-text"><input type="email" name="email" placeholder="Email" value="<?= (!empty($user_coach)) ? $user_coach->data->user_email : null;?>"></div>
                    <div class="form-input-text"><input class="js-input-mask" type="text" name="phone" placeholder="Телефон" value="<?= (!empty($phone)) ? $phone : null;?>"></div>
                </div>

                <h3>Данные для публикации на сайте</h3>
                <div class="form-row">
                    <div class="form-input-text">
                    <input type="text" name="tag-name" placeholder="Фамилия Имя" value="<?=$term_coach->name?>">
                    </div>
                </div>
                <div class="form-row">
                    <div><h4>Краткое описание</h4><?php wp_editor($term_coach->description, 'description', ['textarea_name' => 'description', 'textarea_rows' => 4, 'media_buttons' => false]);?></div>
                </div>
                <div class="form-row">
                    <div><h4>Полное описание</h4><?php wp_editor($term_coach->description, 'polnoe_opisanie', ['textarea_name' => 'polnoe_opisanie', 'textarea_rows' => 4, 'media_buttons' => false]);?></div>
                </div>
                <div class="form-row">
                    <?php
                        $foto_trenera = get_field('foto-trenera', $term_coach);
                        $foto_dlya_polnogo_opisaniya = get_field('foto_dlya_polnogo_opisaniya', $term_coach);
                        if($foto_trenera) {
                            echo '<div class="form-image"><img src="' . $foto_trenera . '" alt="" ><h4>Фото тренера для главной страницы</h4></div>';
                        } else {

                        }
                        if($foto_dlya_polnogo_opisaniya) {
                            echo '<div class="form-image"><img src="' . $foto_dlya_polnogo_opisaniya . '" alt="" ><h4>Изображение для публикации</h4></div>';
                        } else {

                        }
                    ?>

                </div>
                <input type="hidden" name="user_id" value="<?=$user_id;?>">
                <input type="hidden" name="term_id" value="<?=$term_id;?>">
                <input type="hidden" name="action" value="alx_update_coach">
                <input type="hidden" name="redirect" value="<?=site_url() . $_SERVER['REQUEST_URI'];?>">
                <input type="submit" value="Сохранить" class="btn btn-submit btn-big">
            </form>
        </div>
    </div>
</div>

