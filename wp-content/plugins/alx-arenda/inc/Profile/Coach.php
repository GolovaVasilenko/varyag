<?php

namespace inc\Profile;

class Coach
{
    public function register()
    {
        add_action('admin_post_alx_add_coach', [$this, 'addCoach']);
        add_action('admin_post_nopriv_alx_add_coach', [$this, 'addCoach']);

        add_action('admin_post_alx_update_coach', [$this, 'updateCoach']);
        add_action('admin_post_nopriv_alx_update_coach', [$this, 'updateCoach']);

        add_action('admin_post_alx_delete_coach', [$this, 'deleteCoach']);
        add_action('admin_post_nopriv_alx_delete_coach', [$this, 'deleteCoach']);
    }

    public function addCoach()
    {
        /* Добавить новую таксонлмию Если она есть получить ID */

        /* И добавить нового пользователя */
    }

    public function updateCoach()
    {

    }

    public static function listCoach()
    {
        $result = [];
        $terms = get_terms(['taxonomy' => 'coach']);
        foreach($terms as $item) {
            $result[$item->term_id]['profile'] = self::getUser($item->term_id);
            $result[$item->term_id]['term'] = $item;
        }
        return $result;
    }

    public function deleteCoach()
    {

    }

    protected static function getUser($term_id)
    {
        global $wpdb;
        $result = $wpdb->get_row("SELECT user_id FROM " . $wpdb->prefix . "user_coach_term WHERE term_id=" . $term_id);
        if($result) {
            return get_user_by('id', $result->user_id);
        }
        return [];
    }
}
