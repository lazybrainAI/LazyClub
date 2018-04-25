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
            type:"POST",
            data:{id_going:user_clicked},

            success: function (data) {
                    var name_surname= data.name+ " "+data.surname;
                    var position=data.position;

                    if($('#no_attendees_msg').css('display')=='block'){
                        $('#no_attendees_msg').css('display', 'none');
                    }

                    var div = document.createElement('div');
                    div.setAttribute('class', 'col-6 col-sm-4');
                    div.setAttribute('id', 'attendee_'+user_clicked);
                    div.innerHTML = ` <div  style="margin-bottom:20px">
                                      <img class="attendees_img" src="" />
                                      <div class="attendee_info">
                                      <h6>${name_surname}</h6>
                                     <h6 class="h7">${position}</h6>
                                      </div>`;

                    $(div).appendTo($('.attendees .row'));

                    $('.going_btn').addClass('ungoing_btn');
                    $('.ungoing_btn h6').html("Ungoing");
                    $('.ungoing_btn').removeClass('going_btn');
            },

            error: function(data){
                    $('.msg').text(data.responseText);
            }



        });

    });


});