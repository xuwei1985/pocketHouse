<?php
use frontend\assets\AppAsset;

AppAsset::addCss($this,'@web/css/swiper.min.css');
AppAsset::addCss($this,'@web/js/photoswipe.css');
AppAsset::addCss($this,'@web/css/default-skin/default-skin.css');
AppAsset::addCss($this,'@web/css/house_detail.css?t='.time());
AppAsset::addScript($this,'@web/js/photoswipe.min.js');
AppAsset::addScript($this,'@web/js/photoswipe-ui-default.js');
AppAsset::addScript($this,'@web/js/swiper.min.js');
AppAsset::addScript($this,'@web/js/house_detail.js?t='.time());

$this->title = '楼盘详情';
?>

<div id="main_page" >
    <div class="house_summary">
        <h2 class="house_name">新西塘孔雀城</h2>
        <div class="album_prev">
            <img class="prev_img" src="../images/prev1.png" />
            <img class="album_icon" src="../images/tpj.png" />
        </div>

        <div class="price_info clearfix">
            <div class="price_left">
                <b>11000</b><span>元/㎡</span>
            </div>
            <div class="price_right clearfix">
                <div class="return_img"><img src="/images/logo_small.png" /></div>
                <div class="return_des">
                    <p>口袋返现</p>
                    <p class="return_price">2.5-6万/套</p>
                </div>
            </div>
        </div>

        <div class="house_info_primary">
            <ul class="clearfix">
                <li>
                    <img class="primary-icon" src="../images/dz.png" />
                    <span>嘉善县嘉善大道宏业路交叉口（嘉善高铁南站西一公里）)</span>
                    <img class="primary-arrow" src="../images/icon_arrow_right.png" />
                </li>
                <li>
                    <img class="primary-icon" src="../images/kfs.png" />
                    <span>嘉兴孔雀城房地产开发有限公司</span>
                    <img class="primary-arrow" src="../images/icon_arrow_right.png" />
                </li>
                <li>
                    <img class="primary-icon" src="../images/wy.png">
                    <span>幸福基业物业服务有限公司</span>
                    <img class="primary-arrow" src="../images/icon_arrow_right.png" />
                </li>
            </ul>
        </div>

        <div class="house_parameter clearfix">
            <ul>
                <li class="_23vTn">物业类型：<span class="_2lP1C">住宅</span></li>
                <li class="_23vTn">产权年限：<span class="_2lP1C">70年</span></li>
                <li class="_23vTn">预计交房：<span class="_2lP1C">时间待定</span></li></ul>
                <li class="_23vTn">建筑类型：<span class="_2lP1C">高层</span></li>
                <li class="_23vTn">建筑面积：<span class="_2lP1C">--</span></li>
                <li class="_23vTn">占地面积：<span class="_2lP1C">--</span></li></ul>
                <li class="_23vTn">容积率：<span class="_2lP1C">2</span></li>
                <li class="_23vTn">绿化率：<span class="_2lP1C">32%</span></li>
                <li class="_23vTn">规划户数：<span class="_2lP1C">1386</span></li>
                <li class="_23vTn">车位数：<span class="_2lP1C">1800</span></li></ul>
                <li class="_23vTn">装修类型：<span class="_2lP1C">精装修</span></li>
                <li class="_23vTn">物业费：<span class="_2lP1C">2.00元/平米/月</span></li>
            </ul>
        </div>

        <div class="house_flat">
            <div class="house_flat_title">
                <h2>主力户型</h2>
            </div>
            <ul class="house_flat_list">
                <li class="clearfix">
                    <div class="flat_img"><img alt="楼盘户型" src="//fs.fangdd.com/image/WPeGalQbikP5ggB3tbkZHD4qq_g.png?imageMogr2/thumbnail/!100x75r/format/jpg"></div>
                    <div class="flat_des"><p><b>90平米平层户型</b></p><p>3室2厅2卫&nbsp;90m²</p></div>
                    <div class="flat_price"><p><span>117</span>万起</p></div>
                </li>
                <li class="clearfix">
                    <div class="flat_img"><img alt="楼盘户型" src="http://fs.fangdd.com/image/QCo-lXV2WNZLdlai_gIdirF8wPA.jpg?imageMogr2/thumbnail/!100x75r/format/jpg"></div>
                    <div class="flat_des"><p><b>A1户型</b></p><p>q室2厅2卫&nbsp;110m²</p></div>
                    <div class="flat_price"><p><span>148</span>万起</p></div>
                </li>
                <li class="clearfix">
                    <div class="flat_img"><img alt="楼盘户型" src="http://fs.fangdd.com/image/0yQeGYKfLbEhsIQckhRL3BM2ePk.jpg?imageMogr2/thumbnail/!100x75r/format/jpg"></div>
                    <div class="flat_des"><p><b>B1户型</b></p><p>2室2厅2卫&nbsp;88m²</p></div>
                    <div class="flat_price"><p><span>97</span>万起</p></div>
                </li>
                <li class="clearfix">
                    <div class="flat_img"><img alt="楼盘户型" src="http://fs.fangdd.com/image/g6c10rNYYIBGpUs7jb3ChWMzw14.jpg?imageMogr2/thumbnail/!100x75r/format/jpg"></div>
                    <div class="flat_des"><p><b>C1户型</b></p><p>2室1厅2卫&nbsp;72m²</p></div>
                    <div class="flat_price"><p><span>80</span>万起</p></div>
                </li>
            </ul>
        </div>
    </div>
</div>

<div class="contact_bar">
    <div class="contact_logo">
        <img src="/images/logo_small.png">
        <p>口袋买房</p>
    </div>
    <div class="contact_button">
        <input id="btn_chat_online" type="button" class="btn-danger btn" value="在线沟通" />
        <a id="btn_chat_mobile" type="button" class="btn-success btn" href="tel:400-820-3349">电话联系</a>
    </div>
</div>



<!-- Root element of PhotoSwipe. Must have class pswp. -->
<div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">

    <!-- Background of PhotoSwipe.
         It's a separate element as animating opacity is faster than rgba(). -->
    <div class="pswp__bg"></div>

    <!-- Slides wrapper with overflow:hidden. -->
    <div class="pswp__scroll-wrap">

        <!-- Container that holds slides.
            PhotoSwipe keeps only 3 of them in the DOM to save memory.
            Don't modify these 3 pswp__item elements, data is added later on. -->
        <div class="pswp__container">
            <div class="pswp__item"></div>
            <div class="pswp__item"></div>
            <div class="pswp__item"></div>
        </div>

        <!-- Default (PhotoSwipeUI_Default) interface on top of sliding area. Can be changed. -->
        <div class="pswp__ui pswp__ui--hidden">

            <div class="pswp__top-bar">

                <!--  Controls are self-explanatory. Order can be changed. -->

                <div class="pswp__counter"></div>

                <button class="pswp__button pswp__button--close" title="Close (Esc)"></button>

                <button class="pswp__button pswp__button--share" title="Share"></button>

                <button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button>

                <button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button>

                <!-- Preloader demo http://codepen.io/dimsemenov/pen/yyBWoR -->
                <!-- element will get class pswp__preloader--active when preloader is running -->
                <div class="pswp__preloader">
                    <div class="pswp__preloader__icn">
                        <div class="pswp__preloader__cut">
                            <div class="pswp__preloader__donut"></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
                <div class="pswp__share-tooltip"></div>
            </div>

            <button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)">
            </button>

            <button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)">
            </button>

            <div class="pswp__caption">
                <div class="pswp__caption__center"></div>
            </div>

        </div>

    </div>

</div>
