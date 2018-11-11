$(document).ready(function(){
    
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('#toggle_menu_btn').click(function(){

        $('#small_sidebar_menu').css('display', 'block');
        $('#small_sidebar_menu').css('width', '60vw');
        $('#small_sidebar_menu ul').css('width', '100%');
        $('body').css('overflow', 'hidden');

        $('.sidebar_section').addClass('disabled_content');
        $('.sidebar_section').removeClass('unabled_content');
        $('#page_top_picture').addClass('disabled_content');
        $('#page_top_picture').removeClass('unabled_content');


    });


    $('#close_menu').click(function(){
        $('#small_sidebar_menu').css('width', '0vw');
        $('#small_sidebar_menu').css('display', 'none');
        $('body').css('overflow-x', 'hidden');
        $('body').css('overflow-y', 'auto');

        $('.sidebar_section').addClass('unabled_content');
        $('.sidebar_section').removeClass('disabled_content');
        $('#page_top_picture').addClass('unabled_content');
        $('#page_top_picture').removeClass('disabled_content');


    });



});