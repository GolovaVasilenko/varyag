<?php

namespace inc\Profile;

class SeasonTicket
{
    public function register()
    {
        add_action('admin_post_alx_add_ticket', [$this, 'addTicket']);
        add_action('admin_post_nopriv_alx_add_ticket', [$this, 'addTicket']);

        add_action('admin_post_alx_update_ticket', [$this, 'updateTicket']);
        add_action('admin_post_nopriv_alx_update_ticket', [$this, 'updateTicket']);

        add_action('admin_post_alx_delete_ticket', [$this, 'deleteTicket']);
        add_action('admin_post_nopriv_alx_delete_ticket', [$this, 'deleteTicket']);

        add_action( 'wp_ajax_alx_get_price_product', [$this, 'getProductPrice'] );
        add_action( 'wp_ajax_nopriv_alx_get_price_product', [$this, 'getProductPrice'] );
    }

    public function listTicket()
    {
        global $wpdb;

    }

    public function getProductPrice()
    {
        $product_id = (int) $_POST['product_id'];
        $product = wc_get_product($product_id);
        echo json_encode(['status' => 1, 'price' => $product->price]); exit;
    }

    public static function getTicketByUserId($user_id)
    {
        global $wpdb;
        $sql = "SELECT p.post_title AS abonement , utd.created_at, utd.end_time, d.post_title AS discipline 
                FROM " . $wpdb->prefix . "user_tiket_disciplin utd
                JOIN vr_posts p ON( p.ID = utd.product_id) 
                JOIN vr_posts d ON( d.ID = utd.disciplin_id) 
                WHERE utd.user_id = " . $user_id . " AND d.post_type = 'discipline' AND p.post_type = 'product'";

        return $wpdb->get_results($sql);
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
