<?php

namespace App\Models;

use CodeIgniter\Model;

class VolunteerApplicationModel extends Model
{
    protected $table = 'volunteer_applications';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $protectFields = true;
    protected $allowedFields = [
        'name',
        'email',
        'phone',
        'age',
        'profession',
        'experience',
        'skills',
        'availability',
        'motivation',
        'previous_volunteer_work',
        'preferred_activities',
        'status'
    ];

    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';

    protected $validationRules = [
        'name' => 'required|max_length[100]',
        'email' => 'required|valid_email|max_length[100]',
        'phone' => 'required|max_length[20]',
        'profession' => 'required|max_length[100]'
    ];

    public function getApplicationsByStatus($status = 'pending')
    {
        return $this->where('status', $status)
            ->orderBy('created_at', 'DESC')
            ->findAll();
    }
}
