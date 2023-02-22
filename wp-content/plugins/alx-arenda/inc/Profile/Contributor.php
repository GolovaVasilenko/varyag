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
        $id = (int)wp_get_current_user()->id;
        $user = get_user_by('ID', $id);
        $password = $user->user_pass;
        $redirect = strip_tags(trim($_POST["redirect"]));
        if ($password != wp_hash(strip_tags(trim($_POST["old-pass"])))){
            print_r('Wrong old pass ' . strip_tags(trim($_POST["old-pass"])));
            print_r(' Old pass hash ' . $password);
            print_r(' Your pass hash ' . wp_hash(strip_tags(trim($_POST["old-pass"]))));
            // wp_redirect($redirect);
            // exit;
        } else {
            print_r('Setting new pass ' . $password);
            $newpass = strip_tags(trim($_POST["password"]));
            wp_set_password($newpass, $id);
            // wp_redirect($redirect);
            // exit;
        }
    }

    // public static function listContributor()
    // {
    //     $result = [];
    //     $terms = get_terms(['taxonomy' => 'contributor']);
    //     foreach($terms as $item) {
    //         $result[$item->term_id]['profile'] = self::getUser($item->term_id);
    //         $result[$item->term_id]['term'] = $item;
    //     }
    //     return $result;
    // }

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
