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
      <input class="" type="hidden" name="start" value="<?=time()?>">
      <input class="" type="hidden" name="end" value="<?=strtotime('+1 year')?>">
    </div>
    <div class="weui-flex item">
      <label for="">推荐编码：</label>
      <input class="weui-flex__item ref-Code" style="padding-left:0.5rem;"  type="text" placeholder="请输入推荐码" name="recommendCode">
    </div>
    <div class="weui-flex item">
      <label for="">支付金额：</label>
      <span class="weui-flex__item selectTrue"><img src="<?=Yii::$app->params['bbb']?>/images/payment_05.png" alt=""></span>
      <input class="" type="hidden" name="vipMoney" value="<?=Yii::$app->params['vipMoney']?>">
      <input name="_csrf-wechat" type="hidden" id="_csrf-wechat" value="<?=Yii::$app->request->csrfToken?>">
      <span class="original_price">¥ <?=Yii::$app->params['vipMoney']?></span>
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
          if (data.status==2){
            onBridgeReady(data.data);
          }else{
            location.href ='<?=\common\helpers\UrlHelper::to(['index/order']);?>'+'?orderSn='+data.data.orderSn
          }
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
<script type="text/javascript" charset="utf-8">
  function onBridgeReady(data){
    let _json = data.json;
    let _order = data.orderSn;
    WeixinJSBridge.invoke(
      'getBrandWCPayRequest', _json,
      function(res){
        if(res.err_msg == "get_brand_wcpay_request:ok" ){
          location.href = '<?=\common\helpers\UrlHelper::to(['index/order-succ','do'=>'succ'])?>'+'&orderSn='+_order
          // 使用以上方式判断前端返回,微信团队郑重提示：
          //res.err_msg将在用户支付成功后返回ok，但并不保证它绝对可靠。
        }else {
          location.href ='<?=\common\helpers\UrlHelper::to(['index/order']);?>'+'?orderSn='+_order
          // alert(JSON.stringify(res));
        }
      });
  }
  if (typeof WeixinJSBridge == "undefined"){
    if( document.addEventListener ){
      document.addEventListener('WeixinJSBridgeReady', onBridgeReady, false);
    }else if (document.attachEvent){
      document.attachEvent('WeixinJSBridgeReady', onBridgeReady);
      document.attachEvent('onWeixinJSBridgeReady', onBridgeReady);
    }
  }else{
    alert('WeixinJSBridge:undefined');
  }
</script>