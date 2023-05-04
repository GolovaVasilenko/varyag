jQuery(document).ready(function($) {

    $('#filter-form-abonement').on('submit', function(e) {
      e.preventDefault();
      let serviceVal = $('#select-service').val();
      let disciplineVal = $('#select-discipline').val();

      $.ajax({
        type: 'post',
        url: '/wp-admin/admin-ajax.php',
        data: { 'action': 'alx_filter_abonement', 'service_id': serviceVal, 'discipline_id': disciplineVal },
        success: function(response) {
          if(response) {
            $('.table-abonement tbody').html(response);
          }
        }
      });
    });

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

  $('.select-discipline-id').on('change', function() {
    let discipline_id = $(this).val();
    if(discipline_id === '0') {
      return;
    }
    AjaxGetAbonementList(discipline_id);
  });

  $('#edit_discipline_id').on('click', function() {
    let discipline_id = $(this).val();
    if(discipline_id === '0') {
      return;
    }
    AjaxGetAbonementList(discipline_id, 'edit');
  });

  function AjaxGetAbonementList(discipline_id, flag = 'create') {
    $.ajax({
      type: 'post',
      url: '/wp-admin/admin-ajax.php',
      data: { 'action': 'alx_get_individual_abonements_list', 'discipline_id': discipline_id },
      success: function(response) {
        if(flag === 'edit') {
          $('#edit_abonement').html(response).attr('disabled', false);
        } else {
          $('.select-abonement-id-js').html(response);
        }

      }
    });
  }

  $('.select-abonement-id-js').on('change', function() {
    let count_trening = $(this).find('option:selected').text();
    $('.count-trening-str').val(count_trening);
    $('.button-send-js').attr('disabled', false);
  });

});
