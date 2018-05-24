$(document).ready(function () {
    $("#bio_description").keyup(function () {
        chars_change($("#bio_description"), $("#char_count"), $('#char_count_p'))
    });
    $("#bio_description").blur(function () {
        hideElement($('#char_count_p'))
    });
    $('#event_description').keyup(function () {
        chars_change($('#event_description'), $('#char_count_event'), $('#char_count_event_p'));
    });
    $("#event_description").blur(function () {
        hideElement($('#char_count_event_p'))
    });
    $('#project_description').keyup(function () {
        chars_change($('#project_description'), $('#char_count_project'), $('#char_count_project_p'));
    });
    $("#project_description").blur(function () {
        hideElement($('#char_count_project_p'))
    });
});



function chars_change(myText, wordCount, paragraph) {
    paragraph.show();
    var characters = myText.val().split('');
    wordCount.html(characters.length);
    if (characters.length > 191) {
        myText.value = myText.value.substring(0, 191);
        wordCount.innerText = 191;
    }
}

function hideElement(element_id) {
    element_id.hide();

}
