
<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddCompanyNameToBeneficiaries extends Migration
{
    public function up()
    {
        $this->forge->addColumn('beneficiaries', [
            'company_name' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => true,
                'after'      => 'linkedin_url'
            ]
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('beneficiaries', 'company_name');
    }
}
