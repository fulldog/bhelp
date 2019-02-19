<?php
/**
 * Created by PhpStorm.
 * User: weilone
 * Date: 2019/1/5
 * Time: 22:00
 */

namespace wechat\controllers;


use common\models\bbb\BbbMessages;
use common\models\bbb\BbbSpecials;

class MineController extends MyController
{
    function actionIndex(){

        return $this->render('index',[
            'vip_ending' => (\Yii::$app->params['vipEndTime']-time()),
            'user'=>\Yii::$app->params['wechatMember']
        ]);
    }

    function actionInfos(){
        return $this->render('infos',[

        ]);
    }

    //我的已购
    function actionPurchase(){
        $this->view->params['title'] = '我的已购';
        return $this->render('purchase',[

        ]);
    }

    function actionIncome(){
        $this->view->params['title'] = '我的收益';
        return $this->render('income',[

        ]);
    }

    function actionDocash(){
        if (\Yii::$app->request->isAjax && \Yii::$app->request->isPost){

        }

        return $this->render('docash',[

        ]);
    }

    function actionMessage(){
        if (\Yii::$app->request->isAjax && \Yii::$app->request->isPost){
            BbbMessages::updateAll(['status'=>1],['id'=>$this->request_post('id')]);
            exit($this->request_post('id'));
        }

//        BbbMessages::updateAll(['status'=>1],['uid'=>$this->memberId]);
        $messages = BbbMessages::find()->select(['message','id','created_at','status'])->where(['uid'=>$this->memberId])->orderBy(['id'=>SORT_DESC])->limit(20)->asArray()->all();
        return $this->render('message',[
            'messages'=>$messages
        ]);
    }

    function actionSubscribe(){

        return $this->render('subscribe',[
            'info'=>''
        ]);
    }
}