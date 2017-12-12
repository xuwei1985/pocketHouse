<?php
namespace backend\controllers;
use backend\models\Country;
use yii\web\Controller;


class LoginController extends Controller{
    public function actionTest(){
        // 获取主键为 “US” 的行
        $country = Country::findOne('US');

        // 输出 “United States”
        echo $country->name;
    }
}

// 获取 country 表的所有行并以 name 排序
//$countries = Country::find()->orderBy('name')->all();

// 获取主键为 “US” 的行
//$country = Country::findOne('US');
//
//// 输出 “United States”
//echo $country->name;

// 修改 name 为 “U.S.A.” 并在数据库中保存更改
//$country->name = 'U.S.A.';
//$country->save();
?>