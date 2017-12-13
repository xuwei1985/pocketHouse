/**
 * 弹屏广告
 */
(function () {

    var ckName = "AD_POP_UP",
        ckTime = null,
        popAds = null,
        popOld = null,
        popDep = 2;

    /**
     * 获取已经弹过的广告列表
     * @returns {[int]}
     */
    function getPopAds() {
        if (popAds) {
            return popAds;
        }
        popAds = getCookie(ckName);
        if (popAds && popAds === "close") {
            // 兼容旧的弹屏广告状态
            popAds = [];
            popOld = 329;
            addCookie(ckName, "", -1);
        } else if (popAds) {
            popAds = popAds.split("_");
        } else {
            popAds = [];
        }
        return popAds || [];
    }

    /**
     * 弹屏广告 ad 已弹出
     * @param {Object} ad
     */
    function updatePopAds(ad) {
        if ( ! ad) {
            return;
        }
        var adid = ad.id,
            diffTime = ckTime - (new Date()).getTime();
        if (diffTime > 0) {
            diffTime = diffTime / 3600000;
        }
        if (popAds.indexOf(adid) < 0) {
            popAds.push(adid);
            // 限制深度
            if (popAds.length > popDep) {
                popAds.splice(0, popAds.length - popDep);
            }
            addCookie(ckName, popAds.join("_"), diffTime);
        }
    }

    /**
     * 判断广告 ad 是否已经弹屏
     * @param {Object} ad
     * @returns {boolean|null}
     */
    function isPopup(ad) {
        if ( ! ad) {
            return null;
        }
        var adpos = ad.position,
            adid = ad.id + "",
            popAds = getPopAds();

        if (adpos == popOld) {
            // 兼容旧的弹屏广告状态
            updatePopAds(ad);
            return true;
        } else if (popAds.length > 0) {
            for (var i = 0; i < popAds.length; i++) {
                if (popAds[i] == adid) {
                    return true;
                }
            }
        }
        return false;
    }

    /**
     * 从广告列表 adList 中找到可以弹屏的广告
     * @param {[{id, position, validEndTime}]} adList
     * @returns {{}|null}
     */
    function getPopupAd(adList) {
        adList || (adList = []);
        for (var i = 0; i < adList.length; i++) {
            var ad = adList[i];
            if ( ! ckTime || ad.validEndTime > ckTime) {
                ckTime = ad.validEndTime;
            }
            if ( ! isPopup(ad)) {
                return ad;
            }
        }
    }

    function popupAd(ad) {
        var ori = '<div class="ui-pop ui-center"><div class="ui-list-bunner">'
            + '<div class="ui-pop-colse"><i class="ic-close"></i></div>'
            + '<a href="{targetUrl}" data-fa=""><img src="{resourceUrl}" alt=""></a>'
            + '</div></div>',
            str = String(ori),
            rex = new RegExp("{([a-zA-Z0-9]+)}", "g"),
            matched, fname, name, value;
        while ((matched = rex.exec(ori)) != null) {
            fname = matched[0];
            name = matched[1];
            value = ad[name] || "";
            str = str.replace(fname, value);
        }

        var $dom = $(str).appendTo(document.body);
        $("i.ic-close", $dom).click(function() {
            $dom.hide().remove();
        });
        updatePopAds(ad);
    }

    function PPAD() {
        this.adList = [];
        for (var i = 0; i < arguments.length; i++) {
            var ad = arguments[i];
            if (typeof ad === "string") {
                ad = JSON.parse(ad);
            }
            if ($.isArray(ad)) {
                $.extend(this.adList, ad);
            } else {
                this.adList.push(ad);
            }
        }
    }

    PPAD.prototype.init = function() {
        var ad = getPopupAd(this.adList);
        if (ad) {
            popupAd(ad);
        }
    };

    window.PPAD = PPAD;
})();

