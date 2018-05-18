
$(document).ready(function () {


    // ------- cancel button

    $('#cancel_profile').click(function ()  {
        $('input').prop('disabled', true);
        $('textarea').prop('disabled', true);

        $('#add_education').css('display', 'none');
        $('#add_experience').css('display', 'none');
        $('#save_profile').css('display', 'none');
        $('#cancel_profile').css('display', 'none');
        $('.delete_icon').css('display', 'none');

    });

});


// ------- slider ------

var slideIndex = 1;
showDivs(slideIndex);

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





