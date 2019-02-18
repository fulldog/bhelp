<?php

use yii\db\Migration;

/**
 * Class m190211_082456_bbb_specials
 */
class m190211_082456_bbb_specials extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%bbb_specials}}', [
            'id' => $this->primaryKey(10),
            'author' => $this->string(50)->notNull(),
            'head' => $this->string(50)->null()->comment('头衔'),
            'title' => $this->string(100)->notNull()->comment('标题'),
            'desc' => $this->string(255)->comment('描述'),
            'img' => $this->string(255)->comment('封面图'),
            'price' => $this->decimal()->defaultValue(0),
            'totle' => $this->integer(10)->defaultValue(0)->comment('期数'),
            'subscrible_count' => $this->integer(10)->defaultValue(0)->comment('订阅数'),
            'status' => $this->smallInteger()->defaultValue(1)->comment('状态'),
            'created_at' => 'int(10) unsigned NOT NULL DEFAULT \'0\' COMMENT \'创建时间\'',
            'updated_at' => 'int(10) unsigned NOT NULL DEFAULT \'0\' COMMENT \'更新时间\'',
        ], "ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='珠宝专栏'");
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190211_082456_bbb_specials cannot be reverted.\n";
        $this->dropTable('{{%bbb_specials}}');
        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190211_082456_bbb_specials cannot be reverted.\n";

        return false;
    }
    */
}
