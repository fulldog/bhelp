<?php
/**
 * Created by PhpStorm.
 * User: weilone
 * Date: 2018/12/31
 * Time: 22:11
 */
?>

<div class="weui-msg">
    <div class="weui-msg__icon-area"><i class="weui-icon-success weui-icon_msg" style="color:#55b837"></i></div>
    <div class="weui-msg__text-area">
        <h2 class="weui-msg__title">支付成功</h2>
        <p class="weui-msg__desc">可在帮宝帮首页下方导航【我的】中查看信息</p>
    </div>
    <div class="weui-msg__opr-area">
        <p class="weui-btn-area">
            <a href="<?=\common\helpers\UrlHelper::to(['index/index'])?>" class="weui-btn weui-btn_primary" style="background-color:#55b837">进入首页</a>
        </p>
    </div>
    <p class="weui-msg__desc" style="">关注公众号：会员答疑，更新动态，一手掌握.</p>
    <div class="weui-msg__opr-area">
        <p class="weui-btn-area weui-btn-area2">宝帮宝会员中心</p>
        <p class="wcImg"><img src="<?=Yii::$app->params['bbb']?>/images/payment_06.jpg" alt=""></p>
        <p class="weui-btn-area weui-btn-area3">长按二维码 识别并关注</p>
    </div>
</div>
