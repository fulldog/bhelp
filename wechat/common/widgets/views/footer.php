<?php
/**
 * Created by PhpStorm.
 * User: weilone
 * Date: 2019/1/5
 * Time: 23:01
 */
?>
<!--------页脚-------->
<div class="weui-tabbar">
  <a href="<?=Yii::$app->urlManager->createUrl(['index/index'])?>" class="weui-tabbar__item weui-bar__item--on">
    <div class="weui-tabbar__icon">
      <span class="iconfont icon-index"></span>
    </div>
    <p class="weui-tabbar__label">首页</p>
  </a>
  <a href="<?=Yii::$app->urlManager->createUrl(['mine/message'])?>" class="weui-tabbar__item">
    <div class="weui-tabbar__icon" style="position: relative;">
      <span class="iconfont icon-message"></span>
      <span class="weui-badge" style="position: absolute;top: -.3em;right: -1.1em;"><?=$count?></span>
    </div>
    <p class="weui-tabbar__label">消息</p>
  </a>
  <a href="<?=Yii::$app->urlManager->createUrl(['mine/index'])?>" class="weui-tabbar__item">
    <div class="weui-tabbar__icon">
      <span class="iconfont icon-mine"></span>
    </div>
    <p class="weui-tabbar__label">我的</p>
  </a>
</div>
