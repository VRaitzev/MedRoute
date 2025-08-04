<?php

use yii\db\Migration;

class m250801_124008_create_column_delete_status_in_all_tables extends Migration
{
    public function safeUp()
    {
        // patients
        $this->addColumn('{{%patients}}', 'delete_status', $this->boolean()->notNull()->defaultValue(false));
        $this->createIndex('idx_delete_status_patients', '{{%patients}}', 'delete_status');

        // services
        $this->addColumn('{{%services}}', 'delete_status', $this->boolean()->notNull()->defaultValue(false));
        $this->createIndex('idx_delete_status_services', '{{%services}}', 'delete_status');

        // doctors
        $this->addColumn('{{%doctors}}', 'delete_status', $this->boolean()->notNull()->defaultValue(false));
        $this->createIndex('idx_delete_status_doctors', '{{%doctors}}', 'delete_status');

        // direction_list
        $this->addColumn('{{%direction_list}}', 'delete_status', $this->boolean()->notNull()->defaultValue(false));
        $this->createIndex('idx_delete_status_direction_list', '{{%direction_list}}', 'delete_status');

        // direction_list_services
        $this->addColumn('{{%direction_list_services}}', 'delete_status', $this->boolean()->notNull()->defaultValue(false));
        $this->createIndex('idx_delete_status_direction_list_services', '{{%direction_list_services}}', 'delete_status');
    }

    public function safeDown()
    {
        // direction_list_services
        $this->dropIndex('idx_delete_status_direction_list_services', '{{%direction_list_services}}');
        $this->dropColumn('{{%direction_list_services}}', 'delete_status');

        // direction_list
        $this->dropIndex('idx_delete_status_direction_list', '{{%direction_list}}');
        $this->dropColumn('{{%direction_list}}', 'delete_status');

        // doctors
        $this->dropIndex('idx_delete_status_doctors', '{{%doctors}}');
        $this->dropColumn('{{%doctors}}', 'delete_status');

        // services
        $this->dropIndex('idx_delete_status_services', '{{%services}}');
        $this->dropColumn('{{%services}}', 'delete_status');

        // patients
        $this->dropIndex('idx_delete_status_patients', '{{%patients}}');
        $this->dropColumn('{{%patients}}', 'delete_status');
    }
}