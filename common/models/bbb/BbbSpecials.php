<?php

namespace common\models\bbb;

use Yii;

/**
 * This is the model class for table "{{%bbb_specials}}".
 *
 * @property int $id
 * @property string $author 作者
 * @property string $head 头衔
 * @property string $title 标题
 * @property string $desc 描述
 * @property string $img 封面图
 * @property string $price 价格
 * @property int $totle 期数
 * @property int $subscrible_count 订阅数
 * @property int $status 0 关闭 1 打开
 * @property int $created_at
 * @property int $updated_at
 */
class BbbSpecials extends \common\models\common\BaseModel
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%bbb_specials}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['author', 'title'], 'required'],
            [['price'], 'number'],
            [['totle', 'subscrible_count', 'status', 'created_at', 'updated_at'], 'integer'],
            [['author', 'head', 'title', 'desc', 'img'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'author' => '作者',
            'head' => '头衔',
            'title' => '标题',
            'desc' => '描述',
            'img' => '封面图',
            'price' => '价格',
            'totle' => '期数',
            'subscrible_count' => '订阅数',
            'status' => '状态',//0禁用 1启用
            'created_at' => '创建时间',
            'updated_at' => '更新时间',
        ];
    }

    static function getAllAuthors(){
        $result =  self::find()->select(['id','author'])->asArray()->all();
        $data = [];
        foreach ($result as $v){
            $data[$v['id']] = $v['author'];
        }
        return $data;
    }
}
