<?php

namespace common\models\bbb;

use Yii;

/**
 * This is the model class for table "{{%bbb_setting}}".
 *
 * @property int $id
 * @property string $key
 * @property string $value
 */
class BbbSetting extends \common\models\common\BaseModel
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%bbb_setting}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['key'], 'required'],
            [['key', 'value'], 'string', 'max' => 255],
            [['created_at', 'updated_at'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'key' => 'Key',
            'value' => 'Value',
            'created_at' => '创建时间',
            'updated_at' => '更新时间',
        ];
    }
}
