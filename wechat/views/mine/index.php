<?php
/**
 * Created by PhpStorm.
 * User: weilone
 * Date: 2019/1/5
 * Time: 22:08
 */
$this->registerCssFile(Yii::getAlias('@bbb').'/css/mine.css',['depends'=>\wechat\assets\AppAsset::class]);
?>
<!--顶部标题-->
<div class="titleBar">
  我的
  <span class="iconfont icon-close close"></span>
  <span class="iconfont icon-more more"></span>
</div>
<div class="nameWrap">
    <div class="userImage">
        <img src="<?=$user['avatar']?>" alt="">
    </div>
    <p class="userName"><?=$user['nickname']?><span class="iconfont icon-<?if($user['original']['sex']>1):?>fa<?endif;?>male"></span></p>
</div>

<?if($vip_ending>7*24*3600):?>
<!--会员状态-->
<div class="weui-cells menuList">
    <div class="weui-cell weui-cell_access">
        <div class="weui-cell__hd listIcon" ><img src="<?=Yii::$app->params['bbb']?>/images/mine_08.jpg"></div>
        <div class="weui-cell__bd">
            <p class="effective">
                有效期至
                <span class="time"><?=Yii::$app->formatter->asRelativeTime(\Yii::$app->params['vipEndTime']);?></span>
            </p>
        </div>
        <div class="weui-cell__ft renew">
            <a href="javascript:;" class="renewBtn"></a>
        </div>
    </div>
</div>
<?elseif($vip_ending<=0):?>
<!--会员已到期-->
<div class="weui-cells menuList">
    <div class="weui-cell weui-cell_access">
        <div class="weui-cell__hd listIcon" ><img src="<?=Yii::$app->params['bbb']?>/images/mine_08.jpg"></div>
        <div class="weui-cell__bd">
            <p class="effective">
                有效期至
                <span class="time time_over">会员已到期<i class="iconfont icon-zhuyi"></i></span>
            </p>
        </div>
        <div class="weui-cell__ft renew">
            <a href="javascript:;" class="renewBtn"></a>
        </div>
    </div>
</div>
<?else:?>
    <!--会员准备到期-->
<div class="weui-cells menuList">
    <div class="weui-cell weui-cell_access">
        <div class="weui-cell__hd listIcon" ><img src="<?=Yii::$app->params['bbb']?>/images/mine_08.jpg"></div>
        <div class="weui-cell__bd">
            <p class="effective">
                有效期至
                <span class="time_ready"><?=Yii::$app->formatter->asRelativeTime(\Yii::$app->params['vipEndTime']);?></span>
            </p>
        </div>
        <div class="weui-cell__ft renew">
            <a href="javascript:;" class="renewBtn2"></a>
        </div>
    </div>
</div>
<?endif;?>

<!--列表-->
<div class="weui-cells menuList" style="margin-bottom: 53px;">
    <a class="weui-cell weui-cell_access" href="<?=Yii::$app->urlManager->createUrl(['mine/infos'])?>">
        <div class="weui-cell__hd listIcon"><img src="<?=Yii::$app->params['bbb']?>/images/mine_14.jpg" alt=""></div>
        <div class="weui-cell__bd">
            <p>个人信息</p>
        </div>
        <div class="weui-cell__ft"></div>
    </a>
    <a class="weui-cell weui-cell_access" href="<?=Yii::$app->urlManager->createUrl(['mine/purchase'])?>">
        <div class="weui-cell__hd listIcon"><img src="<?=Yii::$app->params['bbb']?>/images/mine_20.jpg" alt=""></div>
        <div class="weui-cell__bd">
            <p>我的已购</p>
        </div>
        <div class="weui-cell__ft"></div>
    </a>
<!--    <a class="weui-cell weui-cell_access" href="--><?//=Yii::$app->urlManager->createUrl(['mine/purchase'])?><!--">-->
<!--        <div class="weui-cell__hd listIcon"><img src="--><?//=Yii::$app->params['bbb']?><!--/images/mine_26.jpg" alt=""></div>-->
<!--        <div class="weui-cell__bd">-->
<!--            <p>我的收藏</p>-->
<!--        </div>-->
<!--        <div class="weui-cell__ft"></div>-->
<!--    </a>-->
    <a class="weui-cell weui-cell_access" href="<?=Yii::$app->urlManager->createUrl(['mine/income'])?>">
        <div class="weui-cell__hd listIcon"><img src="<?=Yii::$app->params['bbb']?>/images/mine_32.jpg" alt=""></div>
        <div class="weui-cell__bd">
            <p>我的收益</p>
        </div>
        <div class="weui-cell__ft"></div>
    </a>
</div>
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
    $(".notice").swiper(
      {
        speed: 200,
        spaceBetween: 100,
        loop: true,
        autoplay: 3000,
        direction: 'vertical',

      }
    )
  });
</script>