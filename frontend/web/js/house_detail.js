$(function () {
    addEvent();
});

function addEvent() {
    $(".prev_img").click(function(){
        openPhotoSwipe();
    });

}

var openPhotoSwipe = function() {
    var pswpElement = document.querySelectorAll('.pswp')[0];

    // build items array
    var items = [
        {
            src: '../images/prev2.png',
            w: 496,
            h: 325,
            title: '小区图1',
        },
        {
            src: '../images/prev1.png',
            w: 496,
            h: 325,
            title: '小区图2',

        },
        {
            src: '../images/prev3.png',
            w: 496,
            h: 325,
            title: '小区图3',
        }
    ];

    // define options (if needed)
    var options = {
        // history & focus options are disabled on CodePen
        history: false,
        focus: false,

        showAnimationDuration: true,
        hideAnimationDuration: true

    };

    var gallery = new PhotoSwipe( pswpElement, PhotoSwipeUI_Default, items, options);
    gallery.init();
};
