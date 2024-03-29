<?php

$user_id = wp_get_current_user()->id;
if($user_id) {
    $user = get_user_by('ID', $user_id);
    $email = $user->user_email;
    $user_info = get_user_meta($user_id);
    $phone = $user_info['user_phone'][0] ?? null;
    $firstName = $user_info['first_name'][0] ?? null;
    $lastName = $user_info['last_name'][0] ?? null;
}

?>
<div class="reg-block__right">
    <div class="open-lk">Открыть меню</div>
    <?php if(in_array('basic_contributor', $current_user->roles)):?>
    <div class="reg-block__title">
        Профиль
    </div>

    <div class="reg-block__top reg-block__top--inner">
        <div class="profile-block">
            <div class="profile-block__left">
                <form class="profile-block__top-form" method="post" action="/wp-admin/admin-post.php" enctype="multipart/form-data">
                    <div class="profile-block__item">
                        <div class="profile-block__input">
                            <label for="login">Имя</label>
                            <input type="text" name="first-name" id="first-name" value="<?=$firstName;?>" />
                        </div>
                        <div class="profile-block__change" id="first-name-error">сменить имя</div>
                    </div>
                    <div class="profile-block__item">
                        <div class="profile-block__input">
                            <label for="login">Фамилия</label>
                            <input type="text" name="last-name" id="last-name" value="<?=$lastName;?>" />
                        </div>
                        <div class="profile-block__change" id="last-name-error">сменить фамилию</div>
                    </div>
                    <div class="profile-block__item">
                        <div class="profile-block__input">
                            <label for="number">Укажите номер телефона</label>
                            <input type="text" name="number" id="number" class="js-input-mask" value="<?=$phone;?>" />
                        </div>
                        <div class="profile-block__change" id="number-error">сменить телефон</div>
                    </div>
                    <div class="profile-block__item">
                        <div class="profile-block__input">
                            <label for="login">Электронная почта</label>
                            <input type="text" name="email" id="email" value="<?=$email;?>" />
                        </div>
                        <div class="profile-block__change" id="email-error">сменить email</div>
                    </div>
                    <input type="hidden" name="action" value="alx_update_contributor">
                    <input type="hidden" name="redirect" value="<?=site_url() . $_SERVER['REQUEST_URI'];?>">
                    <input type="submit" value="Сохранить" id="info-submit" class="profile-block__save">
                </form>
                <div class="profile-block__title">
                    Сменить пароль
                </div>
                <form class="profile-block__bottom-form" method="post" action="/wp-admin/admin-post.php" enctype="multipart/form-data">
                    <div class="profile-block__item">
                        <div class="profile-block__input">
                            <label for="old-pass" id="old-pass-error">Введите старый пароль</label>
                            <input type="text" name="old-pass" id="old-pass" value="" />
                        </div>
                    </div>
                    <div class="profile-block__item">
                        <div class="profile-block__input">
                            <label for="password" id="password-error">Введите новый пароль</label>
                            <input type="text" name="password" id="password" value="" />
                        </div>
                    </div>
                    <div class="profile-block__item">
                        <div class="profile-block__input">
                            <label for="new-pass" id="new-pass-error">Введите новый пароль еще раз</label>
                            <input type="text" name="new-pass" id="new-pass" value="" />
                        </div>
                    </div>
                    <input type="hidden" name="action" value="alx_update_contributor_password">
                    <input type="hidden" name="redirect" value="<?=site_url() . $_SERVER['REQUEST_URI'];?>">
                    <input type="submit" value="Подтвердить смену пароля" id="pass-submit" class="profile-block__save">
                </form>
            </div>
            <div class="profile-block__right">
                <div class="profile-block__title">
                    Мой абонемент
                </div>
                <div class="profile-block__abon">
                    Групповые тренировки по тайскому боксу
                    <span>1/09/2022-30/09/2022</span>
                </div>
                <a href="#" class="profile-block__save"><span>Увеличить колличесвто во тренировок</span></a>
            </div>
        </div>
        <div class="bottom-text">
            <span> Внимание!</span> В пароле должны содержаться как минимум 1 заглавная буква и 1 спецсимвол (
            :%№»!,.;()_+) Длительность пароля не менее 8 символов
        </div>
    </div>
    <?php elseif(in_array('coach', $current_user->roles)):?>
        <div class="reg-block__title">
            Профиль Тренета <?=$firstName . " " . $lastName;?>
        </div>
    <?php if(isset($_SESSION['error'])):?>
    <div class="error-mess">
        <?php
        $mess = $_SESSION['error'];
        unset($_SESSION['error']);
        echo "<p>" . $mess . "</p>";
        ?>
    </div>
    <?php elseif(isset($_SESSION['success'])):?>
    <div class="success-mess">
        <?php
        $mess = $_SESSION['success'];
        unset($_SESSION['success']);
        echo "<p>" . $mess . "</p>";
        ?>
    </div>
    <?php endif; ?>
    <div class="profile-block-header">
        <div class="reg-block__top-right">
            <div class="reg-block__top reg-block__top--inner">
                <div class="profile-block-header">
                    <div class="profile-block__title">
                        Сменить данные
                    </div>
                </div>
                <div class="profile-block">
                    <form id="change-coach-data" method="post" action="/wp-admin/admin-post.php">
                        <div class="form__input">
                            <div class="form__input-name">Email</div>
                            <input type="email" name="user_email" value="<?=$email;?>" required>
                        </div>
                        <div class="form__input">
                            <div class="form__input-name">Телефон</div>
                            <input class="js-input-mask" type="text" name="user_phone" value="<?=$phone;?>" required>
                        </div><br>
                        <input type="hidden" name="action" value="alx_change_coach_data">
                        <input type="hidden" name="redirect" value="/profile/">
                        <button class="button button--full button--big">
                            <span>Сохранить</span>
                        </button>
                    </form>
                </div>
            </div>
        </div>
        <div class="reg-block__top-right">
            <div class="reg-block__top reg-block__top--inner">
                <div class="profile-block-header">
                    <div class="profile-block__title">
                        Сменить пароль
                    </div>
                </div>
                <div class="profile-block">
                    <form id="change-coach-password" method="post" action="/wp-admin/admin-post.php">
                        <div class="form__input">
                            <div class="form__input-name">Укажите старый пароль</div>
                            <input type="password" name="old_pass" required>
                        </div>
                        <div class="form__input">
                            <div class="form__input-name">Укажите новый пароль</div>
                            <input type="password" name="mew_pass" required>
                        </div><br>
                        <input type="hidden" name="action" value="alx_change_coach_password">
                        <input type="hidden" name="redirect" value="/profile/">
                        <button class="button button--full button--big">
                            <span>Сменить пароль</span>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php else: ?>
        <div class="reg-block__title">
            Профиль Менеджера
        </div>
        <div class="reg-block__top reg-block__top--inner">
            <div class="profile-block-header">
                <div class="profile-block__title">
                    Срисок тренеров
                </div>
                <div class="form-profile-search" >
                    <!--<form id="ps-search">
                        <input class="input-search" type="text" name="ps-search" value="">
                        <input type="hidden" name="table" value="coach">
                        <button class="btn btn-default btn-lg">Искать</button>
                    </form>-->
                </div>
                <div class="profile-block-create-button">
                    <a class="btn btn-default btn-lg" href="/profile?p=coach-add">Добавить тренера</a>
                </div>
            </div>
            <div class="profile-block">
                <?php $coaches = \inc\Profile\Coach::listCoach();?>
                <div class="profile-block__item">
                    <table class="table">
                    <thead>
                        <tr>
                            <th>#ID</th>
                            <th>Фото</th>
                            <th>Имя</th>
                            <th>Email</th>
                            <th>Действия</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($coaches as $coach): ?>
                            <tr>
                                <td><?=$coach['term']->term_id;?></td>
                                <td><img src="<?=get_field('foto-trenera', $coach['term']);?>" width="60" ></td>
                                <td><?=$coach['term']->name;?></td>
                                <td><?php echo (empty($coach['profile']) ? "" : $coach['profile']->data->user_email);?></td>
                                <td>
                                    <a class="btn btn-primary btn-sm" href="/profile?p=coach-edit&term_id=<?=$coach['term']->term_id;?>&user_id=<?=(empty($coach['profile']) ? '' : $coach['profile']->data->ID);?>">Изменить</a>
                                    <form method="post" action="/wp-admin/admin-post.php" class="form-remove">
                                        <input type="hidden" name="term_id" value="<?=$coach['term']->term_id;?>">
                                        <input type="hidden" name="user_id" value="<?=(empty($coach['profile']) ? '' : $coach['profile']->data->ID);?>">
                                        <input type="hidden" name="action" value="alx_delete_coach">
                                        <button class="btn btn-danger btn-sm btn-remove-js">Удалить</button>
                                    </form>

                                </td>
                            </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>
                </div>
            </div>
        </div>
    <?php endif; ?>
</div>
