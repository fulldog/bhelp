<?php
/**
 * Created by PhpStorm.
 * User: weilone
 * Date: 2019/1/6
 * Time: 17:54
 */
$this->registerCssFile(Yii::getAlias('@bbb').'/css/subscribePay.css',['depends'=>\wechat\assets\AppAsset::class]);
?>
<!--顶部标题-->
<div class="titleBar">
  <?=$special['author']?>•<?=$special['title']?>
  <span class="iconfont icon-close close"></span>
  <span class="iconfont icon-more more"></span>
</div>
<!--购买信息-->
<div class="weui-cell info">
  <div class="weui-cell__hd"><img src="<?=$special['img']?>"></div>
  <div class="weui-cell__bd">
    <p><?=$special['author']?>•<?=$special['title']?></p>
  </div>
</div>
<div class="line"></div>

<!--输入框-->
<div class="title"></div>
<div class="form">
    <?=$special['desc']?>
</div>

<div class="payment">
<!--  <div class="weui-flex item">-->
<!--    <label for="">专栏有效期：</label>-->
<!--    <span class="weui-flex__item effective">2018-10-01至2019-10-01</span>-->
<!--  </div>-->
<!--  <div class="weui-flex item">-->
<!--    <label for="">推荐编码：</label>-->
<!--    <input class="weui-flex__item ref-Code" type="text" placeholder="bhb2018">-->
<!--  </div>-->
  <div class="weui-flex item">
    <label for="">支付金额：</label>
<!--    <span class="weui-flex__item selectTrue">-->
<!--            <img src="images/payment_05.png" alt="">-->
<!--        </span>-->
    <span class="original_price" style="right: 3rem">¥ <?=$orderInfo['money']?></span>
  </div>
  <div class="submit" style="padding: 0;margin-top: 10px;">
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