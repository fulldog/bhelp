<?php
/**
 * Created by PhpStorm.
 * User: weilone
 * Date: 2019/1/6
 * Time: 17:54
 */
$this->registerCssFile(Yii::getAlias('@bbb').'/css/subscribe.css',['depends'=>\wechat\assets\AppAsset::class]);
?>
<!--子标题-->
<?=\wechat\common\widgets\Catnav::widget()?>
<!--顶部标题-->
<div class="titleBar">
  人人都应该收藏的陈列课程
  <span class="iconfont icon-close close"></span>
  <span class="iconfont icon-more more"></span>
</div>
<div class="intro">
    <p class="name"><?=$info['author']?></p>
    <p class="series"><?=$info['head']?></p>
    <p class="con"><?=$info['totle']?>节知识大礼包</p>
</div>
<div class="list">
    <p class="series"><?=$info['title']?></p>
    <p class="audios"><?=$info['totle']?>节陈列音频课</p>
    <p class="number">共<?=$info['totle']?>期</p>
    <a class="give" href="javascript:;">
        <span class="iconfont icon-gift"></span>
        <i>送好友</i>
    </a>
</div>

<div class="book">
    <a href="javascript:void(0);" onclick="dopay()" class="weui-btn weui-btn_primary">订阅专栏¥<?=$info['price']?></a>
</div>
<script>
  function dopay() {
    $.ajax({
      url:'<?=\yii\helpers\Url::to(['order/subscribe','sid'=>$info['id']])?>',
      //data:{'_csrf-wechat':'<?//=Yii::$app->request->csrfToken?>//'},
      dataType:'json',
      type:'post',
      success:function(data) {
        if (data.status>0){
          location.href ='<?=\common\helpers\UrlHelper::to(['order/pay']);?>'+'?orderSn='+data.data.order_sn
        }else {
          alert(data.msg);
        }
      }
    })
  }
</script>
