$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $('#all_projects').on('click', '.delete_project', function (e) {
        if (confirm('Do you really want to delete this project?')) {
            e.preventDefault();
            e.stopPropagation();
            var deleteDiv =$(e.target).parent('div').attr('id').split('_')[3];

            console.log(deleteDiv);
            $.ajax({
                url: '/projects',
                type: 'DELETE',
                data: {id:deleteDiv},
                success: function (data) {
                    $('#' + deleteDiv).remove();
                    if (data.num_of_projects===0) {
                        $('#no_projects_at_the_moment').show();
                    }
                },
                error:
                    function (data) {
                    console.log(data);
                        alert("Something went wrong.");
                    }
            });
        }
    });
});
