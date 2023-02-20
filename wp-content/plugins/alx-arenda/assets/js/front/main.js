jQuery(document).ready(function($) {
    $('.btn-remove-js').on('click', function(e) {
        e.preventDefault();
        let form = $(this).closest('form');
        if(confirm("Вы уверены что хотите удалить!")) {
            form.submit();
        }
        return false;
    });
});
