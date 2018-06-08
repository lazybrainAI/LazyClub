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

                    $('#msg').css('display', 'block');
                    $('#msg').text("Team member added.").delay(2000).fadeOut(1000);

                    //remove other applicants for assigned position
                    var id='#application_'+position;   //----radi
                    $(id).remove();

                    //add info and image about the new team member

                    var info_id="#info_"+position+ " h6:first-child";
                    $(info_id).text(data.name+" "+data.surname);

                    var img="#attendee_"+position; //radi
                    $(img).attr("src", "/"+data.photo);


                    //delete assigned position from select in the team application form

                    var option_id="#option_"+position;
                    $(option_id).remove();


                    //delete assigned position from open positions in project's details div
                    var open_postion="#open_position_"+position;
                    $(open_postion).remove();


                    //add unclicked class to
                    var attendee="#attendee_"+position;
                    $(this).removeClass('not_clicked');



                },
                error:function(data){
                    $('#msg').css('display', 'block');
                    $('#msg').text("Error while adding team member.").delay(2000).fadeOut(1000);
                }

            });



        });


    });



});