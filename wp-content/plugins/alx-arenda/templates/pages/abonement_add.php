<?php
$discipline = get_posts(['numberposts' => -1, 'post_type' => 'discipline']);
?>
    <div class="reg-block__right">
        <div class="open-lk">Открыть меню</div>
        <div class="reg-block__title">
            АБОНИМЕНТЫ
        </div>
        <div class="reg-block__top">
            <div class="profile-block-header">
                <div class="profile-block__title">
                    Новый абонемент
                </div>
            </div>
            <div class="profile-block">
                <div class="profile-block__item">
                    <form method="post" action="/wp-admin/admin-post.php" enctype="multipart/form-data">
                        <div class="form-row">
                            <div class="form-input-text">
                                <select name="type_trening">
                                    <option value="<?=\inc\Profile\SeasonTicket::GROUP;?>">Групповые тренировки</option>
                                    <option value="<?=\inc\Profile\SeasonTicket::PERSONAL;?>">Персональные тренировки</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-input-text">
                                <select name="discipline_id">
                                    <?php foreach ($discipline as $d) : ?>
                                    <option value="<?=$d->ID;?>"><?=$d->post_title;?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-input-text">
                                <select name="count_month">
                                    <option value="1 месяц">1 месяц</option>
                                    <option value="3 месяца">3 месяца</option>
                                    <option value="6 месяцев">6 месяцев</option>
                                    <option value="8 месяцев">8 месяцев</option>
                                    <option value="10 месяцев">10 месяцев</option>
                                    <option value="1 год">1 год</option>
                                    <option value="1 тренировка">1 тренировка</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-input-text">
                                <input type="text" name="one_trening_price" value="" placeholder="Стоимость одной тренировки">
                            </div>
                            <div class="form-input-text">
                                <input type="text" name="total_price" value="" placeholder="Итоговая стоимость тренировок">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-input-text">
                                <input type="text" name="discount" value="" placeholder="Скидка (Полная информация)">
                            </div>
                            <div class="form-input-text">
                                <input type="text" name="action_info" value="" placeholder="Акция (Полная информация)">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-input-text">
                                <input type="text" name="count_trening" value="" placeholder="Количество тренировок">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-input-text">
                                <input type="text" name="frozen_info" value="" placeholder="Информация о заморозке">
                            </div>
                        </div>
                        <input type="hidden" name="action" value="alx_add_aboniment">
                        <input type="hidden" name="redirect" value="<?=site_url();?>/profile?p=abonement">
                        <input type="submit" value="Сохранить" class="btn btn-submit btn-big">
                    </form>
                </div>
            </div>
        </div>
    </div>

