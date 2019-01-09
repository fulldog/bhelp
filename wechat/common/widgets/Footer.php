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
        $count = 0;
        $uid = \Yii::$app->session->get('user_info')['uid'];
        if ($uid){
            $time = time();
            $stime = $time-10*24*3600;
            $sysMsg = \common\models\bbb\Notice::find()->where(['status'=>1,'type'=>2])
                ->andFilterWhere(['>=','updated_at',$stime])
                ->andFilterWhere(['<=','updated_at',$time])->asArray()->all();
            if (!empty($sysMsg)){
                foreach ($sysMsg as $v){
                    $sql = "select id from ".\Yii::$app->db->tablePrefix."bbb_messages where notice_id='{$v['id']}'";
                    $u_msg = \Yii::$app->db->createCommand($sql)->cache(3600)->queryScalar();
                    if (!$u_msg){
                        $sql = "insert into ".\Yii::$app->db->tablePrefix."bbb_messages (`uid`,`notice_id`,`message`,`created_at`,`updated_at`)
                     values('{$uid}','{$v['id']}','{$v['notice']}','{$v['created_at']},'{$v['updated_at']})";
                        \Yii::$app->db->createCommand($sql)->execute();
                        ++$count;
                    }
                }
            }
        }
        return $this->render('footer',[
            'count'=>$count
        ]);
    }
}