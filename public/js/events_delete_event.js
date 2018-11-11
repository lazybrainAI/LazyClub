$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('#all_events_div').on('click', '.delete_event', function (e) {

        
        $('#alert-wrapper').css('opacity', 1);
        $('#alert-wrapper').css('display', 'block');
        
        $('#alert-message').text("Are you sure about deleting this event?");
        $('#warning').text('*Note that all data regarding this event will also be deleted');

        var divId=$(e.target).parent('div').attr('id').split('_')[3];
        $('#alert-wrapper').addClass(divId);
    
    });


    $('#alert-ok-btn').click(function(e){
        e.preventDefault();
        e.stopPropagation();
        var deleteDiv=$(this).parent('div').parent('div').attr('class');

        $.ajax({
            url: '/events',
            type: 'DELETE',
            data: {id:deleteDiv},
            success: function (data) {
               
                $('#alert-wrapper').css('opacity', 0);
                $('#alert-wrapper').css('display', 'none');

                $('#' + deleteDiv).remove();
                if (data.num_of_events===0) {
                    $('#no_events_at_the_moment').show();
                }

                $('#alert-wrapper').removeClass(deleteDiv);

            },
            error:
                function (data) {
                    $('#alert-message').text("Something went wrong!");
                    $('#warning').text("*Reload page and try again or contact administrator");
                    $('#alert-wrapper').removeClass(deleteDiv);
                    $('#alert-ok-btn').css('display', 'none');


                }
        });
    })

     $('#alert-cncl-btn').click(function(e){
        $('#alert-wrapper').fadeOut(1000);
        $('#alert-wrapper').hide();
        

    });

});
