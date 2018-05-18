$(document).ready(function(){

    //assigning ids to education cards when there is still no info inputed by user

    var i = 1;
    $('.education').each(function () {
        if ($(this).attr('id', '')) {
            $(this).attr('id', 'education_' + i);
        }
        i++;
    });



    // adding education on button click
    $('#add_education').click(function () {

        var count = $('.education').length + 1;
        var id = "education_" + count;


        var el = $("<div class=\"col-sm-6 click_to_add education\" >\n" +
            "    <input name=\"institution\" id=\"institution\" type=\"text\" placeholder=\"Institution\"  required> <!-- institution -->\n" +
            "    <input name=\"address\" id=\"address\" type=\"text\" placeholder=\"Address\"  required>\n" +
            "    <input name=\"from_period_education\" id=\"from_period_education\" type=\"text\" placeholder=\"From\" >" +
            "    <input name=\"to_period_education\" id=\"to_period_education\" type=\"text\" placeholder=\"To\"  required>\n" +
            "    <input name=\"title\" id=\"title\" type=\"text\" placeholder=\"Title\" required>\n" +
            "    <a class=\"delete_icon delete_btn\" style=\"display:block\"><i class=\"far fa-trash-alt\"></i></a>\n" +
            "</div>").attr('id', 'education_' + count);


        $(el).appendTo($('#education_section'));


    });


    //delete education
    $('#education_section').on('click', '.delete_icon', function () {

        // deleting from DB with AJAX
        var parent = $(this).parent();
        var education_id = parent.attr('id').split("_")[1];
        var id = $('.personal_info').attr('id');


        $.ajax({
            type: 'DELETE',
            url: '/profile/' + id,
            data: {education_id: education_id},
            success: function () {

                parent.remove();
                var j = 1;
                $('.education').each(function () {  //after removin one/more assign new id values
                    $(this).attr('id', 'education_' + j);
                    j++;
                });

            },
            error: function (data) {

            }


        });


    });




});