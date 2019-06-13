<?php
/**
 * Created by PhpStorm.
 * User: weilone
 * Date: 2018/12/25
 * Time: 21:49
 */
$this->registerCssFile(Yii::getAlias('@bbb').'/css/registerRenew.css',['depends'=>\wechat\assets\AppAsset::class]);
?>
<style>
  div .submit{
    margin-top: 0.3rem;
  }
</style>
<div class="titleBar">
  支付
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
<div class="payment">
  <div class="weui-flex item">
    <label for="">会员有效期：</label>
    <!--<input class="weui-flex__item ref-Code" type="text">-->
    <span class="weui-flex__item effective"><?=Yii::$app->formatter->asDate(time())?> 至 <?=Yii::$app->formatter->asDate(strtotime('+'.$orderInfo['month_limit'].' month'))?></span>
  </div>
  <?if(!empty($orderInfo['recommendCode'])):?>
  <div class="weui-flex item">
    <label for="">推荐编码：</label>
    <input class="weui-flex__item ref-Code" style="padding-left:0.5rem;"  type="text" readonly="readonly" value="<?=$orderInfo['recommendCode']?>">
  </div>
  <?endif;?>
  <div class="weui-flex item">
    <label for="">支付金额：</label>
    <span class="weui-flex__item selectTrue" style="padding-left: 20px">
      ¥ <?=$orderInfo['money']?>
    </span>
  </div>
  <div class="submit">
    <a href="javascript:void(0);" onclick="pay();" class="weui-btn weui-btn_sub">立即支付</a>
  </div>

</div>

<script type="text/javascript" charset="utf-8">
  function pay() {
    onBridgeReady();
  }
  function onBridgeReady(){
    WeixinJSBridge.invoke(
      'getBrandWCPayRequest', <?=$json?>,
      function(res){
        if(res.err_msg == "get_brand_wcpay_request:ok"){
          // 使用以上方式判断前端返回,微信团队郑重提示：
          //res.err_msg将在用户支付成功后返回ok，但并不保证它绝对可靠。
          location.href = '<?=\common\helpers\UrlHelper::to(['order/succ','orderSn'=>$orderInfo['order_sn']])?>';
        }else {
          //location.href ='<?//=\common\helpers\UrlHelper::to(['index/order']);?>//'
          alert(JSON.stringify(res));
        }
      });
  }
  // if (typeof WeixinJSBridge == "undefined"){
  //   if( document.addEventListener ){
  //     document.addEventListener('WeixinJSBridgeReady', onBridgeReady, false);
  //   }else if (document.attachEvent){
  //     document.attachEvent('WeixinJSBridgeReady', onBridgeReady);
  //     document.attachEvent('onWeixinJSBridgeReady', onBridgeReady);
  //   }
  // }else{
  //   alert('WeixinJSBridge:undefined');
  // }
</script>