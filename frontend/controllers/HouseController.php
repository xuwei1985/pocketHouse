<?php
namespace frontend\controllers;

use yii\web\Controller;

class HouseController extends Controller{
    public $layout="base";

    public function actionIndex()
    {
        return $this->render('house_list');
    }

    public function actionDetail()
    {
        return $this->render('house_detail');
    }
    public function actionAlbum()
    {
        return $this->render('house_album');
    }

}
