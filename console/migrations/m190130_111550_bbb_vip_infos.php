<?php

use yii\db\Migration;

/**
 * Class m190130_111550_bbb_vip_infos
 */
class m190130_111550_bbb_vip_infos extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%bbb_vip_infos}}',[
            'id' => 'int(10) NOT NULL AUTO_INCREMENT COMMENT \'主键\'',
            'member_id' => 'int(10) NOT NULL ',
            'recommendCode' => 'varchar(50) NULL COMMENT \'邀请码\'',
            'parent_id' => 'int(10) NULL  COMMENT \'上级ID\'',
            'openid' => 'varchar(255) NULL  COMMENT \'openid\'',
            'vipage' => 'int(3) NULL DEFAULT \'0\' COMMENT \'vip时长\'',
            'vipstart_at' => 'int(10) NULL  COMMENT \'vip开始时间\'',
            'vipend_at' => 'int(10) NULL  COMMENT \'vip结束时间\'',
            'created_at' => 'int(10) unsigned NOT NULL DEFAULT \'0\' COMMENT \'创建时间\'',
            'updated_at' => 'int(10) unsigned NOT NULL DEFAULT \'0\' COMMENT \'更新时间\'',
            'PRIMARY KEY (`id`)'
        ], "ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='bbb订单表'");
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190130_111550_bbb_vip_infos cannot be reverted.\n";
        $this->dropTable('{{%bbb_vip_infos}}');
        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190130_111550_bbb_vip_infos cannot be reverted.\n";

        return false;
    }
    */
}
