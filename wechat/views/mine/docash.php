<?php
/**
 * Created by PhpStorm.
 * User: weilone
 * Date: 2019/1/5
 * Time: 22:56
 */
$this->registerCssFile(Yii::getAlias('@bbb').'/css/cashWithdrawal.css',['depends'=>\wechat\assets\AppAsset::class]);

?>
<!--顶部标题-->
<div class="titleBar">
  提现
  <span class="iconfont icon-close close"></span>
  <span class="iconfont icon-more more"></span>
</div>
<div class="memberImg">
    <img src="<?=\Yii::$app->params['wechatMember']['avatar']?>" alt="">
</div>
<form>
<div class="cashBox">
    <p class="title">提现金额<span>（范围：¥100.00 — ¥10000.00） </span></p>
    <p class="amount">¥<input type="number" name="money" id="money"></p>
    <input name="_csrf-wechat" type="hidden" value="<?=Yii::$app->request->csrfToken?>">
    <p class="payable">可提现金额：<span><?=number_format($cash,2)?></span>,<i>无手续费</i></p>
</div>

<div class="submitBtn">
    <a href="javascript:;" class="weui-btn weui-btn_primary" id="submit">确认提现</a>
    <p>您的提现将会转入到微信零钱中</p>
</div>
</form>
<?=\wechat\common\widgets\FooterNav::widget()?>
<script>
  var cash = <?=$cash ?? 0?>;
    $('#submit').on('click',function() {
      let money = $('#money').val();
      if (money>10000 || money<100){
        alert('请输入¥100.00 — ¥10000.00的数字');
        return false
      }else if(money>cash*1){
        alert('超过可提现金额：¥'+cash);
        return false
      }
      $.ajax({
        type:'post',
        dataType:'json',
        data:$('form').serialize(),
        success:function(data) {
            if (data.status>0){
              alert('提现申请成功');
              location.href = '<?=\yii\helpers\Url::to(['mine/income'])?>';
            } else {
              alert('提现申请失败，请重试');
            }
        }
      })
    });
</script>
