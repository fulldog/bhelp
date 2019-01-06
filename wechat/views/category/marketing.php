<?php
/**
 * Created by PhpStorm.
 * User: weilone
 * Date: 2019/1/6
 * Time: 22:32
 */
$this->registerCssFile(Yii::getAlias('@bbb').'/css/quality_person.css',['depends'=>\wechat\assets\AppAsset::class]);
?>
<?=\wechat\common\widgets\Catnav::widget()?>
<!--列表-->
<div class="personList">
    <div class="listTitle">营销策划</div>
    <div class="weui-cells ">
        <a class="weui-cell weui-cell_access" href="<?=Yii::$app->urlManager->createUrl(['category/shopkeeper','catid'=>1])?>">
            <div class="weui-cell__hd"><img src="<?=Yii::$app->params['bbb']?>/images/qualityImg_01.jpg" alt="精选方案"></div>
            <div class="weui-cell__bd">
                <p>精选方案</p>
            </div>
            <div class="weui-cell__ft">¥180/年</div>
        </a>
    </div>
</div>
<?=\wechat\common\widgets\FooterNav::widget()?>
