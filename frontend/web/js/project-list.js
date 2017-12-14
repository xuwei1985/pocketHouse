/**
 * @author LianYupeng
 * @createtime 2015/10/19
 * @copyright Copyright (c) 2011-2013年 深圳市房多多网络科技有限公司. (http://www.fangdd.com)
 */
(function () {
    _.templateSettings = {
        evaluate : /<\?([\s\S]+?)\?>/g,
        interpolate : /<\?=([\s\S]+?)\?>/g,
        escape : /<\?-([\s\S]+?)\?>/g
    };

    // 楼盘搜索组件
    $.fn.HouseSearchWidget = function (config) {
        var $holder = $(this),
            widget = $holder.prop("__widget__");
        if (widget == null) {
            widget = new __construct();
            $holder.prop("__widget__", widget);
        }

        if (config && typeof config === "string") {
            if (typeof widget[config] === "function") {
                return widget[config].apply(widget, [].slice.call(arguments, 1));
            } else {
                return widget[config];
            }
        }

        function __construct() {
            var $top = $(">.ui-head", $holder),
                $history = $(".area-search-record", $holder),
                $noHistory = $(".area-search-no-record", $holder),
                $think = $(".area-search-think", $holder),
                $noThink = $(".area-search-no-results", $holder),
                $input = $holder.find("input[type=search].search-inp"),
                $btnSearch = $(".search-btn", $holder),
                storage = new SimpleStorage(),
                last_search = getQueryParam("keyword"), // 最后进行搜索的关键词
                last_think = "",        // 最后进行联想的关键词
                last_think_result,
                hit_think_length = 1,   // 触发联想的最小关键字长度
                think_interval = 1000,  // 进行自动联想的时间间隔
                think_interval_handler, // 进行自动联想的间隔句柄
                maxSearchHistory = 10,  // 搜索历史最多保存多少条
                oldScrollY = 0;

            $holder.on("touchstart", function($e) {
                if ($e.target != $input[0]) {
                    $input.blur();
                }
            });

            // 搜索输入联想事件
            $input.change(function () {
                doOnChange($input.val());
            });

            // 触发搜索事件
            $input.on("keyup", function(e) {
                if ((e.keyCode || e.charCode) === 13) {
                    var value = ($(this).val() || "").trim();
                    $input.val(value);

                    search(value);

                    e.stopImmediatePropagation();
                    return false;
                } else {
                    var val = $input.val() || "",
                        trim_val = val.trim();
                    if (trim_val !== val) {
                        $input.val(trim_val);
                        e.stopImmediatePropagation();
                        e.preventDefault();
                        return false;
                    }
                }
            });

            // 清空搜索框
            $holder.find(".ic-search-close").click(function() {
                $input.val("").change();
                scrollerWidth();
            });

            // 交互事件
            $history.css("max-height", window.innerHeight - $top.height() - 50 + "px");

            $btnSearch.on("click touchend", function(e) {
                try {
                    searchOrHide();
                } catch (e) {
                    console.log(e);
                }
                e.preventDefault();
                e.stopImmediatePropagation();
                return false;
            });

            this.show = show;
            this.hide = hide;

            function doOnChange(val) {
                if ( ! val || val.length < hit_think_length) {
                    $btnSearch.text("取消");
                    // 搜索历史记录
                    var history = getSearchHistory();
                    // 无搜索历史
                    if ( ! history || ! (history.length > 0)) {
                        only_show($noHistory);
                    } else {
                        if ( ! $history.is(":visible")) {
                            // 渲染搜索历史
                            var $ul = $history.find("ul").empty();
                            $.each(history, function(ind, value) {
                                $ul.append("<li class='ui-border-b'><a>" + value + "</a></li>");
                            });
                            $ul.find(">li").click(function(e) {
                                // 单击搜索记录 -- 立即搜索
                                search($(this).text().trim());
                                e.preventDefault();
                                e.stopImmediatePropagation();
                                return false;
                            });

                            // 清除搜索记录
                            var $clearLi = $("<li class='btn btn-link btn-clear'><a href='javascript:void(0);'>清除搜索记录</a></li>");
                            $ul.append($clearLi);
                            $clearLi.click(function() {
                                cleanSearchHistory();
                                $ul.empty();
                                only_show($noHistory);
                            });

                            only_show($history);
                        }
                    }
                } else {
                    // 联想
                    $btnSearch.text("搜索");
                    think(val);
                }
            }

            // 关键词联想
            function think(value) {
                if ( ! value || value.length < hit_think_length) {
                    // 还没有输入搜索词 或 搜索词长度小于触发要求
                    only_show($history);
                    return;
                } else if (value === last_think) {
                    // 或者搜索词没有变化
                    if (last_think_result) {
                        only_show($think);
                    } else {
                        only_show($noThink);
                    }
                    return;
                }

                // 后台请求联想接口
                last_think = value;
                do_think({keyword: value}, function(result) {
                    var searchId = Math.ceil((new Date()).getTime() * 1000 + Math.random() * 10 + Math.random() * 100 + Math.random() * 1000),
                        searchType = "T";
                    if (typeof FA.trackEvent === "function") {
                        FA.trackEvent("mss002", {
                            keyword: value, searchId: searchId, searchType: searchType
                        });
                    }

                    if ($.isEmptyObject(result)) {
                        // 无联想结果
                        last_think_result = null;
                        $noThink.find("strong").text(last_think);
                        only_show($noThink);
                    } else {
                        var data = result.data;
                        data.searchId = searchId;
                        data.searchType = searchType;
                        data.keyword = value;

                        last_think_result = data;
                        rendorThinkResult(data);
                        only_show($think);
                    }
                }, function() {
                    // 无联想结果
                    last_think_result = null;
                    $noThink.find("strong").text(value);
                    only_show($noThink);
                });
            }

            function rendorThinkResult(data) {
                var tmpl = _.template($think.find("script").html(), {variable: 'data'});
                $think.find(":not(script)").remove();
                $think.append(tmpl(data));
            }

            // 搜索
            function search(value) {
                value = String(value);

                hide();

                if (value === last_search) {
                    // 搜索词无变化
                    return;
                }

                // 统计：搜索按钮点击量
                if (typeof FA.trackEvent === "function") {
                    FA.trackEvent("mss003", {keyword: value});
                }

                // 后台请求搜索接口
                last_search = value;
                addSearchHistory(value);
                // 构造URL，刷新页面
                if ( ! window.isFlatListPage) {
                    location.href = location.pathname.replace(/(\/xf\/\w+\b).*/, "$1/loupan") + "?keyword=" + value;
                } else {
                    location.href = location.pathname.replace(/(\/xf\/\w+\b).*/, "$1/huxing") + "?keyword=" + value;
                }
            }

            function show(value) {
                $holder.show();
                oldScrollY = window.scrollY;
                window.scrollTo(window.scrollX, 0);
                $(".ui-main, div.list-bunner").hide();
                only_show();
                $input.focus();
                if (value == null) {
                    value = ($input.attr("value") || "").trim();
                }
                if(value && value.length > 0) {
                    $input.val(value).change();
                } else {
                    $input.val("").change();
                }

                // 周期检查搜索框的值是否有变化，有变化则进行自动联想
                if (think_interval_handler != null) {
                    clearInterval(think_interval_handler);
                }
                think_interval_handler = setInterval(function() {
                    var val = $input.val();
                    if (val === last_think) return;
                    doOnChange(val);
                }, think_interval);
            }

            function hide() {
                $holder.hide();
                $(".ui-main, div.list-bunner").show();
                window.scrollTo(window.scrollX, oldScrollY);
                clearInterval(think_interval_handler);
                think_interval_handler = null;
            }

            function getSearchHistory() {
                var history = storage.get("search_history");
                if (history) {
                    history = history.split("; ");
                    while (history.length > maxSearchHistory) {
                        history.pop();
                    }
                } else {
                    history = [];
                }
                return history;
            }

            function addSearchHistory(value) {
                if ( ! value) return;
                value = htmlencode(value);
                var history = getSearchHistory(),
                    curPos = history.indexOf(value);
                if (curPos > -1) {
                    // 置顶：删除当前存在的，避免重复添加
                    history.splice(curPos, 1);
                }
                history.splice(0, 0, value);
                while (history.length > maxSearchHistory) {
                    history.pop();
                }
                storage.set("search_history", history.join("; "));
            }

            function cleanSearchHistory() {
                storage.del("search_history");
            }

            // 只显示指定的 元素
            function only_show() {
                $(">*:not(.ui-head)", $holder).hide();
                if (arguments.length > 0) {
                    for (var i = 0; i < arguments.length; ++i) {
                        $(arguments[i]).show();
                    }
                }
            }

            function searchOrHide() {
                if ($btnSearch.text() !== "取消") {
                    search($input.val().trim());
                } else {
                    $(".search-warp").HouseSearchWidget("hide");
                    $(".search-inp").blur();
                }
            }
        }
    };

    function SimpleStorage(useCookie) {
        function cookie_get(name) {
            if (!name || !(name.length > 0)) {
                return undefined;
            }
            var cookies = document.cookie.split(/\s*;\s*/),
                value = undefined;
            name = encodeURIComponent(name);
            for (var i = 0; i < cookies.length; ++i) {
                if (cookies[i].indexOf(name + "=") > -1) {
                    value = cookies[i].substr(name.length + 1);
                    value = decodeURIComponent(value || "");
                    break;
                }
            }
            return value;
        }

        function cookie_set(name, value, days, domain, path) {
            var expires;

            if (days && days > 0) {
                var date = new Date();
                date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
                expires = "; expires=" + date.toGMTString();
            } else if (days < 0) {
                expires = "; expires=" + (new Date()).toGMTString();
            } else {
                expires = "";
            }

            if (!path) {
                path = "/";
            }

            document.cookie = encodeURIComponent(name) + "=" + encodeURIComponent(value)
                + expires + ";path=" + path + (domain ? (";" + domain) : "");
        }

        function cookie_del(name) {
            cookie_set(name, "", -1);
        }

        if (!(this instanceof SimpleStorage)) {
            return;
        }

        // 强制使用 cookie 或 客户端不支持 localStorage
        if (useCookie === true || !window.localStorage) {
            this.get = cookie_get;
            this.set = cookie_set;
            this.del = cookie_del;
        }
        // 使用 localstorage
        else {
            this.get = function (name) {
                if (localStorage[name] != null) {
                    return localStorage[name];
                } else {
                    return localStorage.getItem(name);
                }
            };
            this.set = function (name, value) {
                return localStorage.setItem(name, value);
            };
            this.del = function(name) {
                localStorage.setItem(name, null);
                delete localStorage[name];
            };
        }
    }

    function rpc(url, data, settings) {
        var _settings = $.extend({
            method: "POST",
            beforeSend: function() {
            },
            complete: function() {
            },
            success: function(result, textStatus, jqXHR) {
                if ( ! result || result.error == true) {
                    var message = (result || {}).message || "返回结果为空";
                    if (typeof settings.on_failed === "function") {
                        settings.on_failed.call(jqXHR, message, result);
                    }
                } else {
                    if (typeof settings.on_success === "function") {
                        settings.on_success.call(jqXHR, result, textStatus, jqXHR);
                    }
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                var message = "[" + textStatus + "] " + errorThrown;
                if (typeof settings.on_failed === "function") {
                    settings.on_failed.call(jqXHR, message);
                }
            }
        }, settings);

        if (_settings.data == null) {
            _settings.data = data;
        }

        $.ajax(url, _settings);
    }

    function do_think(params, cb_ok, cb_failed) {
        var url = (window.GLOBAL_DATA.baseURL || "/") + "h5/project/think";
        rpc(url, params, {
            on_success: cb_ok,
            on_failed:  cb_failed
        });
    }

    // 楼盘 加载 与 渲染
    var $head = $("header.head");

    // 搜索框

    $("#hit-search-keywords, #show-search-keywords").click(function () {
        var keyword = $("#hit-search-keywords").val();
        if((!keyword || keyword == "") && window.GLOBAL_DATA.defaultHotKeyWords != '') {
            $(".search-warp").HouseSearchWidget("show", window.GLOBAL_DATA.defaultHotKeyWords);
        } else {
            $(".search-warp").HouseSearchWidget("show");
        }
        scrollerWidth();
    });

    $(".area-search-think").height(window.innerHeight - $head.height());

    // 广告

    var $bunner = $(".list-bunner"),
        $ad_lis = $("ul>li", $bunner),  // 广告 LI 元素
        ad_size = $ad_lis.size();           // 广告个数

    if (ad_size > 1) {
        new Swiper($bunner, {
            pagination: '.swiper-pagination',
            loop:true,
            paginationClickable: true,
            spaceBetween: 0,
            autoplay: 3000
        });
    }

    function scrollerWidth() {
        var scrollerWidth = $(window).width();
        $("#hot-keywords-scroller dd").each(function() {
            scrollerWidth += $(this).width();
        });
        $("#hot-keywords-scroller").width(scrollerWidth);
    }
})();