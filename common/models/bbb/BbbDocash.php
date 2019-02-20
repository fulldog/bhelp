<?php

namespace common\models\bbb;

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
            'cash' => 'Cash',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
