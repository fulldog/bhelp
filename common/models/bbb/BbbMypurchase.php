<?php

namespace common\models\bbb;

use Yii;

/**
 * This is the model class for table "{{%bbb_mypurchase}}".
 *
 * @property int $id
 * @property int $uid
 * @property int $sid
 * @property int $start_time
 * @property int $end_time
 * @property int $status
 * @property int $created_at
 * @property int $updated_at
 */
class BbbMypurchase extends \common\models\common\BaseModel
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%bbb_mypurchase}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['uid', 'sid'], 'required'],
            [['uid', 'sid', 'start_time', 'end_time', 'status', 'created_at', 'updated_at'], 'integer'],
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
            'sid' => 'Sid',
            'start_time' => 'Start Time',
            'end_time' => 'End Time',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    function getRelateSpecial(){
        return $this->hasOne(BbbSpecials::class,['id'=>'sid']);
    }

    function getNewDetail(){
        return BbbSpecialDetails::find()->where(['sid'=>$this->sid])->orderBy(['id'=>'desc'])->one();
    }
}
