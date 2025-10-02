
<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateJoinUsFormsTable extends Migration
{
    public function up()
    {
        // Student Applications Table
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'name' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'email' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'phone' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
            ],
            'age' => [
                'type' => 'INT',
                'constraint' => 3,
                'null' => true,
            ],
            'course' => [
                'type' => 'VARCHAR',
                'constraint' => 150,
            ],
            'institution' => [
                'type' => 'VARCHAR',
                'constraint' => 200,
            ],
            'year_of_study' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
                'null' => true,
            ],
            'academic_percentage' => [
                'type' => 'DECIMAL',
                'constraint' => '5,2',
                'null' => true,
            ],
            'family_income' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
                'null' => true,
            ],
            'financial_need' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'career_goals' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'why_apply' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'status' => [
                'type' => 'ENUM',
                'constraint' => ['pending', 'approved', 'rejected'],
                'default' => 'pending',
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
        $this->forge->createTable('student_applications');

        // Volunteer Applications Table
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'name' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'email' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'phone' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
            ],
            'age' => [
                'type' => 'INT',
                'constraint' => 3,
                'null' => true,
            ],
            'profession' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'experience' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
                'null' => true,
            ],
            'skills' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'availability' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => true,
            ],
            'motivation' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'previous_volunteer_work' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'preferred_activities' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'status' => [
                'type' => 'ENUM',
                'constraint' => ['pending', 'approved', 'rejected'],
                'default' => 'pending',
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
        $this->forge->createTable('volunteer_applications');

        // Donor Applications Table
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'name' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'email' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'phone' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
            ],
            'organization' => [
                'type' => 'VARCHAR',
                'constraint' => 150,
                'null' => true,
            ],
            'donation_type' => [
                'type' => 'ENUM',
                'constraint' => ['one-time', 'monthly', 'yearly'],
            ],
            'donation_amount' => [
                'type' => 'DECIMAL',
                'constraint' => '10,2',
                'null' => true,
            ],
            'donation_frequency' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
                'null' => true,
            ],
            'preferred_causes' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'message' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'status' => [
                'type' => 'ENUM',
                'constraint' => ['pending', 'approved', 'rejected'],
                'default' => 'pending',
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
        $this->forge->createTable('donor_applications');
    }

    public function down()
    {
        $this->forge->dropTable('student_applications');
        $this->forge->dropTable('volunteer_applications');
        $this->forge->dropTable('donor_applications');
    }
}
