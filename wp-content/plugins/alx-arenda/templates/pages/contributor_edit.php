<?php

$query = new WC_Product_Query( ['category' => ['abonementy']] );
$products = $query->get_products();
$discipline = get_posts(['post_type' => 'discipline', 'numberposts' => -1]);
$user_id = (int) $_GET['user_id'];
$user = (get_user_by('ID', $user_id))->data;
$seasonTicket = \inc\Profile\SeasonTicket::getTicketByUserId($user_id);

?>
<div class="reg-block__right">
    <div class="open-lk">Открыть меню</div>
    <div class="reg-block__title">
        Продлить абонемент для ученика
    </div>
    <div class="reg-block__top reg-block__top--inner">
        <div class="profile-block-header">
            <button class="btn btn-small btn-submit btn-add-ticket-js">Добавить абонемент</button>
        </div>
        <div class="profile-block">
            <form method="post" action="/wp-admin/admin-post.php" enctype="multipart/form-data">
                <div class="row-block">
                    <div class="card">
                        <h3>Пользовательские данные</h3>
                        <div class="form-row">
                            <div class="form-input-text"><input type="text" name="user_login" value="<?=$user->user_login;?>" placeholder="Логин" disabled></div>
                        </div>
                        <div class="form-row">
                            <div class="form-input-text"><input type="text" name="first_name" placeholder="Имя" value="<?=get_user_meta($user->ID, 'first_name', 1);?>" required></div>
                        </div>
                        <div class="form-row">
                            <div class="form-input-text"><input type="text" name="last_name" placeholder="Фамилия" value="<?=get_user_meta($user->ID, 'last_name', 1);?>" required></div>
                        </div>

                        <div class="form-row">
                            <div class="form-input-text"><input type="email" name="email" placeholder="Email" value="<?=$user->user_email;?>" disabled></div>
                        </div>
                        <div class="form-row">
                            <div class="form-input-text"><input class="js-input-mask" type="text" name="phone" placeholder="Телефон" value="<?=get_user_meta($user->ID, 'user_phone', 1);?>" required></div>
                        </div>

                        <input type="hidden" name="action" value="alx_add_contributor">
                        <input type="hidden" name="user_id" value="<?=$user_id?>">
                        <input type="hidden" name="redirect" value="<?=site_url();?>/profile?p=lst_students">
                        <input type="submit" value="Сохранить" class="btn btn-submit btn-big">
                    </div>
                    <div class="card ticket">
                        <h3>Абонемент</h3>
                        <div class="ticket-root-block">
                            <?php foreach($seasonTicket as $data): ?>
                                <div class="header-title-ticket" data-trigger="<?=$data->id;?>"><?= $data->abonement . " <br> " . $data->discipline;?></div>
                                <div class="content-ticket data-<?=$data->id;?>">
                                    <div class="form-row">
                                        <select name="disciplin_id[<?=$data->id;?>]">
                                            <?php foreach($discipline as $item): ?>
                                                <option value="<?=$item->ID;?>" <?php if($item->ID == $data->disciplin_id) echo "selected" ?>>
                                                    <?=$item->post_title;?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="form-row">
                                        <select class="select_product" data-toggle="#select_price_<?=$data->id;?>" name="product_id[<?=$data->id;?>]">
                                            <?php foreach($products as $value): ?>
                                                <option value="<?=$value->id;?>" <?php if($value->id == $data->product_id) echo "selected" ?>>
                                                    <?=$value->name;?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-input-text">
                                            <input class="select_price_<?=$data->id;?>" type="text" name="total_cost" placeholder="Стоимость" value="<?=$data->total_cost;?>" required>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>

                    </div>
                </div>
            </form>

        </div>
    </div>
</div>
<div class="add-ticket-layout">
    <span>&times;</span>
    <div class="add-ticket-content">
        <form method="post" action="/wp-admin/admin-post.php">
        <div class="form-row">
            <select name="disciplin_id">
                <?php foreach($discipline as $item): ?>
                    <option value="<?=$item->ID;?>">
                        <?=$item->post_title;?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-row">
            <select id="select_product" name="product_id">
                <?php foreach($products as $value): ?>
                    <option value="<?=$value->id;?>">
                        <?=$value->name;?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-row">
            <div class="form-input-text">
                <input id="select_price" type="text" name="total_cost" placeholder="Стоимость" value="">
            </div>
        </div>
            <input type="hidden" name="action" value="alx_add_ticket_for_contributor">
            <input type="hidden" name="user_id" value="<?=$user_id;?>">
        <button class="btn btn-big btn-submit add-save-ticket-js">Сохранить</button>
        </form>
    </div>
</div>
