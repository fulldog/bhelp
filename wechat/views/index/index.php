<?php
//$this->registerCssFile(Yii::getAlias('@bbb').'/css/index.css',['depends'=>\wechat\assets\AppAsset::class]);
?>
<!--搜索框-->
<div class="weui-search-bar" id="searchBar">
  <form class="weui-search-bar__form" action="<?=Yii::$app->urlManager->createUrl(['index/search'])?>">
    <div class="weui-search-bar__box">
      <i class="weui-icon-search"></i>
      <input type="search" class="weui-search-bar__input" id="searchInput" placeholder="搜索" required="">
      <a href="javascript:" class="weui-icon-clear" id="searchClear"></a>
    </div>
    <label class="weui-search-bar__label" id="searchText">
      <i class="weui-icon-search"></i>
      <span>搜索</span>
    </label>
  </form>
  <a href="javascript:" class="weui-search-bar__cancel-btn" id="searchCancel">取消</a>
</div>
<!--轮播图-->
<div  class="swiper-container banner" data-space-between='10' data-pagination='.swiper-pagination' data-autoplay="1000">
  <div class="swiper-wrapper">
    <div class="swiper-slide"><img src="<?=Yii::$app->params['bbb']?>/images/bbb001.jpg" alt="" width="100%" ></div>
    <div class="swiper-slide"><img src="<?=Yii::$app->params['bbb']?>/images/bbb002.jpg" alt="" width="100%" ></div>
    <div class="swiper-slide"><img src="<?=Yii::$app->params['bbb']?>/images/bbb003.jpg" alt="" width="100%" ></div>
  </div>
  <div class="swiper-pagination"></div>
</div>
<!--公告-->

<div class="noticeBox clearfix">
    <span class="title">公告</span>
    <div  class="swiper-container notice">
        <div class="swiper-wrapper">
            <div class="swiper-slide">宝帮宝,货通天下。利射四海11111</div>
            <div class="swiper-slide">宝帮宝,货通天下。利射四海22222</div>
            <div class="swiper-slide">宝帮宝,货通天下。利射四海333333333333333333333333333333333333333</div>
        </div>
    </div>
</div>
<!--导航-->
<div class="weui-flex nav">
    <div class="weui-flex__item">
        <a href="qualityTraining.html" class="nav_item">
            <img src="<?=Yii::$app->params['bbb']?>/images/iconnav_12.jpg" alt="">
            <div class="name">精品培训</div>
        </a>
    </div>
    <div class="weui-flex__item">
        <a href="marketingPlanning.html" class="nav_item">
            <img src="<?=Yii::$app->params['bbb']?>/images/iconnav_14.jpg" alt="">
            <div class="name">营销策划</div>
        </a>
    </div>
    <div class="weui-flex__item">
        <a href="wehatMarketing.html" class="nav_item">
            <img src="<?=Yii::$app->params['bbb']?>/images/iconnav_16.jpg" alt="">
            <div class="name">微信营销</div>
        </a>
    </div>
    <div class="weui-flex__item">
        <a href="jewelryColumn.html" class="nav_item">
            <img src="<?=Yii::$app->params['bbb']?>/images/iconnav_18.jpg" alt="">
            <div class="name">珠宝专栏</div>
        </a>
    </div>
