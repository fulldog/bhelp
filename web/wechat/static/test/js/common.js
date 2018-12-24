// 判断是否是微信浏览器
var is_weixin = (function(){return navigator.userAgent.toLowerCase().indexOf('micromessenger') !== -1})();
if(is_weixin){
    $(function(){
        return true;
    });
    $('.titleBar').next().css('margin-top','0');
    $('.titleBar').remove();
}else{
    $(function(){
        return false;
    });
}

