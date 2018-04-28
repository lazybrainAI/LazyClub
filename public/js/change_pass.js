$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $('#account_form').submit(function (e) {
        e.preventDefault();
        e.stopPropagation();
        var form = $(this);
        $.ajax({
            url: '/account',
            type: 'POST',
            data: form.serialize(),
            success: function (data) {
                $('#password_msg').addClass('allgood').text('Your password has been changed!').show().delay(2000).fadeOut(1000);
                document.getElementById('account_form').reset();
            },
            error: function (data) {
                $('#password_msg').addClass('notallgood').text('Your current password is wrong, or your new passwords do not match.').show().delay(2000).fadeOut(1000);
            }
        });
    });
});