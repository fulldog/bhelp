<?php
/**
 * Created by PhpStorm.
 * User: weilone
 * Date: 2019/1/5
 * Time: 22:41
 */
$this->registerCssFile(Yii::getAlias('@bbb').'/css/myPurchase.css',['depends'=>\wechat\assets\AppAsset::class]);
?>
<!--顶部标题-->
<div class="titleBar">
  我的已购
  <span class="iconfont icon-close close"></span>
  <span class="iconfont icon-more more"></span>
</div>
<p class="titile">珠宝专栏</p>

<?if(!empty($specials)):?>
  <!--有订购内容--begin-->
  <div class="purchase">
    <?foreach ($specials as $v):?>
      <div class="weui-cells jewelryList">
        <a class="weui-cell" href="javascript:;">
          <div class="weui-cell__hd"><img src="<?=$v->relateSpecial['img']?>" alt=""></div>
          <div class="weui-cell__bd">
            <p class="name"><?=$v->relateSpecial['author']?>•<?=$v->relateSpecial['title']?></p>
            <p class="validity">期数<span><?=$v->relateSpecial['totle']?></span></p>
            <p class="update">最新更新：<span><?=$v->getNewDetail()->title?></span></p>
          </div>
<!--          <div class="weui-cell__ft"><span class="peopleNub">--><?//=$v['subscrible_count']?><!--人已订阅</span></div>-->
        </a>
      </div>
    <?endforeach;?>
  </div>
  <!--有订购内容--end-->
  <div class="weui-loadmore weui-loadmore_line no_more">
    <span class="weui-loadmore__tips">没有更多…</span>
  </div>
<?else:?>
  <!--无订购内容--begin-->
  <div class="purchaseNone" style="display: block">
    <div class="list">
      <img src="<?=Yii::$app->params['bbb']?>/images/purchase_01.jpg" alt="">
    </div>
    <div class="tip">
      <p>暂无订购内容</p>
      <p class="p2">点击前往珠宝专栏选购</p>
    </div>
    <div class="jump"><a href="<?=\yii\helpers\Url::to(['category/jewelry'])?>" class="weui-btn weui-btn_primary">前往【珠宝专栏】</a></div>
  </div>
  <!--无订购内容--end-->
<?endif;?>
<?=\wechat\common\widgets\FooterNav::widget()?>
