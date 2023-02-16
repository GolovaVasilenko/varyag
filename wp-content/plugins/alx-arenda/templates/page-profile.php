<?php
/*
 * Template Name: Page Profile
 * Template Post Type: page
 */

if(!is_user_logged_in()) {
    wp_redirect('/profile-login'); die;
}

$current_user = wp_get_current_user();
get_header('empty');
?>
    <div class="reg-block">
        <div class="reg-block__left">
            <div class="reg-block__close"></div>
            <div class="reg-block__mob">
                <a href="" class="help-mini">
                    <img src="<?=get_template_directory_uri();?>/img/help.png" alt="user" width="24" height="24" />
                    <span>Профиль</span>
                </a>
                <a href="/" class="logo">
                    <img src="<?=get_template_directory_uri();?>/img/logo.png" alt="logo" width="140" height="140" />
                </a>
                <a href="" class="logout-mini">
                    <span>Выйти</span>
                    <img src="<?=get_template_directory_uri();?>/img/logout.png" alt="user" width="24" height="24" />
                </a>
            </div>
            <div class="reg-block__drop">
                <div class="reg-block__menu">
                    <span>Профиль</span>
                    <img src="<?=get_template_directory_uri();?>/img/arr.png" alt="logo" width="12" height="10" />
                </div>

                <?php
                    switch ($current_user) {
                        case in_array('administrator', $current_user->roles) :
                            include_once PLUGIN_UNIT_PATH . "/templates/menu/administrator_menu.php";
                            break;
                        case in_array('coach', $current_user->roles) :
                            include_once PLUGIN_UNIT_PATH . "/templates/menu/coach_menu.php";
                            break;
                        case in_array('manager', $current_user->roles) :
                            include_once PLUGIN_UNIT_PATH . "/templates/menu/manager_menu.php";
                            break;
                        default:
                            include_once PLUGIN_UNIT_PATH . "/templates/menu/user_menu.php";
                    }
                ?>
            </div>
        </div>
        <?php
            $content = $_GET['p'] ?? null;
            switch($content) {
                case 'reg':
                    include_once PLUGIN_UNIT_PATH . "/templates/pages/reg.php";
                    break;
                case 'history':
                    include_once PLUGIN_UNIT_PATH . "/templates/pages/history.php";
                    break;
                case 'bonus':
                    include_once PLUGIN_UNIT_PATH . "/templates/pages/bonus.php";
                    break;
                case 'payment':
                    include_once PLUGIN_UNIT_PATH . "/templates/pages/payment.php";
                    break;
                case 'feedback':
                    include_once PLUGIN_UNIT_PATH . "/templates/pages/feedback.php";
                    break;
                case 'help':
                    include_once PLUGIN_UNIT_PATH . "/templates/pages/help.php";
                    break;
                case 'coach-edit':
                    include_once PLUGIN_UNIT_PATH . "/templates/pages/coach-edit.php";
                    break;
                default:
                    include_once PLUGIN_UNIT_PATH . "/templates/pages/index.php";
            }
        ?>
    </div>

<?php get_footer('empty');
