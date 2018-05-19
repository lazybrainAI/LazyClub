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
            var deleteDiv =$('.p_e_card').attr('id').split('_')[3];
            console.log(deleteDiv);
            $.ajax({
                url: '/events',
                type: 'DELETE',
                data: {id:deleteDiv},
                success: function (data) {
                    $('#' + deleteDiv).remove();
                    if (data.num_of_events===0) {
                        $('#no_events_at_the_moment').show();
                    }
                },
                error:
                    function (data) {
                        alert("Something went wrong.");
                    }
            });
        }
    });
});
