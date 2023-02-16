<?php

namespace inc\System;

class Ctp
{
    /**
     * @return void
     */
    public function register(): void
    {
        add_action('init', [$this, 'customPostType']);
        add_action('add_meta_boxes', [$this, 'addMetaBoxUnit']);
        add_action('save_post', [$this, 'saveMetaBox'], 10, 2);
    }

    /**
     * @return void
     */
    public function addMetaBoxUnit(): void
    {
        add_meta_box(
            'unit_settings',
            'Unit Settings',
            [$this, 'metaBoxUnitHtml'],
            'unit',
            'normal',
            'default'
        );
    }

    /**
     * @param $post_id
     * @param $post
     * @return int
     */
    public function saveMetaBox($post_id, $post): int
    {
        if($post->post_type != 'unit') {
            return $post_id;
        }

        if(!current_user_can('edit_post', $post_id)) {
            return $post_id;
        }

        if(!isset($_POST['_units_nonce_fields']) || !wp_verify_nonce($_POST['_units_nonce_fields'], 'units_fields')) {
            return $post_id;
        }

        if ( wp_is_post_autosave( $post ) ) {
            return $post_id;
        }

        if(!isset($_POST['unit_price'])) {
            delete_post_meta($post_id, 'unit_price');
        } else {
            update_post_meta($post_id, 'unit_price', sanitize_text_field(intval($_POST['unit_price'])));
        }
        if(!isset($_POST['unit_period'])) {
            delete_post_meta($post_id, 'unit_period');
        } else {
            update_post_meta($post_id, 'unit_period', sanitize_text_field($_POST['unit_period']));
        }
        if(!isset($_POST['unit_status'])) {
            delete_post_meta($post_id, 'unit_status');
        } else {
            update_post_meta($post_id, 'unit_status', sanitize_text_field($_POST['unit_status']));
        }
        return $post_id;
    }

    /**
     * @param $post
     * @return void
     */
    public function metaBoxUnitHtml($post): void
    {
        wp_nonce_field('units_fields', '_units_nonce_fields');
        $price = get_post_meta($post->ID, 'unit_price', true);
        $period = get_post_meta($post->ID, 'unit_period', true);
        $status = get_post_meta($post->ID, 'unit_status', true);

        echo '
                <p>
                    <label for="meta_box_price">' . esc_html__("Price", "alx-arenda") . '</label>
                    <input type="number" name="unit_price" id="meta_box_price" value="' . esc_html($price) . '">
                </p>
                <p>
                    <label for="meta_box_period">' . esc_html__("Period", "alx-arenda") . '</label>
                    <select name="unit_period" id="meta_box_period">
                        <option value="hour" ' . selected("hour", $period, false) . '>' . esc_html__("in ah Hour", "alx-arenda") . '</option>
                        <option value="day" ' . selected("day", $period, false) . '>' . esc_html__("In a Day", "alx-arenda") . '</option>
                        <option value="week" ' . selected("week", $period, false) . '>' . esc_html__("in Week", "alx-arenda") . '</option>
                        <option value="month" ' . selected("month", $period, false) . '>' . esc_html__("For a Month", "alx-arenda") . '</option>
                        <option value="year" ' . selected("year", $period, false) . '>' . esc_html__("For a Year", "alx-arenda") . '</option>
                    </select>
                </p>
                <p>
                    <label for="meta_box_status">' . esc_html__("Status", "alx-arenda") . '</label>
                    <select name="unit_status" id="meta_box_status">
                        <option value="free" ' . selected("free", $status, false) . '>' . esc_html__("Free", "alx-arenda") . '</option>
                        <option value="sold" ' . selected("sold", $status, false) . '>' . esc_html__("Sold", "alx-arenda") . '</option>
                    </select>
                </p>
            ';
    }

    /**
     * @return void
     */
    public function customPostType(): void
    {
        $args = [
            'hierarchical' => true,
            'show_ui' => true,
            'show_admin_column' => true,
            'query_var' => true,
            'rewrite' => ['slug' => 'units/headings'],
            'labels'  => [
                'name'              => esc_html_x('Headings', 'alx-arenda'),
                'singular_name'     => esc_html_x('Heading', 'alx-arenda'),
                'search_items'      => esc_html__('Search Headings', 'alx-arenda'),
                'all_items'         => esc_html__('All Headings', 'alx-arenda'),
                'view_item '        => esc_html__('View Heading', 'alx-arenda'),
                'parent_item'       => esc_html__('Parent Heading', 'alx-arenda'),
                'parent_item_colon' => esc_html__('Parent Heading:', 'alx-arenda'),
                'edit_item'         => esc_html__('Edit Heading', 'alx-arenda'),
                'update_item'       => esc_html__('Update Heading', 'alx-arenda'),
                'add_new_item'      => esc_html__('Add New Heading', 'alx-arenda'),
                'new_item_name'     => esc_html__('New Heading Name', 'alx-arenda'),
                'menu_name'         => esc_html__('Heading', 'alx-arenda'),
                'back_to_items'     => esc_html__('← Back to Heading', 'alx-arenda'),
            ]
        ];

        $argsLocation = [
            'hierarchical' => true,
            'show_ui' => true,
            'show_admin_column' => true,
            'query_var' => true,
            'rewrite' => ['slug' => 'units/locations'],
            'labels'  => [
                'name'              => esc_html_x('Locations', 'alx-arenda'),
                'singular_name'     => esc_html_x('Location', 'alx-arenda'),
                'search_items'      => esc_html__('Search Locations', 'alx-arenda'),
                'all_items'         => esc_html__('All Locations', 'alx-arenda'),
                'view_item '        => esc_html__('View Location', 'alx-arenda'),
                'parent_item'       => esc_html__('Parent Location', 'alx-arenda'),
                'parent_item_colon' => esc_html__('Parent Location:', 'alx-arenda'),
                'edit_item'         => esc_html__('Edit Location', 'alx-arenda'),
                'update_item'       => esc_html__('Update Location', 'alx-arenda'),
                'add_new_item'      => esc_html__('Add New Location', 'alx-arenda'),
                'new_item_name'     => esc_html__('New Location Name', 'alx-arenda'),
                'menu_name'         => esc_html__('Location', 'alx-arenda'),
                'back_to_items'     => esc_html__('← Back to Location', 'alx-arenda'),
            ]
        ];

        $props = [
            'public'      => true,
            'has_archive' => true,
            'rewrite'     => ['slug' => 'units'],
            'label'       => esc_html__('Unit', 'alx-arenda'),
            'supports'    => ['title', 'editor', 'thumbnail', 'excerpt'],
            'query_var'   => true,
        ];

        register_taxonomy('headings', 'unit', $args);
        register_taxonomy('location', 'unit', $argsLocation);
        register_post_type('unit', $props);
    }
}