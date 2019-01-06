<?php
/**
 * Created by PhpStorm.
 * User: weilone
 * Date: 2019/1/6
 * Time: 17:04
 */
$this->registerCssFile(Yii::getAlias('@bbb').'/css/jewelryColumn.css',['depends'=>\wechat\assets\AppAsset::class]);
?>
<?=\wechat\common\widgets\Catnav::widget()?>
<!--列表-->
<div class="columns">
    <div class="listTitle">珠宝专栏</div>
    <div class="weui-cells jewelryList">
        <a class="weui-cell weui-cell_access" href="<?=Yii::$app->urlManager->createUrl(['order/subscribe','sid'=>1])?>">
            <div class="weui-cell__hd"><img src="<?=Yii::$app->params['bbb']?>/images/jewelry_12.jpg" alt=""></div>
            <div class="weui-cell__bd">
                <p class="name">杜半·珠宝与设计</p>
                <p class="job">杜半 深圳市珠宝设计师协会会长</p>
                <p class="intro">带你领略珠宝灵魂魅力</p>
                <p class="price">¥99/元</p>
            </div>
            <div class="weui-cell__ft"><span class="peopleNub">1002人已订阅</span></div>
        </a>
    </div>

</div>
