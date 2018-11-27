<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/11/23 0023
 * Time: 20:40
 */

namespace wechat\controllers;

use Yii;
use common\helpers\PayHelper;
use common\helpers\StringHelper;
use common\models\common\PayLog;
use common\helpers\UrlHelper;

class OrderController extends WController
{
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    function actionPay(){
        $totalFee = 1;// 支付金额单位：分
        $orderSn = time() . StringHelper::randomNum();// 订单号

        $orderData = [
            'trade_type' => 'JSAPI', // JSAPI，NATIVE，APP...
            'body' => '支付简单说明',
            'detail' => '支付详情',
            'notify_url' => UrlHelper::toFront(['notify/easy-wechat']), // 支付结果通知网址，如果不设置则会使用配置里的默认地址
            'out_trade_no' => PayHelper::getOutTradeNo($totalFee, $orderSn, 1, PayLog::PAY_TYPE_WECHAT, 'JSAPI'), // 支付
            'total_fee' => $totalFee,
            'openid' => Yii::$app->wechat->user->openid, // trade_type=JSAPI，此参数必传，用户在商户appid下的唯一标识，
        ];

//        $this->Udplog($orderData,'tag11','test');die;

        $payment = Yii::$app->wechat->payment;
        $result = $payment->order->unify($orderData);
        if ($result['return_code'] == 'SUCCESS')
        {
            $json = $payment->jssdk->bridgeConfig($result['prepay_id']);
        }
        else
        {
            p($result);die();
        }

        return $this->render('pay', [
            'json' => $json
        ]);
    }
}