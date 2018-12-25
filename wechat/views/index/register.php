<?php
/**
 * Created by PhpStorm.
 * User: weilone
 * Date: 2018/12/25
 * Time: 21:49
 */
?>
<div class="banner">
    <img src="<?=Yii::$app->params['bbb']?>/images/register_05.png" alt="">
</div>
<!--输入框-->
<div class="form">
    <div class="weui-flex item">
        <label for="">手机号</label>
        <input class="weui-flex__item" type="tel">
    </div>
    <div class="weui-flex item">
        <label for="">验证码</label>
        <input class="weui-flex__item" type="text" placeholder="请填写验证码">
        <button class="vcode-btn">获取验证码</button>
    </div>
</div>
<p class="introduce">
    <?=Yii::$app->params['desc_register']['introduce']?>
</p>
<div class="payment">
    <div class="weui-flex item">
        <label for="">推荐编码：</label>
        <input class="weui-flex__item ref-Code" type="text" name="recommendCode">
    </div>
    <div class="weui-flex item">
        <label for="">支付金额：</label>
        <span class="weui-flex__item selectTrue"><img src="<?=Yii::$app->params['bbb']?>/images/payment_05.png" alt=""></span>
        <input class="" type="hidden" name="vipMoney" value="<?=Yii::$app->params['vipMoney']?>">
        <span class="original_price">¥ <?=Yii::$app->params['vipMoney']?></span>
    </div>
    <div class="submit">
        <a href="registerSuc.html" class="weui-btn weui-btn_sub">立即开通</a>
    </div>

</div>
