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


                   // check the slider where the attendee should be put

                    var el_to_appened_to=null;
                    var slide=null; //class

                   $('.mySlides .row').each(function(){

                       var count=$(this).children().length;
                       var parent = $(this).parent();
                       slide=parent.attr('id');

                       if (count<6){ //stays in the current slide
                            el_to_appened_to=$(this);

                       }
                       if(count>=6){ //creating a new slide
                           var id=slide.split('_')[1];
                           id=Number(id)+1;
                           slide="slide_"+id;

                           var new_slide=document.createElement('div');
                           new_slide.setAttribute('class', 'container mySlides');
                           new_slide.setAttribute('id', 'slide_'+id);
                           new_slide.innerHTML=`<div class="row"></div>`;
                           $(new_slide).appendTo('.attendees');
                           el_to_appened_to=new_slide.firstChild;

                           $('.slide_btn').css('display', 'block');
                           showDivs(1);

                       }



                   });


                   var div = document.createElement('div');
                   div.setAttribute('class', 'col-6 col-sm-4 event_attendee'+' '+slide);
                   div.setAttribute('id', 'event_attendee_'+attendees_num); // check max numattendee that already exists
                   div.innerHTML = ` <div  style="margin-bottom:20px" id="attendee_${user_clicked}">
                                      <img class="attendees_img" src="${photo}" />
                                      <div class="attendee_info">
                                      <h6>${name_surname}</h6>
                                      <h6 class="h7">${position}</h6>
                                      </div>`;

                   $(div).appendTo($(el_to_appened_to));


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

function showDivs(n) {
    var i = 0;
    var x = document.getElementsByClassName("mySlides");
    if (n > x.length) {
        slideIndex = 1
    }
    if (n < 1) {
        slideIndex = x.length
    }
    
    for (i; i < x.length; i++) {
        if(typeof x[i] != 'undefined'){
          x[i].style.display = "none";
        }
    }
    
    if(typeof x[slideIndex-1] != 'undefined') {
      x[slideIndex - 1].style.display = "block";

    }
}