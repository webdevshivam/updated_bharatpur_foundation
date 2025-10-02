
<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateNgoWorksTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'title' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'description' => [
                'type' => 'TEXT',
            ],
            'category' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'comment'    => 'e.g., Education, Healthcare, Environment, Community Service',
            ],
            'location' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => true,
            ],
            'date_completed' => [
                'type' => 'DATE',
                'null' => true,
            ],
            'beneficiaries_count' => [
                'type'       => 'INT',
                'constraint' => 11,
                'null'       => true,
                'comment'    => 'Number of people impacted',
            ],
            'budget_amount' => [
                'type'       => 'DECIMAL',
                'constraint' => '10,2',
                'null'       => true,
            ],
            'partners' => [
                'type' => 'TEXT',
                'null' => true,
                'comment' => 'Partner organizations involved',
            ],
            'achievements' => [
                'type' => 'TEXT',
                'null' => true,
                'comment' => 'Key achievements and outcomes',
            ],
            'images' => [
                'type' => 'TEXT',
                'null' => true,
                'comment' => 'JSON array of image filenames',
            ],
            'status' => [
                'type'       => 'ENUM',
                'constraint' => ['active', 'inactive'],
                'default'    => 'active',
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
        $this->forge->addKey('category');
        $this->forge->addKey('status');
        $this->forge->createTable('ngo_works');
    }

    public function down()
    {
        $this->forge->dropTable('ngo_works');
    }
}
