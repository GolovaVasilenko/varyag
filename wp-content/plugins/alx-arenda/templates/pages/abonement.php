<?php
$abonements = \inc\Profile\SeasonTicket::listAbonement();

$cat_discipline = get_terms(['taxonomy' => 'services', 'hide_empty' => false]);
$disciplines = get_posts(['post_type' => 'discipline', 'numberposts' => -1]);
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
                <div class="filters-block">
                    <form id="filter-form-abonement" method="post">
                        <label> По сервисам</label>
                        <select id="select-service" name="service_id" class="filter-select">
                            <option value="0">---</option>
                            <?php foreach($cat_discipline as $service) : ?>
                                <option value="<?=$service->term_id;?>"><?=$service->name;?></option>
                            <?php endforeach; ?>
                        </select>

                        <label> По дисцирлинам</label>
                        <select id="select-discipline" name="discipline_id" class="filter-select">
                            <option value="0">---</option>
                            <?php foreach($disciplines as $discipline) : ?>
                                <option value="<?=$discipline->ID;?>"><?=$discipline->post_title;?></option>
                            <?php endforeach; ?>
                        </select>
                        <input type="submit" value="Фильровать" class="btn btn-lg btn-default">
                    </form>
                </div>
            </div>
            <div class="profile-block">
                <div class="profile-block__item">
                    <table class="table table-abonement">
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

