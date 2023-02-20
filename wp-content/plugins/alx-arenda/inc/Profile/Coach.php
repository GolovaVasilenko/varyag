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
        $profile = new Profile();
        $user_login = strip_tags(trim($_POST["user_login"]));
        $polnoe_opisanie = strip_tags(trim($_POST["polnoe_opisanie"]));
        $description = strip_tags(trim($_POST["description"]));
        $name = strip_tags(trim($_POST["tag-name"]));
        $phone = strip_tags(trim($_POST["phone"]));
        $email = strip_tags(trim($_POST["email"]));
        $last_name = strip_tags(trim($_POST["last_name"]));
        $first_name = strip_tags(trim($_POST["first_name"]));
        $redirect = $_POST["redirect"];
        $password   = uniqid();

        $termArr = wp_create_term( $name, 'coach' );
        $term_id = $termArr['term_id'];
        wp_update_term( $term_id, 'coach', [
            'description' => $description
        ] );

        $user_id = $profile->processRegistration($user_login, $password, $email, $phone, $first_name, $last_name, $redirect, 'coach');
        update_field( 'polnoe_opisanie', $polnoe_opisanie, get_term_by('ID', $term_id, 'coach' ) );

        $attach_id_1 = $this->uploadImage($_FILES['foto-trenera']);
        update_field( 'foto-trenera',  $attach_id_1, get_term_by('ID', $term_id, 'coach' ) );

        $attach_id_2 = $this->uploadImage($_FILES["foto_dlya_polnogo_opisaniya"]);
        update_field( 'foto_dlya_polnogo_opisaniya', $attach_id_2, get_term_by('ID', $term_id, 'coach' ) );

        $this->updateRelationTermUser($term_id, $user_id);

        wp_redirect($redirect); exit;
    }

    public function uploadImage($image_data)
    {
        $upload_dir = wp_upload_dir();
        $image_url = $upload_dir["url"] . "/" . $image_data["name"];

        $filename = basename( $image_url );

        if ( wp_mkdir_p( $upload_dir['path'] ) ) {
            $file = $upload_dir['path'] . '/' . $filename;
        }
        else {
            $file = $upload_dir['basedir'] . '/' . $filename;
        }

        move_uploaded_file($image_data['tmp_name'], $file);
        $wp_filetype = wp_check_filetype( $filename, null );

        $attachment = array(
            'guid' => $image_url,
            'post_mime_type' => $wp_filetype['type'],
            'post_title' => sanitize_file_name( $filename ),
            'post_content' => '',
            'post_status' => 'inherit'
        );

        $attach_id = wp_insert_attachment( $attachment, $file );
        require_once( ABSPATH . 'wp-admin/includes/image.php' );
        $attach_data = wp_generate_attachment_metadata( $attach_id, $file );

        wp_update_attachment_metadata( $attach_id, $attach_data );
        return $attach_id;
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
            'role'            => 'coach',
        ]);
        update_user_meta( $user_id, 'user_phone', $phone );
        $this->updateRelationTermUser($term_id, $user_id);
        wp_redirect($redirect); exit;
    }

    public static function listCoach()
    {
        $result = [];
        $terms = get_terms(['taxonomy' => 'coach', 'hide_empty' => false]);
        foreach($terms as $item) {
            $result[$item->term_id]['profile'] = self::getUser($item->term_id);
            $result[$item->term_id]['term'] = $item;
        }
        return $result;
    }

    public function deleteCoach()
    {
        $term_id = (int) $_POST['term_id'];
        $user_id = (int) $_POST['user_id'];
        wp_delete_term($term_id, 'coach');
        wp_delete_user($user_id);
        wp_redirect('/profile'); exit;
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
