$(document).ready(function () {
    $('#experience_section').on('click', '.current_work_chbox', function (e) {
        var id = $(e.target).attr('id').split('_')[2];
        if (document.getElementById('current_work_' + id).checked) {

            $(e.target).parent('div').parent('div').find('#to_period_experience_' + id).attr({
                'disabled': 'disabled',
                'type': 'text',
                'required': false
            });
            $(e.target).parent('div').parent('div').find('#to_period_experience_' + id).val("present");

            $(e.target).parent('div').parent('div').find('#to_period_experience_' + id).unbind("focus");
           // $(e.target).prop('checked', true);
            //console.log($(e.target).attr('id'));
        }
        else
            $(e.target).parent('div').parent('div').find('#to_period_experience_' + id).attr({
                'disabled': false,
                'type': 'date',
                'required': true
            });

        $(e.target).parent('div').parent('div').find('#to_period_experience_' + id).bind("focus");
        //$(e.target).prop('checked', false);
    });
});