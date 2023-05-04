<?php

namespace inc\Classes;

use inc\Profile\SeasonTicket;

class Discipline
{
    public function getDisciplineForIndividualTrening()
    {
        global $wpdb;
        $sql = "SELECT DISTINCT p.* 
        FROM " . $wpdb->prefix . "posts p 
        INNER JOIN " . $wpdb->prefix . "ticket_info ti ON p.ID = ti.discipline_id 
        WHERE ti.type_trening = " . SeasonTicket::PERSONAL;
        return $wpdb->get_results($sql);
    }

    public function getAllDiscipline()
    {
        return get_posts(['post_type' => 'discipline', 'numberposts' => -1]);
    }
}
