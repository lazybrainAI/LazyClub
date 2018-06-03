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

            success: function(data){

                var attendee="#attendee_"+user_clicked;
                var parent_row=$(attendee).parent().parent();
                var parent_container=parent_row.parent();
                var attendees_num=$('.event_attendee').length;


                if(parent_row.children().length==1 && attendees_num==7){
                    parent_container.remove();
                    $('#slide_1').css('display', 'block');
                    $('.slide_btn').css('display', 'none');
                }

                if(parent_row.children().length==1 && attendees_num!=7){
                    parent_container.remove();
                }

                else{
                    $(attendee).remove();
                }



                $('.ungoing_btn').addClass('going_btn');
                $('.going_btn h6').html("Going");
                $('.going_btn').removeClass('ungoing_btn');

                if(data.num_attendees==0){
                   $('#no_attendees_msg').css('display', 'block');
                }
                


            },

            error:function(){
                $('.msg').text("Error");

            }




        });




    });




});