<?php
/**
 * Created by PhpStorm.
 * User: weilone
 * Date: 2018/12/24
 * Time: 23:45
 */

namespace wechat\controllers;

use common\helpers\StringHelper;
use common\models\bbb\Orders;
use common\models\bbb\SmsLog;
use common\models\member\MemberInfo;
use common\models\wechat\Fans;
use yii\helpers\Json;
use yii\web\Response;

class IndexController extends MyController
{

    function behaviors()
    {
        return parent::behaviors(); // TODO: Change the autogenerated stub
    }

    function beforeAction($action)
    {
        return parent::beforeAction($action); // TODO: Change the autogenerated stub
    }

    function actions()
    {
        return parent::actions(); // TODO: Change the autogenerated stub
    }

    function actionIndex(){
        return $this->render('index');
    }

    function actionRegister(){
        if (\Yii::$app->request->isAjax){
            \Yii::$app->response->format = Response::FORMAT_JSON;
            $vipMoney = \Yii::$app->request->post('vipMoney');
            $phone = \Yii::$app->request->post('phone');
            $phoneCode = \Yii::$app->request->post('phoneCode');
            $recommendCode = \Yii::$app->request->post('recommendCode');
            if ($vipMoney!=\Yii::$app->params['vipMoney']){
                return [
                    'msg'=>'金额错误，购买VIP需要￥'.\Yii::$app->params['vipMoney'],
                    'status'=>0
                ];
            }
            if (!$this->checkPhoneCode($phone,$phoneCode)){
                return [
                    'msg'=>'手机验证码有误',
                    'status'=>0
                ];
            }
            if (MemberInfo::findOne(['username'=>$phone])){
                return [
                    'msg'=>'抱歉，该手机号已被注册',
                    'status'=>0
                ];
            }else{
                $sn = 'BbB'.date('YmdHis').StringHelper::randomNum();
                $flag = \Yii::$app->db->transaction(function() use ($phone,$vipMoney,$recommendCode,$sn) {
                    $user = new MemberInfo();
                    $user->username = $phone;
                    $user->nickname = \Yii::$app->params['wechatMember']['nickname'];
                    $user->head_portrait = \Yii::$app->params['wechatMember']['avatar'];
                    $user->sex = \Yii::$app->params['wechatMember']['original']['sex'];
//                $user->area = \Yii::$app->params['wechatMember']['original']['country'];
                    $user->provinces = \Yii::$app->params['wechatMember']['original']['province'];
                    $user->city = \Yii::$app->params['wechatMember']['original']['city'];
                    $user->save();

                    $order = new Orders();
                    $order->order_sn = $sn;
                    $order->member_id = $user->id;
                    $order->money = $vipMoney;
                    $order->goods = '帮宝帮会员购买';
                    $order->desc = '帮宝帮会员购买';
                    $order->rec_code = $recommendCode;
                    $order->save();

                    \Yii::$app->session->set('user_info',$user->toArray());
                    Fans::updateAll(['member_id'=>$user->id],['openid'=>$this->openid]);
                });
                if ($flag){
                    return [
                        'status'=>1,
                        'msg'=>'下单成功',
                        'data'=>[
                            'order_sn' => $sn
                        ]
                    ];
                }
            }
            return [
                'msg'=>'抱歉，注册失败',
                'status'=>0
            ];
        }
        if (Fans::findOne(['openid'=>$this->openid])->member_id>0){
            $this->redirect(['order/recharge']);
        }
        return $this->render('register');
    }


    function actionSearch(){

    }

    function actionRecharge(){

    }

    function actionSms(){

        if (\Yii::$app->request->isAjax && ($phone = \Yii::$app->request->get('phone'))){
            if (preg_match('/^1(3|4|5|8|7)[0-9]{9}$/',$phone)){
               //todo sms
                $sms = new SmsLog();
                if ($has = $sms::find()->where(['phone'=>$phone])->orderBy(['id'=>SORT_DESC])->one()){
                    if ((time() - $has['created_at'])<60*10){
                        exit(Json::encode([
                            'msg'=>'短信验证码获取时间不能超过10Min',
                            'status'=>0
                        ]));
                    }
                }
                $code = random_int(1000,999999);
                $sms->phone = $phone;
                $sms->code = $code;
                if ($sms->save()){
                    exit(Json::encode([
                        'data'=>[
                            'code'=>$code
                        ],
                        'msg'=>'',
                        'status'=>1
                    ]));
                }
            }
        }
        exit(Json::encode([
            'data'=>[],
            'msg'=>'请输入正确的手机号',
            'status'=>0
        ]));
    }

    function checkPhoneCode($phone,$code){
        return SmsLog::find()->where(['phone'=>$phone,'code'=>$code])->orderBy(['id'=>SORT_DESC])->one();
    }
}