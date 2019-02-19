<?php
/**
 * Created by PhpStorm.
 * User: weilone
 * Date: 2019/1/6
 * Time: 16:28
 */

namespace wechat\controllers;


use common\models\bbb\BbbSpecials;

class CategoryController extends MyController
{

    function actionIndex(){

    }

    function actionTrain(){
        return $this->render('train');
    }

    function actionMarketing(){

        return $this->render('marketing');
    }

    function actionWechat(){

        return $this->render('wechat');
    }

    //珠宝
    function actionJewelry(){
        //得到珠宝专栏
        return $this->render('jewelry',[
            'list'=>BbbSpecials::find()->where(['status'=>1])->asArray()->all()
        ]);
    }

    function actionQualityPerson(){

        return $this->render('quality_person');
    }


    function actionShopkeeper(){
        $catid = $this->request_get('catid');

        return $this->render('shopkeeper');
    }
}