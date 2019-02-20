<?php
/**
 * Created by PhpStorm.
 * User: weilone
 * Date: 2019/1/6
 * Time: 16:11
 */
$this->registerCssFile(Yii::getAlias('@bbb').'/css/message.css',['depends'=>\wechat\assets\AppAsset::class]);
?>
<!--顶部标题-->
<div class="titleBar">
  我的消息
  <span class="iconfont icon-close close"></span>
  <span class="iconfont icon-more more"></span>
</div>
<!--消息列表-->
<ul class="messageList">
  <?if(!empty($messages)):?>
  <?foreach ($messages as $mes):?>
    <li>
        <div class="weui-flex">
            <div class="left_img">
                <img src="<?=Yii::$app->params['bbb']?>/images/messicon_06.jpg" alt="">
            </div>
            <div class="weui-flex__item mescon">
                <p class="title">"宝帮宝"小助手</p>
                <p class="noticeCon">
                    <?=$mes['message']?>
                </p>
                <p class="read"><a href="javascript:;" id="msg-<?=$mes['id']?>" <?if (!$mes['status']):?>onclick="has_read(<?=$mes['id']?>)"<?endif;?>><?if($mes['status']==1):?>已读~<?else:?>标记已读~<?endif;?></a></p>
                <p class="time"><span><?=Yii::$app->formatter->asRelativeTime($mes['created_at'])?></span></p>
            </div>
        </div>
    </li>
  <?endforeach;?>
  <?endif;?>
</ul>
<script>
  function has_read(id) {
    $.ajax({
      data:{id:id,'_csrf-wechat':'<?=Yii::$app->request->csrfToken?>'},
      dataType:'json',
      type:'post',
      success:function(data) {
        $('msg-'+id).html('已读');
      }
    });
  }
</script>