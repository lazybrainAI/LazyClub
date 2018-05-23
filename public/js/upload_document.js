$(document).ready(function(){


    $('#document_upload_form').submit(function (e) {

        e.preventDefault();
        e.stopPropagation();


        var form = document.getElementById('document_upload_form');

        var form_data = new FormData();
        form_data.append('document', $('input[type=file]')[0].files[0] );

        $.ajax({

            url: '/documents' ,
            method:'POST',
            data:form_data,
            processData: false,
            contentType:false,

            success:function (data) {
                form.reset();
                $('#doc_uploaded').text(data.msg);




            },

            error:function(data){
                form.reset();
                $('#doc_uploaded').text(data.msg);

            }


        })



    });





});