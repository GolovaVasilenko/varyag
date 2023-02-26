jQuery(document).ready(function($) {
    /*$('.btn-remove-js').on('click', function(e) {
        e.preventDefault();
        let form = $(this).closest('form');
        if(confirm("Вы уверены что хотите удалить!")) {
            form.submit();
        }
        return false;
    });
    $('#first-name').on('keyup', (e)=>{
      if (e.target.value.length == 0) {
        $('#info-submit').hide()
        $('#first-name-error').html('Введите имя!').css('color', 'red')
      } else if (e.target.value.length < 3) {
        $('#info-submit').hide()
        $('#first-name-error').html('Слишком короткое имя!').css('color', 'red')
      } else {
        $('#info-submit').show()
        $('#first-name-error').html('сменить имя').css('color', '#333')
      }
    })
    $('#last-name').on('keyup', (e)=>{
      if (e.target.value.length == 0) {
        $('#last-name-error').html('Введите фамилию!').css('color', 'red')
      } else if (e.target.value.length < 3) {
        $('#last-name-error').html('Слишком короткая фамилия!')
      } else $('#last-name-error').html('сменить фамилию').css('color', '#333')
    })
    $('#number').on('keyup', (e)=>{
      if (e.target.value.length == 0) {
        $('#info-submit').prop('disabled', true)
        $('#number-error').html('Введите телефон!').css('color', 'red')
      } else if (e.target.value[15] == '_') {
        $('#number-error').html('Введите телефон полностью!').css('color', 'red')
      } else $('#number-error').html('сменить телефон').css('color', '#333')
    })
    $('#email').on('keyup', (e)=>{
      if (e.target.value.length == 0) {
        $('#email-error').html('Введите e-mail!').css('color', 'red')
      } else if (!e.target.value.match(/^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/)) {
        $('#email-error').html('Введите корректный e-mail!').css('color', 'red')
      } else $('#email-error').html('сменить email').css('color', '#333')
    })
    $('#old-pass').on('keyup', (e)=>{
      if ($('#old-pass').val()) $('#old-pass-error').css('color', '#c09f6f')
    });
    $('#password').on('keyup', (e)=>{
      if (!e.target.value.match(/^(?=.*[A-Z])(?=.*[:%№»!,.;()_+])(?=.{8,})\S+$/)) {
        $('#password-error').css('color', 'red')
        $('.bottom-text').css('color', 'red')
      } else {
        $('#password-error').css('color', '#c09f6f')
        $('.bottom-text').css('color', '#333')
      }
    })
    $('#new-pass').on('keyup', (e)=>{
      if (!$('#old-pass').val()) $('#old-pass-error').css('color', 'red')
      if ($('#password').val() != e.target.value) {
        $('#new-pass-error').css('color', 'red')
      } else $('#new-pass-error').css('color', 'red').css('color', '#c09f6f')
    });*/

    /*setPriceSelectedProduct();*/
    $('#select_product').on('change', function(){
        setPriceSelectedProduct($(this));
    });

    $('.header-title-ticket').on('click', function() {
      let elemTrigger = $(this).data('trigger');
      $('.data-'+elemTrigger).toggleClass('active');
      $(this).toggleClass('active');
    });

    function setPriceSelectedProduct(element)
    {
        let productId = element.find('option:selected').val();
        $.ajax({
            type: 'post',
            url: '/wp-admin/admin-ajax.php',
            data: { 'action': 'alx_get_price_product', 'product_id': productId },
            success: function(response) {
                let result = JSON.parse(response);
                $('#select_price').val(result.price);
            }
        });
    }

    $('.btn-add-ticket-js').on('click', function() {
      $('.add-ticket-layout').addClass('show');
    });
    $('.add-ticket-layout span').on('click', function() {
      $('.add-ticket-layout').removeClass('show');
    });


  $('.btn-remove-js').on('click', function(e) {
    e.preventDefault();
    let form = $(this).closest('form');
    if(confirm("Вы уверены что хотите удалить!")) {
      form.submit();
    }
    return false;
  });

  let infoErrors = {};
  let passErrors = {};
  function anyError(errors) {
    for (let errorField in errors) {
      if (errors[errorField]) {
        return true;
      }
    }
    return false;
  }

  $('#first-name').on('keyup', (e)=>{
    if (e.target.value.length == 0) {
      $('#info-submit').prop('disabled', true)
      infoErrors.firstName = true;
      $('#first-name-error').html('Введите имя!').css('color', 'red')
    } else if (e.target.value.length < 3) {
      $('#info-submit').prop('disabled', true)
      infoErrors.firstName = true;
      $('#first-name-error').html('Слишком короткое имя!').css('color', 'red')
    } else {
      infoErrors.firstName = false;
      if (!anyError(infoErrors)) $('#info-submit').prop('disabled', false)
      $('#first-name-error').html('сменить имя').css('color', '#333')
    }
  })
  $('#last-name').on('keyup', (e)=>{
    if (e.target.value.length == 0) {
      $('#info-submit').prop('disabled', true)
      infoErrors.lastName = true;
      $('#last-name-error').html('Введите фамилию!').css('color', 'red')
    } else if (e.target.value.length < 3) {
      $('#info-submit').prop('disabled', true)
      infoErrors.lastName = true;
      $('#last-name-error').html('Слишком короткая фамилия!').css('color', 'red')
    } else {
      infoErrors.lastName = false;
      if (!anyError(infoErrors)) $('#info-submit').prop('disabled', false)
      $('#last-name-error').html('сменить фамилию').css('color', '#333')
    }
  })
  $('#number').on('keyup', (e)=>{
    if (e.target.value.length == 0) {
      $('#info-submit').prop('disabled', true)
      infoErrors.number = true;
      $('#number-error').html('Введите телефон!').css('color', 'red')
    } else if (e.target.value[15] == '_') {
      $('#info-submit').prop('disabled', true)
      infoErrors.number = true;
      $('#number-error').html('Введите телефон полностью!').css('color', 'red')
    } else {
      infoErrors.number = false;
      if (!anyError(infoErrors)) $('#info-submit').prop('disabled', false)
      $('#number-error').html('сменить телефон').css('color', '#333')
    }
  })
  $('#email').on('keyup', (e)=>{
    if (e.target.value.length == 0) {
      $('#info-submit').prop('disabled', true)
      infoErrors.email = true;
      $('#email-error').html('Введите e-mail!').css('color', 'red')
    } else if (!e.target.value.match(/^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/)) {
      $('#info-submit').prop('disabled', true)
      infoErrors.email = true;
      $('#email-error').html('Введите корректный e-mail!').css('color', 'red')
    } else {
      infoErrors.email = false;
      if (!anyError(infoErrors)) $('#info-submit').prop('disabled', false)
      $('#email-error').html('сменить email').css('color', '#333')
    }
  })

  $('#old-pass').on('keyup', (e)=>{
    if ($('#old-pass').val()){
      passErrors.old = false;
      $('#old-pass-error').css('color', '#c09f6f')
      if (!anyError(passErrors)) $('#pass-submit').prop('disabled', false);
    }
  });
  $('#password').on('keyup', (e)=>{
    if (!e.target.value.match(/^(?=.*[A-Z])(?=.*[:%№»!,.;()_+])(?=.{8,})\S+$/)) {
      passErrors.pass = true;
      $('#pass-submit').prop('disabled', true);
      $('#password-error').css('color', 'red')
      $('.bottom-text').css('color', 'red')
    } else {
      passErrors.pass = false;
      if (!anyError(passErrors)) $('#pass-submit').prop('disabled', false)
      $('#password-error').css('color', '#c09f6f')
      $('.bottom-text').css('color', '#333')
    }
  })
  $('#new-pass').on('keyup', (e)=>{
    if (!$('#old-pass').val()) {
      passErrors.old = true;
      $('#pass-submit').prop('disabled', true);
      $('#old-pass-error').css('color', 'red')
    }
    if ($('#password').val() != e.target.value) {
      passErrors.new = true;
      $('#pass-submit').prop('disabled', true);
      $('#new-pass-error').css('color', 'red')
    } else {
      passErrors.new = false;
      if (!anyError(passErrors)) $('#pass-submit').prop('disabled', false)
      $('#new-pass-error').css('color', '#c09f6f')
    }
  });

});
