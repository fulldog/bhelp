<?php

namespace common\models\bbb;

use Yii;

/**
 * This is the model class for table "{{%bbb_messages}}".
 *
 * @property int $id 主键
 * @property int $uid
 * @property int $notice_id 公告ID
 * @property int $status 状态 1已读
 * @property string $message 消息内容
 * @property string $created_at 创建时间
 * @property string $updated_at 更新时间
 */
class BbbMessages extends \common\models\common\BaseModel
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%bbb_messages}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['uid'], 'required'],
            [['uid', 'notice_id', 'status', 'created_at', 'updated_at'], 'integer'],
            [['message'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => '主键',
            'uid' => 'Uid',
            'notice_id' => '公告ID',
            'status' => '状态',
            'message' => '消息内容',
            'created_at' => '创建时间',
            'updated_at' => '更新时间',
        ];
    }
}
