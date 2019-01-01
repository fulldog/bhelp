<?php
/* @var $this yii\web\View */
$this->registerCssFile(Yii::getAlias('@bbb').'/css/registerRenew.css',['depends'=>\wechat\assets\AppAsset::class]);
?>
<style>
  div .submit{
    margin-top: 0.3rem;
  }
</style>
<!--顶部标题-->
<div class="titleBar">
  会员续费
  <span class="iconfont icon-close close"></span>
  <span class="iconfont icon-more more"></span>
</div>
<div class="banner">
  <img src="<?=Yii::$app->params['bbb']?>/images/register_05.png" alt="">
</div>
<!--输入框-->
<p class="introduce">
    <?=Yii::$app->params['desc_register']['introduce']?>
</p>
<form id="form" onsubmit="return false;">
<div class="payment">
  <div class="weui-flex item">
    <label for="">有效期：</label>
    <!--<input class="weui-flex__item ref-Code" type="text">-->
    <span class="weui-flex__item effective"><?=Yii::$app->formatter->asDate(time())?> 至 <?=Yii::$app->formatter->asDate(strtotime('+1 year'))?></span>
  </div>
  <div class="weui-flex item">
    <label for="">支付金额：</label>
    <span class="weui-flex__item selectTrue"><img src="<?=Yii::$app->params['bbb']?>/images/payment_05.png" alt=""></span>
    <input class="" type="hidden" name="vipMoney" value="<?=Yii::$app->params['vipMoney']?>">
    <input class="" type="hidden" name="vipLimit" value="<?=Yii::$app->params['default_month']?>">
    <span class="original_price">¥ <?=Yii::$app->params['vipMoney']?></span>
    <input name="_csrf-wechat" type="hidden" id="_csrf-wechat" value="<?=Yii::$app->request->csrfToken?>">
  </div>
  <div class="submit">
    <a href="javascript:;" id="register" class="weui-btn weui-btn_sub">立即续费</a>
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
</script>