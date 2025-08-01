<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%direction_list_services}}`.
 */
class m250801_104353_create_direction_list_services_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        // $this->createTable('{{%direction_list_services}}', [
        //     'id' => $this->primaryKey(),
        //     'direction_id' => $this->integer()->notNull(),
        //     'service_id' => $this->integer()->notNull(),
        // ]);
        
    //     $this->createIndex(
    //     'uniq_direction_service_pair',
    //     '{{%direction_list_services}}',
    //     ['direction_id', 'service_id'],
    //     true
    // );
        
    //     $this->createIndex('idx_direction_list_services_direction_id', '{{%direction_list_services}}', 'direction_id');
        
    //     $this->addForeignKey(
    //         'fk_direction_list_services_direction_id',
    //         '{{%direction_list_services}}',
    //         'direction_id',
    //         '{{%direction_list}}',
    //         'id',
    //         'CASCADE',
    //         'CASCADE'
    //     );
        
    //     $this->createIndex('idx_direction_list_services_service_id', '{{%direction_list_services}}', 'service_id');

    //     $this->addForeignKey(
    //         'fk_direction_list_services_service_id',
    //         '{{%direction_list_services}}',
    //         'service_id',
    //         '{{%services}}',
    //         'id',
    //         'CASCADE',
    //         'CASCADE'
    //     );
        $this->dropForeignKey('fk_direction_list_service_id', 'direction_list');
        $this->dropColumn('{{%direction_list}}', 'service_id');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->addColumn('{{%direction_list}}', 'service_id', $this->integer()->null());
        // $this->dropForeignKey('fk_direction_list_services_direction_id', 'direction_list_services');
        // $this->dropForeignKey('fk_direction_list_services_service_id', 'direction_list_services');
        // $this->dropIndex('uniq_direction_service_pair', '{{%direction_list_services}}');
        // $this->dropIndex('idx_direction_list_services_direction_id', '{{%direction_list_services}}');
        // $this->dropIndex('idx_direction_list_services_service_id', '{{%direction_list_services}}');

        // $this->dropTable('{{%direction_list_services}}');
    }
}
