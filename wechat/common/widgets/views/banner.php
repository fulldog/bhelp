<?php
/**
 * Created by PhpStorm.
 * User: weilone
 * Date: 2019/1/5
 * Time: 23:01
 */
?>
<div  class="swiper-container banner" data-space-between='10' data-pagination='.swiper-pagination' data-autoplay="1000">
  <div class="swiper-wrapper">
    <?if(!empty($imgs)):?>
      <?foreach ($imgs as $v):?>
      <div class="swiper-slide"><img src="<?=$v?>" alt="" width="100%" ></div>
      <?endforeach;?>
    <?endif;?>
  </div>
  <div class="swiper-pagination"></div>
</div>
