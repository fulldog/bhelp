<?php

namespace common\models\bbb;

use common\models\common\BaseModel;
use common\models\member\MemberInfo;
use Yii;

/**
 * This is the model class for table "{{%bbb_vip_infos}}".
 *
 * @property int $id
 * @property int $member_id
 * @property string $recommendCode 邀请码
 * @property int $parent_id 上级推荐人
 * @property string $openid
 * @property int $vipage vip时长：月
 * @property int $vipstart_at VIP开始时间
 * @property int $vipend_at VIP结束时间
 * @property int $created_at 创建时间
 * @property int $updated_at 修改时间
 */
class MemberVipInfos extends BaseModel
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%bbb_vip_infos}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['member_id'], 'required'],
            [['member_id', 'parent_id', 'vipage', 'vipstart_at', 'vipend_at', 'created_at', 'updated_at'], 'integer'],
            [['openid','recommendCode'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'member_id' => 'Member ID',
            'recommendCode' => '邀请码',
            'parent_id' => '上级推荐人',
            'openid' => 'Openid',
            'vipage' => 'vip年龄：月',
            'vipstart_at' => 'VIP开始时间',
            'vipend_at' => 'VIP结束时间',
            'created_at' => '创建时间',
            'updated_at' => '修改时间',
        ];
    }

    static function getPidByCode($recommendCode=''){
        if (!$recommendCode) return '';
        $res = self::find()->select('member_id')->where(['recommendCode'=>$recommendCode])->one();
        return !empty($res) ? $res->member_id : 0;
    }

    static function getCode($length = 8, $type = 'string', $convert = 0){
        $config = array(
            'number' => '1234567890',
            'letter' => 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ',
            'string' => 'abcdefghjkmnpqrstuvwxyzABCDEFGHJKMNPQRSTUVWXYZ23456789',
            'all' => 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890'
        );

        if (!isset($config[$type]))
            $type = 'string';
        $string = $config[$type];

        $code = '';
        $strlen = strlen($string) - 1;
        for ($i = 0; $i < $length; $i++) {
            $code .= $string{mt_rand(0, $strlen)};
        }
        if (!empty($convert)) {
            $code = ($convert > 0) ? strtoupper($code) : strtolower($code);
        }
        if (self::find()->where(['recommendCode'=>$code])->exists()){
            return self::getCode($length, $type, $convert);
        }
        return $code;
    }

    function getRelatedCodeUser($code){
        if ($code){
            return self::find()->select(self::tableName().'.*,b.username')
                ->leftJoin(MemberInfo::tableName().' as b',self::tableName().'.member_id=b.id')
                ->where([self::tableName().'.recommendCode'=>$code])
                ->asArray()
                ->one();
        }
        return ;
    }
}
