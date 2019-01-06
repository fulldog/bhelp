<?php
/**
 * Created by PhpStorm.
 * User: weilone
 * Date: 2019/1/5
 * Time: 23:00
 */
namespace wechat\common\widgets;

class Footer extends \yii\base\Widget
{
    function run()
    {
        return $this->render('footer',[
            'count'=>1
        ]);
    }
}