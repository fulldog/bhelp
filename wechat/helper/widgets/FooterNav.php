<?php
/**
 * Created by PhpStorm.
 * User: weilone
 * Date: 2019/1/5
 * Time: 23:00
 */
namespace wechat\helper\widgets;

class FooterNav extends \yii\base\Widget
{
    function run()
    {
        return $this->render('footer_nav');
    }
}