<?php

namespace common\models\bbb;

use Yii;

/**
 * This is the model class for table "{{%bbb_special_details}}".
 *
 * @property int $id
 * @property int $sid
 * @property string $title
 * @property string $desc
 * @property string $content
 * @property int $view_count 浏览量
 * @property int $status 10 关闭 20 打开
 * @property int $created_at
 * @property int $updated_at
 */
class BbbSpecialDetails extends \common\models\common\BaseModel
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%bbb_special_details}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['sid', 'title'], 'required'],
            [['sid', 'view_count', 'status', 'created_at', 'updated_at'], 'integer'],
            [['content'], 'string'],
            [['title', 'desc'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'sid' => 'Sid',
            'title' => 'Title',
            'desc' => 'Desc',
            'content' => 'Content',
            'view_count' => '浏览量',
            'status' => '10 关闭 20 打开',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
