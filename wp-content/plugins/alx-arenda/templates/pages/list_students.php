<?php

/*$data = [
  'product_id' => 567,
  'disciplin_id' => 181,
  'user_id' => 2,
  'total_cost' => 6000,
  'end_time' => date("Y-m-d H:i:s", time() + (3600*24*30))
];

$seasonTicket = new \inc\Profile\SeasonTicket();
$seasonTicket->addTicket($data);*/

$students = \inc\Profile\Contributor::listContributor();

?>

<div class="reg-block__right">
    <div class="open-lk">Открыть меню</div>
    <div class="reg-block__title">
        Ученики
    </div>
    <div class="reg-block__top">
        <div class="profile-block-header">
            <div class="profile-block__title">
                <a class="btn btn-default btn-lg" href="/profile?p=contributor_add">Добавить Ученика</a>
            </div>
        </div>
        <div class="profile-block">
            <div class="profile-block__item">
                <table class="table">
                    <thead>
                    <tr>
                        <th>#ID</th>
                        <th>Имя Фамилия</th>
                        <th>Телефон</th>
                        <th>Email</th>
                        <th>Абонемент</th>
                        <th>Дата Продления</th>
                        <th>Действия</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php foreach($students as $student): ?>
                        <?php
                            $phone = get_user_meta($student->ID, 'user_phone', 1 );
                            $seasonTickets = \inc\Profile\SeasonTicket::getTicketByUserId($student->ID);
                            $abonement = '';
                            $time_end = '';
                            if(!empty($seasonTickets)) {
                                foreach($seasonTickets as $ticket) {
                                    $abonement = $ticket->discipline . " - " . $ticket->abonement . "<br>";
                                    $time_end = $ticket->end_time . "<br>";
                                }
                            }

                        ?>
                            <tr>
                                <td><?=$student->ID;?></td>
                                <td><?=$student->display_name;?></td>
                                <td><?=$phone;?></td>
                                <td><?=$student->user_email;?></td>
                                <td><?=$abonement;?></td>
                                <td><?=$time_end;?></td>
                                <td>
                                    <a class="btn btn-primary btn-sm" href="/profile?p=contributor-edit&user_id=<?=$student->ID;?>">Изменить</a>
                                    <form method="post" action="/wp-admin/admin-post.php" class="form-remove">
                                        <input type="hidden" name="user_id" value="<?=$student->ID;?>">
                                        <input type="hidden" name="action" value="alx_delete_contributor">
                                        <button class="btn btn-danger btn-sm btn-remove-js">Удалить</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>


