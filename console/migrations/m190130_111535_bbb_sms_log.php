<?php

use yii\db\Migration;

/**
 * Class m190130_111535_bbb_sms_log
 */
class m190130_111535_bbb_sms_log extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%bbb_sms_log}}', [
            'id' => 'int(10) NOT NULL AUTO_INCREMENT COMMENT \'主键\'',
            'phone' => 'varchar(15) NOT NULL ',
            'imgcode' => 'int(6) NULL COMMENT \'图形验证码\'',
            'code' => 'int(6) NOT NULL COMMENT \'手机验证码\'',
            'created_at' => 'int(10) unsigned NOT NULL DEFAULT \'0\' COMMENT \'创建时间\'',
            'updated_at' => 'int(10) unsigned NOT NULL DEFAULT \'0\' COMMENT \'更新时间\'',
            'PRIMARY KEY (`id`)'
        ], "ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COMMENT='bbb短信验证码'");
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190130_111535_bbb_sms_log cannot be reverted.\n";
        $this->dropTable('{{%bbb_sms_log}}');
        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190130_111535_bbb_sms_log cannot be reverted.\n";

        return false;
    }
    */
}
