// ---- add content on click

$(document).ready(function(){

    var i=1;
    $('.education').each(function(){
        if($(this).attr('id', '')){
            $(this).attr('id', 'education_' + i);
        }
        i++;
    });
    var z=1;
    $('.experience').each(function(){
        if($(this).attr('id', '')){
            $(this).attr('id', 'experience_' + z);
        }
        z++;
    });


    // adding education on button click
    $('#add_education').click(function(){

        var count = $('.education').length + 1;
        var id = "education_" +count;


        var el = $("<div class=\"col-sm-6 click_to_add education\" >\n" +
            "    <input name=\"institution\" id=\"institution\" type=\"text\" value=\"Institution\"  required> <!-- institution -->\n" +
            "    <input name=\"address\" id=\"address\" type=\"text\" value=\"Address\"  required>\n" +
            "    <input name=\"from_period_education\" id=\"from_period_education\" type=\"text\" placeholder=\"From\" ><input namee=\"to_period_education\" id=\"to_period_education\" type=\"text\" placeholder=\"To\" disabled=\"disabled\" required>\n" +
            "    <input name=\"title\" id=\"title\" type=\"text\" value=\"Title\" required>\n" +
            "    <a class=\"delete_icon delete_btn\" style=\"display:block\"><i class=\"far fa-trash-alt\"></i></a>\n" +
            "</div>" ).attr('id', 'education_' + count);


        $(el).appendTo( $('#education_section'));


    });

    // adding experience on button click
    $('#add_experience').click(function(){


        var count = $('.experience').length + 1;
        var id = "experience_" +count;

        var experience=$("<div class=\"col-md-12 click_to_add experience\" >\n" +
            "\n" +
            "    <div class=\"experience_div\">\n" +
            "        <input name=\"company_position\" id=\"position\"\n" +
            "               value=\"Company position\" > <!--Position-->\n" +
            "\n" +
            "        <input name=\"company_name\" id=\"company\"  value=\"Company name\">\n" +
            "\n" +
            "        <input name=\"from_period_experience\" id=\"from_period_experience\" type=\"text\"  value=\"From\" >\n" +
            "\n" +
            "        <input name=\"to_period_experience\" id=\"to_period_experience\" type=\"text\"\n" +
            "               value=\"To\" >\n" +
            "        <textarea name=\"description\" rows=\"4\" cols=\"100\" id=\"position_description\" >Description</textarea>\n" +
            "\n" +
            "        <a class=\"delete_icon delete_btn\"  style=\"display:block\"><i class=\"far fa-trash-alt\"></i></a>\n" +
            "\n" +
            "    </div>\n" +
            "    <div class=\"read_more_btn\">\n" +
            "        <h6>read more</h6>\n" +
            "    </div>\n" +
            "\n" +
            "\n" +
            "</div>").attr('id', 'experience_' + count);


        $(experience).appendTo( $('#experience_section'));


    });

    // ---------- deleting education
    $('#education_section').on('click', '.delete_icon', function () {

        // deleting from DB with AJAX
        var parent=$(this).parent();
        var inst_id=parent.attr('id').split("_")[1];
        var id=$('.personal_info').attr('id');



        $.ajax({
            type: 'DELETE',
            url: '/profile/' + id,
            data: {inst_id:inst_id},
            success: function(){

                parent.remove();
                var j=1;
                $('.education').each(function(){  //after removin one/more assign new id values
                    $(this).attr('id', 'education_' + j);
                    j++;
                });

            },
            error:function(data){

            }



        });



    });

    // --------- deleting experience section

    $('#experience_section').on('click', '.delete_icon' ,function () {

        var parent=$(this).parent().parent();
        var comp_id=parent.attr('id').split("_")[1];
        var id=$('.personal_info').attr('id');


        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });



        // deleting from DB with AJAX

        $.ajax({
            type: 'DELETE',
            url: '/profile/' + id,
            data: {comp_id:comp_id},
            success: function(data){

            parent.remove();
            var j=1;
            $('.experience').each(function(){  //after removin one/more assign new id values
                $(this).attr('id', 'experience_' + j);
                j++;
            });

        },
        error:function(data){
            $('#msg').css('display','block');
            $('#msg').text('Error');
        }



    });





    });


    // ---------- editing profile

    $('#edit_btn').click(function(){
       $('input').prop('disabled', false);
       $('textarea').prop('disabled', false);
       $('#add_education').css('display', 'block');
       $('#add_experience').css('display', 'block');
       $('#save_btn').css('display', 'block');
       $('#cancel_btn').css('display', 'block');
       $('.delete_icon').css('display', 'inline');

       var ed_ids=[];  //ids for education
       $('.education').each(function () {
           ed_ids.push($(this).attr('id').split('_')[1]);
       });

       var exp_ids=[];
        $('.experience').each(function () {
            exp_ids.push($(this).attr('id').split('_')[1]);
        });



        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var id=$('.personal_info').attr('id');

        $('#profile_form').submit(function (e) {
            e.preventDefault();
            e.stopPropagation();
            var form = $(this);


            $.ajax({
                url: '/profile/' + id,
                type: 'POST',
                data: form.serialize() + "&ed_ids=" + ed_ids + + "&exp_ids=" + exp_ids,
                success: function (data) {

                    $('#name').val(data.name);
                    $('#email').val(data.email);
                    $('#position').val(data.position);
                    $('#sector').val(data.sector);
                    $('#phone_num').val(data.phone_num);
                    $('#bio_description').val(data.bio);



                    $('input').prop('disabled', true);
                    $('textarea').prop('disabled', true);

                    $('#add_education').css('display', 'none');
                    $('#add_experience').css('display', 'none');
                    $('#save_btn').css('display', 'none');
                    $('#cancel_btn').css('display', 'none');
                    $('.delete_icon').css('display', 'none');

                    $('#msg').css('display', 'block');
                    $('#msg').text("Profile saved.").delay(2000).fadeOut(1000);

                },
                error: function(data) {
                    $('#msg').css('display', 'block');
                    $('#msg').text("Error occured!").delay(2000).fadeOut(1000);


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





