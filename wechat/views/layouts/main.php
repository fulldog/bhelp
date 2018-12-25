<?php
use wechat\assets\AppAsset;
use yii\helpers\Html;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="initial-scale=1,maximum-scale=1, minimum-scale=1">
    <meta name="description" content="<?=$this->params['description']?>">
    <title><?=$this->params['title']?></title>
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<script type="text/javascript">
  window.onload = function () {
    (function(e,t){var i=document,n=window;var l=i.documentElement;var r,a;var d,o=document.createElement("style");var s;function m(){var i=l.getBoundingClientRect().width;if(!t){t=540}if(i>t){i=t}var n=i*100/e;o.innerHTML="html{font-size:"+n+"px !important;}"}r=i.querySelector('meta[name="viewport"]');a="width=device-width,initial-scale=1,maximum-scale=1.0,user-scalable=no,viewport-fit=cover";if(r){r.setAttribute("content",a)}else{r=i.createElement("meta");r.setAttribute("name","viewport");r.setAttribute("content",a);if(l.firstElementChild){l.firstElementChild.appendChild(r)}else{var c=i.createElement("div");c.appendChild(r);i.write(c.innerHTML);c=null}}m();if(l.firstElementChild){l.firstElementChild.appendChild(o)}else{var c=i.createElement("div");c.appendChild(o);i.write(c.innerHTML);c=null}n.addEventListener("resize",function(){clearTimeout(s);s=setTimeout(m,300)},false);n.addEventListener("pageshow",function(e){if(e.persisted){clearTimeout(s);s=setTimeout(m,300)}},false);if(i.readyState==="complete"){i.body.style.fontSize="16px"}else{i.addEventListener("DOMContentLoaded",function(e){i.body.style.fontSize="16px"},false)}})(750,750);
  }
</script>
<style>
  .wrap{
    width:7.5rem;
    margin:0 auto;
  }
</style>
<body ontouchstart>
<?php $this->beginBody() ?>
<!--顶部标题-->
  <div class="titleBar">
      <?=$this->params['title']?>
    <span class="iconfont icon-close close"></span>
    <span class="iconfont icon-more more"></span>
  </div>
    <?= $content ?>

<!--续费弹窗-->
<div class="weui-dialog weui-skin_android weui-dialog&#45;&#45;visible registerBox" style="display: none">
    <div class="img img2">
        <span class="iconfont icon-wenxintishi tips"></span><br>
        <i class="tips2">温馨提示</i>
    </div>
    <p>您的会员已到期,【部分内容】,不能查阅.</p>
    <a href="<?=Yii::$app->urlManager->createUrl(['index/recharge'])?>" class="renew">续费会员</a>
    <span class="iconfont icon-guanbi close"></span>
</div>

<script type="application/javascript">
  $(function() {
    FastClick.attach(document.body);
  });
  function isIPhoneX(fn){
      var u = navigator.userAgent;
      var isIOS = !!u.match(/\(i[^;]+;( U;)? CPU.+Mac OS X/); //ios终端
      if (isIOS) {
          if (screen.height == 812 && screen.width == 375){
              //是iphoneX
              $('.knowledges').css('height','8.1rem');
              $('.messageList').css('height','14.2rem')
          }else{
              //不是iphoneX
          }
      }
  }
  isIPhoneX();
</script>
<?= Alert::widget() ?>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
