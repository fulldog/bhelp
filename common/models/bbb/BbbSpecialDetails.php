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
 * @property int $status 0 关闭 1 打开
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
            'sid' => '专栏分类',
            'title' => '标题',
            'desc' => '描述',
            'content' => '内容',
            'view_count' => '浏览量',
            'status' => '状态',//0禁用 1启用
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    function getSpecial()
    {
        return $this->hasOne(BbbSpecials::class,['id'=>'sid']);
    }
}
