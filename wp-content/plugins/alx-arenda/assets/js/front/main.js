jQuery(document).ready(function($) {
    $('.btn-remove-js').on('click', function(e) {
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
    });
    
});
