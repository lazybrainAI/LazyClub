$(document).ready(function () {

    $('#event_btn').click(function(){

        $('#save_event').css('display', 'block');
        $('#cancel_event').css('display', 'block');
        $('input').prop('disabled', false);
        $('textarea').prop('disabled', false);
        $('#margin_top_80').css('margin-top', '80px');

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
                type:'PUT',
                data:form.serialize(),

                success:function (data) {
                    $('.msg').text(data.name);
                },
                error:function(data){
                    $('.msg').text("Error");

                }

            });

        });


    });



});