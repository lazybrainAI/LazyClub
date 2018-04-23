$(document).ready(function(){

    $('.read_more_btn_parent').on('click', '.read_less_btn', function(){
        $('.expand').val(sentences[0]+"."+sentences[1]+".");
        $('.read_less_btn h6').html('read more');
        $(this).addClass('read_more_btn');
        $(this).removeClass('read_less_btn');

    });



});