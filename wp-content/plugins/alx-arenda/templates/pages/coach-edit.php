<?php

$term_id = isset($_GET['term_id']) ? (int)$_GET['term_id'] : null;
$user_id = isset($_GET['user_id']) ? (int)$_GET['user_id'] : null;
if($term_id) {
    $term_coach = get_term_by('id', $term_id, 'coach');
}
if($user_id) {
    $user_coach = get_user_by('ID', $user_id);
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
            <?php //var_dump($term_coach);
            //var_dump($user_coach); ?>
            <form method="post" action="/wp-admin/admin-post.php" enctype="multipart/form-data">
                <h3>Пользовательские данные</h3>
                <div class="form-row">
                    <div class="form-input-text"><input type="text" name="first_name" placeholder="Имя" value=""></div>
                    <div class="form-input-text"><input type="text" name="last_name" placeholder="Фамилия" value=""></div>
                </div>

                <div class="form-row">
                    <div class="form-input-text"><input type="email" name="email" placeholder="Email" value=""></div>
                    <div class="form-input-text"><input class="js-input-mask" type="text" name="phone" placeholder="Телефон" value=""></div>
                </div>

                <h3>Данные для публикации на сайте</h3>
                <div class="form-row">
                    <div class="form-input-text">
                    <input type="text" name="tag-name" placeholder="Фамилия Имя" value="<?=$term_coach->name?>">
                    </div>
                </div>
                <div class="form-row">
                    <?php wp_editor($term_coach->description, 'description', ['textarea_name' => 'description', 'textarea_rows' => 4, 'media_buttons' => false]);?>
                </div>

                <input type="hidden" name="user_id" value="<?=$user_id;?>">
                <input type="hidden" name="term_id" value="<?=$term_id;?>">
                <input type="submit" value="Сохранить" class="btn btn-submit btn-big">
            </form>
        </div>
    </div>
</div>

