$(document).ready(function(){

    $('.timeline_vertical').on('click', '.attend_event', function(){

        var id=$(this).attr('id').split('_')[1];

        $.ajax({

            url:'/home',
            type:'PUT',
            data:{id:id},
            success:function(data){

                if(data.msg==""){
                    $(".attend_event h6").text("Attended");
                    $(".attend_event").addClass('attended_event');
                    $(".attended_event").removeClass('attend_event');
                }
                else{
                    alert(data.msg);
                }

            },
            error:function(data){
                console.log(id);
            }

        });


    });



});