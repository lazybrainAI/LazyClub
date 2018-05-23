$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $('#project_review_form').submit(function (e) {
        var name=$('#project').text();
        e.preventDefault();
        e.stopPropagation();
        var form = $(this).serialize();
        $.ajax({
            url: '/project/'+name,
            type: 'POST',
            data: form,
            success: function (data) {

                var name=data.name + " "+data.surname;

               var review=document.createElement('div');
               review.setAttribute('class', 'col-md-4 col-sm-6');
               review.innerHTML=`<div class="review">
                                    <div id="review_posted">                  
                                    <p>${name} </p> 
                                    </div>
                                      <div class="review_text">
                                         <textarea placeholder="Your note" id="description" name="description">${data.description}</textarea>
                                      </div>
                                   </div>`;

                $(review).appendTo($('.review_section .row'));

                var elementExists = document.getElementById("reviews_msg");
                if(elementExists){
                    $('#reviews_msg').remove();
                }

                document.getElementById('project_review_form').reset();
                $('#review_sent').text("Review has been saved.").show().delay(2000).fadeOut(1000);

            },
            error: function (data) {
                $('#review_sent').text("Error!").show().delay(2000).fadeOut(1000);

            }
        });
    });
});