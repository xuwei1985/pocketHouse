function addEvent() {
    $("input").change(function () {
        doOnChange($input.val());
    });

    $(".choose_bar li").click(function () {
        $(".choose_bar li").find("a").removeClass("on");
        $(this).find("a").toggleClass("on");
    });

    //类型点击事件
    $(".choose_type").click(function () {
        toggleHouseTypePanel();
    });

    $("#choose_block").on("click",".choose_house_type li",function () {
        toggleHouseTypePanel();
    });

    //户型点击事件
    $(".choose_flat").click(function () {
        toggleHouseFlatPanel();
    });

    $("#choose_block").on("click",".choose_house_flat li",function () {
        toggleHouseFlatPanel();
    });

    //价格点击事件
    $(".choose_price").click(function () {
        toggleHousePricePanel();
    });

    $("#choose_block").on("click",".choose_house_price li",function () {
        toggleHousePricePanel();
    });

    //区域点击事件
    $(".choose_area").click(function () {
        toggleHouseAreaPanel();
    });

    $("#choose_block").on("click",".ui-area-right li",function () {
        toggleHouseAreaPanel();
    });

    $(".choose_house_area").on("click",".ui-area-left li",function () {
        $(".ui-area-left li").removeClass("on");
        $(this).addClass("on");
    });
}

//楼盘类型pannel显示与关闭
function toggleHouseTypePanel() {
    if($(".choose_house_type").css("display")=="none"){
        $(".choose_panel").hide();
        $(".choose_bar").addClass("choose_bar_fixed");
        $(".choose_house_type").fadeIn(300);
        $(".mask").fadeIn(300);
    }
    else {
        $(".choose_bar li").find("a").removeClass("on");
        $(".choose_bar").removeClass("choose_bar_fixed");
        $(".choose_house_type").fadeOut(300);
        $(".mask").fadeOut(300);
    }
}

//楼盘户型pannel显示与关闭
function toggleHouseFlatPanel() {
    if($(".choose_house_flat").css("display")=="none"){
        $(".choose_panel").hide();
        $(".choose_bar").addClass("choose_bar_fixed");
        $(".choose_house_flat").fadeIn(300);
        $(".mask").fadeIn(300);
    }
    else {
        $(".choose_bar li").find("a").removeClass("on");
        $(".choose_bar").removeClass("choose_bar_fixed");
        $(".choose_house_flat").fadeOut(300);
        $(".mask").fadeOut(300);
    }
}

//楼盘价格pannel显示与关闭
function toggleHousePricePanel() {
    if($(".choose_house_price").css("display")=="none"){
        $(".choose_panel").hide();
        $(".choose_bar").addClass("choose_bar_fixed");
        $(".choose_house_price").fadeIn(300);
        $(".mask").fadeIn(300);
    }
    else {
        $(".choose_bar li").find("a").removeClass("on");
        $(".choose_bar").removeClass("choose_bar_fixed");
        $(".choose_house_price").fadeOut(300);
        $(".mask").fadeOut(300);
    }
}

//楼盘区域pannel显示与关闭
function toggleHouseAreaPanel() {
    if($(".choose_house_area").css("display")=="none"){
        $(".choose_panel").hide();
        $(".choose_bar").addClass("choose_bar_fixed");
        $(".choose_house_area").fadeIn(300);
        $(".mask").fadeIn(300);
    }
    else {
        $(".choose_bar li").find("a").removeClass("on");
        $(".choose_bar").removeClass("choose_bar_fixed");
        $(".choose_house_area").fadeOut(300);
        $(".mask").fadeOut(300);
    }
}

function doOnChange(val) {
    if ( ! val || val.length >0) {
        // $btnSearch.text("取消");
    } else {
        // $btnSearch.text("搜索");
    }
}

$(function () {
    var swiper = new Swiper('.swiper-container', {
        slidesPerView: 1,
        spaceBetween: 0,
        loop: true,
        autoplay: {
            delay: 2500,
            disableOnInteraction: false,
        },
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
    });

    addEvent();
})