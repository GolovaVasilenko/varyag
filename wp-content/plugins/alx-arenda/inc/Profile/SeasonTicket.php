<?php

namespace inc\Profile;

class SeasonTicket
{
    public const PERSONAL = 1;
    public const GROUP = 2;

    public string $table = 'vr_ticket_info';
    public string $table_ticket = 'vr_user_tiket_disciplin';

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

        add_action( 'wp_ajax_alx_filter_abonement', [$this, 'filterAbonement'] );
        add_action( 'wp_ajax_nopriv_alx_filter_abonement', [$this, 'filterAbonement'] );

        add_action('admin_post_alx_set_personal_abonement', [$this, 'setPersonalAbonement']);
        add_action('admin_post_nopriv_alx_set_personal_abonement', [$this, 'setPersonalAbonement']);

        add_action('wp_ajax_alx_get_individual_abonements_list', [$this, 'getIndividualAbonementByDiscipline']);
        add_action('wp_ajax_nopriv_alx_get_individual_abonements_list', [$this, 'getIndividualAbonementByDiscipline']);

        add_action('admin_post_alx_edit_personal_abonement', [$this, 'editPersonalAbonement']);
        add_action('admin_post_nopriv_alx_edit_personal_abonement', [$this, 'editPersonalAbonement']);
    }

    public function editPersonalAbonement()
    {
        global $wpdb;
        $display_name = $_POST['display_name'];
        $user_id = $_POST['user_id'];
        $redirect = $_POST["redirect"];
        $id = $_POST["id"];
        $data['abonement_id'] = $_POST['abonement_id'];
        $data['discipline_id'] = $_POST["discipline_id"];

        $wpdb->update( $this->table_ticket, $data, ['id' => $id], ['%d', '%d'], '%d' );
        $user_id = wp_update_user( [
            'ID'       => $user_id,
            'display_name' => $display_name
        ] );

        wp_redirect($redirect);
        exit;
    }

    public function setPersonalAbonement()
    {
        global $wpdb;
        $data['abonement_id'] = (int) $_POST['abonement_id'];
        $data['discipline_id'] = (int) $_POST['discipline_id'];
        $data['action_id'] = serialize($_POST['action_id']);
        $data['abonement_full_info'] = stripslashes(strip_tags(trim($_POST['count_trening'])));

        $username   = stripslashes(strip_tags(trim($_POST['login'])));
        $password   = uniqid();
        $email      = stripslashes(strip_tags(trim($_POST['email'])));
        $phone      = stripslashes(strip_tags(trim($_POST['phone'])));
        $last_name  = stripslashes(strip_tags(trim($_POST['last_name'])));
        $first_name = stripslashes(strip_tags(trim($_POST['first_name'])));
        $redirect   = stripslashes(strip_tags(trim($_POST['redirect'])));

        $profile = new Profile();
        $data['user_id'] = $profile->processRegistration($username, $password, $email, $phone, $first_name, $last_name, $redirect);
        $wpdb->insert($this->table_ticket, $data);
        wp_redirect($redirect);
        exit;
    }

    public function getIndividualAbonementByDiscipline()
    {
        global $wpdb;
        $output = '<option value="0">Выбрать Абонемент</option>';
        $results = $wpdb->get_results("SELECT * FROM " . $this->table . " WHERE type_trening = 1 AND discipline_id = " . (int) $_POST['discipline_id']);
        foreach($results as $result) {
            $output .= '<option value="' . $result->id . '">Абонемент ' . $result->count_month . ' ' . $result->total_price . ' <span>' . $result->count_trening . '</span> занятий</option>';
        }
        echo $output;
        exit;
    }

    public function filterAbonement()
    {
        global $wpdb;
        $ids = [];
        $discipline_id = (int) $_POST['discipline_id'];
        $service_id = (int) $_POST['service_id'];
        if($service_id) {
            $ids = get_posts([
                'fields' => 'ids',
                'numberposts' => -1,
                'post_type'   => 'discipline',
                'tax_query' => [
                    [
                        'taxonomy' => 'services',
                        'field'    => 'term_id',
                        'terms'    => $service_id
                    ]
                ]
            ]);
        }
        if($discipline_id) {
            $ids[] = $discipline_id;
        }
        if(!empty($ids)) {
            $output = '';
            $sql = "SELECT ti.*, p.post_title FROM ". $wpdb->prefix . "ticket_info ti INNER JOIN " . $wpdb->prefix . "posts p ON p.id = ti.discipline_id WHERE ti.discipline_id IN (" . implode(',', $ids) . ")";
            $abonements = $wpdb->get_results($sql);
            foreach($abonements as $abonement) {
                $output .= '<tr><td>' . $abonement->id . '</td>';
                $output .= '<td>' . $abonement->count_month . '</td>';
                $output .= '<td>' . $abonement->post_title . '</td>';
                $output .= '<td>' . (($abonement->type_trening == 1) ? "Персональная" : "Груповая") . '</td>';
                $output .= '<td>' . $abonement->count_trening . '</td>';
                $output .= '<td>' . $abonement->total_price . '</td>';
                $output .= '<td>
                                        <a class="btn btn-primary btn-sm" href="/profile?p=abonement_edit&id=' . $abonement->id . '">Изменить</a>
                                        <form method="post" action="/wp-admin/admin-post.php" class="form-remove">
                                        <input type="hidden" name="id" value="' . $abonement->id . '">
                                        <input type="hidden" name="redirect" value="/profile?p=abonement">
                                        <input type="hidden" name="action" value="alx_delete_abonement">
                                        <button class="btn btn-danger btn-sm btn-remove-js">Удалить</button>
                                        </form>
                                    </td>
                                </tr>';
            }
            echo $output; exit;
        }
        echo 0; exit;
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


}
