<?php

namespace inc\Classes;

use inc\Profile\CoachSchedule;

class Calendar
{
    /**
     * Вывод календаря на один месяц.
     */
    public static function  getMonth($month, $year, $events = array())
    {
        $months = array(
            1  => 'Январь',
            2  => 'Февраль',
            3  => 'Март',
            4  => 'Апрель',
            5  => 'Май',
            6  => 'Июнь',
            7  => 'Июль',
            8  => 'Август',
            9  => 'Сентябрь',
            10 => 'Октябрь',
            11 => 'Ноябрь',
            12 => 'Декабрь'
        );
        $coach_schedule = new CoachSchedule();

        $month = intval($month);
        $cs_data = $coach_schedule->getSchedule((int)wp_get_current_user()->id, $months[$month]);

        $out = '
		<div class="calendar-item">
			<div class="calendar-head"><span class="month-prev">&lt;</span>' . $months[$month] . ' ' . $year . '<span class="month-next">&gt;</span></div>
			<table class="table-calendar" data-month="' . $months[$month] . '">
				<tr>
					<th>Пн</th>
					<th>Вт</th>
					<th>Ср</th>
					<th>Чт</th>
					<th>Пт</th>
					<th>Сб</th>
					<th>Вс</th>
				</tr>';

        $day_week = date('N', mktime(0, 0, 0, $month, 1, $year));
        $day_week--;

        $out.= '<tr>';

        for ($x = 0; $x < $day_week; $x++) {
            $out.= '<td></td>';
        }

        $days_counter = 0;
        $days_month = date('t', mktime(0, 0, 0, $month, 1, $year));

        for ($day = 1; $day <= $days_month; $day++) {
            if (date('j.n.Y') == $day . '.' . $month . '.' . $year) {
                $class = 'today';
            } elseif (time() > strtotime($day . '.' . $month . '.' . $year)) {
                $class = 'last';
            } else {
                $class = '';
            }

            $event_show = false;
            $event_text = [];
            $event_ids = [];
            $event_class = [];

            foreach($cs_data as $value) {
                $data_event = unserialize($value->data);
                $event_ids[$value->day] = $value->event_id;
                if($day == $value->day) {
                    $event_class[$value->day] = 'tren';
                    if($data_event['event'] == 'Выходной') {
                        $event_class[$value->day] = 'sun';
                    }
                }
            }

            if (!empty($events)) {
                foreach ($events as $date => $text) {
                    $date = explode('.', $date);
                    if (count($date) == 3) {
                        $y = explode(' ', $date[2]);
                        if (count($y) == 2) {
                            $date[2] = $y[0];
                        }

                        if ($day == intval($date[0]) && $month == intval($date[1]) && $year == $date[2]) {
                            $event_show = true;
                            $event_text[] = $text;
                        }
                    } elseif (count($date) == 2) {
                        if ($day == intval($date[0]) && $month == intval($date[1])) {
                            $event_show = true;
                            $event_text[] = $text;
                        }
                    } elseif ($day == intval($date[0])) {
                        $event_show = true;
                        $event_text[] = $text;
                    }
                }
            }

            if ($event_show && $event_text) {
                $out.= '<td class="calendar-day ' . $class . '">' . implode('<br>', $event_text);
                if (!empty($event_text)) {
                    $out.= '<div class="calendar-popup">' . implode('<br>', $event_text) . '</div>';
                }
                $out.= '</td>';
            } else {
                $out.= '<td class="calendar-day ' . $class . ' ' . $event_class[$day] . '" data-id="'. $event_ids[$day] . '">' . $day . '</td>';
            }

            if ($day_week == 6) {
                $out.= '</tr>';
                if (($days_counter + 1) != $days_month) {
                    $out.= '<tr>';
                }
                $day_week = -1;
            }

            $day_week++;
            $days_counter++;
        }

        $out .= '</tr></table></div>';
        return $out;
    }

    /**
     * Вывод календаря на несколько месяцев.
     */
    public static function  getInterval($start, $end, $events = array())
    {
        $curent = explode('.', $start);
        $curent[0] = intval($curent[0]);

        $end = explode('.', $end);
        $end[0] = intval($end[0]);

        $begin = true;
        $out = '<div class="calendar-wrp">';
        do {
            $out .= self::getMonth($curent[0], $curent[1], $events);

            if ($curent[0] == $end[0] && $curent[1] == $end[1]) {
                $begin = false;
            }

            $curent[0]++;
            if ($curent[0] == 13) {
                $curent[0] = 1;
                $curent[1]++;
            }
        } while ($begin == true);

        $out .= '</div>';
        return $out;
    }
}
