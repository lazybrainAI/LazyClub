

// ------- slider ------

var slideIndex = 1;

$(document).ready(function(){

    var event_attend_id=1;
    $('.event_attendee').each(function(){
        $(this).attr('id', 'event_attendee_'+event_attend_id);
        event_attend_id++;
    });

    assignSlides(slideIndex);

    $('#left_slide_arrow').click(function(){

        plusDivs(-1);
    });

    $('#right_slide_arrow').click(function(){

        plusDivs(+1);
    });


});


function assignSlides(slideIndex){

    var attendees_num=$('.event_attendee').length;
    console.log(attendees_num);




        j=1;
        for(var i=1; i<=attendees_num; i++){
            id='#event_attendee_'+i;
            $(id).addClass('slide_'+j.toString());

            i=i+1;
            if(i<=attendees_num){
                id='#event_attendee_'+i;
                $(id).addClass('slide_'+j.toString());
            }

            i=i+1;
            if(i<=attendees_num){
                id='#event_attendee_'+i;
                $(id).addClass('slide_'+j.toString());
            }

            i=i+1;
            if(i<=attendees_num){
                id='#event_attendee_'+i;
                $(id).addClass('slide_'+j.toString());
            }

            i=i+1;
            if(i<=attendees_num){
                id='#event_attendee_'+i;
                $(id).addClass('slide_'+j.toString());
            }

            i=i+1;
            if(i<=attendees_num){
                id='#event_attendee_'+i;
                $(id).addClass('slide_'+j.toString());
            }

            var wrap=".slide_"+j.toString();

            $(wrap).wrapAll( "<div class='container mySlides' ><div class='row'></div></div>" );

            j++;
        }

        showDivs(slideIndex);







};


function plusDivs(n) {
    showDivs(slideIndex += n);
}


function showDivs(n) {
    var i = 0;
    var x = document.getElementsByClassName("mySlides");
    if (n > x.length) {
        slideIndex = 1
    }
    if (n < 1) {
        slideIndex = x.length
    }
    ;
    for (i; i < x.length; i++) {
        x[i].style.display = "none";
    }
    x[slideIndex - 1].style.display = "block";
}


