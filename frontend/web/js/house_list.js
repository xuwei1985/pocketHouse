var search_interval_handler=null;
var search_interval=450;

$(function () {
    init();
    addEvent();

})

function init() {
    // $(".ui-area-left,.ui-area-right").on('touchend', function (event) {
    //     event.stopImmediatePropagation();
    //     event.preventDefault();
    // });


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

    // 周期检查搜索框的值是否有变化，有变化则进行自动联想
    if (search_interval_handler != null) {
        clearInterval(search_interval_handler);
    }
    search_interval_handler = setInterval(function() {
        if($(".search_cancel").css("display")!="none"){
            var value = ($("input[type=search]").val() || "").trim();
            if(value && value.length > 0) {
                $("input[type=search]").change();
            } else {
                $("input[type=search]").val("").change();
            }
            doOnChange(value);
        }
    }, search_interval);
}

function addEvent() {
    $("input[type=search]").change(function () {
        doOnChange($(this).val());
    });

    $("#search_keywords").click(function () {
        $(".search_block").addClass("search_block_active");
    });

    $("#search_keywords").blur(function () {
        $(".search_block").removeClass("search_block_active");
    });

    $(".search_cancel").click(function () {
        $(".search_block").removeClass("search_block_active");
    });

    //pop ad
    $(".swiper-slide").click(function () {
            $(".mask").css("z-index",10002).fadeIn(400);
            $(".pop_ad").fadeIn(400);
        }
    );

    $(".ad_close").click(function () {
            $(".mask").fadeOut(400,function () {
                $(this).css("z-index",10000);
            });
            $(".pop_ad").fadeOut(400);
        }
    );


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



    $(".mask").on("click",function () {
        if($("pop_ad").css("display")=="block"){
            $(".mask").fadeOut(400,function () {
                $(this).css("z-index",10000);
            });
            $(".pop_ad").fadeOut(400);
        }
        else {
            $("body").removeClass("pop_modal");
            $(".search_block").removeClass("search_block_fixed");
            $(".choose_bar").removeClass("choose_bar_fixed");
            $(this).hide();
            $(".choose_panel").hide();
            $(".choose_bar li").find("a").removeClass("on");
        }
    });

}

//楼盘类型pannel显示与关闭
function toggleHouseTypePanel() {
    if($(".choose_house_type").css("display")=="none"){
        $(".mask").fadeIn(300,function () {
            $("body").addClass("pop_modal");
        });
        $(".search_block").addClass("search_block_fixed").fadeIn(300);
        $(".choose_panel").hide();
        $(".choose_bar").addClass("choose_bar_fixed").fadeIn(300);
        $(".choose_house_type").fadeIn(300);
    }
    else {
        $(".search_block").removeClass("search_block_fixed");
        $(".choose_bar li").find("a").removeClass("on");
        $(".choose_bar").removeClass("choose_bar_fixed");
        $(".choose_house_type").fadeOut(300);
        $(".mask").fadeOut(300,function () {
            $("body").addClass("pop_modal");
        });
    }
}

//楼盘户型pannel显示与关闭
function toggleHouseFlatPanel() {
    if($(".choose_house_flat").css("display")=="none"){
        $(".mask").fadeIn(300,function () {
            $("body").addClass("pop_modal");
        });
        $(".search_block").addClass("search_block_fixed").fadeIn(300);
        $(".choose_panel").hide();
        $(".choose_bar").addClass("choose_bar_fixed").fadeIn(300);
        $(".choose_house_flat").fadeIn(300);
    }
    else {
        $(".choose_bar li").find("a").removeClass("on");
        $(".search_block").removeClass("search_block_fixed");
        $(".choose_bar").removeClass("choose_bar_fixed");
        $(".choose_house_flat").fadeOut(300);
        $(".mask").fadeOut(300,function () {
            $("body").addClass("pop_modal");
        });
    }
}

//楼盘价格pannel显示与关闭
function toggleHousePricePanel() {
    if($(".choose_house_price").css("display")=="none"){
        $(".mask").fadeIn(300,function () {
            $("body").addClass("pop_modal");
        });
        $(".choose_panel").hide();
        $(".search_block").addClass("search_block_fixed").fadeIn(300);
        $(".choose_bar").addClass("choose_bar_fixed").fadeIn(300);
        $(".choose_house_price").fadeIn(300);
    }
    else {
        $(".choose_bar li").find("a").removeClass("on");
        $(".search_block").removeClass("search_block_fixed");
        $(".choose_bar").removeClass("choose_bar_fixed");
        $(".choose_house_price").fadeOut(300);
        $(".mask").fadeOut(300,function () {
            $("body").addClass("pop_modal");
        });
    }
}

//楼盘区域pannel显示与关闭
function toggleHouseAreaPanel() {
    if($(".choose_house_area").css("display")=="none"){

        $(".mask").fadeIn(300,function () {
            $("body").addClass("pop_modal");
        });
        $(".choose_panel").hide();
        $(".search_block").addClass("search_block_fixed").fadeIn(300);
        $(".choose_bar").addClass("choose_bar_fixed").fadeIn(300);
        $(".choose_house_area").fadeIn(300);
    }
    else {
        $(".choose_bar li").find("a").removeClass("on");
        $(".search_block").removeClass("search_block_fixed");
        $(".choose_bar").removeClass("choose_bar_fixed");
        $(".choose_house_area").fadeOut(300);
        $(".mask").fadeOut(300,function () {
            $("body").removeClass("pop_modal");
        });
    }
}

function doOnChange(val) {
    if ( val && val.length >0) {
        $(".search_cancel").text("搜索");
    } else {
        $(".search_cancel").text("取消");
    }
}