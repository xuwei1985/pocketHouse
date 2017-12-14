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

    <!--搜索-->
    <div class="search_block">
        <div class="search_bar">
            <i class="ic-search"></i>
            <input class="inp-search" type="search" value="" maxlength="30" placeholder="请输入楼盘名称" id="search_keywords" name="search_keywords">
        </div>
    </div>


    <div id="choose_block">
        <ul class="choose_bar ui-border-b" >
            <li class="choose_area" data-target=".area-chioce" data-city-id="" ><a><i><span>区域</span></i></a></li>
            <li class="choose_price" data-target=".price-chioce" data-city-id=""><a><i><span>价格</span></i></a></li>
            <li class="choose_flat" data-target=".house-chioce"  data-city-id="" ><a><i><span>户型</span></i></a></li>
            <li class="choose_type" data-target=".all-chioce"  data-city-id="" ><a><i><span>类型</span></i></a></li>
            <div class="clearfix"></div>
        </ul>
        <!--区域-->
        <div class="choose_house_area choose_panel clearfix">
            <div class="ui-area-left">
                <ul>
                    <li data-city="不限" data-city-id="">
                        <a class="" href="javascript:void(0);">不限</a>
                    </li>
                    <li data-city="上海" data-city-id="" class="on">
                        <a class="" href="javascript:void(0);">上海</a>
                    </li>
                    <li data-city="南京" data-city-id="">
                        <a class="" href="javascript:void(0);">南京</a>
                    </li>
                    <li data-city="无锡" data-city-id="">
                        <a class="" href="javascript:void(0);">无锡</a>
                    </li>
                    <li data-city="苏州" data-city-id="">
                        <a class="" href="javascript:void(0);">苏州</a>
                    </li>
                    <li data-city="南通" data-city-id="">
                        <a class="" href="javascript:void(0);">南通</a>
                    </li>
                    <li data-city="杭州" data-city-id="">
                        <a class="" href="javascript:void(0);">杭州</a>
                    </li>
                    <li data-city="嘉兴" data-city-id="">
                        <a class="" href="javascript:void(0);">嘉兴</a>
                    </li>
                    <li data-city="湖州" data-city-id="">
                        <a class="" href="javascript:void(0);">湖州</a>
                    </li>
                </ul>
            </div>
            <div class="ui-area-right">
                <ul data-city-id="990">
                    <li data-district="奉贤" data-district-id="990">
                        <a href="javascript:void(0);">不限</a>
                    </li>
                    <li data-district="奉贤" data-district-id="990">
                        <a href="javascript:void(0);">黄浦区</a>
                    </li>
                    <li data-district="奉贤" data-district-id="990">
                        <a class="" href="javascript:void(0);">徐汇区</a>
                    </li>
                    <li data-district="奉贤" data-district-id="990">
                        <a class="" href="javascript:void(0);">静安区</a>
                    </li>
                    <li data-district="奉贤" data-district-id="990">
                        <a class="" href="javascript:void(0);">普陀区</a>
                    </li>
                    <li data-district="奉贤" data-district-id="990">
                        <a class="" href="javascript:void(0);">杨浦区</a>
                    </li>
                    <li data-district="奉贤" data-district-id="990">
                        <a class="" href="javascript:void(0);">闵行区</a>
                    </li>
                    <li data-district="奉贤" data-district-id="990">
                        <a class="" href="javascript:void(0);">静安区</a>
                    </li><li data-district="奉贤" data-district-id="990>
                    <a class="" href="javascript:void(0);">长宁区</a>
                    </li>
                    <li data-district="奉贤" data-district-id="990">
                        <a class="" href="javascript:void(0);">嘉定区</a>
                    </li>
                    <li data-district="宝山区" data-district-id="990">
                        <a class="" href="javascript:void(0);">宝山区</a>
                    </li>
                </ul>
            </div>
        </div>
        <!--价格-->
        <div class="choose_house_price choose_panel">
            <ul>
                <li>
                    <h5>不限</h5>
                </li>
                <li>
                    <h5>10000元/㎡以下</h5>
                </li>
                <li>
                    <h5>10001-15000元/㎡</h5>
                </li>
                <li>
                    <h5 >15001-25000元/㎡</h5>
                </li>
                <li>
                    <h5>25001-40000元/㎡</h5>
                </li>
                <li>
                    <h5>40001-60000元/㎡</h5>
                </li>
                <li>
                    <h5>60000元/㎡以上</h5>
                </li>
            </ul>
        </div>
        <!--户型-->
        <div class="choose_house_flat choose_panel">
            <ul>
                <li>
                    <h5>不限</h5>
                </li>
                <li>
                    <h5>一室</h5>
                </li>
                <li>
                    <h5>二室</h5>
                </li>
                <li>
                    <h5 >三室</h5>
                </li>
                <li>
                    <h5>四室</h5>
                </li>
                <li>
                    <h5>五室及以上</h5>
                </li>
            </ul>
        </div>
        <!--类型-->
        <div class="choose_house_type choose_panel">
            <ul>
                <li>
                    <h5>不限</h5>
                </li>
                <li>
                    <h5>住宅</h5>
                </li>
                <li>
                    <h5>写字楼</h5>
                </li>
                <li>
                    <h5 >商铺</h5>
                </li>
            </ul>
        </div>
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
