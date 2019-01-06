<?php
/**
 * Created by PhpStorm.
 * User: weilone
 * Date: 2019/1/6
 * Time: 16:40
 */
?>
<div class="weui-flex nav">
    <div class="weui-flex__item">
        <a href="<?=Yii::$app->urlManager->createUrl(['category/train'])?>" class="nav_item">
            <img src="<?=Yii::$app->params['bbb']?>/images/iconnav_12.jpg" alt="">
            <div class="name">精品培训</div>
        </a>
    </div>
    <div class="weui-flex__item">
        <a href="<?=Yii::$app->urlManager->createUrl(['category/marketing'])?>" class="nav_item">
            <img src="<?=Yii::$app->params['bbb']?>/images/iconnav_14.jpg" alt="">
            <div class="name">营销策划</div>
        </a>
    </div>
    <div class="weui-flex__item">
        <a href="<?=Yii::$app->urlManager->createUrl(['category/wechat'])?>" class="nav_item">
            <img src="<?=Yii::$app->params['bbb']?>/images/iconnav_16.jpg" alt="">
            <div class="name">微信营销</div>
        </a>
    </div>
    <div class="weui-flex__item">
        <a href="<?=Yii::$app->urlManager->createUrl(['category/jewelry'])?>" class="nav_item">
            <img src="<?=Yii::$app->params['bbb']?>/images/iconnav_18.jpg" alt="">
            <div class="name">珠宝专栏</div>
        </a>
    </div>
</div>
