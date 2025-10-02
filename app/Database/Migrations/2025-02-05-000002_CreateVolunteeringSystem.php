
<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateVolunteeringSystem extends Migration
{
    public function up()
    {
        // Volunteering Settings Table
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'reminder_interval_days' => [
                'type' => 'INT',
                'constraint' => 11,
                'default' => 10,
            ],
            'email_template' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'is_active' => [
                'type' => 'TINYINT',
                'constraint' => 1,
                'default' => 1,
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('volunteering_settings');

        // Volunteering Submissions Table
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'beneficiary_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'submission_month' => [
                'type' => 'VARCHAR',
                'constraint' => 7, // YYYY-MM format
            ],
            'work_description' => [
                'type' => 'TEXT',
            ],
            'work_type' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'hours_spent' => [
                'type' => 'DECIMAL',
                'constraint' => '5,2',
                'null' => true,
            ],
            'proof_image' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'is_emergency_skip' => [
                'type' => 'TINYINT',
                'constraint' => 1,
                'default' => 0,
            ],
            'skip_reason' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'status' => [
                'type' => 'ENUM',
                'constraint' => ['pending', 'approved', 'rejected'],
                'default' => 'pending',
            ],
            'admin_notes' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('beneficiary_id', 'beneficiaries', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('volunteering_submissions');

        // Email Logs Table
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'beneficiary_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'email' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'subject' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'status' => [
                'type' => 'ENUM',
                'constraint' => ['sent', 'failed'],
            ],
            'error_message' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'sent_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('beneficiary_id', 'beneficiaries', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('email_logs');
    }

    public function down()
    {
        $this->forge->dropTable('email_logs');
        $this->forge->dropTable('volunteering_submissions');
        $this->forge->dropTable('volunteering_settings');
    }
}
