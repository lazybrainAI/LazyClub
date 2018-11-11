$(document).ready(function () {

    $('#project_btn').click(function(){

        $('#save_project').css('display', 'block');
        $('#cancel_project').css('display', 'block');
        $('input').prop('disabled', false);
        $('select').prop('disabled', false);
        $('textarea').prop('disabled', false);

        $('input').addClass('style_input');
        $('textarea').addClass('style_input');

    });



    $('#project_form').submit(function (e) {

        e.preventDefault();
        e.stopPropagation();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var form=$('#project_form');
        var name= $('#project').text();


        $.ajax({

            url:'/project/'+name,
            type:'PUT',
            data:form.serialize(),

            success:function (data) {

                $('#save_project').css('display', 'none');
                $('#cancel_project').css('display', 'none');
                $('input').prop('disabled', true);
                $('select').prop('disabled', true);
                $('textarea').prop('disabled', true);
                $('input').removeClass('style_input');
                $('textarea').removeClass('style_input');

                $('#alert-wrapper').show().css('opacity', 1);
                $('#alert-message').text("Project saved successfully!");

                $('#warning').text("");
                $('#alert-wrapper').delay(3000).fadeOut(1000);
                $('#alert-ok-btn').css('display', 'none');             
                $('#alert-cncl-btn').css('display', 'none');    


                

            },
            error:function(data){
                $('#alert-wrapper').show().css('opacity', 1);
                $('#alert-message').text("Something went wrong!");
                $('#warning').text("*Reload page and try again or contact administrator");
                $('#alert-ok-btn').css('display', 'none'); 
                $('#alert-cncl-btn').css('display', 'inline');             
            }

        });

    });

     $('#alert-cncl-btn').click(function(e){
         $('#alert-wrapper').fadeOut(1000);
         $('#alert-wrapper').hide();
         $('#cancel_project').trigger('click');

        

    });



});