$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $('#review_form').submit(function (e) {
        var name=$('#event').text();
        e.preventDefault();
        e.stopPropagation();
        var form = $(this).serialize();
        $.ajax({
            url: '/event/'+name,
            type: 'POST',
            data: form,
            success: function (data) {
                document.getElementById('review_form').reset();

                var review=document.createElement('div');
                review.setAttribute('class', 'col-md-4 col-sm-6');

                review.innerHTML=`<div class="review">
                                    <div id="review_posted">                  
                                    <p>${data.name}</p> 
                                    </div>
                                      <div class="review_text">
                                         <textarea placeholder="Your note" id="description" name="description">${data.description}</textarea>
                                      </div>
                                   </div>`;

                $(review).appendTo($('.review_section .row'));


                console.log('sucess');
            },
            error: function (data) {
                console.log('error');
            }
        });
    });
});