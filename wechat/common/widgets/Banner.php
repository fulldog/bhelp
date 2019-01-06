<?php
/**
 * Created by PhpStorm.
 * User: weilone
 * Date: 2019/1/5
 * Time: 23:00
 */
namespace wechat\common\widgets;

class Banner extends \yii\base\Widget
{
    function run()
    {
        return $this->render('banner',[
            'imgs'=>[
                \Yii::$app->params['bbb'].'/images/bbb002.jpg'
            ]
        ]);
    }
}