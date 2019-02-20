<?php
/**
 * Created by PhpStorm.
 * User: weilone
 * Date: 2019/1/5
 * Time: 22:46
 */
$this->registerCssFile(Yii::getAlias('@bbb').'/css/income.css',['depends'=>\wechat\assets\AppAsset::class]);
?>
<!--顶部标题-->
<div class="titleBar">
  我的收益
  <span class="iconfont icon-close close"></span>
  <span class="iconfont icon-more more"></span>
</div>
<div class="wrap">
    <p class="title">累计收益</p>
    <p class="money">¥<?=number_format($all,2) ?? '0.00 '?></p>
    <div class="weui-flex incomeList">
        <div class="weui-flex__item">今日收益<span class="todayProfit">¥<?=number_format($today,2) ?? '0.00'?></span></div>
        <div class="weui-flex__item">可提现收益<span class="cashableIncome">¥<?=number_format($cash,2) ?? '0.00'?></span></div>
    </div>
    <div class="cash"><a href="<?=Yii::$app->urlManager->createUrl(['mine/docash'])?>" class="weui-btn">提现</a></div>
</div>
<p class="detail">收益明细</p>
<div class="weui-cells detailCon">
  <?if(!empty($data)):?>
    <?foreach ($data as $v):?>
      <a class="weui-cell" href="javascript:;">
          <div class="weui-cell__bd">
              <p class="brief">
                  <?= $v->relateChild->nickname.'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$v->desc?></p>
              <p class="time"><?=Yii::$app->formatter->asDatetime($v->created_at)?></p>
          </div>
          <div class="weui-cell__ft">
              <p class="money">+¥<?=number_format($v->get_money,2)?></p>
              <p class="sure"><?=$v->StatusText?></p>
          </div>
      </a>
    <?endforeach;?>
  <?endif;?>
</div>

<?=\wechat\common\widgets\FooterNav::widget()?>
