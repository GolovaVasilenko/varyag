jQuery(document).ready(function ($) {

    $('.form--black').submit(function(e) {
        e.preventDefault();
        let form = $(this).serialize();

        $.ajax({
            method: 'post',
            url: '/wp-admin/admin-ajax.php',
            data: form,
            success: function(response) {
                window.location.href = "/spasibo/";
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

    if($('.woocommerce-breadcrumb').length > 0) {
        $('.woocommerce-breadcrumb').find('a:first').html('<img decoding="async" loading="lazy" src="/wp-content/themes/varyag/img/home.png" style="display: inline;" alt="logo" width="14" height="14">');
    }



    // Login user on cart page
    $('.basket-show-form-js').on('click', function(e) {
        e.preventDefault();
        $('.cart-login-layout').fadeIn(300);
    });
    $('.button-cart-popup-close').on('click', function() {
        $('.cart-login-layout').fadeOut(300);
    });
    $('#alx-login-cart-form').on('submit', function(e) {
        e.preventDefault();
        let email = $('#cart-login-email').val();
        let pass = $('#cart-login-password').val();
        let action = $('.form-action').val();
        let redirect = $('.form-redirect').val();
        let flag = $('.form-flag').val();

        $.ajax({
            type: 'post',
            url: '/wp-admin/admin-ajax.php',
            data: {"action": action, "email": email, "pass": pass, "redirect": redirect, "flag": flag},
            success: function(response) {
                let result = JSON.parse(response);
                if(result.status) {
                    window.location.href = result.redirect;
                } else {
                    $('.error-message').text(result.errors);
                }
            }
        });
    });


    // Change price
    $('.product-quantity .minus').on('click', function(e) {
        e.preventDefault();
        let qtyInput = $(this).closest('.num-block').find('.num-in__input')[0];
        let parentEl = $(this).closest('div.product-quantity')[0];

        let qty = parseInt($(qtyInput).val());
        let productId = $(parentEl).attr('data-id');

        qty = qty - 1;
        if(qty < 1) {
            qty = 1
        }
        sendAjaxForRecalculatePriceByQty(qty, productId);

    });
    $('.product-quantity .plus').on('click', function(e) {
        e.preventDefault();
        let qtyInput = $(this).closest('.num-block').find('.num-in__input')[0];
        let parentEl = $(this).closest('div.product-quantity')[0];

        let qty = parseInt($(qtyInput).val());
        let productId = $(parentEl).attr('data-id');

        qty = qty + 1;
        sendAjaxForRecalculatePriceByQty(qty, productId);

    });

    $('.recalculate-cost-js').on('click', function(e) {
        e.preventDefault();
        $.ajax({
            type: 'post',
            url: '/wp-admin/admin-ajax.php',
            data: { "action": "alx_cart_recalculate_price_by_bonuses" },
            success: function(response) {
                var response = jQuery.parseJSON(response);
                if(response.status) {
                    $('.different-results span').html(response.data.bonuses );
                    $('.price-total-block ').html('Итого: ' + response.data.total_cost + 'руб' );
                } else {
                }
            }
        });
    });

    $('.button-clear-cart-js').on('click', function (e) {
        e.preventDefault();
        $.ajax({
            type: 'post',
            url: '/wp-admin/admin-ajax.php',
            data: { "action": "alx_cart_clear" },
            success: function() {
                location.reload();
            }
        });
    });

    function sendAjaxForRecalculatePriceByQty(qty, productId) {
        $.ajax({
            type: 'post',
            url: '/wp-admin/admin-ajax.php',
            data: { "action": "alx_cart_recalculate_price_by_qty", "qty": qty, "product_id": productId },
            success: function(response) {
                location.reload();
            }
        });
    }

    $('.set-mask-js input').addClass('js-input-mask');
});

jQuery(document).on({
    mouseenter: function () {

    },
    mouseleave: function () {

    }
}, ".wc-block-components-checkbox");
