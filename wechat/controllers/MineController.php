<?php
/**
 * Created by PhpStorm.
 * User: weilone
 * Date: 2019/1/5
 * Time: 22:00
 */

namespace wechat\controllers;


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
        return $this->render('message',[

        ]);
    }

    function actionSubscribe(){
        return $this->render('subscribe',[

        ]);
    }
}