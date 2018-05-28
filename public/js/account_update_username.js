$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $('#account_form_username').submit(function (e) {
        e.preventDefault();
        e.stopPropagation();
        var form = $(this);
        $.ajax({
            url: '/account',
            type: 'POST',
            data: form.serialize(),
            success: function (data) {
                $('#username_msg').addClass('allgood').text('Your username has been changed!').show().delay(2000).fadeOut(1000);
                document.getElementById('account_form_username').reset();
                console.log(data);
                },
            error: function (data) {
                console.log(data);
                $('#username_msg').addClass('notallgood').text('Username already taken or there was some error.').show().delay(2000).fadeOut(1000);
            }
        });
    });
});