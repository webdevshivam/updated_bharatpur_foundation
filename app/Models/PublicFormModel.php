<?php

namespace App\Models;

use CodeIgniter\Model;

class PublicFormModel extends Model
{
    protected $table = 'public_forms';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $protectFields = true;
    protected $allowedFields = [
        'form_name',
        'form_type',
        'public_url_token',
        'valid_until',
        'max_submissions',
        'current_submissions',
        'status',
        'description',
        'created_by_admin_id'
    ];

    // Dates
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';

    // Validation
    protected $validationRules = [
        'form_name' => 'required|min_length[3]|max_length[255]',
        'form_type' => 'required|in_list[beneficiary,success_story]',
        'public_url_token' => 'required|max_length[100]',
        'valid_until' => 'required|valid_date',
        'max_submissions' => 'permit_empty|integer|greater_than[0]',
        'status' => 'required|in_list[active,expired,disabled]',
        'created_by_admin_id' => 'required|integer'
    ];

    public function getActiveForms($type = null)
    {
        $builder = $this->where('status', 'active')
            ->where('valid_until >', date('Y-m-d H:i:s'));

        if ($type) {
            $builder->where('form_type', $type);
        }

        return $builder->findAll();
    }

    public function getFormByToken($token)
    {
        return $this->where('public_url_token', $token)
            ->where('status', 'active')
            ->where('valid_until >', date('Y-m-d H:i:s'))
            ->first();
    }

    public function incrementSubmissionCount($id)
    {
        $form = $this->find($id);
        if ($form) {
            $this->update($id, ['current_submissions' => $form['current_submissions'] + 1]);
        }
    }
}
