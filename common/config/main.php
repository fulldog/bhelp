<?php
return [
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm' => '@vendor/npm-asset',
    ],
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'language' => 'zh-CN',
    'sourceLanguage' => 'zh-cn',
    'timeZone' => 'Asia/Shanghai',
    'bootstrap' => [
        'queue' // 队列系统
    ],
    'components' => [
        /** ------ 格式化时间 ------ **/
        'formatter' => [
            'dateFormat' => 'yyyy-MM-dd',
            'datetimeFormat' => 'yyyy-MM-dd HH:mm:ss',
            'decimalSeparator' => ',',
            'thousandSeparator' => ' ',
            'currencyCode' => 'CNY',
        ],
        /** ------ 缓存 ------ **/
        'cache' => [
//            'class' => 'yii\caching\FileCache',
//            'cachePath' => '@backend/runtime/cache' // 注意如果要改成非文件缓存请删除，否则会报错
            'class'=>'yii\redis\Cache',//使用redis缓存作为项目缓存
            'redis'=>[
                'hostname' => '127.0.0.1',
                'port' => '6379',
                'database' => 2
            ],
        ],
        /** ------ 网站碎片管理 ------ **/
        'debris' => [
            'class' => 'common\components\Debris',
        ],
        /** ------ redis配置 ------ **/
        'redis' => [
            'class' => 'yii\redis\Connection',
            'hostname' => 'localhost',
            'port' => 6379,
            'database' => 0,
        ],
        /** ------ 队列设置 ------ **/
        'queue' => [
             'class' => 'yii\queue\redis\Queue',
             'redis' => 'redis', // 连接组件或它的配置
             'channel' => 'queue', // Queue channel key
            'as log' => 'yii\queue\LogBehavior',// 日志
        ],
        /** ------ 微信SDK ------ **/
        'wechat' => [
            'class' => 'jianyan\easywechat\Wechat',
            'userOptions' => [],  // 用户身份类参数
            'sessionParam' => '_wechatUser', // 微信用户信息将存储在会话在这个密钥
            'returnUrlParam' => '_wechatReturnUrl', // returnUrl 存储在会话中
        ],
        /** ------ 公用支付 ------ **/
        'pay' => [
            'class' => 'common\components\Pay',
        ],
        /** ------ 二维码 ------ **/
        'qr' => [
            'class' => '\Da\QrCode\Component\QrCodeComponent',
            // ... 您可以在这里配置组件的更多属性
        ],
        /** ------ 服务 ------ **/
        'services' => [
            'class' => 'common\services\Application',
        ],
        /** ------ LogStation ------ **/
        'LogStation' => [
            'class' => \common\helpers\LogStation::class,
            'channels'=>[
                'wechat'=>[
                    'app_id'=>'a0xpx0e88f531468',
                    'app_key'=>'GxScHLGMnCSllRkTm2hHfEKYZExIpxNE'
                ],
                'web'=>[
                    'app_id'=>'a0xpx11260212440',
                    'app_key'=>'V65HMQZ2Lh0DAI26Y0mAxluNG9ucKxRE'
                ]
            ]
        ],
    ],
];
