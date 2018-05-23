$(document).ready(function () {

    $('#image_upload_form').submit(function (e) {

        e.preventDefault();
        e.stopPropagation();


        //user id
        var id = $('.personal_info').attr('id');

        var form = document.getElementById('image_upload_form');



        var form_data = new FormData();
        form_data.append('image', $('input[type=file]')[0].files[0]);

        $.ajax({


            url: '/profile/'+id,
            method:'POST',
            data:form_data,
            processData: false,
            contentType:false,

            success:function (data) {
                form.reset();

                $('#img_uploaded').text(data.msg);
            },

            error:function(data){
                $('#img_uploaded').text(data.msg);

            }


        })



    });



});