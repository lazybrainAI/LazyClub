$(document).ready(function(){


    $('.attendees').on('click', '.not_clicked', function(){

        var position=$(this).attr('id').split("_")[1];
        var id="#application_"+position;

        $(id).css('display', 'block');

        $(this).addClass('clicked_img');
        $(this).removeClass('not_clicked');



        $('.attendees').on('click', '.applicant', function(){

            var name=$('#project').text();
            var user_id=$(this).attr('id').split('_')[1];
            var position=$(this).attr('id').split('_')[0];
            var team="team";

            $.ajax({

                url:'/project/'+name,
                method:'PUT',
                data:{id:user_id, position:position, team:team},

                success:function(data){

                    var id='#application_'+position;
                    $(id).remove();
                    var img="#attendee_"+position;
                    $(img).attr("src", data.photo);

                    alert(data.msg);




                },
                error:function(data){
                    alert('Error');
                }

            });



        });


    });



});