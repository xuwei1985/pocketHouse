<?php
use frontend\assets\AppAsset;
AppAsset::addScript($this,'@web/js/house_list.js?t='.time());
AppAsset::addCss($this,'@web/css/house_list.css?t='.time());

$this->title = '全部楼盘';
?>
<div id="main_page" >
    <ul>
        <li class="house_item list-unstyled">
            <div class="house_info">
                <div class="house_img"><img src="/images/demo.jpg" class="img-responsive" /></div>
                <div class="house_summary">
                    <p class="house_name">新华联·奥莱悦府</p>
                    <p class="house_area">80-120㎡|2-3室</p>
                    <p class="house_unit_price">2-3室|80-120㎡</p>
                    <p class="house_total_price">200万起</p>
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
            <div class="house_addresm">地址：上海市嘉定区江沙江路600弄</div>
        </li>
        <li class="house_item list-unstyled">
            <div class="house_info">
                <div class="house_img"><img src="/images/demo.jpg" /></div>
                <div class="house_summary">
                    <p class="house_name">新华联·奥莱悦府</p>
                    <p class="house_area">80-120㎡|2-3室</p>
                    <p class="house_unit_price">2-3室|80-120㎡</p>
                    <p class="house_total_price">200万起</p>
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
