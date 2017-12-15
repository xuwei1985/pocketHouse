$(function () {
    addEvent();
});

function addEvent() {
    $(".prev_img").click(function(){
        $("body").laod("/house_album");
    });


}