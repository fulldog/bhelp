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
  <?if (!empty($list)):?>
    <?foreach ($list as $v):?>
      <div class="weui-cells jewelryList">
        <a class="weui-cell weui-cell_access" href="<?=Yii::$app->urlManager->createUrl(['order/subscribe','sid'=>$v['id']])?>">
          <div class="weui-cell__hd"><img src="<?=$v['img']?>" alt=""></div>
          <div class="weui-cell__bd">
            <p class="name"><?=$v['author'].'-'.$v['title']?></p>
            <p class="job"><?=$v['author'].'-'.$v['head']?></p>
            <p class="intro"><?=$v['desc']?></p>
            <p class="price">¥<?=$v['price']?>/元</p>
          </div>
          <div class="weui-cell__ft"><span class="peopleNub"><?=$v['subscrible_count']?>人已订阅</span></div>
        </a>
      </div>
    <?endforeach;?>
  <?endif;?>
</div>
