<?php

use yii\db\Migration;

class m250801_124008_create_column_delete_status_in_all_tables extends Migration
{
    /**
     * {@inheritdoc}
     */
public function safeUp()
{
    $this->addColumn('{{%patients}}', 'delete_status', $this->boolean());
    $this->createIndex('idx_delete_status_patients', '{{%patients}}', 'delete_status');

    $this->addColumn('{{%services}}', 'delete_status', $this->boolean());
    $this->createIndex('idx_delete_status_services', '{{%services}}', 'delete_status');

    $this->addColumn('{{%doctors}}', 'delete_status', $this->boolean());
    $this->createIndex('idx_delete_status_doctors', '{{%doctors}}', 'delete_status');

    $this->addColumn('{{%directions_list}}', 'delete_status', $this->boolean());
    $this->createIndex('idx_delete_status_directions_list', '{{%directions_list}}', 'delete_status');

    $this->addColumn('{{%directions_list_services}}', 'delete_status', $this->boolean());
    $this->createIndex('idx_delete_status_directions_list_services', '{{%directions_list_services}}', 'delete_status');
}

    /**
     * {@inheritdoc}
     */
public function safeDown()
{
    $this->dropIndex('idx_delete_status_patients', '{{%patients}}');
    $this->dropColumn('{{%patients}}', 'delete_status');

    $this->dropIndex('idx_delete_status_services', '{{%services}}');
    $this->dropColumn('{{%services}}', 'delete_status');

    $this->dropIndex('idx_delete_status_doctors', '{{%doctors}}');
    $this->dropColumn('{{%doctors}}', 'delete_status');

    $this->dropIndex('idx_delete_status_directions_list', '{{%directions_list}}');
    $this->dropColumn('{{%directions_list}}', 'delete_status');

    $this->dropIndex('idx_delete_status_directions_list_services', '{{%directions_list_services}}');
    $this->dropColumn('{{%directions_list_services}}', 'delete_status');
}

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m250801_124008_create_column_delete_status_in_all_tables cannot be reverted.\n";

        return false;
    }
    */
}
