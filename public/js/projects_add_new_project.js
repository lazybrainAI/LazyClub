$(document).ready(function () {
    $('#add_new_project_form').submit(function (e) {
        e.preventDefault();
        e.stopPropagation();
        var projectsForm = $('#add_new_project_form');
        $.ajax({
            url: '/projects',
            type: 'POST',
            data: projectsForm.serialize(),
            success: function (data) {
                $('.project_saved').addClass('allgood').text('Project successfully created.').show().delay(2000).fadeOut(1000);
                document.getElementById('add_new_project_form').reset();
                var div = document.createElement('div');
                div.setAttribute('class', 'col-sm-4 padding_left');
                div.innerHTML = `<a href="/${data.name}">
<div class="p_e_card">
            <div class="p_e_img">

                <h5 class="section_title">${data.name}</h5>
                <ul>
                    <li>
                        <img class="profile_img" src=""/>
                    </li>
                    <li>
                        <img class="profile_img" src=""/>
                    </li>
                </ul>
            </div>
            <div class="p_e_info">
                <p>${data.description} </p>
                <div class="see_more_btn">
                    <a href="/" style="text-decoration: none;"><h6 class="h7">view
                            project</h6></a>
                </div>
            </div>
        </div>
    </div>
</a>`;

                $(div).appendTo($('#all_projects'));


            },
            error: function (data) {
                console.log(data);
                $('.project_saved').addClass('notallgood').text('Project name already taken or start/end date is invalid.').show().delay(2000).fadeOut(1000);
            }
        });
    });
});