<script src="http://res.wx.qq.com/open/js/jweixin-1.4.0.js" type="text/javascript" charset="utf-8"></script>


<input type="button" value="pay" onclick="onBridgeReady();">
<script type="text/javascript" charset="utf-8">
    //数组内为jssdk授权可用的方法，按需添加，详细查看微信jssdk的方法
    wx.config(<?php echo $jssdk->buildConfig(['chooseWXPay'], true) ?>);
    // 发起支付
    function onBridgeReady(){
      wx.chooseWXPay({
        timestamp: <?= $config['timestamp'] ?>,
        nonceStr: '<?= $config['nonceStr'] ?>',
        package: '<?= $config['package'] ?>',
        signType: '<?= $config['signType'] ?>',
        paySign: '<?= $config['paySign'] ?>', // 支付签名
        success: function (res) {
          // 支付成功后的回调函数
          alert(JSON.stringify(res));
        }
      });
    }

</script>