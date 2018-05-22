$(document).ready(function(){

    
    // edit profile


    $('#profile_btn').click(function () {
        $('input').prop('disabled', false);

        $('textarea').prop('disabled', false);
        $('#add_education').css('display', 'block');
        $('#add_experience').css('display', 'block');
        $('#save_profile').css('display', 'block');
        $('#cancel_profile').css('display', 'block');
        $('.delete_icon').css('display', 'inline');

        $('#education_section').on('focus', 'input.from_period_education', function(){
           $(this).attr('type', 'date');
        });

        $('#education_section').on('focus', 'input.to_period_education', function(){
            $(this).attr('type', 'date');
        });

        $('#experience_section').on('focus', 'input.from_period_experience', function(){
            $(this).attr('type', 'date');
        });

        $('#experience_section').on('focus', 'input.to_period_experience', function(){
            $(this).attr('type', 'date');
        });



        $('#linkedin').off('click');





        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var id = $('.personal_info').attr('id');

        $('#profile_form').submit(function (e) {

    //  experience and education data

            var ed_ids = [];//ids for education

            $('.education').each(function () {
                var ed_id = $(this).attr('id').split('_')[1];
                ed_ids.push(ed_id);

            });

            $('.education input').each(function () {
                $(this).attr('name', $(this).attr('name') + "_" + $(this).parent().attr('id').split('_')[1]);
            });

            var exp_ids = [];
            $('.experience').each(function () {
                exp_ids.push($(this).attr('id').split('_')[1]);
            });

            $('.experience input').each(function () {
                $(this).attr('name', $(this).attr('name') + "_" + $(this).parent().parent().attr('id').split('_')[1]);
            });

            $('.experience textarea').each(function () {
                $(this).attr('name', $(this).attr('name') + "_" + $(this).parent().parent().attr('id').split('_')[1]);

            });

// ------------

            e.preventDefault();
            e.stopPropagation();

            var data = $('#profile_form').serializeArray();
            data.push({name: 'ed_ids', value: ed_ids});
            data.push({name: 'exp_ids', value: exp_ids});


            $.ajax({
                url: '/profile/' + id,
                type: 'PUT',
                data: data,
                success: function (data) {

                    if($('#twitter_input').val()==""){
                        $('#twitter').attr('href', '#');

                    }
                    else{
                        $('#twitter').attr('href', $('#twitter_input').val());

                    }
                    if($('#fb_input').val()==""){
                        $('#fb').attr('href', '#');

                    }
                    else{
                        $('#fb').attr('href', $('#fb_input').val());

                    }

                    if($('#ln_input').val()==""){
                        $('#linkedin').attr('href', '#');

                    }
                    else{
                        $('#linkedin').attr('href', $('#ln_input').val());

                    }



                    $('#ln_input').val("");
                    $('#twitter_input').val("");
                    $('#fb_input').val("");


                    $('input').prop('disabled', true);
                    $('textarea').prop('disabled', true);

                    $('#add_education').css('display', 'none');
                    $('#add_experience').css('display', 'none');
                    $('#save_profile').css('display', 'none');
                    $('#cancel_profile').css('display', 'none');
                    $('.delete_icon').css('display', 'none');

                    $('#msg').css('display', 'block');
                    $('#msg').text("Profile saved").delay(2000).fadeOut(1000);

                },
                error: function (data) {
                    $('#msg').css('display', 'block');
                    $('#msg').text("Error occured.").delay(2000).fadeOut(1000);


                    $('#ln_input').val("");
                    $('#twitter_input').val("");
                    $('#fb_input').val("");


                }

            });


        });


    });
    
    
    
    
    
});