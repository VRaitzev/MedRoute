<?php

use yii\db\Migration;

class m250730_112035_add_directions_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('direction_list', [
            'id' => $this->primaryKey(),
            'service_id' => $this->integer()->notNull(),
            'patient_id' => $this->integer()->notNull(),
            'doctor_id' => $this->integer()->notNull(),
        ]);
        
        $this->createIndex('idx-direction-service_id', 'direction_list', 'service_id');

        $this->addForeignKey(
            'fk_direction_list_service_id',
            'direction_list',
            'service_id',
            'services',
            'id',
            'CASCADE',
            'CASCADE'
        );

        $this->createIndex('idx-direction-patient_id', 'direction_list', 'patient_id');

        $this->addForeignKey(
            'fk_direction_list_patient_id',
            'direction_list',
            'patient_id',
            'patients',
            'id',
            'CASCADE',
            'CASCADE'
        );

        $this->createIndex('idx-direction-doctor_id', 'direction_list', 'doctor_id');

        $this->addForeignKey(
            'fk_direction_list_doctor_id',
            'direction_list',
            'doctor_id',
            'doctors',
            'id',
            'CASCADE',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {

        $this->dropForeignKey('fk_direction_list_service_id', 'direction_list');
        $this->dropForeignKey('fk_direction_list_patient_id', 'direction_list');
        $this->dropForeignKey('fk_direction_list_doctor_id', 'direction_list');
        $this->dropTable('direction_list');

    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m250730_112035_add_directions_table cannot be reverted.\n";

        return false;
    }
    */
}
