<?php

namespace App\Models;

use CodeIgniter\Model;

class StudentApplicationModel extends Model
{
    protected $table = 'student_applications';
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
        'course',
        'institution',
        'year_of_study',
        'academic_percentage',
        'family_income',
        'financial_need',
        'career_goals',
        'why_apply',
        'status'
    ];

    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';

    protected $validationRules = [
        'name' => 'required|max_length[100]',
        'email' => 'required|valid_email|max_length[100]',
        'phone' => 'required|max_length[20]',
        'course' => 'required|max_length[150]',
        'institution' => 'required|max_length[200]'
    ];

    public function getApplicationsByStatus($status = 'pending')
    {
        return $this->where('status', $status)
            ->orderBy('created_at', 'DESC')
            ->findAll();
    }
}
