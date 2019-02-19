<?php
/**
 * Created by PhpStorm.
 * User: weilone
 * Date: 2019/1/5
 * Time: 23:00
 */
namespace wechat\common\widgets;

use common\models\bbb\BbbMessages;

class Footer extends \yii\base\Widget
{
    function run()
    {
        $count = 0;
        $uid = \Yii::$app->session->get('user_info')['id'];
        if ($uid){
            $time = time();
            $stime = $time-10*24*3600;
            $sysMsg = \common\models\bbb\Notice::find()->where(['status'=>1,'type'=>2])
                ->andFilterWhere(['>=','updated_at',$stime])
                ->andFilterWhere(['<=','updated_at',$time])->asArray()->all();
            if (!empty($sysMsg)){
                foreach ($sysMsg as $v){
                    $mess = BbbMessages::findOne(['notice_id'=>$v['id']]);
                    if (!$mess){
                        $mes = new BbbMessages();
                        $mes->uid = $uid;
                        $mes->notice_id = $v['id'];
                        $mes->message = $v['notice'];
                        $mes->created_at = $v['created_at'];
                        $mes->updated_at = $v['updated_at'];
                        $mes->save();
                        unset($mes);
                    }
                }
            }
        }
        return $this->render('footer',[
            'count'=>BbbMessages::find()->where(['uid'=>$uid,'status'=>0])->count()
        ]);
    }
}