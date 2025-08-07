<?php

use yii\db\Migration;

class m250806_152628_init extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%patients}}', [
            'id' => $this->primaryKey(),
            'fio' => $this->string(255)->notNull(),
            'gender' => $this->string(10)->notNull(),
            'date_of_birth' => $this->date()->notNull(),
            'address' => $this->string(255)->notNull(),
            'phone_number' => $this->string(255)->notNull(),
            'email' => $this->string(255)->notNull(),
            'delete_status' => $this->boolean()->notNull()->defaultValue(false),
        ]);

        $this->createTable('{{%services}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255)->notNull(),
            'cost' => $this->decimal(10, 2)->notNull(),
            'delete_status' => $this->boolean()->notNull()->defaultValue(false),
        ]);

        $this->createTable('{{%doctors}}', [
            'id' => $this->primaryKey(),
            'fio' => $this->string(255)->notNull(),
            'position' => $this->string(255)->notNull(),
            'delete_status' => $this->boolean()->notNull()->defaultValue(false),
        ]);

        $this->createTable('{{%direction_list}}', [
            'id' => $this->primaryKey(),
            'patient_id' => $this->integer()->notNull(),
            'doctor_id' => $this->integer()->notNull(),
            'date' => $this->date()->notNull(),
            'delete_status' => $this->boolean()->notNull()->defaultValue(false),
        ]);

        $this->createTable('{{%direction_list_services}}', [
            'id' => $this->primaryKey(),
            'direction_id' => $this->integer()->notNull(),
            'service_id' => $this->integer()->notNull(),
            'delete_status' => $this->boolean()->notNull()->defaultValue(false),
        ]);

        $this->createTable('{{%admins}}', [
            'id' => $this->primaryKey(),
            'login' => $this->string()->notNull()->unique(),
            'password_hash' => $this->string()->notNull(),
            'auth_key' => $this->string(255),
            'created_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP'),
        ]);

        $this->createIndex('idx_delete_status_patients', '{{%patients}}', 'delete_status');
        $this->createIndex('idx_delete_status_services', '{{%services}}', 'delete_status');
        $this->createIndex('idx_delete_status_doctors', '{{%doctors}}', 'delete_status');
        $this->createIndex('idx_delete_status_direction_list', '{{%direction_list}}', 'delete_status');
        $this->createIndex('idx_delete_status_direction_list_services', '{{%direction_list_services}}', 'delete_status');

        $this->createIndex('idx_direction_list_patient_id', '{{%direction_list}}', 'patient_id');
        $this->createIndex('idx_direction_list_doctor_id', '{{%direction_list}}', 'doctor_id');
        $this->createIndex('idx_direction_list_services_direction_id', '{{%direction_list_services}}', 'direction_id');
        $this->createIndex('idx_direction_list_services_service_id', '{{%direction_list_services}}', 'service_id');

        $this->addForeignKey(
            'fk_direction_list_patient',
            '{{%direction_list}}',
            'patient_id',
            '{{%patients}}',
            'id',
            'RESTRICT',
            'CASCADE'
        );
        $this->addForeignKey(
            'fk_direction_list_doctor',
            '{{%direction_list}}',
            'doctor_id',
            '{{%doctors}}',
            'id',
            'RESTRICT',
            'CASCADE'
        );
        $this->addForeignKey(
            'fk_direction_list_services_direction',
            '{{%direction_list_services}}',
            'direction_id',
            '{{%direction_list}}',
            'id',
            'RESTRICT',
            'CASCADE'
        );
        $this->addForeignKey(
            'fk_direction_list_services_service',
            '{{%direction_list_services}}',
            'service_id',
            '{{%services}}',
            'id',
            'RESTRICT',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_direction_list_services_service', '{{%direction_list_services}}');
        $this->dropForeignKey('fk_direction_list_services_direction', '{{%direction_list_services}}');
        $this->dropForeignKey('fk_directions_list_doctor', '{{%directions_list}}');
        $this->dropForeignKey('fk_directions_list_patient', '{{%directions_list}}');

        $this->dropTable('{{%direction_list_services}}');
        $this->dropTable('{{%directions_list}}');
        $this->dropTable('{{%doctors}}');
        $this->dropTable('{{%services}}');
        $this->dropTable('{{%patients}}');
        $this->dropTable('{{%admins}}');
    }
    

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m250804_131614_init cannot be reverted.\n";

        return false;
    }
    */
}