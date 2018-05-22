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

                    //remove applicants
                    var id='#application_'+position;   //----radi
                    $(id).remove();

                    //add info and image about team member

                    var info_id="#info_"+position;
                    $(info_id).text(data.name+" "+data.surname);

                    var img="#attendee_"+position; //radi
                    $(img).attr("src", data.photo);


                    //delete position from select

                    var sel = $("select#team_apply");
                    sel.find("option[value=position]").remove();


                    //delete application for position
                    $('.applications').each(function(){
                        var user=data.name+" "+data.surname;
                        $('.applicant').each(function (){
                            if($(this).text()==user){
                                $(this).remove();
                            }
                        });

                    });

                    //delete open positions



                 //   alert(data.msg);




                },
                error:function(data){
                    alert('Error');
                }

            });



        });


    });



});