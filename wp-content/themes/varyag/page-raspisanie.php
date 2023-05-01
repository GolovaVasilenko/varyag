<?php

$group_schedule = get_posts(['post_type' => 'group_schedule', 'numberposts' => -1]);
$week_days = [1 => "ПН", 2 => "ВТ", 3 => "СР", 4 => "ЧТ", 5 => "ПТ", 6 => "СБ", 7 => "ВС"];

get_header();

?>

<?php the_content();?>
    <div class="container">
        <div class="calendar-block">
            <div class="calendar-header">
                <h2>Расписание тренировок<br> СКБИ "Варяг"</h2>
            </div>
            <div class="calendar-body">
                <table id="schedule-table">
                    <thead>
                    <?php foreach ($week_days as $index => $day) : ?>
                        <th><?=$day?></th>
                    <?php endforeach; ?>
                    </thead>
                    <tbody>
                        <?php
                        foreach($group_schedule as $schedule) {
                            $den_nedeli = get_field('den_nedeli', $schedule->ID);
                            $name_coaches = get_field('imya_trenera', $schedule->ID);
                            $nachalo_trenirovki = get_field('nachalo_trenirovki', $schedule->ID);
                            echo '<tr>';
                            foreach ($week_days as $index => $day) {
                                echo '<td>';
                                foreach($den_nedeli as $dn) {
                                    if($index == $dn['value']) {
                                        echo '<p>' . $schedule->post_title . '</p>';
                                        echo '<p>' . $name_coaches->name . '</p>';
                                        echo '<p>' . $nachalo_trenirovki . '</p>';
                                    }
                                }
                                echo '</td>';
                            }
                            echo '</tr>';
                        }?>
                    </tbody>

                </table>

            </div>
            <!--<div class="calendar-block__img">
                <img src="<?=get_template_directory_uri();?>/img/schedule.png" alt="raspisanie" width="100%">
            </div>-->
        </div>
    </div>
<?php
get_footer();
