<?php

namespace wechat\controllers;

use common\helpers\PayHelper;
use common\models\bbb\Orders;
use common\models\common\PayLog;
use common\helpers\UrlHelper;
class OrdersController extends \wechat\controllers\MyController
{
    public function actionCreate()
    {
        return $this->render('create');
    }

    public function actionDelete()
    {
        return $this->render('delete');
    }

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionInfo()
    {
        $orderSn = \Yii::$app->request->get('orderSn');
        $orderInfo = Orders::findOne(['order_sn'=>$orderSn]);
        if (!$orderInfo){
            $this->redirect(UrlHelper::to(['site/error']));
        }
        $orderData = [
            'trade_type' => 'JSAPI', // JSAPI，NATIVE，APP...
            'body' => $orderInfo['goods'],
            'detail' => $orderInfo['desc'],
            'notify_url' => UrlHelper::toFront(['notify/wechat']), // 支付结果通知网址，如果不设置则会使用配置里的默认地址
            'out_trade_no' => PayHelper::getOutTradeNo($orderInfo['money']*100, $orderSn, PayLog::PAY_TYPE_WECHAT), // 支付
            'total_fee' => $orderInfo['money']*100,
            'openid' => $this->openid, // trade_type=JSAPI，此参数必传，用户在商户appid下的唯一标识，
        ];

        $payment = \Yii::$app->wechat->payment;
        $result = $payment->order->unify($orderData);
        $json = '';
        if ($result['return_code'] == 'SUCCESS')
        {
            $json = $payment->jssdk->bridgeConfig($result['prepay_id']);
        }
        return $this->render('info',[
            'json'=>$json,
            'orderInfo'=>$orderInfo->toArray()
        ]);
    }

    public function actionList()
    {
        return $this->render('list');
    }

    function actionSucc(){
        return $this->render('succ');
    }

}
