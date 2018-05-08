$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });


    $('#all_events_div').on('click', '.delete_event', function (e) {


        if (confirm('Do you really want to delete this event?')) {
            e.preventDefault();
            e.stopPropagation();
            var deleteDiv = $('#event_id_input').val();

            var formEvents = $('#delete_event_' + deleteDiv);
            $.ajax({
                url: '/events',
                type: 'DELETE',
                data: formEvents.serialize(),
                success: function (data) {

                    $('#' + deleteDiv).remove();
                    if ($('#all_events_div').val() === "") {
                        $('#no_events_at_the_moment').show();
                    }


                },
                error:

                    function (data) {
                        alert("Something went wrong.");

                    }
            });
        }


    })
    ;
})
;
