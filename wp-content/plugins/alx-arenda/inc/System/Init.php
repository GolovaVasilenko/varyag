<?php

namespace inc\System;

use inc\Classes\TemplateLoader;
use inc\Profile\Coach;
use inc\Profile\CoachSchedule;
use inc\Profile\Contributor;
use inc\Profile\Profile;
use inc\Profile\SeasonTicket;
use inc\System\InitAssets;

class Init
{
    public $assets;

    public $coach;

    public $contributor;

    public $templates;

    public $profile;

    public $seasonTicket;

    public $coachSchedule;


    public function __construct()
    {
        $this->assets = new InitAssets();
        $this->coachSchedule = new CoachSchedule();
        $this->templates = new TemplateLoader();
        $this->profile = new Profile();
        $this->coach = new Coach();
        $this->contributor = new Contributor();
        $this->seasonTicket = new SeasonTicket();
    }

    /**
     * @return void
     */
    public function run(): void
    {
        add_action('init', [$this, 'loadTextDomain']);
        add_action('init', [$this, 'initAuthUser']);

        $this->coachSchedule->register();
        $this->assets->register();
        $this->templates->register();
        $this->profile->register();
        $this->coach->register();
        $this->contributor->register();
        $this->seasonTicket->register();
    }

    public function loadTextDomain()
    {
        load_plugin_textdomain('alx-arenda', false, PLUGIN_UNIT_PATH . '/lang');
    }

    /**
     * @return void
     */
    public function initAuthUser(): void
    {
        $user = get_user_by('ID', get_current_user_id());
        if(is_user_logged_in() && in_array('basic_contributor', $user->roles)) {
            add_filter ( 'show_admin_bar', '__return_false');
        }
        if(is_user_logged_in() && in_array('coach', $user->roles)) {
            add_filter ( 'show_admin_bar', '__return_false');
        }
    }

    /**
     * @return void
     */
    public static function activation(): void
    {
        self::createPages();
        self::addRoleContributor();
        flush_rewrite_rules();
    }

    /**
     * @return void
     */
    public static function deactivation(): void
    {
        flush_rewrite_rules();
    }

    /**
     * @return void
     */
    public static function addRoleContributor(): void
    {
        add_role(
            'basic_contributor',
            'Ученик',
            ['read' => true, ]
        );
        add_role(
            'coach',
            'Тренер',
            ['read' => true, ]
        );
        add_role(
            'manager',
            'Менеджер',
            ['read_private_posts' => true, ]
        );
    }

    /**
     * @return void
     */
    public static function createPages(): void
    {
        $templates = [
            'Profile' => 'Page Profile',
            'Profile login' => 'Page Login Profile',
            'Profile register' => 'Page Register Profile',
        ];

        $pages = [
            [
                'post_type' => 'page',
                'post_title' => 'Profile',
                'post_content' => '',
                'post_status' => 'publish',
                'post_author' => 1,
            ],
            [
                'post_type' => 'page',
                'post_title' => 'Profile login',
                'post_content' => '',
                'post_status' => 'publish',
                'post_author' => 1,
            ],
            [
                'post_type' => 'page',
                'post_title' => 'Profile register',
                'post_content' => '',
                'post_status' => 'publish',
                'post_author' => 1,
            ]
        ];

        foreach($pages as $new_page) {
            $page_check = get_page_by_title($new_page['post_title']);

            if(!isset($page_check->ID)) {
                $new_page_id = wp_insert_post(wp_slash($new_page));
                if (!empty($templates[$new_page['post_title']])) {
                    update_post_meta($new_page_id, '_wp_page_template', wp_slash($templates[$new_page['post_title']]));
                }
            }
        }
    }
}
