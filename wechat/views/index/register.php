<?php
/**
 * Created by PhpStorm.
 * User: weilone
 * Date: 2018/12/25
 * Time: 21:49
 */
$this->registerCssFile(Yii::getAlias('@bbb').'/css/registerRenew.css',['depends'=>\wechat\assets\AppAsset::class]);
?>
<div class="banner">
    <img src="<?=$data['vip_price_img'] ?? Yii::$app->params['bbb'].'/images/payment_05.png'?>" alt="">
</div>
<form id="form" onsubmit="return false;">
  <!--输入框-->
  <div class="form">
    <div class="weui-flex item">
      <label for="">手机号</label>
      <input class="weui-flex__item" type="tel" name="phone">
    </div>
    <div class="weui-flex item">
      <label for="">验证码</label>
      <input class="weui-flex__item" type="text" name="phoneCode" placeholder="请填写验证码">
      <button class="vcode-btn" onclick="getSms();">获取验证码</button>
    </div>
  </div>
  <p class="introduce">
      <?=Yii::$app->params['desc_register']['introduce']?>
  </p>
  <div class="payment">
    <div class="weui-flex item">
      <label for="">会员有效期：</label>
      <!--<input class="weui-flex__item ref-Code" type="text">-->
      <span class="weui-flex__item effective"><?=Yii::$app->formatter->asDate(time())?> 至 <?=Yii::$app->formatter->asDate(strtotime('+1 year'))?></span>
    </div>
    <div class="weui-flex item">
      <label for="">推荐编码：</label>
      <input class="weui-flex__item ref-Code" style="padding-left:0.5rem;"  type="text" placeholder="请输入推荐码" name="recommendCode">
    </div>
    <div class="weui-flex item">
      <label for="">支付金额：</label>
      <span class="weui-flex__item selectTrue"><img src="<?=$data['vip_price_img'] ?? Yii::$app->params['bbb'].'/images/payment_05.png'?>" alt=""></span>
      <input class="" type="hidden" name="vipMoney" value="<?=$data['vip_price'] ?? Yii::$app->params['vip_price']?>">
      <input class="" type="hidden" name="vipLimit" value="<?=$data['vip_month'] ?? Yii::$app->params['vip_month']?>">
      <span class="original_price">¥ <?=$data['vip_price'] ?? Yii::$app->params['vip_price']?></span>
      <input name="_csrf-wechat" type="hidden" id="_csrf-wechat" value="<?=Yii::$app->request->csrfToken?>">
    </div>
    <div class="submit">
      <a href="javascript:void(0);" id="register" class="weui-btn weui-btn_sub">立即开通</a>
    </div>

  </div>

</form>
<script>
  $('#register').on('click',function() {
    $.ajax({
      data:$('#form').serialize(),
      dataType:'json',
      type:'post',
      success:function(data) {
        if (data.status>0){
          location.href ='<?=\common\helpers\UrlHelper::to(['order/pay']);?>'+'?orderSn='+data.data.order_sn
        }else {
          alert(data.msg);
        }
      }
    })
  })

  function getSms() {
    let phone = $('input[name="phone"]').val();
    let pat = /^1(3|4|5|8|7)[0-9]{9}$/;
    if (pat.test(phone)){
        $.ajax({
          url:'<?=\yii\helpers\Url::to(['index/sms','_csrf-wechat'=>Yii::$app->request->csrfToken])?>',
          data:{phone:phone},
          dataType:'json',
          type:'get',
          success:function(data) {
            if (data.status>0){
              alert('您的验证码为:'+data.data.code);
            }else {
              alert(data.msg);
            }
          }
        })
    }else{
      alert('手机号错误');
      return false;
    }
  }
</script>
