<?php
/**
 * Created by PhpStorm.
 * User: weilone
 * Date: 2019/1/5
 * Time: 22:41
 */
$this->registerCssFile(Yii::getAlias('@bbb').'/css/myPurchase.css',['depends'=>\wechat\assets\AppAsset::class]);
?>

<p class="titile">珠宝专栏</p>

<!--无订购内容--begin-->
<div class="purchaseNone">
    <div class="list">
        <img src="<?=Yii::$app->params['bbb']?>/images/purchase_01.jpg" alt="">
    </div>
    <div class="tip">
        <p>暂无订购内容</p>
        <p class="p2">点击前往珠宝专栏选购</p>
    </div>
    <div class="jump"><a href="jewelryColumn.html" class="weui-btn weui-btn_primary">前往【珠宝专栏】</a></div>
</div>
<!--无订购内容--end-->

<!--有订购内容--begin-->
<div class="purchase">
    <div class="weui-cells jewelryList">
        <a class="weui-cell" href="javascript:;">
            <div class="weui-cell__hd"><img src="<?=Yii::$app->params['bbb']?>/images/jewelry_12.jpg" alt=""></div>
            <div class="weui-cell__bd">
                <p class="name">张微•慕弘陈列</p>
                <p class="validity">有效期<span>2019-10-01</span></p>
                <p class="update">最新更新：<span>【珠宝专栏】陈列的七大法则</span></p>
            </div>
            <!--<div class="weui-cell__ft"><span class="peopleNub">100人已订阅</span></div>-->
        </a>

    </div>
</div>
<!--有订购内容--end-->
<div class="weui-loadmore weui-loadmore_line no_more">
    <span class="weui-loadmore__tips">没有更多…</span>
</div>
<?=\wechat\common\widgets\FooterNav::widget()?>
