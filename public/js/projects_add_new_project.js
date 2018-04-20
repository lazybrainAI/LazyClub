$(document).ready(function () {
    $('#add_new_project_form').submit(function (e) {
        e.preventDefault();
        e.stopPropagation();

        var projektiforma = $('#add_new_project_form');

        $.ajax({
            url: '/projects',
            type: 'POST',
            data: projektiforma.serialize(),

            success: function (data) {

                $('.project_saved').addClass('allgood').text('Project successfully created.').show().delay(2000).fadeOut(1000);
                document.getElementById('add_new_project_form').reset();
                console.log(data);


            },
            error: function (data) {

                console.log(data);
                $('.project_saved').addClass('notallgood').text('An error has occurred.').show().delay(2000).fadeOut(1000);

            }

        });


    });

});