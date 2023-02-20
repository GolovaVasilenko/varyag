<div class="reg-block__right">
    <div class="open-lk">Открыть меню</div>
    <?php if(in_array('basic_contributor', $current_user->roles)):?>
    <div class="reg-block__title">
        Профиль
    </div>

    <div class="reg-block__top reg-block__top--inner">
        <div class="profile-block">
            <div class="profile-block__left">
                <form class="profile-block__top-form">
                    <div class="profile-block__item">
                        <div class="profile-block__input">
                            <label for="login">Логин</label>
                            <input type="text" name="login" id="login" value="Джон Доу" />
                        </div>
                        <div class="profile-block__change">сменить логин</div>
                    </div>
                    <div class="profile-block__item">
                        <div class="profile-block__input">
                            <label for="number">Укажите номер телефона</label>
                            <input type="text" name="number" id="number" class="js-input-mask" value="+79004131156" />
                        </div>
                        <div class="profile-block__change">сменить телефон</div>
                    </div>
                    <div class="profile-block__item">
                        <div class="profile-block__input">
                            <label for="login">Электронная почта</label>
                            <input type="text" name="email" id="email" value="test@mail.ru" />
                        </div>
                        <div class="profile-block__change">сменить email</div>
                    </div>
                    <button class="profile-block__save">
                        Сохранить
                    </button>
                </form>
                <div class="profile-block__title">
                    Сменить пароль
                </div>
                <form class="profile-block__bottom-form">
                    <div class="profile-block__item">
                        <div class="profile-block__input">
                            <label for="old-pass">Введите старый пароль</label>
                            <input type="text" name="old-pass" id="old-pass" value="" />
                        </div>
                    </div>
                    <div class="profile-block__item">
                        <div class="profile-block__input">
                            <label for="password">Введите новый пароль</label>
                            <input type="text" name="password" id="password" value="" />
                        </div>
                    </div>
                    <div class="profile-block__item">
                        <div class="profile-block__input">
                            <label for="new-pass">Введите новый пароль еще раз</label>
                            <input type="text" name="new-pass" id="new-pass" value="" />
                        </div>
                    </div>
                    <button class="profile-block__save">
                        Подтвердить смену пароля
                    </button>
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
            Профиль Тренета
        </div>
    <div class="reg-block__top reg-block__top--inner">
        <div class="profile-block">
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
                    <form id="ps-search">
                        <input class="input-search" type="text" name="ps-search" value="">
                        <input type="hidden" name="table" value="coach">
                        <button class="btn btn-default btn-lg">Искать</button>
                    </form>
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
                            <th>Actions</th>
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
