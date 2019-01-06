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

<div class="intro">
    <p class="name">张微</p>
    <p class="series">慕弘陈列</p>
    <p class="con">68节知识大礼包</p>
</div>
<div class="list">
    <p class="series">人人都应该收藏的陈列课程</p>
    <p class="audios">67节陈列音频课</p>
    <p class="number">共68期</p>
    <a class="give" href="javascript:;">
        <span class="iconfont icon-gift"></span>
        <i>送好友</i>
    </a>
</div>

<div class="book">
    <a href="javascript:void(0);" onclick="dopay()" class="weui-btn weui-btn_primary">订阅专栏¥99.00</a>
</div>
<script>
  function dopay() {
    $.ajax({
      url:'<?=\yii\helpers\Url::to(['order/subscribe','sid'=>$sid])?>',
      data:{'_csrf-wechat':'<?=Yii::$app->request->csrfToken?>'},
      dataType:'json',
      type:'post',
      success:function(data) {
        if (data.status>0){

        }else {

        }
      }
    })
  }
</script>
