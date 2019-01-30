<?php
/**
 * Created by PhpStorm.
 * User: weilone
 * Date: 2018/12/25
 * Time: 23:03
 */
namespace common\models\bbb;
class SmsLog extends \common\models\common\BaseModel
{

    public $attributes = [
        'phone','code','imgcode','created_at','updated_at'
    ];

    public static function tableName()
    {
        return '{{%bbb_sms_log}}';
    }

}