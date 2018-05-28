function resizable (el) {
    var int = 8.8;
    function resize() {el.style.width = ((el.value.length+1) * int) + 'px'}
    var e = 'keyup,keypress,focus,blur,change'.split(',');
    for (var i in e) el.addEventListener(e[i],resize,false);
    resize();
}
resizable(document.getElementById('name'));
resizable(document.getElementsByClassName('from_period_experience'));
resizable(document.getElementsByClassName('to_period_experience'));
