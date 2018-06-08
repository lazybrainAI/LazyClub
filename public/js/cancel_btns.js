
$(document).ready(function () {



    // ------- profile cancel button

    $('#cancel_profile').click(function ()  {
        $('input').removeClass('style_input');
        $('textarea').removeClass('style_input');


        $('input').prop('disabled', true);
        $('textarea').prop('disabled', true);


        $('#add_education').css('display', 'none');
        $('#add_experience').css('display', 'none');
        $('#save_profile').css('display', 'none');
        $('#cancel_profile').css('display', 'none');
        $('.delete_icon').css('display', 'none');
        $('.checkbox_div').css('display', 'none');
        $('.to_period_div').css('margin-left', '2%');
        $('#ln_input').val("");
        $('#twitter_input').val("");
        $('#fb_input').val("");

    });

    // -------- event cancel button



    $('#cancel_event').click(function(){
        $('input').removeClass('style_input');
        $('textarea').removeClass('style_input');


        $('input').prop('disabled', true);
        $('textarea').prop('disabled', true);

        $('#save_event').css('display', 'none');
        $('#cancel_event').css('display', 'none');
    });



    // ------- project cancel button

    $('#cancel_project').click(function(){
        $('input').removeClass('style_input');
        $('textarea').removeClass('style_input');

        $('input').prop('disabled', true);
        $('textarea').prop('disabled', true);

        $('#save_project').css('display', 'none');
        $('#cancel_project').css('display', 'none');
    });







});






