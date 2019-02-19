<?php
/**
 * Created by PhpStorm.
 * User: weilone
 * Date: 2019/1/5
 * Time: 23:00
 */
namespace wechat\common\widgets;

use addons\RfArticle\common\models\Adv;

class Banner extends \yii\base\Widget
{
    function run()
    {
        $time = time();
        return $this->render('banner',[
            'imgs'=>Adv::find()->select(['title','cover'])->where(['status'=>1])->andWhere(['<','start_time',$time])->andWhere(['>','end_time',$time])->asArray()->all()
        ]);
    }
}