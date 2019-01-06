<?php
/**
 * Created by PhpStorm.
 * User: weilone
 * Date: 2019/1/6
 * Time: 16:11
 */
$this->registerCssFile(Yii::getAlias('@bbb').'/css/message.css',['depends'=>\wechat\assets\AppAsset::class]);
?>
<!--消息列表-->
<ul class="messageList">
    <li>
        <div class="weui-flex">
            <!-- <div class="weui-flex__item">
                 <div class="left_img">
                     <img src="images/messicon_06.jpg" alt="">
                 </div>
             </div>-->
            <div class="left_img">
                <img src="<?=Yii::$app->params['bbb']?>/images/messicon_06.jpg" alt="">
            </div>
            <div class="weui-flex__item mescon">
                <p class="title">"宝帮宝"小助手</p>
                <p class="noticeCon">
                    【内容更新】“当前，年轻女性成为了珠宝消费的主力军，她们更关注银饰珠宝的个性化、可定制化，”在谈到为何做快时尚银饰珠宝时，JHM创始人唐嘉求先生说，“我们在调查中发现，不少女性喜欢佩戴DIY首饰。”登录JHM官网，就会发现：JHM银饰共发布了“航线系列”、“定情系列”、“伦敦眼系列”、“昼夜系列”、“珍爱系列”、“初雪系列”、“简语系列”、“女神系列”等多种品类，在每个品类中，又有多达十余类产品可供选择。值得注意的是，JHM还提供“style定制”的个性化服务，有私人定制、商务礼品、婚庆礼品三种服务可供选择。
                </p>
                <p class="read"><a href="javascript:;">点击阅读~</a></p>
                <p class="time"><span>8天前</span></p>
            </div>
        </div>
    </li>
</ul>
