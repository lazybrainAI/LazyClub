$(document).ready(function () {
    if ($('#all_events_div').children().length == 0)
        $('#no_events_at_the_moment').show();
    else
        $('#no_events_at_the_moment').hide();
});