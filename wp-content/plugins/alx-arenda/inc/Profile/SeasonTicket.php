<?php

namespace inc\Profile;

class SeasonTicket
{
    public const PERSONAL = 1;
    public const GROUP = 2;

    public function register()
    {
        add_action('admin_post_alx_add_ticket', [$this, 'addTicket']);
        add_action('admin_post_nopriv_alx_add_ticket', [$this, 'addTicket']);

        add_action('admin_post_alx_add_aboniment', [$this, 'addAboniment']);
        add_action('admin_post_nopriv_alx_add_aboniment', [$this, 'addAboniment']); //alx_edit_aboniment

        add_action('admin_post_alx_edit_aboniment', [$this, 'editAboniment']);
        add_action('admin_post_nopriv_alx_edit_aboniment', [$this, 'editAboniment']);

        add_action('admin_post_alx_delete_abonement', [$this, 'deleteAbonement']);
        add_action('admin_post_nopriv_alx_delete_abonement', [$this, 'deleteAbonement']);

        add_action('admin_post_alx_update_ticket', [$this, 'updateTicket']);
        add_action('admin_post_nopriv_alx_update_ticket', [$this, 'updateTicket']);

        add_action('admin_post_alx_delete_ticket', [$this, 'deleteTicket']);
        add_action('admin_post_nopriv_alx_delete_ticket', [$this, 'deleteTicket']);

        add_action( 'wp_ajax_alx_get_price_product', [$this, 'getProductPrice'] );
        add_action( 'wp_ajax_nopriv_alx_get_price_product', [$this, 'getProductPrice'] );
    }

    public static function listAbonement()
    {
        global $wpdb;
        return $wpdb->get_results("SELECT ti.*, p.post_title FROM " . $wpdb->prefix . "ticket_info ti INNER JOIN " . $wpdb->prefix . "posts p ON p.id = ti.discipline_id ORDER BY id DESC");
    }

    public static function getAbonementsByDisciplineId($discipline_id)
    {
        global $wpdb;
        return $wpdb->get_results("SELECT * FROM " . $wpdb->prefix . "ticket_info WHERE discipline_id=" . (int) $discipline_id);
    }

    public static function getAbonementsById($id)
    {
        global $wpdb;
        return $wpdb->get_row("SELECT * FROM " . $wpdb->prefix . "ticket_info WHERE id=" . (int) $id);
    }

    public function editAboniment()
    {
        $id = (int) $_POST['id'];
        $data["discipline_id"] = (int) $_POST["discipline_id"];
        $data["type_trening"] = $_POST["type_trening"];
        $data["count_month"] = $_POST["count_month"];
        $data["discount"] = $_POST["discount"];
        $data["one_trening_price"] = $_POST["one_trening_price"];
        $data["total_price"] = $_POST["total_price"];
        $data["count_trening"] = $_POST["count_trening"];
        $data["action_info"] = $_POST["action_info"];
        $data['frozen_info'] = $_POST['frozen_info'];
        $redirect = $_POST["redirect"];
        global $wpdb;
        $wpdb->update('vr_ticket_info', $data, ['id' => $id], ['%d', '%d', '%s', '%s', '%s', '%s', '%s', '%s', '%s']);
        wp_redirect($redirect); exit;
    }

    public function addAboniment()
    {
        $data["discipline_id"] = (int) $_POST["discipline_id"];
        $data["type_trening"] = $_POST["type_trening"];
        $data["count_month"] = $_POST["count_month"];
        $data["discount"] = $_POST["discount"];
        $data["one_trening_price"] = $_POST["one_trening_price"];
        $data["total_price"] = $_POST["total_price"];
        $data["count_trening"] = $_POST["count_trening"];
        $data["action_info"] = $_POST["action_info"];
        $data['frozen_info'] = $_POST['frozen_info'];
        $redirect = $_POST["redirect"];
        global $wpdb;
        $wpdb->insert('vr_ticket_info', $data, ['%d', '%d', '%s', '%s', '%s', '%s', '%s', '%s', '%s']);
        wp_redirect($redirect); exit;
    }

    public function deleteAbonement()
    {
        $id = (int) $_POST['id'];
        $redirect = $_POST["redirect"];
        global $wpdb;
        $wpdb->delete('vr_ticket_info', ['id' => $id]);
        wp_redirect($redirect); exit;
    }

    public function getProductPrice()
    {
        $product_id = (int) $_POST['product_id'];
        $product = wc_get_product($product_id);
        echo json_encode(['status' => 1, 'price' => $product->price]); exit;
    }

    public static function getTicketByUserId($user_id)
    {
        /*global $wpdb;
        $sql = "SELECT utd.id, p.ID AS product_id, d.ID AS discipline_id, p.post_title AS abonement , utd.total_cost, utd.created_at, utd.end_time, d.post_title AS discipline
                FROM " . $wpdb->prefix . "user_tiket_disciplin utd
                JOIN vr_posts p ON( p.ID = utd.product_id)
                JOIN vr_posts d ON( d.ID = utd.disciplin_id)
                WHERE utd.user_id = " . $user_id . " AND d.post_type = 'discipline' AND p.post_type = 'product'";

        return $wpdb->get_results($sql);*/
    }

    public function addTicket($data)
    {
        global $wpdb;
        $wpdb->insert('vr_user_tiket_disciplin', $data, ['%d', '%d', '%d', '%d', '%s']);
    }

    public function updateTicket()
    {

    }

    public function deleteTicket()
    {

    }
}
