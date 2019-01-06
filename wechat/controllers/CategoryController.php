<?php
/**
 * Created by PhpStorm.
 * User: weilone
 * Date: 2019/1/6
 * Time: 16:28
 */

namespace wechat\controllers;


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

        return $this->render('jewelry');
    }

    function actionQualityPerson(){

        return $this->render('quality_person');
    }


}