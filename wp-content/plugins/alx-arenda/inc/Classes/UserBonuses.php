<?php

namespace inc\Classes;

class UserBonuses
{
    protected string $table = 'vr_user_bonuses';
    /**
     * @param int $user_id
     * @return void
     */
    public function bonusForRegister(int $user_id): void
    {
        global $wpdb;
        $user = $wpdb->get_row("SELECT * FROM " . $this->table . " WHERE user_id=" . $user_id);
        if(!$user) {
            $bonus = (int) get_option('bonus_for_register');

            $wpdb->insert($this->table, [ 'user_id' => $user_id, 'bonuses' => $bonus ], [ '%d', '%d' ] );
        }
    }

    /**
     * @param int $user_id
     * @return array|object|\stdClass|void|null
     */
    public function getAllUserBonuses(int $user_id = 0)
    {
        global $wpdb;
        if(!$user_id) {
            $user_id = (int)wp_get_current_user()->id;
        }

        return $wpdb->get_row("SELECT bonuses FROM " . $this->table . " WHERE user_id=" . $user_id);
    }

    /**
     * @param int $bonus
     * @param $user_id
     * @return bool|int|\mysqli_result|resource|null
     */
    public function setUserBonusByUserId(int $bonus, $user_id)
    {
        global $wpdb;
        return $wpdb->update($this->table, ['bonuses' => $bonus], ['user_id' => $user_id],'%d');
    }
}

