<div class="reg-block__list">
    <a href="/profile/" class="reg-block__link active">
        <img src="<?=get_template_directory_uri();?>/img/user.png" alt="user" width="20" height="20" />
        <span>Тренера</span>
    </a>
    <!--<a href="/profile?p=list_students" class="reg-block__link">
        <img src="<?=get_template_directory_uri();?>/img/user.png" alt="user" width="20" height="20" />
        <span>Ученики</span>
    </a>-->
    <a href="/profile?p=abonement" class="reg-block__link">
        <img src="<?=get_template_directory_uri();?>/img/user.png" alt="user" width="20" height="20" />
        <span>Абонементы</span>
    </a>

    <a href="/profile?p=reg" class="reg-block__link">
        <img src="<?=get_template_directory_uri();?>/img/user.png" alt="user" width="20" height="20" />
        <span>Создание и редактирование аккаунтов</span>
    </a>

    <form id="user_logout" class="" method="post" action="/wp-admin/admin-post.php">
        <input type="hidden" name="action" value="alx_logout_user">
        <button type="submit" class="btn btn-logout btn-lg">
            <img src="<?=get_template_directory_uri();?>/img/logout.png" alt="user" width="24" height="24" />
            выйти
        </button>
    </form>
</div>
