<?php

namespace App\Models;

use CodeIgniter\Model;

class DonorApplicationModel extends Model
{
    protected $table = 'donor_applications';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $protectFields = true;
    protected $allowedFields = [
        'name',
        'email',
        'phone',
        'organization',
        'donation_type',
        'donation_amount',
        'donation_frequency',
        'preferred_causes',
        'message',
        'status'
    ];

    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';

    protected $validationRules = [
        'name' => 'required|max_length[100]',
        'email' => 'required|valid_email|max_length[100]',
        'phone' => 'required|max_length[20]',
        'donation_type' => 'required|in_list[one-time,monthly,yearly]'
    ];

    public function getApplicationsByStatus($status = 'pending')
    {
        return $this->where('status', $status)
            ->orderBy('created_at', 'DESC')
            ->findAll();
    }
}
