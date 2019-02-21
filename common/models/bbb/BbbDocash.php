<?php

namespace common\models\bbb;

use common\models\member\MemberInfo;
use common\models\wechat\Fans;
use Yii;

/**
 * This is the model class for table "{{%bbb_docash}}".
 *
 * @property int $id
 * @property int $uid
 * @property string $cash
 * @property int $status
 * @property int $created_at
 * @property int $updated_at
 */
class BbbDocash extends \common\models\common\BaseModel
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%bbb_docash}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['uid', 'cash'], 'required'],
            [['uid', 'status', 'created_at', 'updated_at'], 'integer'],
            [['cash'], 'number'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'uid' => 'Uid',
            'cash' => '金额',
            'status' => '状态',
            'created_at' => '申请时间',
            'updated_at' => '修改时间',
        ];
    }

    function getStatusText(){
        $map = ['待审核', '已提现', '已拒绝'];
        return $map[$this->status];
    }

    function getRelateFans(){
        return $this->hasOne(Fans::class,['member_id'=>'uid']);
    }

    function getRelateUser(){
        return $this->hasOne(MemberInfo::class,['id'=>'uid']);
    }
}
