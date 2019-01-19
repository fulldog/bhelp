<?php
namespace addons\RfArticle\wechat\controllers;

use common\controllers\AddonsBaseController;
use common\helpers\AddonUrl;

/**
 * Class IndexController
 * @package addons\RfArticle\wechat\controllers
 * @author jianyan74 <751393839@qq.com>
 */
class IndexController extends AddonsBaseController
{
    /**
     * @throws \yii\base\InvalidConfigException
     */
    public function actionIndex()
    {
        header('Location:' . AddonUrl::toFront(['index/index']));
    }
}