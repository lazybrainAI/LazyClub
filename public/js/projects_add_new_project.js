$(document).ready(function () {
    $('#add_new_project_form').submit(function (e) {
        e.preventDefault();
        e.stopPropagation();
        var projectsForm = $('#add_new_project_form');
        $.ajax({
            url: '/projects',
            type: 'POST',
            data: projectsForm .serialize(),
            success: function (data) {
                $('.project_saved').addClass('allgood').text('Project successfully created.').show().delay(2000).fadeOut(1000);
                document.getElementById('add_new_project_form').reset();
            },
            error: function (data) {
                $('.project_saved').addClass('notallgood').text('Project name already taken or start/end date is invalid.').show().delay(2000).fadeOut(1000);
            }
        });
    });
});