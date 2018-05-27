$(document).ready(function(){

    //assigning ids to experience cards when there is still no info inputed by user

    var z = 1;
    $('.experience').each(function () {
        if ($(this).attr('id', '')) {
            $(this).attr('id', 'experience_' + z);
        }
        z++;
    });




    // adding experience on button click
    $('#add_experience').click(function () {


        var count = $('.experience').length + 1;
        var id = "experience_" + count;

        var experience = $("<div class=\"col-md-12 click_to_add experience\" >\n" +
            "\n" +
            "    <div class=\"experience_div\">\n" +
            "        <input name=\"company_position\" id=\"position\"\n" +
            "               placeholder=\"Position\" required> <!--Position-->\n" +
            "\n" +
            "        <input name=\"company_name\" id=\"company\"  placeholder=\"Company\" required>\n" +
            "\n" +
            "        <input name=\"from_period_experience\" class=\"from_period_experience\" type=\"text\"  placeholder=\"From\" required>\n" +
            "\n" +
            "        <input name=\"to_period_experience\" class=\"to_period_experience\" type=\"text\"\n" +
            "               placeholder=\"To\" id=\"to_period_experience_"+count+"\" required>\n" +
            "<div id=\"experience_"+count+"\" class='checkbox_div'><input type=\"checkbox\" id=\"current_work_"+count+"\" name=\"current_work\" class=\"current_work_chbox\" style=\"vertical-align: middle;\n" +
            "    display: inline-block;\n" +
            "    margin-right: 2%;\"><label for=\"current_work\">Current work</label> </div>\n"+
            "        <a class=\"delete_icon delete_btn\"  style=\"display:block\"><i class=\"far fa-trash-alt\"></i></a>\n" +
            "\n" +
            "    </div>\n" +
            "        <textarea name=\"description\" rows=\"4\" cols=\"100\" id=\"position_description\" placeholder=\'Experience description\' required></textarea>\n" +
            "\n" +

            "    <div class=\"read_more_btn\">\n" +
            "        <h6>read more</h6>\n" +
            "    </div>\n" +
            "\n" +
            "\n" +
            "</div>").attr('id', 'experience_' + count);


        $(experience).appendTo($('#experience_section'));


    });



    // deleting experience section

    $('#experience_section').on('click', '.delete_icon', function () {

        var parent = $(this).parent().parent();
        var experience_id = parent.attr('id').split("_")[1];
        var id = $('.personal_info').attr('id');


        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });


        // deleting from DB with AJAX

        $.ajax({
            type: 'DELETE',
            url: '/profile/' + id,
            data: {experience_id: experience_id},
            success: function (data) {

                parent.remove();
                var j = 1;
                $('.experience').each(function () {  //after removin one/more assign new id values
                    $(this).attr('id', 'experience_' + j);
                    j++;
                });

            },
            error: function (data) {
                $('#msg').css('display', 'block');
                $('#msg').text('Error');
            }


        });

    });




});