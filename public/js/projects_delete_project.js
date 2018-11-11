$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('#all_projects').on('click', '.delete_project', function (e) {

        $('#alert-wrapper').css('opacity', 1);
        $('#alert-wrapper').css('display', 'block');

        $('#alert-message').text("Are you sure about deleting this project?");
        $('#warning').text('*Note that all data regarding this project will also be deleted');
        
        var divId=$(e.target).parent('div').attr('id').split('_')[3];
        console.log("prject card id"+divId);
        $('#alert-wrapper').addClass(divId);

        

    });

    $('#alert-ok-btn').click( function(e){
        e.preventDefault();
        e.stopPropagation();
        var deleteDiv=$(this).parent('div').parent('div').attr('class');

        console.log(deleteDiv);
        $.ajax({
            url: '/projects',
            type: 'DELETE',
            data: {id:deleteDiv},
            success: function (data) {

                $('#alert-wrapper').css('opacity', 0);
                $('#alert-wrapper').css('display', 'none');
                $('#' + deleteDiv).remove();
                if (data.num_of_projects===0) {
                    $('#no_projects_at_the_moment').show();
                }

                 $('#alert-wrapper').removeClass(deleteDiv);
            },
            error:
                function (data) {

                    console.log(data);
                    $('#alert-message').text("Something went wrong!");
                    $('#alert-wrapper').removeClass(deleteDiv);
                    $('#warning').text("*Reload page and try again or contact administrator");
                    $('#alert-ok-btn').css('display', 'none');
                    
                
                }
        });

    }) ;


    $('#alert-cncl-btn').click(function(e){
        $('#alert-wrapper').fadeOut(1000);
        $('#alert-wrapper').hide();

        


    });

});
