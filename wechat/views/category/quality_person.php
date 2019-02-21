<?php
/**
 * Created by PhpStorm.
 * User: weilone
 * Date: 2019/1/6
 * Time: 22:39
 */
$this->registerCssFile(Yii::getAlias('@bbb').'/css/quality_person.css',['depends'=>\wechat\assets\AppAsset::class]);
?>
<!--顶部标题-->
<div class="titleBar" id="titleBar">
  精品培训-人
  <span class="iconfont icon-close close"></span>
  <span class="iconfont icon-more more"></span>
</div>
<?=\wechat\common\widgets\Catnav::widget()?>
<!--列表-->
<div class="personList">
    <div class="listTitle">精品培训-人</div>
    <div class="weui-cells ">
        <a class="weui-cell weui-cell_access" href="<?=Yii::$app->urlManager->createUrl(['category/shopkeeper','catid'=>1])?>">
            <div class="weui-cell__hd"><img src="<?=Yii::$app->params['bbb']?>/images/qualityImg_01.jpg" alt="店长工具"></div>
            <div class="weui-cell__bd">
                <p>店长工具</p>
            </div>
            <div class="weui-cell__ft">¥180/年</div>
        </a>
    </div>
</div>
<?=\wechat\common\widgets\FooterNav::widget()?>

