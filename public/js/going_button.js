$(document).ready(function(){

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('.event_btns').on('click', '.going_btn',function(){

        var event_name=$('#event').text();
        var user_clicked=$('.event_btns').attr('id');
        $.ajax({
            url:'/event/' +event_name  ,
            type:"PUT",
            data:{id_going:user_clicked},

            success: function (data) {
               if(data.msg==null){
                   var name_surname= data.name+ " "+data.surname;
                   var position=data.position;
                   var photo="/"+data.photo;

                   if($('#no_attendees_msg').css('display')=='block'){
                       $('#no_attendees_msg').css('display', 'none');
                   }


                   var attendees_num=$('.event_attendee').length+1;


                   var div = document.createElement('div');
                   div.setAttribute('class', 'col-6 col-sm-4');
                   div.setAttribute('id', 'event_attendee_'+attendees_num); // check max numattendee that already exists
                   div.innerHTML = ` <div  style="margin-bottom:20px" id="attendee_${user_clicked}">
                                      <img class="attendees_img" src="${photo}" />
                                      <div class="attendee_info">
                                      <h6>${name_surname}</h6>
                                      <h6 class="h7">${position}</h6>
                                      </div>`;

                   $(div).appendTo($('.attendees'));


                   //put into slide


                   $('.going_btn').addClass('ungoing_btn');
                   $('.ungoing_btn h6').html("Not going");
                   $('.ungoing_btn').removeClass('going_btn');


               }
            },

            error: function(data){
                    $('.msg').text("Error");
            }



        });

    });


});