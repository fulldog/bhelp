<?php

namespace common\models\bbb;

use common\models\wechat\Fans;
use Yii;

/**
 * This is the model class for table "{{%bbb_parents_cash}}".
 *
 * @property int $id
 * @property int $uid
 * @property int $child_uid
 * @property int $order_id
 * @property string $goods
 * @property string $desc
 * @property string $money
 * @property int $status
 * @property string $get_money
 * @property int $created_at
 * @property int $updated_at
 */
class BbbParentsCash extends \common\models\common\BaseModel
{

    private $_status = [
        '0'=>'待审核',
        '1'=>'已确认',
        '2'=>'已拒绝'
    ];

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%bbb_parents_cash}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['uid', 'child_uid', 'order_id', 'goods', 'money', 'get_money'], 'required'],
            [['uid', 'child_uid', 'order_id', 'status', 'created_at', 'updated_at'], 'integer'],
            [['money', 'get_money'], 'number'],
            [['goods', 'desc'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'uid' => '会员ID',
            'child_uid' => '下级ID',
            'order_id' => '订单ID',
            'goods' => '商品',
            'desc' => '描述',
            'money' => '总价',
            'status' => '状态',//0带审核 1已审核 2已提现
            'get_money' => '分成',
            'created_at' => '创建时间',
            'updated_at' => '更新时间',
        ];
    }

    function getRelateSpecial(){
        return $this->hasOne(BbbSpecials::class,['id'=>'goods']);
    }

    function getRelateChild(){
        return $this->hasOne(Fans::class,['member_id'=>'child_uid']);
    }

    function getStatusText(){
        return $this->_status[$this->status];
    }
}
