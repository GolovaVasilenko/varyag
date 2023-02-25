<?php
$query = new WC_Product_Query( ['category' => ['abonementy']] );
$products = $query->get_products();
$discipline = get_posts(['post_type' => 'discipline', 'numberposts' => -1]);

?>
<div class="reg-block__right">
    <div class="open-lk">Открыть меню</div>
    <div class="reg-block__title">
        Новый Ученик
    </div>
    <div class="reg-block__top reg-block__top--inner">
        <div class="profile-block-header">
            <p>Пароль для входа в личный кабинет будет выслан на почту, которую вы укажете в форме</p>
        </div>
        <div class="profile-block">
            <form method="post" action="/wp-admin/admin-post.php" enctype="multipart/form-data">
                <div class="row-block">
                    <div class="card">
                        <h3>Пользовательские данные</h3>
                        <div class="form-row">
                            <div class="form-input-text"><input type="text" name="user_login" value="" placeholder="Логин" required></div>
                        </div>
                        <div class="form-row">
                            <div class="form-input-text"><input type="text" name="first_name" placeholder="Имя" value="" required></div>
                        </div>
                        <div class="form-row">
                            <div class="form-input-text"><input type="text" name="last_name" placeholder="Фамилия" value="" required></div>
                        </div>

                        <div class="form-row">
                            <div class="form-input-text"><input type="email" name="email" placeholder="Email" value="" required></div>
                        </div>
                        <div class="form-row">
                            <div class="form-input-text"><input class="js-input-mask" type="text" name="phone" placeholder="Телефон" value="" required></div>
                        </div>

                        <input type="hidden" name="action" value="alx_add_contributor">
                        <input type="hidden" name="redirect" value="<?=site_url();?>/profile?p=lst_students">
                        <input type="submit" value="Сохранить" class="btn btn-submit btn-big">
                    </div>
                    <div class="card">
                        <h3>Абонемент</h3>
                        <div class="form-row">
                            <select name="disciplin_id">
                                <?php foreach($discipline as $item): ?>
                                    <option value="<?=$item->ID;?>"><?=$item->post_title;?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-row">
                            <select id="select_product" name="product_id">
                                <?php foreach($products as $value): ?>
                                    <option value="<?=$value->id;?>"><?=$value->name;?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-row">
                            <div class="form-input-text"><input id="select_price" type="text" name="total_cost" placeholder="Стоимость" value="" required></div>
                        </div>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>
