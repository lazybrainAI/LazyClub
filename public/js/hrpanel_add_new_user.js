$(document).ready(function () {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('#hr_form').submit(function (e) {
        e.preventDefault();
        e.stopPropagation();

        var name = $('#firstNameHR').val();
        var last_name = $('#lastNameHR').val();
        var mail = $('#emailHR').val();
        var username = $('#usernameHR').val();

        $.ajax({
            url: '/hrpanel',
            type: 'POST',
            data: {name: name, lastname: last_name, mail: mail, username: username},
            success: function () {
                
                $('#email_sent').addClass('allgood').text('Your review has been saved!').show().delay(2000).fadeOut(1000);;
                document.getElementById('hr_form').reset();
            },
            error: function (data) {
                console.log(data);
                $('#email_sent').addClass('notallgood').text('Email or username already taken.').show().delay(2000).fadeOut(1000);


            }

        });


    });
});