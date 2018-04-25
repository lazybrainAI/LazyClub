function loadFile(path, type){
    if (type=="js"){
        var fileref=document.createElement('script');
        fileref.setAttribute("type","text/javascript");
        fileref.setAttribute("src", path);
    }
    else {
        console.log("There is some error");
    }
    document.getElementsByTagName("head")[0].appendChild(fileref);
}

//loadFile("js/split_text.js", 'js');
//loadFile("js/read_more_btn.js", 'js');
loadFile("js/going_button.js", 'js');
loadFile("js/ungoing_btn.js", 'js');