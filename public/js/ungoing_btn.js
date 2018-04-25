$(document).ready(function(){


    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('.event_btns').on('click', '.ungoing_btn', function(){


        var event_name=$('#event').text();
        var user_clicked=$('.event_btns').attr('id');


        $.ajax({

            url:'/event/' +event_name,
            type:'DELETE',
            data:{id:user_clicked},

            success: function(){

                var attendee="#attendee_"+user_clicked;
                $(attendee).remove();


                $('.ungoing_btn').addClass('going_btn');
                $('.going_btn h6').html("Going");
                $('.going_btn').removeClass('ungoing_btn');

                $('.msg').text("Success");


            },

            error:function(){
                $('.msg').text("Error");

            }




        });




    });




});