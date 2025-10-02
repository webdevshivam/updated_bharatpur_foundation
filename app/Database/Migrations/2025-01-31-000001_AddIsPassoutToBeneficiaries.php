
<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddIsPassoutToBeneficiaries extends Migration
{
    public function up()
    {
        $this->forge->addColumn('beneficiaries', [
            'is_passout' => [
                'type' => 'BOOLEAN',
                'default' => false,
                'null' => false,
                'after' => 'status'
            ]
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('beneficiaries', 'is_passout');
    }
}
