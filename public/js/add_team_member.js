$(document).ready(function(){



    $('.attendees_img').click(function(){

    var position=$(this).attr('id').split("_")[1];
    var id="#application_"+position;

    $(id).css('display', 'block');





    });



});