</div>
<div class="line"></div>
<div class="nav2">
    <p class="title">知识内参</p>

    <div class="knowledges">
        <div class="weui-panel weui-panel_access knowList">
            <!--<div class="weui-panel__hd">图文组合列表</div>-->
            <div class="weui-panel__bd">
                <a href="javascript:void(0);" class="weui-media-box weui-media-box_appmsg listItem">
                    <div class="weui-media-box__hd pic">
                        <img class="weui-media-box__thumb" src="<?=Yii::$app->params['bbb']?>/images/bbbwc_38.jpg">
                    </div>
                    <div class="weui-media-box__bd">
                        <h4 class="titleA">轻奢示例方案·升级版</h4>
                        <h5 class="titleB">一件产品如何买到1000件？</h5>
                        <p class="zan">
                            <span class="num1"><i class="iconfont icon-yanjing"></i>1998</span>
                            <span class="num2"><i class="iconfont icon-xinheart118"></i>1200</span>
                        </p>
                    </div>
                    <div class="weui-cell__ft time" style="">2018-9-1</div>
                </a>
                <a href="javascript:void(0);" class="weui-media-box weui-media-box_appmsg listItem">
                    <div class="weui-media-box__hd pic">
                        <img class="weui-media-box__thumb" src="<?=Yii::$app->params['bbb']?>/images/bbbwc_38.jpg">
                    </div>
                    <div class="weui-media-box__bd">
                        <h4 class="titleA">微信营销·新零售</h4>
                        <h5 class="titleB">移动智能万物互联的门店新零售</h5>
                        <p class="zan">
                            <span class="num1"><i class="iconfont icon-yanjing"></i>1998</span>
                            <span class="num2"><i class="iconfont icon-xinheart118"></i>1200</span>
                        </p>
                    </div>
                    <div class="weui-cell__ft time" style="">2018-9-1</div>
                </a>
                <a href="javascript:void(0);" class="weui-media-box weui-media-box_appmsg listItem">
                    <div class="weui-media-box__hd pic">
                        <img class="weui-media-box__thumb" src="<?=Yii::$app->params['bbb']?>/images/bbbwc_38.jpg">
                    </div>
                    <div class="weui-media-box__bd">
                        <h4 class="titleA">精品陈列·升级版</h4>
                        <h5 class="titleB">让柜台有表情，让产品会说活</h5>
                        <p class="zan">
                            <span class="num1"><i class="iconfont icon-yanjing"></i>1998</span>
                            <span class="num2"><i class="iconfont icon-xinheart118"></i>1200</span>
                        </p>
                    </div>
                    <div class="weui-cell__ft time" style="">2018-9-1</div>
                </a>
                <a href="javascript:void(0);" class="weui-media-box weui-media-box_appmsg listItem">
                    <div class="weui-media-box__hd pic">
                        <img class="weui-media-box__thumb" src="<?=Yii::$app->params['bbb']?>/images/bbbwc_38.jpg">
                    </div>
                    <div class="weui-media-box__bd">
                        <h4 class="titleA">益智游戏</h4>
                        <h5 class="titleB">极品飞车</h5>
                        <p class="zan">
                            <span class="num1"><i class="iconfont icon-yanjing"></i>1998</span>
                            <span class="num2"><i class="iconfont icon-xinheart118"></i>1200</span>
                        </p>
                    </div>
                    <div class="weui-cell__ft time" style="">2018-9-1</div>
                </a>
                <a href="javascript:void(0);" class="weui-media-box weui-media-box_appmsg listItem">
                    <div class="weui-media-box__hd pic">
                        <img class="weui-media-box__thumb" src="<?=Yii::$app->params['bbb']?>/images/bbbwc_38.jpg">
                    </div>
                    <div class="weui-media-box__bd">
                        <h4 class="titleA">轻奢示例方案·升级版</h4>
                        <h5 class="titleB">一件产品如何买到1000件？</h5>
                        <p class="zan">
                            <span class="num1"><i class="iconfont icon-yanjing"></i>1998</span>
                            <span class="num2"><i class="iconfont icon-xinheart118"></i>1200</span>
                        </p>
                    </div>
                    <div class="weui-cell__ft time" style="">2018-9-1</div>
                </a>
                <a href="javascript:void(0);" class="weui-media-box weui-media-box_appmsg listItem">
                    <div class="weui-media-box__hd pic">
                        <img class="weui-media-box__thumb" src="<?=Yii::$app->params['bbb']?>/images/bbbwc_38.jpg">
                    </div>
                    <div class="weui-media-box__bd">
                        <h4 class="titleA">轻奢示例方案·升级版</h4>
                        <h5 class="titleB">一件产品如何买到1000件？</h5>
                        <p class="zan">
                            <span class="num1"><i class="iconfont icon-yanjing"></i>1998</span>
                            <span class="num2"><i class="iconfont icon-xinheart118"></i>1200</span>
                        </p>
                    </div>
                    <div class="weui-cell__ft time" style="">2018-9-1</div>
                </a>
                <a href="javascript:void(0);" class="weui-media-box weui-media-box_appmsg listItem">
                    <div class="weui-media-box__hd pic">
                        <img class="weui-media-box__thumb" src="<?=Yii::$app->params['bbb']?>/images/bbbwc_38.jpg">
                    </div>
                    <div class="weui-media-box__bd">
                        <h4 class="titleA">轻奢示例方案·升级版</h4>
                        <h5 class="titleB">一件产品如何买到1000件？</h5>
                        <p class="zan">
                            <span class="num1"><i class="iconfont icon-yanjing"></i>1998</span>
                            <span class="num2"><i class="iconfont icon-xinheart118"></i>1200</span>
                        </p>
                    </div>
                    <div class="weui-cell__ft time" style="">2018-9-1</div>
                </a>
                <a href="javascript:void(0);" class="weui-media-box weui-media-box_appmsg listItem">
                    <div class="weui-media-box__hd pic">
                        <img class="weui-media-box__thumb" src="<?=Yii::$app->params['bbb']?>/images/bbbwc_38.jpg">
                    </div>
                    <div class="weui-media-box__bd">
                        <h4 class="titleA">轻奢示例方案·升级版</h4>
                        <h5 class="titleB">一件产品如何买到1000件？</h5>
                        <p class="zan">
                            <span class="num1"><i class="iconfont icon-yanjing"></i>1998</span>
                            <span class="num2"><i class="iconfont icon-xinheart118"></i>1200</span>
                        </p>
                    </div>
                    <div class="weui-cell__ft time" style="">2018-9-1</div>
                </a>

            </div>
        </div>
    </div>

</div>

<!--------页脚-------->
<div class="weui-tabbar">
    <a href="#" class="weui-tabbar__item weui-bar__item--on">
        <div class="weui-tabbar__icon">
            <span class="iconfont icon-index"></span>
        </div>
        <p class="weui-tabbar__label">首页</p>
    </a>
    <a href="message.html" class="weui-tabbar__item">
        <div class="weui-tabbar__icon" style="position: relative;">
            <span class="iconfont icon-message"></span>
            <span class="weui-badge" style="position: absolute;top: -.3em;right: -1.1em;">9</span>
        </div>
        <p class="weui-tabbar__label">消息</p>
    </a>
    <a href="mine.html" class="weui-tabbar__item">
        <div class="weui-tabbar__icon">
            <span class="iconfont icon-mine"></span>
        </div>
        <p class="weui-tabbar__label">我的</p>
    </a>
</div>

<!--模态层-->
<div class="weui-mask weui-mask--visible"></div>
<!--注册弹窗-->
<div class="weui-dialog weui-skin_android weui-dialog--visible registerBox">
  <div class="img">
    <span class="iconfont icon-zhucehuiyuan"></span>
  </div>
  <a href="<?=Yii::$app->urlManager->createUrl(['index/register'])?>" class="register">
    注&nbsp;册<br>
    会&nbsp;员
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