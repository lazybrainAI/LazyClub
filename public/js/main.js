// ---- add content on click

$(document).ready(function(){

    // adding education on button click
    $('#add_education').click(function(){

        var el = "<div class=\"col-sm-6 click_to_add education\" >\n" +
            "    <input id=\"institution\" type=\"text\" value=\"Name\" disabled=\"disabled\"> <!-- institution -->\n" +
            "    <input id=\"address\" type=\"text\" value=\"Address\" disabled=\"disabled\">\n" +
            "    <input id=\"from_period_education\" type=\"text\" value=\"From\" disabled=\"disabled\"><input id=\"to_period_education\" type=\"text\" value=\"To\" disabled=\"disabled\">\n" +
            "    <input id=\"title\" type=\"text\" value=\"Title\" disabled=\"disabled\">\n" +
            "    <a class=\"delete_icon delete_btn\"><i class=\"far fa-trash-alt\"></i></a>\n" +
            "</div>"

        $(el).appendTo( $('#education_section'));

    });

    // adding experience on button click
    $('#add_experience').click(function(){
        var experience="<div class=\"col-md-12 click_to_add experience\">\n" +
            "\n" +
            "    <div class=\"experience_div\">\n" +
            "        <input id=\"position\" value=\"Institution\"  disabled=\"disabled\"> <!--Position-->\n" +
            "        <input id=\"company\" value=\"Company\"  disabled=\"disabled\">\n" +
            "        <input id=\"from_period_experience\" type=\"text\" value=\"From\" disabled=\"disabled\"><input id=\"to_period_experience\" type=\"text\" value=\"To\" disabled=\"disabled\">\n" +
            "\n" +
            "        <a class=\"delete_icon delete_btn\"><i class=\"far fa-trash-alt\"></i></a>\n" +
            "\n" +
            "        <textarea rows=\"4\" cols=\"100\" id=\"position_description\" disabled=\"disabled\" >Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus enim fugit iure laboriosam nobis optio praesentium veritatis voluptatem.Asperiores consectetur culpa, debitis facilis maxime quae quam quibusdam situllam voluptatem</textarea>\n" +
            "\n" +
            "\n" +
            "    </div>\n" +
            "    <div class=\"read_more_btn\">\n" +
            "        <h6>read more</h6>\n" +
            "    </div>\n" +
            "\n" +
            "\n" +
            "</div>"
        $(experience).appendTo( $('#experience_section'));


    });

    // deleting education
    $('#education_section').on('click', '.delete_icon', function () {

        $(this).parent().remove();
        //brisanje iz baze ovih info

    });

    //deleting experience section

    $('#experience_section').on('click', '.delete_icon' ,function () {
        $(this).parent().parent().remove();
        //brisanje iz baze ovih info

    });

    //editing profile

    $('#edit_btn').click(function(){
       $('input').prop('disabled', false);
       $('#add_education').css('display', 'block');
       $('#add_experience').css('display', 'block');
       $('#save_btn').css('display', 'block');
       $('#cancel_btn').css('display', 'block');
       $(' .delete_icon').css('display', 'inline');

       $('#save_btn').click(function(){


           $.ajax({
               url: '/profile',
               method: "POST",
               data:{id:id},
               success: function(data){
                   $('#show_msg').html(data);
               }
           });

       });




    });





});




// ------- slider ------
var slideIndex = 1;
showDivs(slideIndex);

function plusDivs(n) {
    showDivs(slideIndex += n);
}

function showDivs(n) {
    var i=0;
    var x = document.getElementsByClassName("mySlides");
    if (n > x.length) {slideIndex = 1}
    if (n < 1) {slideIndex = x.length} ;
    for (i; i < x.length; i++) {
        x[i].style.display = "none";
    }
    x[slideIndex-1].style.display = "block";
}





