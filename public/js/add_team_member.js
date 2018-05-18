$(document).ready(function(){


    $('.attendees').on('click', '.not_clicked', function(){


        var position=$(this).attr('id').split("_")[1];
        var id="#application_"+position;

        $(id).css('display', 'block');

        $(this).addClass('clicked_img');
        $(this).removeClass('not_clicked');


    });



});