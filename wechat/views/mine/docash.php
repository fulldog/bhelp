<?php
/**
 * Created by PhpStorm.
 * User: weilone
 * Date: 2019/1/5
 * Time: 22:56
 */
$this->registerCssFile(Yii::getAlias('@bbb').'/css/cashWithdrawal.css',['depends'=>\wechat\assets\AppAsset::class]);

?>
<div class="memberImg">
    <img src="<?=Yii::$app->params['bbb']?>/images/qbz.jpg" alt="">
</div>
<form>
<div class="cashBox">
    <p class="title">提现金额<span>（范围：¥100.00 — ¥10000.00） </span></p>
    <p class="amount">¥<input type="number" name="money"></p>
    <input name="_csrf-wechat" type="hidden" value="<?=Yii::$app->request->csrfToken?>">
    <p class="payable">可提现金额：<span>0.00</span>,<i>无手续费</i></p>
</div>

<div class="submitBtn">
    <a href="javascript:;" class="weui-btn weui-btn_primary" id="submit">确认提现</a>
    <p>您的提现将会转入到微信零钱中</p>
</div>
</form>
<?=\wechat\common\widgets\FooterNav::widget()?>
<script>
    $('#submit').on('click',function() {
      $.ajax({
        type:'post',
        dataType:'jsop',
        data:$('form').serialize(),
        success:function(data) {

        }
      })
    });
</script>
