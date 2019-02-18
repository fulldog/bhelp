<?php

use yii\db\Migration;

/**
 * Class m190211_082514_bbb_special_details
 */
class m190211_082514_bbb_special_details extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%bbb_special_details}}', [
            'id' => $this->primaryKey(10),
            'sid' => $this->integer(10)->notNull(),
            'title' => $this->string(100)->notNull()->comment('标题'),
            'desc' => $this->string(255)->comment('描述'),
            'content' => $this->text(),
            'view_count' => $this->integer(10)->defaultValue(0),
            'status' => $this->smallInteger()->defaultValue(1)->comment('状态'),
            'created_at' => 'int(10) unsigned NOT NULL DEFAULT \'0\' COMMENT \'创建时间\'',
            'updated_at' => 'int(10) unsigned NOT NULL DEFAULT \'0\' COMMENT \'更新时间\'',
        ], "ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='珠宝专栏明细'");
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190211_082514_bbb_special_details cannot be reverted.\n";
        $this->dropTable('{{%bbb_special_details}}');
        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190211_082514_bbb_special_details cannot be reverted.\n";

        return false;
    }
    */
}
