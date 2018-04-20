$(document).ready(function () {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('#review_form').submit(function (e) {
        e.preventDefault();
        e.stopPropagation();

        var description = $('#description').val();
        var project_event_select = $('#project_event_select').val();

        $.ajax({
            url: '/home',
            type: 'POST',
            data: {project_event_select: project_event_select, description: description},
            success: function (data) {
                $('#review_sent').addClass('allgood').text('Your review has been saved!').show().delay(2000).fadeOut(1000);
                document.getElementById('review_form').reset();
            },
            error: function (data) {
                $('#review_sent').addClass('notallgood').text('You have to pick project/event and enter your note!').show().delay(2000).fadeOut(1000);

            }
        });
    });
});