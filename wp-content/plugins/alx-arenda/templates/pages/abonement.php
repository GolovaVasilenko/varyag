<?php
$abonements = \inc\Profile\SeasonTicket::listAbonement();

?>

    <div class="reg-block__right">
        <div class="open-lk">Открыть меню</div>
        <div class="reg-block__title">
            АБОНИМЕНТЫ
        </div>
        <div class="reg-block__top">
            <div class="profile-block-header">
                <div class="profile-block__title">
                    <a class="btn btn-default btn-lg" href="/profile?p=abonement_add">Новый Абонемент</a>
                </div>
            </div>
            <div class="profile-block">
                <div class="profile-block__item">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>#ID</th>
                            <th>Абонемент</th>
                            <th>Дисциплина</th>
                            <th>Тип тренировки</th>
                            <th>Кол-во занятий</th>
                            <th>Итоговая Стоимость</th>
                            <th>Действия</th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php foreach($abonements as $abonement) : ?>
                                <tr>
                                    <td><?=$abonement->id;?></td>
                                    <td><?=$abonement->count_month;?></td>
                                    <td><?=$abonement->post_title;?></td>
                                    <td><?=($abonement->type_trening == 1) ? "Персональная" : "Груповая";?></td>
                                    <td><?=$abonement->count_trening;?></td>
                                    <td><?=$abonement->total_price;?></td>
                                    <td>
                                        <a class="btn btn-primary btn-sm" href="/profile?p=abonement_edit&id=<?=$abonement->id;?>">Изменить</a>
                                        <form method="post" action="/wp-admin/admin-post.php" class="form-remove">
                                        <input type="hidden" name="id" value="<?=$abonement->id;?>">
                                        <input type="hidden" name="redirect" value="/profile?p=abonement">
                                        <input type="hidden" name="action" value="alx_delete_abonement">
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

