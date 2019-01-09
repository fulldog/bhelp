<?php

namespace common\models\bbb;

use common\models\common\BaseModel;
use common\models\sys\Manager;
use Yii;

/**
 * This is the model class for table "{{%bbb_notice}}".
 *
 * @property int $id
 * @property int $admin_id
 * @property string $notice
 * @property int $created_at
 * @property int $type
 * @property int $updated_at
 */
class Notice extends BaseModel
{
    const NOTICE=1;
    const MESSAGE=2;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%bbb_notice}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['admin_id', 'created_at', 'updated_at','type'], 'integer'],
            [['notice'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'admin_id' => '创建者',
            'notice' => '公告内容',
            'type' => '类型',
            'created_at' => '创建日期',
            'updated_at' => '更新日期',
        ];
    }

    function getRelate(){
        return $this->hasOne(Manager::class,['id'=>'admin_id']);
    }

    function beforeSave($insert)
    {
        $this->admin_id = Yii::$app->user->getId();
        return parent::beforeSave($insert);
    }

    function getStatus(){
        $type = [
            1=>'公告',
            2=>'消息'
        ];
        return $type[$this->type];
    }
}
