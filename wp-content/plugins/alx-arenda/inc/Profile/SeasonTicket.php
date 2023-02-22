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
    }

    public function listTicket()
    {
        global $wpdb;

    }

    public function addTicket()
    {

    }

    public function updateTicket()
    {

    }

    public function deleteTicket()
    {

    }
}
