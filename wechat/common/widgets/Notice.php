<?php
/**
 * Created by PhpStorm.
 * User: weilone
 * Date: 2019/1/5
 * Time: 23:00
 */
namespace wechat\common\widgets;

class Notice extends \yii\base\Widget
{
    function run()
    {
        return $this->render('notice',[
            'notice'=>\common\models\bbb\Notice::find()->where(['status'=>1])->limit(5)->orderBy(['sort'=>SORT_DESC,'created_at'=>SORT_DESC])->all()
        ]);
    }
}