$(document).ready(function () {
    if ($('#all_projects').val == "")
        $('#no_projects_at_the_moment').show();
    else
        $('#no_projects_at_the_moment').hide();
    if ($('#all_events_div').val == "")
        $('#no_events_at_the_moment').show();
    else
        $('#no_events_at_the_moment').hide();
}