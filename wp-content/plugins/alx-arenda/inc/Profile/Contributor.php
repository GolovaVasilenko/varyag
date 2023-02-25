<?php

namespace inc\Profile;

class Contributor
{
    public function register()
    {
        add_action('admin_post_alx_update_contributor', [$this, 'updateContributor']);
        add_action('admin_post_nopriv_alx_update_contributor', [$this, 'notAuth']);

        add_action('admin_post_alx_update_contributor_password', [$this, 'updateContributorPassword']);
        add_action('admin_post_nopriv_alx_update_contributor', [$this, 'notAuth']);

        add_action('admin_post_alx_add_contributor', [$this, 'addContributor']);
        add_action('admin_post_nopriv_alx_add_contributor', [$this, 'addContributor']);

    }

    public function updateContributor()
    {
        $id = (int)wp_get_current_user()->id;
        $firstName = strip_tags(trim($_POST["first-name"]));
        $lastName = strip_tags(trim($_POST["last-name"]));
        $phone = strip_tags(trim($_POST["number"]));
        $email = strip_tags(trim($_POST["email"]));
        $redirect = strip_tags(trim($_POST["redirect"]));
        wp_update_user([
            'ID'              => $id,
            'user_email'      => $email,
            'display_name'    => $firstName . ' ' . $lastName
        ]);
        update_user_meta($id, 'first_name', $firstName);
        update_user_meta($id, 'last_name', $lastName);
        update_user_meta($id, 'user_phone', $phone);
        wp_redirect($redirect);
        exit;
    }

    public function updateContributorPassword()
    {
        $newpass = strip_tags(trim($_POST["password"]));
        wp_set_password($newpass, (int)wp_get_current_user()->id);
    }

    public static function listContributor()
    {
        $result = get_users([
            'role' => 'basic_contributor',
        ]);
        return $result;
    }

    public function addContributor()
    {
        $user_login = strip_tags(trim($_POST["user_login"]));
        $first_name = strip_tags(trim($_POST["first_name"]));
        $last_name = strip_tags(trim($_POST["last_name"]));
        $user_email = strip_tags(trim($_POST["email"]));
        $user_phone = strip_tags(trim($_POST["phone"]));
        $redirect = $_POST["redirect"];
        $password = uniqid();
        $disciplin_id = $_POST["disciplin_id"];
        $product_id = $_POST["product_id"];
        $total_cost = $_POST["total_cost"];

        $profile = new Profile();
        $seasonTicket = new SeasonTicket();

        $user_id = $profile->processRegistration($user_login, $password, $user_email, $user_phone, $first_name, $last_name, $redirect);
        $data = [
            'product_id' => $product_id,
            'disciplin_id' => $disciplin_id,
            'user_id' => $user_id,
            'total_cost' => $total_cost,
            'end_time' => date("Y-m-d H:i:s", time() + (3600*24*30))
        ];
        $seasonTicket->addTicket($data);
        wp_redirect($redirect); exit;
    }

    public function deleteContributor()
    {

    }

    // protected static function getUser($term_id)
    // {
    //     global $wpdb;
    //     $result = $wpdb->get_row("SELECT user_id FROM " . $wpdb->prefix . "user_contributor_term WHERE term_id=" . $term_id);
    //     if($result) {
    //         return get_user_by('id', $result->user_id);
    //     }
    //     return [];
    // }

    // protected function updateRelationTermUser($term_id, $user_id)
    // {
    //     global $wpdb;
    //     $wpdb->delete($wpdb->prefix . "user_contributor_term", ['term_id' => $term_id]);
    //     $wpdb->insert($wpdb->prefix . "user_contributor_term", ['term_id' => $term_id, 'user_id' => $user_id]);
    // }

    public function notAuth(){

    }
}
