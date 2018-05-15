$(document).ready(function () {

    $('#project_btn').click(function(){

        $('#save_project').css('display', 'block');
        $('#cancel_project').css('display', 'block');
        $('input').prop('disabled', false);
        $('select').prop('disabled', false);
        $('textarea').prop('disabled', false);

        var name= $('#project').text();
        var form=$('#project_form');

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(form).submit(function (e) {

            e.preventDefault();
            e.stopPropagation();

            $.ajax({

                url:'/project/'+name,
                type:'PUT',
                data:form.serialize(),

                success:function (data) {
                    $('#save_project').css('display', 'none');
                    $('#cancel_project').css('display', 'none');
                    $('input').prop('disabled', true);
                    $('select').prop('disabled', true);
                    $('textarea').prop('disabled', true);



                    //  $('.msg').text(data.name);
                },
                error:function(data){
                    console.log("error");

                }

            });

        });


    });



});