<?php

use yii\db\Migration;

/**
 * Class m190130_111515_bbb_orders
 */
class m190130_111515_bbb_orders extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%bbb_orders}}', [
            'id' => 'int(10) NOT NULL AUTO_INCREMENT COMMENT \'主键\'',
            'member_id' => 'int(10) NOT NULL ',
            'order_sn' => 'varchar(255) NOT NULL COMMENT \'订单号\'',
            'trade_type' => 'varchar(255) NULL  COMMENT \'支付类型\'',
            'trade_no' => 'varchar(255) NULL  COMMENT \'流水号\'',
            'month_limit' => 'int(3) NULL DEFAULT \'0\' COMMENT \'购买时长\'',
            'recommendCode' => 'varchar(255) NULL  COMMENT \'推荐码\'',
            'out_trade_no' => 'varchar(255) NULL  COMMENT \'外部单号\'',
            'money' => 'decimal(10,2) NOT NULL COMMENT \'金额\'',
            'status' => 'int(1) NOT NULL COMMENT \'状态\'',
            'goods' => 'varchar(255) NULL COMMENT \'商品\'',
            'desc' => 'varchar(255) NULL COMMENT \'描述\'',
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
        echo "m190130_111515_bbb_orders cannot be reverted.\n";
        $this->dropTable('{{%bbb_orders}}');
        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190130_111515_bbb_orders cannot be reverted.\n";

        return false;
    }
    */
}
