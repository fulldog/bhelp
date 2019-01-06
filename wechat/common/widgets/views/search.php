<?php
/**
 * Created by PhpStorm.
 * User: weilone
 * Date: 2019/1/5
 * Time: 23:01
 */
?>
<div class="weui-search-bar" id="searchBar">
  <form class="weui-search-bar__form" action="<?=Yii::$app->urlManager->createUrl(['index/search'])?>">
    <div class="weui-search-bar__box">
      <i class="weui-icon-search"></i>
      <input type="submit" class="weui-search-bar__input" id="searchInput" placeholder="搜索" required="">
      <a href="javascript:" class="weui-icon-clear" id="searchClear"></a>
    </div>
    <label class="weui-search-bar__label" id="searchText">
      <i class="weui-icon-search"></i>
      <span>搜索</span>
    </label>
  </form>
  <a href="javascript:" class="weui-search-bar__cancel-btn" id="searchCancel">取消</a>
</div>
