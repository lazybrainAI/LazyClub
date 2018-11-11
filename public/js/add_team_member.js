$(document).ready(function(){


    $('.attendees').on('click', '.not_clicked', function(){

        var position=$(this).attr('id').split("_")[1];
        var id="#application_"+position;

        $(id).css('display', 'block');

        $(this).addClass('clicked_img');
        $(this).removeClass('not_clicked');



    });




    $('.attendees').on('click', '.applicant', function(){

        var name=$('#project').text();
        var user_id=$(this).attr('id').split('_')[1];
        var position=$(this).attr('id').split('_')[0];


        $('#alert-wrapper').css('opacity', 1);
        $('#alert-wrapper').css('display', 'block');
        
        $('#alert-message').text("Are you sure you want to add this member to your team?");
        $('#warning').text("*Once executed, this action can't be undone");


        $('#alert-wrapper').addClass(name+'%'+user_id+'%'+position);

    });


    $('#alert-ok-btn').click(function(e){

        e.preventDefault();
        e.stopPropagation();

        var team="team";
        
        var info=$(this).parent('div').parent('div').attr('class');
        var name=info.split('%')[0];
        var user_id=info.split('%')[1];
        var position=info.split('%')[2];


        $.ajax({

            url:'/project/'+name,
            method:'PUT',
            data:{id:user_id, position:position, team:team},

            success:function(data){

                $('#alert-message').text("Team member added successfully!");
                $('#warning').text("");
                $('#alert-wrapper').delay(3000).fadeOut(1000);
                $('#alert-ok-btn').css('display', 'none');             
                $('#alert-cncl-btn').css('display', 'none'); 
                

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


                $('#alert-wrapper').removeClass(info);

            },
            error:function(data){

                $('#alert-wrapper').removeClass(info);
                $('#alert-message').text("Something went wrong!");
                $('#warning').text("*Reload page and try again or contact administrator");
                $('#alert-ok-btn').css('display', 'none');

            }

        });
    });


    $('#alert-cncl-btn').click(function(e){
        $('#alert-wrapper').fadeOut(1000);
        $('#alert-wrapper').hide();
        

    });

});