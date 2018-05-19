$(document).ready(function () {
    $('#add_new_event_form').submit(function (e) {
        e.preventDefault();
        e.stopPropagation();
        var formEvents = $('#add_new_event_form');
        $.ajax({
            url: '/events',
            type: 'POST',
            data: formEvents.serialize(),
            success: function (data) {
                $('.event_saved').addClass('allgood').text('Event successfully created.').show().delay(2000).fadeOut(1000);
                var div = document.createElement('div');
                var id = data.event_id;
                div.setAttribute('class', 'col-sm-4 padding_left');
                div.setAttribute('id', id);
                div.innerHTML = `
        <div class="p_e_card" id="p_e_card_${data.event_id}">
            <div class="p_e_img" id="p_e_img_${data.event_id}">
                <button type="button" class="delete_event close" id="delete_event">&times;</button>
                <h5 class="section_title">${data.name}</h5>
            </div>
            <div class="p_e_info">
                <p>${data.description}</p>
                <div class="see_more_btn">
                    <a href="/event/${data.name}"><h6 class="h7">View more</h6></a>
                </div>
                <div class="see_more_btn">
                    <a href="/event/${data.name}"><h6 class="h7">Attend</h6></a>
                </div>
                <div class="see_more_btn" id="see_more_btn_location">
                    <h6 class="h7"><i class="fa fa-map-marker"></i> ${data.location}</h6>
                </div>
            </div>
        </div>`;
                $('#no_events_at_the_moment').hide();
                $(div).appendTo($('.all_events'));
                document.getElementById('add_new_event_form').reset();
            },
            error:
                function (data) {
                console.log(data);
                    $('.event_saved').addClass('notallgood').text('Event name already taken or date is invalid').show().delay(2000).fadeOut(1000);
                }
        });
    });
});

