<?php
$user_id = wp_get_current_user()->id;
if($user_id) {
    $user = get_user_by('ID', $user_id);
    $user_info = get_user_meta($user_id);
    $firstName = $user_info['first_name'][0] ?? null;
    $lastName = $user_info['last_name'][0] ?? null;
}

$calendar_table = \inc\Classes\Calendar::getMonth(date('n'), date('Y'));
?>
<div class="reg-block__right">
    <div class="open-lk">Открыть меню</div>
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
    <div class="reg-block__top reg-block__top--inner">
        <div class="profile-block-header">
            <div class="profile-block__title">
                Расписание для индивидуальных тренировок
            </div>
        </div>
        <div class="profile-block">
            <?php echo $calendar_table; ?>
        </div>
    </div>
</div>
<div class="layout-popup">
    <div class="popup-content">
        <span class="popup-close">&times;</span>
        <div class="popup-content-header">
        </div>
        <div class="popup-content-form">
            <form class="set-time-interval">
                <span class="add-time-interval">+</span>
                <div class="form-body">
                    <div class="form-row">
                        <input class="form-input-text" type="time" name="start[]" min="08:00" max="22:00" value="08:00" required>
                        <input class="form-input-text" type="time" name="end[]" min="08:00" max="22:00" value="09:00" required>
                        <span class="remove-time-interval">-</span>
                    </div>
                </div>
                <input class="calendar-day" type="hidden" name="day" value="">
                <input class="calendar-month" type="hidden" name="month" value="">
                <input class="calendar-even-id" type="hidden" name="event_id" value="">
                <button class="btn btn-lg btn-default set-schedule-on-day">Сохранить</button>
                <button class="btn btn-lg btn-default set-sunday">Установить Выходной</button>
                <button class="btn btn-lg btn-default remove-sunday">Отменить Выходной</button>
            </form>
        </div>
    </div>
</div>
<script>
    jQuery(document).ready(function($) {
        $('.popup-close').on('click', function() {
            $('.layout-popup').fadeOut(300);
        });

        $('.set-schedule-on-day').on('click', function(e) {
            e.preventDefault();
            let form = $('.set-time-interval').append('<input class="alx_set_one_day_schedule" type="hidden" name="action" value="alx_set_one_day_schedule">');

            $.ajax({
                type: 'post',
                url: '/wp-admin/admin-ajax.php',
                data: form.serialize(),
                success: function(request) {
                    location.reload(true);
                }
            });
        });

        $('.calendar-day').on('click', function() {
            let day = $(this).text();
            let month = $('.table-calendar').data('month');
            $('.calendar-day').val(day);
            $('.calendar-month').val(month);
            $('.calendar-even-id').val($(this).data('id'));
            $('.popup-content-header').html(day + ' ' + month);
            $('.layout-popup').fadeIn(300);
            $('.remove-sunday').hide();
            $('.set-sunday').show();
            let eventId = $(this).data('id') || 0;
            getBodyScheduler(month, day, eventId);
        });

        function getBodyScheduler(month, day, eventId) {
            $.ajax({
                type: 'post',
                url: '/wp-admin/admin-ajax.php',
                data: {'action': 'alx_get_one_day_schedule', 'day': day, 'month': month, 'event_id': eventId},
                success: function(request) {
                    let result = JSON.parse(request);
                    if(result.status === 'sunday') {
                        $('.form-body').html('<h2 style="color:red;">' + result.schedule.event + '</h2>');
                        $('.remove-sunday').show();
                        $('.set-sunday').hide();
                        $('.set-schedule-on-day').hide();
                    } else if(result.status === 'trening') {
                        console.log(result.schedule.schedule);
                        let output = '';
                        for(let i = 0; i < result.schedule.schedule.start.length; i++) {
                            output += '<div class="form-row">'+
                             '<input class="form-input-text" type="time" name="start[]" min="08:00" max="22:00" value="' + result.schedule.schedule.start[i] + '" required>'+
                            '<input class="form-input-text" type="time" name="end[]" min="08:00" max="22:00" value="' + result.schedule.schedule.end[i] + '" required>'+
                            '<span class="remove-time-interval">-</span></div>';
                        }
                        $('.form-body').html(output);
                        $('.set-sunday').show();
                    }
                }
            });

        }

        $('.add-time-interval').on('click', function() {
            let items = $('.form-row').length + 1;
            if(items < 5) {
                let rowItem = $('.form-row:nth-of-type(1)').clone(true, true);
                $('.form-body').append(rowItem);
            }
        });

        $('.form-body').on('click', '.remove-time-interval', function() {
            $(this).closest('.form-row').remove();
        });

        $('.set-sunday').on('click', function(e) {
            e.preventDefault();
            $('.alx_set_one_day_schedule').remove();
            let day = $('.calendar-day').val();
            let month = $('.calendar-month').val();
            let sunday = 'Выходной';
            $('.remove-sunday').show();
            $(this).hide();

            $.ajax({
                type: 'post',
                url: '/wp-admin/admin-ajax.php',
                data: {'action': 'alx_set_sunday', 'day': day, 'schedule': [], 'month': month, 'event': sunday},
                success: function(request) {
                    location.reload(true);
                }
            });
        });

        $('.remove-sunday').on('click', function(e) {
            e.preventDefault();
            let eventId = $('.calendar-even-id').val();
            $.ajax({
                type: 'post',
                url: '/wp-admin/admin-ajax.php',
                data: {'action': 'alx_remove_sunday', 'event_id': eventId },
                success: function(request) {
                    location.reload(true);
                }
            });
        });
    });
</script>
