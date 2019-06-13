<?php

namespace common\models\bbb;

use addons\RfSignShoppingDay\common\models\User;
use common\models\common\BaseModel;
use common\models\member\MemberInfo;
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
 * @property string $rec_code
 * @property int $updated_at
 * @property int $created_at
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
            [['order_sn', 'trade_type','trade_no', 'out_trade_no', 'desc','rec_code'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'member_id' => '会员ID',
            'order_sn' => '订单号',
            'trade_type' => '支付类型',
            'trade_no' => 'Trade No',
            'out_trade_no' => '外部单号',
            'money' => '金额',
            'status' => '状态',//0待支付；1已支付；2已退款
            'goods' => '商品',
            'desc' => '描述',
            'updated_at' => '更新时间',
            'created_at' => '创建时间',
            'month_limit' => '时长：月',
            'rec_code' => 'rec_code',
        ];
    }

    function getMembers(){
        return $this->hasOne(MemberInfo::class,['id'=>'member_id']);
    }

    function getStatusText(){
        $map = [
            '待支付','已支付','已退款'
        ];
        return $map[$this->status];
    }

    function getRelateSpecial(){
        return $this->hasOne(BbbSpecials::class,['id'=>'goods']);
    }
}
