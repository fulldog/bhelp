<?php

namespace common\models\bbb;

use common\models\common\BaseModel;
use Yii;

/**
 * This is the model class for table "{{%bbb_orders}}".
 *
 * @property int $id
 * @property int $member_id
 * @property string $order_sn
 * @property string $trade_type
 * @property string $trade_no
 * @property string $out_trade_no
 * @property string $money
 * @property int $status 0待支付；1已支付
 * @property string $goods
 * @property string $desc
 * @property int $updated_at
 * @property int $created_at
 * @property int $rec_code
 * @property int $month_limit
 */
class Orders extends BaseModel
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%bbb_orders}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['member_id', 'order_sn'], 'required'],
            [['member_id', 'status', 'updated_at', 'created_at','month_limit'], 'integer'],
            [['money'], 'number'],
            [['order_sn', 'trade_type', 'rec_code','trade_no', 'out_trade_no', 'goods', 'desc'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'member_id' => 'Member ID',
            'order_sn' => 'Order Sn',
            'trade_type' => 'Trade Type',
            'trade_no' => 'Trade No',
            'out_trade_no' => 'Out Trade No',
            'money' => 'Money',
            'status' => '0待支付；1已支付；2已退款',
            'goods' => 'Goods',
            'desc' => 'Desc',
            'updated_at' => 'Update Time',
            'updated_at' => 'Creat Time',
            'rec_code' => '邀请码',
            'month_limit' => '购买时长：月'
        ];
    }
}
