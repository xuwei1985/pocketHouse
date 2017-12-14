(function (win, $) {
    function Dialog(opt) {
        this._init(opt);
    }

    $.extend(Dialog.prototype, {
        /*
         title:标题
         content:内容
         dir:弹窗内容展示方向，目前只有居中
         btns:按钮内容，目前最多两个按钮
         fnClose:取消返回函数
         fnSure:确认返回函数
         */
        _init: function (opt) {
            this.option = {
                title: '标题',
                content: '内容',
                dir: 'center',
                btns: ['取消', '确认'],
                fnClose: function () {
                },
                fnSure: function () {
                }
            }
            $.extend(this.option, opt);
            this.creat();
            this.fnClose();
            this.fnSure();
        },
        creat: function () {
            this.oPop = $('<div class="ui-pop"></div>');
            this.oPop.removeClass('a-hide').addClass('a-show');
            var _btns = '';
            if (this.option.btns.length == 1) {
                _btns = '<a href="javascript:;" class="corange Js_sure">' + this.option.btns[0] + '</a>';
            } else if (this.option.btns.length == 2) {
                _btns = '<a href="javascript:;" class="Js_close">' + this.option.btns[0] + '</a><a href="javascript:;" class="corange Js_sure">' + this.option.btns[1] + '</a>';
            }
            var str = '<div class="ui-pop-warp">' +
                '<div class="ui-pop-head"><h2>' + this.option.title + '</h2></div>' +
                '<div class="ui-pop-body ui-tc">' + this.option.content + '</div>' +
                '<div class="ui-pop-foot">' + _btns + '</div>' +
                '</div>'
            this.oPop.html(str);
            this.oPop.appendTo('body');
            this.setDir();
        },
        setDir: function () {
            if (this.option.dir == 'center') {
                this.oPop.addClass('ui-center');
            }
        },
        fnClose: function () {
            var Js_close = this.oPop.find('.Js_close');
            var self = this;
            Js_close.on('click', function () {
                self.option.fnClose();
                self.oPop.removeClass('a-show').addClass('a-hide');
                setTimeout(function () {
                    self.oPop.remove();
                }, 500)
            });
        },
        fnSure: function () {
            var Js_sure = this.oPop.find('.Js_sure');
            var self = this;
            Js_sure.on('click', function () {
                self.option.fnSure();
            });
        }
    });

    win.Dialog = Dialog;
})(window, jQuery);
