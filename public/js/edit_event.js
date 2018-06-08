$(document).ready(function () {

    $('#event_btn').click(function(){

        $('#save_event').css('display', 'block');
        $('#cancel_event').css('display', 'block');
        $('input').prop('disabled', false);
        $('select').prop('disabled', false);
        $('textarea').prop('disabled', false);

        $('input').addClass('style_input');
        $('textarea').addClass('style_input');




        $('#event_form').submit(function (e) {

            e.preventDefault();
            e.stopPropagation();

            var name= $('#event').text();
            var form=$('#event_form');

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({

                url:'/event/'+name,
                type:'POST',
                data:form.serialize(),

                success:function (data) {
                    $('#save_event').css('display', 'none');
                    $('#cancel_event').css('display', 'none');
                    $('input').prop('disabled', true);
                    $('select').prop('disabled', true);
                    $('textarea').prop('disabled', true);

                    $('input').removeClass('style_input');
                    $('textarea').removeClass('style_input');




                    $('#msg').css('display', 'block');
                    $('#msg').text("Event saved.").delay(2000).fadeOut(1000);


                },
                error:function(data){

                    $('#msg').css('display', 'block');
                    $('#msg').text("Error occured.").delay(2000).fadeOut(1000);


                }

            });

        });


    });



});