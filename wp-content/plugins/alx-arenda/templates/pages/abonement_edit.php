<?php
$id = (int) $_GET['id'];
$abonement = \inc\Profile\SeasonTicket::getAbonementsById($id);
$discipline = get_posts(['numberposts' => -1, 'post_type' => 'discipline']);
$monthes = [
    "1 месяц",
    "3 месяца",
    "6 месяцев",
    "8 месяцев",
    "10 месяцев",
    "1 год",
    "1 тренировка"
];
?>
<div class="reg-block__right">
    <div class="open-lk">Открыть меню</div>
    <div class="reg-block__title">
        АБОНИМЕНТЫ
    </div>
    <div class="reg-block__top">
        <div class="profile-block-header">
            <div class="profile-block__title">
                Изменить данные абонемента
            </div>
        </div>
        <div class="profile-block">
            <div class="profile-block__item">
                <form method="post" action="/wp-admin/admin-post.php" enctype="multipart/form-data">
                    <div class="form-row">
                        <div class="form-input-text">
                            <select name="type_trening">
                                <option value="<?=\inc\Profile\SeasonTicket::GROUP;?>" <?php if(\inc\Profile\SeasonTicket::GROUP == $abonement->type_trening) { echo "selected"; }?> >Групповые тренировки</option>
                                <option value="<?=\inc\Profile\SeasonTicket::PERSONAL;?>" <?php if(\inc\Profile\SeasonTicket::PERSONAL == $abonement->type_trening) { echo "selected"; }?> >Персональные тренировки</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-input-text">
                            <select name="discipline_id">
                                <?php foreach ($discipline as $d) : ?>
                                    <option value="<?=$d->ID;?>" <?php if($d->ID == $abonement->discipline_id) { echo "selected"; }?>><?=$d->post_title;?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-input-text">
                            <select name="count_month">
                                <?php foreach($monthes as $month) : ?>
                                <option value="<?=$month;?>" <?php if($month == $abonement->count_month) { echo "selected"; }?> ><?=$month;?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-input-text">
                            <input type="text" name="discount" value="<?=$abonement->discount;?>" placeholder="Скидка (Полная информация)">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-input-text">
                            <input type="text" name="one_trening_price" value="<?=$abonement->one_trening_price;?>" placeholder="Стоимость одной тренировки">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-input-text">
                            <input type="text" name="total_price" value="<?=$abonement->total_price;?>" placeholder="Итоговая стоимость тренировок" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-input-text">
                            <input type="text" name="action_info" value="<?=$abonement->action_info;?>" placeholder="Акция (Полная информация)">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-input-text">
                            <input type="text" name="count_trening" value="<?=$abonement->count_trening;?>" placeholder="Количество тренировок" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-input-text">
                            <input type="text" name="frozen_info" value="<?=$abonement->frozen_info;?>" placeholder="Информация о заморозке">
                        </div>
                    </div>
                    <input type="hidden" name="action" value="alx_edit_aboniment">
                    <input type="hidden" name="id" value="<?=$id?>">
                    <input type="hidden" name="redirect" value="<?=site_url();?>/profile?p=abonement_edit&id=<?=$id?>">
                    <input type="submit" value="Сохранить" class="btn btn-submit btn-big">
                </form>
            </div>
        </div>
    </div>
</div>

