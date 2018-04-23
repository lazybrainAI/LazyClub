function read_more(parent_child, description_element, parent){
    var bio=null;

    text_area_value(description_element.val()); //text area value before splitting

    if(description_element.length && parent_child.length)
    {
        bio=description_element.val();
        var sentences=bio.split('.');
        if (sentences.length > 2) {
            description_element.val(sentences[0] + "." + sentences[1]);
            parent_child.css('display', 'block');

        }
        else {
            for (var i = 0; i < sentences.length; i++) {
                description_element.val(description_element.val()+sentences[i]+".");

            }
        }

    }

    text_area_value_after(description_element.val()); //text area value before splitting



};

function text_area_value(text){
    var text_value=text;
    return text_value;
}

function text_area_value_after(text){
    var text_value=text;
    return text_value;
}


read_more($('.description_section .read_more_btn'), $('#bio_description'), $('.description_section'));
read_more($('#experience_div .read_more_btn'), $('#position_description'), $('#experience_div'));
read_more($('.details_section .read_more_btn'), $('#event_description'));