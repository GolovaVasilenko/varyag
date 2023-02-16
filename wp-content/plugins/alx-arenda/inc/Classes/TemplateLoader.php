<?php

namespace inc\Classes;

class TemplateLoader extends GamajoTemplateLoader
{
    protected $filter_prefix = 'alx-arenda';

    protected $theme_template_directory = 'alx-arenda';

    protected $plugin_directory = PLUGIN_UNIT_PATH;

    protected $plugin_template_directory = 'templates';

    /**
     * @return void
     */
    public function register(): void
    {
        add_filter('template_include', [$this, 'alxTemplates']);
    }

    /**
     * @param $template
     * @return false|string
     */
    public function alxTemplates($template): ?string
    {
        if(is_page('forgot-password')) {
            $them_files = ['page-forgot-password.php', 'alx-arenda/page-forgot-password.php'];
            $exists = $this->locate_template($them_files, false);
            if($exists != '') {
                return $exists;
            } else {
                return $this->plugin_directory . '/templates/page-forgot-password.php';
            }
        } elseif(is_page('new-password')) {
            $them_files = ['page-new-password.php', 'alx-arenda/page-new-password.php'];
            $exists = $this->locate_template($them_files, false);
            if($exists != '') {
                return $exists;
            } else {
                return $this->plugin_directory . '/templates/page-new-password.php';
            }
        } elseif(is_page('profile')) {
            $them_files = ['page-profile.php', 'alx-arenda/page-profile.php'];
            $exists = $this->locate_template($them_files, false);
            if($exists != '') {
                return $exists;
            } else {
                return $this->plugin_directory . '/templates/page-profile.php';
            }
        } elseif(is_page('profile-login')) {
            $them_files = ['page-profile-login.php', 'alx-arenda/page-profile-login.php'];
            $exists = $this->locate_template($them_files, false);
            if($exists != '') {
                return $exists;
            } else {
                return $this->plugin_directory . '/templates/page-profile-login.php';
            }
        } elseif(is_page('profile-register')) {
            $them_files = ['page-profile-register.php', 'alx-arenda/page-profile-register.php'];
            $exists = $this->locate_template($them_files, false);
            if($exists != '') {
                return $exists;
            } else {
                return $this->plugin_directory . '/templates/page-profile-register.php';
            }
        }
        return $template;
    }
}