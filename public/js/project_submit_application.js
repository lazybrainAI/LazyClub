$(document).ready(function () {
    $('#signup_form').submit(function (e) {
        e.preventDefault();
        e.stopPropagation();

        var project=$('#project').text();
        var form = $('#signup_form');
        $.ajax({
            url: '/project/' + project,
            type: 'POST',
            data: form.serialize(),
            success: function (data) {

            $('#application_sent').text(data.msg).show().delay(2000).fadeOut(1000);
            document.getElementById('signup_form').reset();

            },
            error: function (data) {
                $('#application_sent').text('Error!').show().delay(2000).fadeOut(1000);
            }
        });
    });
});