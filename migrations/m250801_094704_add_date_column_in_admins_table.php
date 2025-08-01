<?php

use yii\db\Migration;

class m250801_094704_add_date_column_in_admins_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%direction_list}}', 'date', $this->date()->notNull());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%direction_list}}', 'date');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m250801_094704_add_date_column_in_admins_table cannot be reverted.\n";

        return false;
    }
    */
}
