function read_more(parent_child, description_element, parent){
    var bio=null;

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


};


function read_more_btn(parent){

    parent.on('click', '.read_more_btn', function(){
        $('.expand').val();
        $('.read_more_btn h6').html('read less');
        $(this).addClass('read_less_btn');
        $(this).removeClass('read_more_btn');

    });
}


function read_less_btn(){

    parent.on('click', '.read_less_btn', function(){
        $('.expand').val(sentences[0]+"."+sentences[1]+".");
        $('.read_less_btn h6').html('read more');
        $(this).addClass('read_more_btn');
        $(this).removeClass('read_less_btn');

    });
}





read_more($('.description_section .read_more_btn'), $('#bio_description'), $('.description_section'));
read_more($('.experience_div .read_more_btn'), $('#position_description'), $('.experience_div'));
read_more($('.details_section .read_more_btn'), $('#event_description'));