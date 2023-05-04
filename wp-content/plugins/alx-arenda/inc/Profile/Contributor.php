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

        add_action('admin_post_alx_add_ticket_for_contributor', [$this, 'addTicketForContributor']);
        add_action('admin_post_nopriv_alx_add_ticket_for_contributor', [$this, 'addTicketForContributor']);

        add_action( 'wp_ajax_alx_user_exists', [$this, 'ContributorExists'] );
        add_action( 'wp_ajax_nopriv_alx_user_exists', [$this, 'ContributorExists'] );

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
        if(wp_check_password(trim($_POST["old-pass"]), $password, $id)) {
            $newpass = strip_tags(trim($_POST["password"]));
            wp_set_password($newpass, $id);
            $_SESSION['success'] = "Новый пароль успешно сохранен";
            wp_redirect($redirect);
            exit;
        }
        $_SESSION['error'] = "Не верный старый пароль";
        wp_redirect($redirect); exit;
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
        //TO DO : Add Abonement
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

    public function addTicketForContributor()
    {
        $data['product_id'] = (int) $_POST["product_id"];
        $data['disciplin_id'] = (int) $_POST["disciplin_id"];
        $data['user_id'] = (int) $_POST["user_id"];
        $data['total_cost'] = (int) $_POST["total_cost"];

        $prod = wc_get_product($data['product_id']);
        $data['end_time'] = date("Y-m-d H:i:s", time() + ((int) $prod->get_attribute('timestamp')));
        $seasonTicket = new SeasonTicket();
        $seasonTicket->addTicket($data);
        wp_redirect('/profile/?p=contributor_edit&user_id='.$data['user_id']); exit;
    }

    public function deleteContributor()
    {

    }

    public function ContributorExists()
    {
        $email = $_POST['user_email'];
        $user = get_user_by('email', $email);
        if($user && in_array('basic_contributor', $user->roles)) {
            $data['phone'] = get_user_meta( $user->ID, 'user_phone', true );
            $data['first_name'] = get_user_meta( $user->ID, 'first_name', true );
            $data['last_name'] = get_user_meta( $user->ID, 'last_name', true );
            $data['login'] = $user->data->user_login;
            $data['status'] = 1;
            echo json_encode($data);
            exit;
        }
        echo json_encode(['status' => 0]); exit;
    }

    public function getContributorsIndividualTrening()
    {
        global $wpdb;
        $sql = "SELECT uti.id AS main_id, u.user_login, u.display_name, uti.user_id, uti.abonement_id, uti.abonement_full_info, p.post_title, p.ID, ti.* FROM " . $wpdb->prefix . "users u 
            INNER JOIN " . $wpdb->prefix . "user_tiket_disciplin uti ON u.ID = uti.user_id 
            INNER JOIN " . $wpdb->prefix . "ticket_info ti ON uti.abonement_id = ti.id 
            INNER JOIN " . $wpdb->prefix . "posts p ON uti.discipline_id = p.ID 
            WHERE ti.type_trening = " . SeasonTicket::PERSONAL;
        return $wpdb->get_results($sql);
    }



    public function notAuth(){

    }
}
