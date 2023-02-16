<?php

namespace inc\Profile;

class Profile
{
    /**
     * @return void
     */
    public function register(): void
    {
        add_action('admin_post_alx_register_user', [$this, 'alxRegisterUser']);
        add_action('admin_post_nopriv_alx_register_user', [$this, 'alxRegisterUser']);

        add_action('admin_post_alx_login_user', [$this, 'alxLoginUser']);
        add_action('admin_post_nopriv_alx_login_user', [$this, 'alxLoginUser']);

        add_action('admin_post_alx_forgot_pass', [$this, 'alxForgotPassword']);
        add_action('admin_post_nopriv_alx_forgot_pass', [$this, 'alxForgotPassword']);

        add_action('admin_post_alx_new_pass', [$this, 'alxNewPassword']);
        add_action('admin_post_nopriv_alx_new_pass', [$this, 'alxNewPassword']);
    }

    /**
     * @return void
     */
    public function alxRegisterUser(): void
    {
        $username   = stripslashes(strip_tags(trim($_POST['login'])));
        $password   = uniqid();
        $email      = stripslashes(strip_tags(trim($_POST['email'])));
        $phone      = stripslashes(strip_tags(trim($_POST['phone'])));
        $last_name  = stripslashes(strip_tags(trim($_POST['last_name'])));
        $first_name = stripslashes(strip_tags(trim($_POST['first_name'])));
        $redirect   = stripslashes(strip_tags(trim($_POST['redirect'])));

        $user_id = wp_create_user( $username, $password, $email );

        if ( is_wp_error( $user_id ) ) {
            $_SESSION['errors'] = $user_id->get_error_message();
            wp_redirect($redirect); die;
        }

        wp_update_user([
            'ID'              => $user_id,
            'display_name'    => $first_name . ' ' . $last_name,
            'first_name'      => $first_name,
            'last_name'       => $last_name,
            'role'            => 'basic_contributor',
        ]);
        update_user_meta( $user_id, 'user_phone', $phone );

        $subject = "Регистрация нового аккаунта на сайте " . site_url();
        $message = '<h2>Спасибо за регистрацию!</h2>
        <p>Вам доступны все услуги, предаставляемые нашим сайтом.</p>
        <p>Ваш пароль для входа: <strong>' . $password . '</strong></p>';
        $this->sendEmailAfterRegistration($email, $subject, $message);

        if(isset($_POST['flag']) && $_POST['flag'] == 'page') {
            $_SESSION['success'] = __('Thanks for registration');
            wp_redirect('/profile-login/'); die;
        } else {
            if ( !$user_id ) {
                echo json_encode(['errors' => "Процесс регистрации завершился ошибкой", 'status' => 0]); die;
            }
            $_SESSION['reg-success'] = "<h2>Спасибо, Регистрация прошла успешно!</h2><p>Пароль вы найдете в письме, которое мы отправили вам на указанный вами адрес электронной почты. </p>";
            echo json_encode(['redirect' => site_url(), 'status' => 1]); die;
        }

    }

    /**
     * @return void
     */
    public function alxLoginUser(): void
    {
        $email    = stripslashes(strip_tags(trim($_POST['email'])));
        $password = stripslashes(strip_tags(trim($_POST['password'])));
        $redirect = stripslashes(strip_tags(trim($_POST['redirect'])));

        $creds = [];
        $creds['user_login'] = $email;
        $creds['user_password'] = $password;

        $user = wp_signon( $creds, false );

        if(isset($_POST['flag']) && $_POST['flag'] == 'page') {
            if ( is_wp_error($user) ) {
                $_SESSION['errors'] = $user->get_error_message();
                wp_redirect($redirect); die;
            }
            $_SESSION['user_email'] = $email;
            wp_redirect('/profile/'); die;
        } else {
            if ( is_wp_error($user) ) {
                echo json_encode(['errors' => "Не верный логин или пароль", 'status' => 0]); die;
            }
            $_SESSION['user_email'] = $email;
            echo json_encode(['redirect' => '/profile/', 'status' => 1]); die;
        }

    }

    public function alxForgotPassword()
    {
        $email = stripslashes(strip_tags(trim($_POST['email'])));
        $user = get_user_by( 'email', $email );

        if(empty($email) || !mb_stripos($email, '@')) {
            $_SESSION['errors'] = "Не корректный email";
        } elseif (!$user) {
            $_SESSION['errors'] = "Пользователь с таким email в системе не зарегистрирован";
        } else {
            $_SESSION['forgot_token'] = uniqid();
            $_SESSION['user_email'] = $user->user_email;
            $subject = 'Восстановление пароля на сайте ' . site_url();
            $message = '<p>Для восстановления пароля пройдите по ссылке: </p>
            <p><a href="' . site_url() . '/new-password?token=' . $_SESSION['forgot_token'] . '">' . site_url() . '/new-password?token=' . $_SESSION['forgot_token'] . '</a></p>';
            $this->sendEmailAfterRegistration($email, $subject, $message);
            $_SESSION['success'] = "Проверьте ваш почтовый ящик, мы выслали вам инструкции по восстановлению пароля";
        }

        wp_redirect('/forgot-password'); die;
    }

    public function alxNewPassword()
    {
        $newPassword = stripslashes(strip_tags(trim($_POST['password'])));
        $user = get_user_by( 'email', $_SESSION['user_email'] );

        $user_id = wp_update_user( ['ID' => $user->ID, 'user_pass' => $newPassword] );

        if ( is_wp_error( $user_id ) ) {

        } else {
            wp_redirect('/profile-login/'); die;
        }

    }

    public function sendEmailAfterRegistration($email, $subject, $message)
    {
        $to = $email;

        $headers[] = 'Content-Type: text/html; charset=UTF-8';
        $headers[] = 'From: Varyag <support@varyag.ru>';
        $headers[] = 'Reply-To: Varyag <serhdmc96@gmail.com>';
        $headers[] = 'X-Mailer: PHP/' . phpversion();

        wp_mail($to, $subject, $message, $headers);
    }
}