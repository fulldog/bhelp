<?php
/**
 * Created by PhpStorm.
 * User: weilone
 * Date: 2019/1/5
 * Time: 22:46
 */
$this->registerCssFile(Yii::getAlias('@bbb').'/css/income.css',['depends'=>\wechat\assets\AppAsset::class]);
?>
<div class="wrap">
    <p class="title">累计收益</p>
    <p class="money">0.00</p>
    <div class="weui-flex incomeList">
        <div class="weui-flex__item">今日收益<span class="todayProfit">0.00</span></div>
        <div class="weui-flex__item">可提现收益<span class="cashableIncome">0.00</span></div>
    </div>
    <div class="cash"><a href="<?=Yii::$app->urlManager->createUrl(['mine/docash'])?>" class="weui-btn">提现</a></div>
</div>
<p class="detail">收益明细</p>
<div class="weui-cells detailCon">
    <a class="weui-cell" href="javascript:;">
        <div class="weui-cell__bd">
            <p class="brief">乔迎昆  购买  注册会员高级会员800</p>
            <p class="time">2018-10-11  09:13:28</p>
        </div>
        <div class="weui-cell__ft">
            <p class="money">+50.00</p>
            <p class="sure">确认收益</p>
        </div>
    </a>
    <a class="weui-cell" href="javascript:;">
        <div class="weui-cell__bd">
            <p class="brief">乔迎昆  购买  专栏慕弘陈列jslafjsa</p>
            <p class="time">2018-10-15  09:13:28</p>
        </div>
        <div class="weui-cell__ft">
            <p class="money">+50.00</p>
            <p class="sure">确认收益</p>
        </div>
    </a>
    <a class="weui-cell" href="javascript:;">
        <div class="weui-cell__bd">
            <p class="brief">乔迎昆  购买  注册会员43643646</p>
            <p class="time">2018-10-19  09:13:28</p>
        </div>
        <div class="weui-cell__ft">
            <p class="money">+50.00</p>
            <p class="sure">确认收益</p>
        </div>
    </a>
    <a class="weui-cell" href="javascript:;">
        <div class="weui-cell__bd">
            <p class="brief">乔迎昆  购买  注册会员43643646</p>
            <p class="time">2018-10-19  09:13:28</p>
        </div>
        <div class="weui-cell__ft">
            <p class="money">+50.00</p>
            <p class="sure">确认收益</p>
        </div>
    </a>
    <a class="weui-cell" href="javascript:;">
        <div class="weui-cell__bd">
            <p class="brief">乔迎昆  购买  注册会员43643646</p>
            <p class="time">2018-10-19  09:13:28</p>
        </div>
        <div class="weui-cell__ft">
            <p class="money">+50.00</p>
            <p class="sure">确认收益</p>
        </div>
    </a>
</div>

<?=\wechat\helper\widgets\FooterNav::widget()?>
