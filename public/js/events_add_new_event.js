$(document).ready(function () {
    $('#add_new_event_form').submit(function (e) {
        e.preventDefault();
        e.stopPropagation();
        var formEvents = $('#add_new_event_form');
        $.ajax({
            url: '/events',
            type: 'POST',
            data: formEvents.serialize(),
            success: function (data) {
                $('.event_saved').addClass('allgood').text('Event successfully created.').show().delay(2000).fadeOut(1000);
                document.getElementById('add_new_event_form').reset();
                console.log(data);
            },
            error: function (data) {
                console.log(data);
                $('.event_saved').addClass('notallgood').text('Event name already taken or date is invalid').show().delay(2000).fadeOut(1000);
            }
        });
    });
});