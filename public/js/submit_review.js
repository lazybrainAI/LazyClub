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
                $('#review_sent').text('Your review has been saved!').show().delay(2000).fadeOut(1000);
                $('#review_form').reset();
            },
            error: function (data) {
                $('#review_sent').text('You have enter title and your note!').show().delay(2000).fadeOut(1000);
            }
        });
    });
});