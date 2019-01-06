<?php
/**
 * Created by PhpStorm.
 * User: weilone
 * Date: 2019/1/5
 * Time: 23:01
 */
?>
<div class="weui-flex subNav">
  <div class="weui-flex__item">
    <a href="<?=Yii::$app->urlManager->createUrl(['index/index'])?>"><span><i class="iconfont icon-home ico"></i>宝帮宝</span></a>
  </div>
  <div class="weui-flex__item item2">
    <i class="weui-icon-search ico"></i>
    <a href="<?=Yii::$app->urlManager->createUrl(['mine/purchase'])?>">关注</a>
    <i class="ico2">|</i>
    <a href="<?=Yii::$app->urlManager->createUrl(['mine/index'])?>">我的</a>
  </div>
</div>
