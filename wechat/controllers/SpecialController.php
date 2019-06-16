<?php
/**
 * Created by PhpStorm.
 * User: weilone
 * Date: 2019/1/6
 * Time: 16:58
 */

namespace wechat\controllers;


use yii\helpers\Url;

class SpecialController extends MyController
{

    function actionDetail($sid){
        return $this->render('detail');
    }
}