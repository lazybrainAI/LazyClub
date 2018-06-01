$(document).ready(function(){

    //assigning ids to experience cards when there is still no info inputed by user

    var z = 1;
    $('.experience').each(function () {
        if ($(this).attr('id')==' ') {
            $(this).attr('id', 'experience_' + z);
        }
        z++;
    });


    $('.experience :input').each(function () {

        if($(this).attr('class')=='to_period_experience' ){
            $(this).attr('id', $(this).attr('id') + $(this).parent().parent().attr('id').split('_')[1]  );
        }

        if($(this).attr('name')=='current_work'){
            $(this).attr('name', $(this).attr('name') + "_" + $(this).parent().parent().parent().attr('id').split('_')[1]);
            $(this).attr('id', $(this).attr('id')+  $(this).parent().parent().parent().attr('id').split('_')[1] );

        }
        else {
            $(this).attr('name', $(this).attr('name') + "_" + $(this).parent().parent().attr('id').split('_')[1]);
        }

    });






    // adding experience on button click
    $('#add_experience').off('click').click(function () {


        var i=0;
        $('.experience').each(function () {
            if ($(this).attr('id')!='') {
                var id=$(this).attr('id').split('_')[1];
                if(id>i){
                    i=id;
                }
            }

        });


        i++;


        var id = "experience_" + i;

        var experience=document.createElement('div');
        experience.setAttribute('class', 'col-md-12 click_to_add experience');
        experience.setAttribute('id', id);

        experience.innerHTML=`<div class="experience_div" >

                                   <input name="company_position_${i}" id="position" placeholder="Position" autocomplete="off" required value="">
                                   <input name="company_name_${i}" id="company"  placeholder="Company" autocomplete="off" required value="">
                                   <input name="from_period_experience_${i}" class="from_period_experience" type="text" placeholder="From" autocomplete="off" required value="">
                                   <input name="to_period_experience_${i}" class="to_period_experience" type="text" placeholder="To" autocomplete="off" value="" id="to_period_experience_${i}">
                                  
                                   <div class="checkbox_div">
                                       <input type="checkbox"  name="current_work_${i}" id="current_work_${i}" class="current_work_chbox" style="vertical-align: middle;display: inline-block; margin-right: 2%;">
                                       <label for="current_work">Current work</label> 
                                   </div>
                                    
                                    <textarea name="description_${i}" rows="1" cols="80" maxlength="450" id="position_description" class="expand" required="required" placeholder="Experience description"></textarea>
                                    <a class="delete_icon delete_btn" style="display:block"><i class="far fa-trash-alt"></i></a>
                                   
                               
                                </div>
                                
                                `;



        $(experience).appendTo($('#experience_section'));


    });



    // deleting experience section

    $('#experience_section').off('click').on('click', '.delete_icon', function () {

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
                /*   var j = 1;
                $('.experience').each(function () {  //after removin one/more assign new id values
                    $(this).attr('id', 'experience_' + j);
                    j++;
                }); */

            },
            error: function (data) {
                $('#msg').css('display', 'block');
                $('#msg').text('Error');
            }


        });

    });




});