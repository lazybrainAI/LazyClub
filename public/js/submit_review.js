$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $('#review_form').submit(function (e) {
        var name=$('#event').text();
        e.preventDefault();
        e.stopPropagation();
        var form = $(this).serialize();
        $.ajax({
            url: '/event/'+name,
            type: 'POST',
            data: form,
            success: function (data) {

              console.log('sucess');
            },
            error: function (data) {
                console.log('error');
            }
        });
    });
});