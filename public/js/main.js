// ---- add content on click

$(document).ready(function(){

    $('#add_education').click(function(){
        $("<div class=\"col-sm-6 click_to_add education\">\n" +
            "    <h5 id=\"institution\">Institution name</h5>\n" +
            "    <h6 id=\"address\">Address</h6>\n" +
            "    <h6 id=\"period_education\">Period</h6>\n" +
            "    <h6 id=\"title\">Title</h6>\n" +
            "    <a class=\"edit_icon\"><i class=\"far fa-edit\"></i></a>\n" +
            "    <a class=\"delete_icon\"><i class=\"far fa-trash-alt\"></i></a>\n" +
            "</div>").appendTo( $('#education_section') );

    });




});




// ------- slider ------
var slideIndex = 1;
showDivs(slideIndex);

function plusDivs(n) {
    showDivs(slideIndex += n);
}

function showDivs(n) {
    var i;
    var x = document.getElementsByClassName("mySlides");
    if (n > x.length) {slideIndex = 1}
    if (n < 1) {slideIndex = x.length} ;
    for (i = 0; i < x.length; i++) {
        x[i].style.display = "none";
    }
    x[slideIndex-1].style.display = "block";
}





