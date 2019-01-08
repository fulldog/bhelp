<?php
/**
 * Created by PhpStorm.
 * User: weilone
 * Date: 2019/1/5
 * Time: 23:01
 */
?>
<!--公告-->
<div class="noticeBox clearfix">
  <span class="title">公告</span>
  <div  class="swiper-container notice">
    <div class="swiper-wrapper">
      <?if(!empty($notice)):?>
        <?foreach ($notice as $v):?>
          <div class="swiper-slide"><?=$v['notice']?></div>
        <?endforeach;?>
      <?endif;?>
    </div>
  </div>
</div>
