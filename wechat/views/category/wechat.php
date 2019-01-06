<?php
/**
 * Created by PhpStorm.
 * User: weilone
 * Date: 2019/1/6
 * Time: 16:56
 */
$this->registerCssFile(Yii::getAlias('@bbb').'/css/shopkeeperTool.css',['depends'=>\wechat\assets\AppAsset::class]);
?>
<!--子标题-->
<?=\wechat\common\widgets\Catnav::widget()?>
<!--列表-->
<div class="toolLists">
    <div class="listTitle">微信营销</div>
    <div class="tools">
        <div class="weui-panel weui-panel_access toolList">
            <!--<div class="weui-panel__hd">图文组合列表</div>-->
            <div class="weui-panel__bd">
                <a href="javascript:void(0);" class="weui-media-box weui-media-box_appmsg listItem">
                    <div class="weui-media-box__hd pic">
                        <img class="weui-media-box__thumb" src="<?=Yii::$app->params['bbb']?>/images/tool_01.jpg">
                    </div>
                    <div class="weui-media-box__bd">
                        <h4 class="titleA">一件产品如何买到1000件？</h4>
                        <!--<h5 class="titleB">一件产品如何买到1000件？</h5>-->
                        <p class="zan">
                            <span class="num1"><i class="iconfont icon-yanjing"></i>1998</span>
                            <span class="num2"><i class="iconfont icon-xinheart118"></i>1200</span>
                        </p>
                    </div>
                    <div class="weui-cell__ft time" style="">07-9 17：00</div>
                </a>
            </div>
        </div>
    </div>
</div>
