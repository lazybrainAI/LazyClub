$(document).ready(function(){

   $('.attendees').on('click', '.clicked_img', function(){

       var position=$(this).attr('id').split("_")[1];
       var id="#application_"+position;

       $(id).css('display', 'none');

       $(this).removeClass('clicked_img');
       $(this).addClass('not_clicked');





   });



});