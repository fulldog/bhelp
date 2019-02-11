<?php

use yii\db\Migration;

/**
 * Class m190211_082533_bbb_special_attachment
 */
class m190211_082533_bbb_special_attachment extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%bbb_special_attachment}}',[
            'id'=>'int(10) NOT NULL AUTO_INCREMENT',
            'sdid'=>'int(10) NOT NULL',
            'drive'=>"varchar(50) DEFAULT 'local' COMMENT '存储位置'",
            'type' =>"char(10) NOT NULL DEFAULT 'file' COMMENT 'audio,video,img,file'",
            'name' =>'varchar(255) DEFAULT NULL',
            'ext' =>'char(10) DEFAULT NULL',
            'size' =>'int(10) DEFAULT NULL',
            'status' =>'int(3) DEFAULT \'20\' COMMENT \'10禁用\r\n20启用\'',
            'path' =>'varchar(255) DEFAULT NULL COMMENT \'物理路径\'',
            'url' =>'varchar(255) DEFAULT NULL',
            'created_at' =>'int(10) DEFAULT NULL',
            'updated_at'=>' int(10) DEFAULT NULL',
            'PRIMARY KEY (`id`)'
        ],'ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT=\'珠宝专栏明细附件\'');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190211_082533_bbb_special_attachment cannot be reverted.\n";
        $this->dropTable('{{%bbb_special_attachment}}');
        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190211_082533_bbb_special_attachment cannot be reverted.\n";

        return false;
    }
    */
}
