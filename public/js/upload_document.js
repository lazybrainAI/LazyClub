$(document).ready(function(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('#document_upload_form').submit(function (e) {

        e.preventDefault();
        e.stopPropagation();


        var form = document.getElementById('document_upload_form');

        var form_data = new FormData();
        form_data.append('document', $('input[type=file]')[0].files[0] );
        form_data.append('title', $('#title').val());
        form_data.append('project', $('#project').val());


        $.ajax({

            url: '/document' ,
            method:'POST',
            data:form_data,
            processData: false,
            contentType:false,

            success:function (data) {
                form.reset();

                var div=document.createElement('div');
                $(div).addClass('col-md-3');
                $(div).addClass('col-sm-6');

                div.innerHTML=` <a href="${data.link}" target="_blank">
                                <div class="document">
                                <h6 id="doc_name">${data.name}</h6>
                                <h6 class="h7" id="doc_date_created">${data.date}</h6>
                                </div> 
                                </a>`

                $(div).appendTo($('.all_documents_section .row'));

                //
                var elementExists = document.getElementById("no_docs");
                if(elementExists){
                    $('#no_docs').remove();
                }



                $('#doc_uploaded').addClass('allgood').removeClass('notallgood').text('Your document has been uploaded!').show().delay(2000).fadeOut(1000);

                console.log(data);


            },

            error:function(data){
               // form.reset();
                // $('#doc_uploaded').text(data);
                $('#doc_uploaded').addClass('notallgood').removeClass('allgood').text('Document must be pdf or smaller file.').show().delay(2000).fadeOut(1000);
                console.log(data);
            }


        })



    });





});