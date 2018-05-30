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
            url: '/people',
            type: 'POST',
            data: form,
            success: function (data) {
                $('#email_sent').addClass('allgood').removeClass('notallgood').text('New user has been created!').show().delay(2000).fadeOut(1000);
                document.getElementById('hr_form').reset();

                var div = document.createElement('div');
                div.setAttribute('class', 'col-sm-4');
                div.innerHTML = `
                <div class="container">
                    <div class="row align-items-center">
                        <a href="">
                        <div class="col-xs-6 ">
                        <img class="people_img" src=""/>
                        </div>
                        </a>
                    <div class="col-xs-6  personal_info">
                        <h5>${data.name} ${data.surname}</h5>
                            <h6></h6>
                    </div>
                    </div>
                </div>`;

                $(div).appendTo($('.row #all_users'));

                document.getElementById('hr_form').reset();
            },
            error: function (data) {
                console.log(data);
                $('#email_sent').addClass('notallgood').removeClass('allgood').text('Email or username already taken.').show().delay(2000).fadeOut(1000);
            }
        });
    });
});