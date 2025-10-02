<?php

namespace App\Models;

use CodeIgniter\Model;

class VolunteeringSettingsModel extends Model
{
    protected $table = 'volunteering_settings';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $allowedFields = [
        'reminder_interval_days',
        'email_template',
        'is_active'
    ];
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';

    public function getSettings()
    {
        return $this->first() ?? [
            'reminder_interval_days' => 10,
            'email_template' => 'Default template',
            'is_active' => 1
        ];
    }
}
