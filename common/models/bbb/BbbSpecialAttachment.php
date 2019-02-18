<?php

namespace common\models\bbb;

use Yii;

/**
 * This is the model class for table "{{%bbb_special_attachment}}".
 *
 * @property int $id
 * @property int $sdid
 * @property string $drive 存储位置
 * @property string $type audio,video,img,file
 * @property string $name
 * @property string $ext
 * @property int $size
 * @property int $status 0禁用 1启用
 * @property string $path 物理路径
 * @property string $url
 * @property int $created_at
 * @property int $updated_at
 */
class BbbSpecialAttachment extends \common\models\common\BaseModel
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%bbb_special_attachment}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['sdid'], 'required'],
            [['sdid', 'size', 'status', 'created_at', 'updated_at'], 'integer'],
            [['drive'], 'string', 'max' => 50],
            [['type', 'ext'], 'string', 'max' => 10],
            [['name', 'path', 'url'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'sdid' => 'Sdid',
            'drive' => '存储位置',
            'type' => '类型',//audio,video,img,file
            'name' => 'Name',
            'ext' => 'Ext',
            'size' => 'Size',
            'status' => '状态',//0禁用 1启用
            'path' => '物理路径',
            'url' => 'Url',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
