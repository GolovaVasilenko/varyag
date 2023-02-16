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
        $term_id = (int)$_POST["term_id"];
        $user_id = (int)$_POST["user_id"];
        $user_login = strip_tags(trim($_POST["user_login"]));
        $polnoe_opisanie = strip_tags(trim($_POST["polnoe_opisanie"]));
        $description = strip_tags(trim($_POST["description"]));
        $name = strip_tags(trim($_POST["tag-name"]));
        $phone = strip_tags(trim($_POST["phone"]));
        $email = strip_tags(trim($_POST["email"]));
        $last_name = strip_tags(trim($_POST["last_name"]));
        $first_name = strip_tags(trim($_POST["first_name"]));
        $redirect = $_POST["redirect"];
        $login = $first_name . ' ' . $last_name;
        if(!$user_id) {
            $user_id = wp_create_user( $user_login, 'secret777', $email);
            $redirect .= $user_id;
        }

        wp_update_term( $term_id, 'coach', [
            'name' => $name,
            'description' => $description
        ] );
        update_field( 'polnoe_opisanie', $polnoe_opisanie, $term_id );
        wp_update_user([
            'ID'              => $user_id,
            'user_login'      => $user_login,
            'email'           => $email,
            'display_name'    => $first_name . ' ' . $last_name,
            'first_name'      => $first_name,
            'last_name'       => $last_name,
        ]);
        update_user_meta( $user_id, 'user_phone', $phone );
        $this->updateRelationTermUser($term_id, $user_id);
        wp_redirect($redirect); exit;
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

    protected function updateRelationTermUser($term_id, $user_id)
    {
        global $wpdb;
        $wpdb->delete($wpdb->prefix . "user_coach_term", ['term_id' => $term_id]);
        $wpdb->insert($wpdb->prefix . "user_coach_term", ['term_id' => $term_id, 'user_id' => $user_id]);
    }
}
