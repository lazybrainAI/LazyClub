$(document).ready(function(){

    $('.going_btn').click(function(){
        var event_name=$('#event').text();
        var user_clicked=1;
        $.ajax({
            url:'/event/' + event_name,
            type:PUT,
            data:[id:user_clicked, event:event_name],

            success: function (data) {

            },

            error: function(data){

            }



        });

    });


});