<?php
/**
 * Created by PhpStorm.
 * User: weilone
 * Date: 2019/1/5
 * Time: 23:00
 */
namespace wechat\common\widgets;

class Category extends \yii\base\Widget
{
    public $params='';
    public $view = 'cat_index';

    function run()
    {
        return $this->render($this->view,[

        ]);
    }
}