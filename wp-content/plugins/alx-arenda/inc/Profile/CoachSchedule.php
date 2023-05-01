<?php

namespace inc\Profile;

class CoachSchedule
{
    protected string $table = 'vr_schedule_coach';
    protected string $table_meta = 'vr_schedule_coach_meta';

    public function register()
    {
        add_action('wp_ajax_alx_set_sunday', [$this, 'setSunday']);
        add_action('wp_ajax_nopriv_alx_set_sunday', [$this, 'setSunday']);

        add_action('wp_ajax_alx_set_sunday', [$this, 'setSunday']);
        add_action('wp_ajax_nopriv_alx_set_sunday', [$this, 'setSunday']);

        add_action('wp_ajax_alx_set_schedule', [$this, 'setSchedule']);
        add_action('wp_ajax_nopriv_alx_set_schedule', [$this, 'setSchedule']);

        add_action('wp_ajax_alx_get_one_day_schedule', [$this, 'getDayOneSchedule']);
        add_action('wp_ajax_nopriv_alx_get_one_day_schedule', [$this, 'getDayOneSchedule']);

        add_action('wp_ajax_alx_remove_sunday', [$this, 'removeSunday']);
        add_action('wp_ajax_nopriv_alx_remove_sunday', [$this, 'removeSunday']);

        add_action('wp_ajax_alx_set_one_day_schedule', [$this, 'setOneDaySchedule']);
        add_action('wp_ajax_nopriv_alx_set_one_day_schedule', [$this, 'setOneDaySchedule']);
    }

    public function setOneDaySchedule()
    {
        global $wpdb;
        $data = [];
        $data_meta = [];
        $month = $_POST["month"];
        $event_id = $_POST["event_id"];
        $itemSchedule = $this->get_one_item_schedule($month);
        if($itemSchedule) {
            $schedule_id = $itemSchedule->id;
        } else {
            $schedule_id = $this->set_one_item_schedule($month);
        }
        $data_meta['day'] = $_POST["day"];
        $data_meta['data']['schedule']['start'] = $_POST["start"];
        $data_meta['data']['schedule']['end'] = $_POST["end"];
        $data_meta['data']['event'] = "Тренировка";
        $data_meta['schedule_id'] = $schedule_id;
        $data_meta['data'] = serialize($data_meta['data']);
        if($event_id) {
            $wpdb->update($this->table_meta, $data_meta, ['id' => $event_id]);
        } else {
            $wpdb->insert($this->table_meta ,$data_meta);
        }
        echo 1; exit;
    }

    public function setSunday()
    {
        global $wpdb;

        $schedule_data = $this->get_one_item_schedule($_POST['month']);

        if($schedule_data) {
            $meta_data['day'] = $_POST['day'];
            $meta_data['schedule_id'] = $schedule_data->id;
            $meta_data['data'] = serialize(['schedule' => $_POST['schedule'], 'event' => $_POST['event']]);
        } else {
            $data['user_id'] = (int)wp_get_current_user()->id;
            $data['year'] = date('Y');
            $data['month'] = $_POST['month'];
            $wpdb->insert($this->table, $data);

            $meta_data['day'] = $_POST['day'];
            $meta_data['schedule_id'] = $wpdb->insert_id;
            $meta_data['data'] = serialize(['schedule' => $_POST['schedule'], 'event' => $_POST['event']]);
        }

        $wpdb->insert($this->table_meta, $meta_data);
        echo 1; exit;
    }

    public function removeSunday()
    {
        global $wpdb;
        $event_id = (int)$_POST['event_id'];
        $wpdb->delete($this->table_meta, ['id' => $event_id], ['%d'] );
        echo 1; exit;
    }

    public function getSchedule($user_id, $month)
    {
        global $wpdb;
        return $wpdb->get_results("SELECT sc.*, scm.day, scm.data, scm.id AS event_id FROM " . $wpdb->prefix . "schedule_coach sc
        INNER JOIN " . $wpdb->prefix . "schedule_coach_meta scm ON scm.schedule_id = sc.id 
        WHERE sc.user_id=" . $user_id . " AND sc.year='" . date('Y') . "' AND sc.month='" . $month . "'");
    }

    private function set_one_item_schedule($month)
    {
        global $wpdb;
        $data['user_id'] = (int)wp_get_current_user()->id;
        $data['year'] = date('year');
        $data['month'] = $month;
        $wpdb->insert($this->table, $data);
        return $wpdb->insert_id;
    }

    private function get_one_item_schedule($month)
    {
        global $wpdb;
        $user_id = (int)wp_get_current_user()->id;
        return $wpdb->get_row("SELECT * FROM " . $wpdb->prefix . "schedule_coach WHERE user_id=" . $user_id . " AND year='" . date('Y') . "' AND month='" . $month . "'");
    }

    public function getDayOneSchedule()
    {
        global $wpdb;
        $response = [];
        $event_id = $_POST['event_id'];

        //$data = $this->get_one_item_schedule($month);
        if($event_id) {
            $data_meta = $wpdb->get_row("SELECT data FROM " . $this->table_meta . " WHERE id=" . $event_id);
            $schedule_data = unserialize($data_meta->data);
            if($schedule_data['event'] == 'Выходной') {
                $status = 'sunday';
            } else {
                $status = 'trening';
            }
            $response = ['status' => $status, 'schedule' => $schedule_data];
        } else {
            $response = ['status' => 'empty'];
        }

        /*$schedule = unserialize($data->data);

        if($schedule[$month][$day]['event'] == 'Выходной') {
            $response = ['status' => 'sunday', 'schedule' => $schedule[$month][$day]];
        }*/

        echo json_encode($response); exit;
    }

    public function setSchedule()
    {
        global $wpdb;

        //$wpdb->insert('vr_schedule_coach', $data);
        echo 1; exit;
    }
}
