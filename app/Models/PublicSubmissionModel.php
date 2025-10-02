<?php

namespace App\Models;

use CodeIgniter\Model;

class PublicSubmissionModel extends Model
{
    protected $table = 'public_submissions';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $protectFields = true;
    protected $allowedFields = [
        'public_form_id',
        'form_data',
        'image',
        'ip_address',
        'user_agent',
        'status'
    ];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat = 'datetime';

    // Custom date field
    protected $submittedField = 'submitted_at';

    // Validation
    protected $validationRules = [
        'public_form_id' => 'required|integer',
        'form_data' => 'required',
        'status' => 'required|in_list[pending,approved,rejected]'
    ];

    public function getSubmissionsByForm($formId, $status = null)
    {
        $builder = $this->where('public_form_id', $formId);

        if ($status) {
            $builder->where('status', $status);
        }

        return $builder->orderBy('submitted_at', 'DESC')->findAll();
    }

    public function getPendingSubmissions()
    {
        return $this->where('status', 'pending')
            ->orderBy('submitted_at', 'DESC')
            ->findAll();
    }

    protected function beforeInsert(array $data)
    {
        $data['data']['submitted_at'] = date('Y-m-d H:i:s');
        return $data;
    }
}
