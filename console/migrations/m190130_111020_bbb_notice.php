<?php

use yii\db\Migration;

/**
 * Class m190130_111020_bbb_notice
 */
class m190130_111020_bbb_notice extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%bbb_notice}}', [
            'id' => 'int(10) NOT NULL AUTO_INCREMENT COMMENT \'主键\'',
            'admin_id' => 'int(10) NOT NULL ',
            'sort' => 'int(3) NULL  COMMENT \'排序\'',
            'type' => 'int(1) NULL default \'1\' COMMENT \'1 公告2 消息\'',
            'status' => 'tinyint(4) NULL DEFAULT \'1\' COMMENT \'1启用 0禁用\'',
            'notice' => 'varchar(255) NULL DEFAULT \'\' COMMENT \'消息内容\'',
            'created_at' => 'int(10) unsigned NOT NULL DEFAULT \'0\' COMMENT \'创建时间\'',
            'updated_at' => 'int(10) unsigned NOT NULL DEFAULT \'0\' COMMENT \'更新时间\'',
            'PRIMARY KEY (`id`)'
        ], "ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COMMENT='bbb公告表'");
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190130_111020_bbb_notice cannot be reverted.\n";
        $this->dropTable('{{%bbb_notice}}');
        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190130_111020_bbb_notice cannot be reverted.\n";

        return false;
    }
    */
}
