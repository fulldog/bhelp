<?php
/**
 * Created by PhpStorm.
 * User: weilone
 * Date: 2018/12/25
 * Time: 21:51
 */

namespace wechat\controllers;


use common\models\bbb\MemberVipInfos;
use common\models\wechat\Fans;

class MyController extends WController
{
    public $openid;
    public $memberId;
    public $isVip = false;
    public $vipEnable = false;

    function init()
    {
        $init = parent::init();
        $this->view->params['description'] = 'bbb';
        $this->view->params['title'] = 'bbb';
        $this->_saveWechatUser();
        return  $init;// TODO: Change the autogenerated stub
    }

    function _saveWechatUser(){
        //&& $this->openGetWechatUser && \Yii::$app->wechat->isWechat
        if (!empty(\Yii::$app->params['wechatMember'])){
            $fan = new Fans();
            $this->openid = \Yii::$app->params['wechatMember']['id'];
            if (!$fan::findOne(['openid'=>$this->openid])){
                $fan->openid = $this->openid;
                $fan->nickname = \Yii::$app->params['wechatMember']['nickname'];
                $fan->head_portrait = \Yii::$app->params['wechatMember']['avatar'];
                $fan->sex = \Yii::$app->params['wechatMember']['original']['sex'];
                $fan->country = \Yii::$app->params['wechatMember']['original']['country'];
                $fan->province = \Yii::$app->params['wechatMember']['original']['province'];
                $fan->city = \Yii::$app->params['wechatMember']['original']['city'];
                $fan->save();
            }else{
                $this->memberId = $fan->member_id;
            }
        }
    }
}