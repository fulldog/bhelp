<?php
namespace common\enums;

/**
 * 状态枚举
 *
 * Class StatusEnum
 * @package common\enum
 */
class StatusEnum
{
    const ENABLED = 1;
    const DISABLED = 0;
    const DELETE = -1;

    const WECHAT_SUCC = 1;
    const WECHAT_FAIL = 0;

    /**
     * @var array
     */
    public static $listExplain = [
        self::ENABLED => '启用',
        self::DISABLED => '禁用',
//        self::WECHAT_FAIL => '支付失败',
//        self::WECHAT_SUCC => '支付成功',
    ];

    public static $WechatStatus = [
        self::WECHAT_FAIL => '支付失败',
        self::WECHAT_SUCC => '支付成功',
    ];
}
