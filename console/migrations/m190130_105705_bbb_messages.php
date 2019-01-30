<?php

use yii\db\Migration;

/**
 * Class m190130_105705_bbb_messages
 */
class m190130_105705_bbb_messages extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%bbb_messages}}', [
            'id' => 'int(10) NOT NULL AUTO_INCREMENT COMMENT \'主键\'',
            'uid' => 'int(10) NOT NULL ',
            'notice_id' => 'int(10) NULL  COMMENT \'公告ID\'',
            'status' => 'tinyint(4) NULL DEFAULT \'1\' COMMENT \'状态\'',
            'message' => 'varchar(255) NULL DEFAULT \'\' COMMENT \'消息内容\'',
            'created_at' => 'int(10) unsigned NOT NULL DEFAULT \'0\' COMMENT \'创建时间\'',
            'updated_at' => 'int(10) unsigned NOT NULL DEFAULT \'0\' COMMENT \'更新时间\'',
            'PRIMARY KEY (`id`)'
        ], "ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COMMENT='bbb会员消息表'");
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190130_105705_bbb_messages cannot be reverted.\n";
        /* 删除表 */
        $this->dropTable('{{%bbb_messages}}');
        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190130_105705_bbb_messages cannot be reverted.\n";

        return false;
    }
    */
}
