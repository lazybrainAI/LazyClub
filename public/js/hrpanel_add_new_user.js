$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $('#hr_form').submit(function (e) {
        e.preventDefault();
        e.stopPropagation();
        var form = $(this).serialize();
        $.ajax({
            url: '/hrpanel',
            type: 'POST',
            data: form,
            success: function () {
                $('#email_sent').addClass('allgood').text('New user has been created!').show().delay(2000).fadeOut(1000);
                document.getElementById('hr_form').reset();
            },
            error: function (data) {
                $('#email_sent').addClass('notallgood').text('Email or username already taken.').show().delay(2000).fadeOut(1000);
            }
        });
    });
});