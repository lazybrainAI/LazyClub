$(document).ready(function(){

    $('.timeline_vertical').on('click', '.attended_event', function(){

        var id=$(this).attr('id').split('_')[1];

        $.ajax({

            url:'/home',
            type:'DELETE',
            data:{id:id},
            success:function(data){

                $(".attended_event h6").text("Attend");
                $(".attended_event").addClass('attend_event');
                $(".attend_event").removeClass('attended_event');

            },
            error:function(data){
                console.log(id);
            }

        });


    });



})