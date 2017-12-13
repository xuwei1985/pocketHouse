<?php
use frontend\assets\AppAsset;
AppAsset::addScript($this,'@web/js/house_list.js?t='.time());
AppAsset::addScript($this,'@web/js/swiper.min.js');
AppAsset::addCss($this,'@web/css/swiper.min.css');
AppAsset::addCss($this,'@web/css/house_list.css?t='.time());

$this->title = '全部楼盘';
?>
<div id="main_page" >
    <!-- Swiper -->
    <div class="swiper-container">
        <div class="swiper-wrapper">
            <div class="swiper-slide"><img src="https://fsxf.fangdd.com/xfcms/Fm4tLv3aGyJjnLYD-tw9G-zXLMRw.jpg" width="100%" /></div>
            <div class="swiper-slide"><img src="https://fsxf.fangdd.com/xfcms/FrW-w6PNE_UioWn18RzFiN_1_ljv.jpg" width="100%" /></div>
            <div class="swiper-slide"><img src="https://fsxf.fangdd.com/xfcms/FntmyQngCAeoW2h_SQWgCZCXsPXu.jpg" width="100%" /></div>
            <div class="swiper-slide"><img src="https://fsxf.fangdd.com/xfcms/FjnOmowuuTdiW5Nm77-_DoBiHWAQ.jpg" width="100%" /></div>
        </div>
        <!-- Add Pagination -->
        <div class="swiper-pagination"></div>
    </div>

    <div id="choose_bar">
        <ul class="tab-nav ui-border-b" >
            <li class="tag-nav-item-area" data-target=".area-chioce"data-city-id="" ><a class="on"><i><span>区域</span></i></a></li>
            <li class="tag-nav-item-price" data-target=".price-chioce" data-city-id=""><a><i><span>价格</span></i></a></li>
            <li class="tag-nav-item-flat" data-target=".house-chioce"  data-city-id="" ><a><i><span>户型</span></i></a></li>
            <li class="tag-nav-item-more" data-target=".all-chioce"  data-city-id="" ><a><i><span>类型</span></i></a></li>
            <div class="clearfix"></div>
        </ul>
    </div>

    <ul id="house_list">
        <li class="house_item list-unstyled">
            <div class="house_info">
                <div class="house_img"><img src="/images/demo.jpg" class="img-responsive" /></div>
                <div class="house_summary">
                    <p class="house_name">新华联·奥莱悦府</p>
                    <p class="house_area">80-120㎡ | 2-3室</p>
                    <p class="house_unit_price">单价：1000元/㎡</p>
                    <p class="house_total_price">总价：200万起</p>
                </div>
                <div class="house_return">
                    <div class="return_img"><img src="/images/logo_small.png" /></div>
                    <div class="return_des">
                        <p>口袋返现</p>
                        <p class="return_price">3-6万/套</p>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="house_address">地址：上海市嘉定区江沙江路600弄</div>
        </li>
        <li class="house_item list-unstyled">
            <div class="house_info">
                <div class="house_img"><img src="http://fsxf.fangdd.com/xf/FtIImpUnyKWrMrK5iOchJxP_It76.png?imageMogr2/thumbnail/!240x168r/format/jpg" /></div>
                <div class="house_summary">
                    <p class="house_name">碧桂园金山星作</p>
                    <p class="house_area">80-120㎡ | 2-3室</p>
                    <p class="house_unit_price">单价：1800元/㎡</p>
                    <p class="house_total_price">总价：280万起</p>
                </div>
                <div class="house_return">
                    <div class="return_img"><img src="/images/logo_small.png" /></div>
                    <div class="return_des">
                        <p>口袋返现</p>
                        <p class="return_price">3-6万/套</p>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="house_address">地址：上海市嘉定区江沙江路600弄</div>
        </li>
        <li class="house_item list-unstyled">
            <div class="house_info">
                <div class="house_img"><img src="http://fs.fangdd.com/image/kwWEhLMNmJ0EdQlaEcgqn-gn_Qg.jpg?imageMogr2/thumbnail/!240x168r/format/jpg" /></div>
                <div class="house_summary">
                    <p class="house_name">世茂佘山里</p>
                    <p class="house_area">80-120㎡ | 2-3室</p>
                    <p class="house_unit_price">单价：1300元/㎡</p>
                    <p class="house_total_price">总价：240万起</p>
                </div>
                <div class="house_return">
                    <div class="return_img"><img src="/images/logo_small.png" /></div>
                    <div class="return_des">
                        <p>口袋返现</p>
                        <p class="return_price">3-6万/套</p>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="house_address">地址：上海市嘉定区江沙江路600弄</div>
        </li>
        <li class="house_item list-unstyled">
            <div class="house_info">
                <div class="house_img"><img src="/images/demo.jpg" /></div>
                <div class="house_summary">
                    <p class="house_name">新华联·奥莱悦府</p>
                    <p class="house_area">80-120㎡ | 2-3室</p>
                    <p class="house_unit_price">单价：1800元/㎡</p>
                    <p class="house_total_price">总价：280万起</p>
                </div>
                <div class="house_return">
                    <div class="return_img"><img src="/images/logo_small.png" /></div>
                    <div class="return_des">
                        <p>口袋返现</p>
                        <p class="return_price">3-6万/套</p>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="house_address">地址：上海市嘉定区江沙江路600弄</div>
        </li>
        <li class="house_item list-unstyled">
            <div class="house_info">
                <div class="house_img"><img src="/images/demo.jpg" /></div>
                <div class="house_summary">
                    <p class="house_name">新华联·奥莱悦府</p>
                    <p class="house_area">80-120㎡ | 2-3室</p>
                    <p class="house_unit_price">单价：1800元/㎡</p>
                    <p class="house_total_price">总价：280万起</p>
                </div>
                <div class="house_return">
                    <div class="return_img"><img src="/images/logo_small.png" /></div>
                    <div class="return_des">
                        <p>口袋返现</p>
                        <p class="return_price">3-6万/套</p>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="house_address">地址：上海市嘉定区江沙江路600弄</div>
        </li><li class="house_item list-unstyled">
            <div class="house_info">
                <div class="house_img"><img src="/images/demo.jpg" /></div>
                <div class="house_summary">
                    <p class="house_name">新华联·奥莱悦府</p>
                    <p class="house_area">80-120㎡ | 2-3室</p>
                    <p class="house_unit_price">单价：1800元/㎡</p>
                    <p class="house_total_price">总价：280万起</p>
                </div>
                <div class="house_return">
                    <div class="return_img"><img src="/images/logo_small.png" /></div>
                    <div class="return_des">
                        <p>口袋返现</p>
                        <p class="return_price">3-6万/套</p>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="house_address">地址：上海市嘉定区江沙江路600弄</div>
        </li>
        <li class="house_item list-unstyled">
            <div class="house_info">
                <div class="house_img"><img src="/images/demo.jpg" /></div>
                <div class="house_summary">
                    <p class="house_name">新华联·奥莱悦府</p>
                    <p class="house_area">80-120㎡ | 2-3室</p>
                    <p class="house_unit_price">单价：1800元/㎡</p>
                    <p class="house_total_price">总价：280万起</p>
                </div>
                <div class="house_return">
                    <div class="return_img"><img src="/images/logo_small.png" /></div>
                    <div class="return_des">
                        <p>口袋返现</p>
                        <p class="return_price">3-6万/套</p>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="house_address">地址：上海市嘉定区江沙江路600弄</div>
        </li>

    </ul>
</div>
