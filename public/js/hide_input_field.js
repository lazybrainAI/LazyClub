$(document).ready(function () {
    $('#experience_section').on('click', '.current_work_chbox', function (e) {
        var id = $(e.target).attr('id').split('_')[2];
        if(document.getElementById('current_work_'+id).checked){

            $(e.target).parent('div').parent('div').find('#to_period_experience_'+id).hide();
            $(e.target).parent('div').parent('div').find('#to_period_experience_'+id).attr('required', false);
        }
        else
            $(e.target).parent('div').parent('div').find('#to_period_experience_'+id).show();
            $(e.target).parent('div').parent('div').find('#to_period_experience_'+id).attr('required', true);
        //alert(hide_input);
    });



});