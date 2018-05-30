$(document).ready(function () {

    $('#event_btn').click(function(){

        $('#save_event').css('display', 'block');
        $('#cancel_event').css('display', 'block');
        $('input').prop('disabled', false);
        $('select').prop('disabled', false);
        $('textarea').prop('disabled', false);

        var name= $('#event').text();
        var form=$('#event_form');

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(form).submit(function (e) {

            e.preventDefault();
            e.stopPropagation();

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




                  //  $('.msg').text(data.name);
                },
                error:function(data){
                    $('.msg').text("Error");

                }

            });

        });


    });



});