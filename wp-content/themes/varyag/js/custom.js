jQuery(document).ready(function ($) {

    $('.form--black').submit(function(e) {
        e.preventDefault();
        let form = $(this).serialize();

        $.ajax({
            method: 'post',
            url: '/wp-admin/admin-ajax.php',
            data: form,
            success: function(response) {
                console.log(response);
            }
        });
    });

    $('.header__log--login').on('click', function(e) {
        e.preventDefault();
        $('.login-layout').show();
    });
    $('.button-popup-close').on('click', function() {
        $('.register-layout').hide();
        $('.login-layout').hide();
    });
    $('.go-reg').on('click', function(e) {
        e.preventDefault();
        $('.login-layout').hide();
        $('.register-layout').show();
    });
    $('.go-login').on('click', function(e) {
        e.preventDefault();
        $('.register-layout').hide();
        $('.login-layout').show();
    });

    $('#alx-login-form').on('submit', function(e) {
        e.preventDefault();
        if(!emailValidation($('#login-email'))) {
            return false;
        }
        let form = $(this).serialize();
        sendAjaxAuthRequest(form);
    });
    $('#alx-reg-form').on('submit', function(e) {
        e.preventDefault();
        if(!emailValidation($('#reg-email'))) {
            return false;
        }
        let form = $(this).serialize();
        sendAjaxAuthRequest(form);
    });

    function emailValidation(input) {
        let validRegex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
        if ((input.val()).match(validRegex)) {
            return true;
        }
        $('.error-message').text("Не корректный email");
        return false;
    }

    function sendAjaxAuthRequest(form) {
        $.ajax({
            type: 'post',
            url: '/wp-admin/admin-post.php',
            data: form,
            success: function(response) {
                let result = JSON.parse(response);
                if(result.status) {
                    window.location.href = result.redirect;
                } else {
                    $('.error-message').text(result.errors);
                }
            }
        });
    }
});

