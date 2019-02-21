<?php
/**
 * Created by PhpStorm.
 * User: weilone
 * Date: 2019/1/6
 * Time: 16:30
 */
$this->registerCssFile(Yii::getAlias('@bbb').'/css/qualityTraining.css',['depends'=>\wechat\assets\AppAsset::class]);
?>
<!--搜索框-->
<?=\wechat\common\widgets\Search::widget()?>
<!--轮播图-->
<?=\wechat\common\widgets\Banner::widget()?>
<!--公告-->
<?=\wechat\common\widgets\Notice::widget()?>
<!--导航-->
<!--顶部标题-->
<div class="titleBar" id="titleBar">
  精品培训
  <span class="iconfont icon-close close"></span>
  <span class="iconfont icon-more more"></span>
</div>
<div class="weui-flex navList">
    <!--人-->
    <div class="weui-flex__item">
        <a href="<?=Yii::$app->urlManager->createUrl(['category/quality-person'])?>"><img src="<?=Yii::$app->params['bbb']?>/images/quality_06.jpg" alt=""></a>
    </div>
    <!--店-->
    <div class="weui-flex__item">
        <a href="javascript:;"><img src="<?=Yii::$app->params['bbb']?>/images/quality_07.jpg" alt=""></a>
    </div>
</div>
<div class="weui-flex navList2">
    <!--货-->
    <div class="weui-flex__item">
        <a href="javascript:;"><img src="<?=Yii::$app->params['bbb']?>/images/quality_10.jpg" alt=""></a>
    </div>
    <!--销-->
    <div class="weui-flex__item">
        <a href="javascript:;"><img src="<?=Yii::$app->params['bbb']?>/images/quality_11.jpg" alt=""></a>
    </div>
</div>
