<?php
namespace frontend\controllers;

use yii\web\Controller;

class HouseController extends Controller{
    public $layout="base";
    public function actionIndex()
    {
        return $this->render('house_list');
    }
}
