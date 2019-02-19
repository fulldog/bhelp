<?php
$this->registerCssFile(Yii::getAlias('@bbb').'/css/index.css',['depends'=>\wechat\assets\AppAsset::class]);
?>
<!--顶部标题-->
<div class="titleBar" id="titleBar">
  宝帮宝
  <span class="iconfont icon-close close"></span>
  <span class="iconfont icon-more more"></span>
</div>
<!--搜索框-->
<?=\wechat\common\widgets\Search::widget()?>
<!--轮播图-->
<?=\wechat\common\widgets\Banner::widget()?>
<!--公告-->
<?=\wechat\common\widgets\Notice::widget()?>

<!--导航-->
<?=\wechat\common\widgets\Category::widget()?>
<div class="line"></div>
<div class="nav2">
    <p class="title">知识内参</p>

    <div class="knowledges">
        <div class="weui-panel weui-panel_access knowList">
            <!--<div class="weui-panel__hd">图文组合列表</div>-->
          <div class="weui-panel__bd">
          <?if(!empty($list)):?>
            <?foreach ($list as $v):?>
                <a href="<?=\common\helpers\UrlHelper::to(['index/detail','id'=>$v['id']])?>" class="weui-media-box weui-media-box_appmsg listItem">
                  <div class="weui-media-box__hd pic">
                    <img class="weui-media-box__thumb" src="<?=$v['cover']?>">
                  </div>
                  <div class="weui-media-box__bd">
                    <h4 class="titleA"><?=$v['title'].'·'.$v['author']?></h4>
                    <h5 class="titleB"><?=$v['description']?></h5>
                    <p class="zan">
                      <span class="num1"><i class="iconfont icon-yanjing"></i><?=$v['view']?></span>
<!--                      <span class="num2"><i class="iconfont icon-xinheart118"></i>1200</span>-->
                    </p>
                  </div>
                  <div class="weui-cell__ft time" style=""><?=Yii::$app->formatter->asDate($v['created_at'])?></div>
                </a>
            <?endforeach;?>
          <?endif;?>
          </div>
        </div>
    </div>

</div>
<!--模态层-->
<!--<div class="weui-mask weui-mask--visible"></div>-->
<!--注册弹窗-->
<?if (!$isVip):?>
  <div class="weui-dialog weui-skin_android weui-dialog--visible registerBox">
    <div class="img">
      <span class="iconfont icon-zhucehuiyuan"></span>
    </div>
    <a href="<?=Yii::$app->urlManager->createUrl(['index/register'])?>" class="register">
      注&nbsp;册<br>
      会&nbsp;员
    </a>
  </div>
<?elseif (!$vipEnable):?>
  <!--续费弹窗-->
  <div class="weui-dialog weui-skin_android weui-dialog&#45;&#45;visible registerBox" style="">
    <div class="img img2">
      <span class="iconfont icon-wenxintishi tips"></span><br>
      <i class="tips2">温馨提示</i>
    </div>
    <p>您的会员已到期,【部分内容】,不能查阅.</p>
    <a href="<?=Yii::$app->urlManager->createUrl(['order/recharge'])?>" class="renew">续费会员</a>
    <span class="iconfont icon-guanbi close"></span>
  </div>
<?endif;?>
<?=\wechat\common\widgets\Footer::widget()?>
<script>
  $(function() {
    $(".banner").swiper(
      {
        speed: 400,
        spaceBetween: 100,
        loop: true,
        autoplay: 3000,
        pagination: {
          el: '.swiper-pagination',
        },
      }
    );
    function noticSwiper(){
      $(".notice").swiper(
        {
          speed: 200,
          spaceBetween: 100,
          loop: true,
          autoplay: 3000,
          direction: 'vertical',

        }
      )
    }
    setTimeout(noticSwiper,100)
    $(".weui-mask").click(function () {
      $(this).removeClass('weui-mask--visible');
      $('.weui-dialog').removeClass('weui-dialog--visible')
    })
  });
</script>