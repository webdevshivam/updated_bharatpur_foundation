<?php

namespace App\Models;

use CodeIgniter\Model;

class BeneficiaryModel extends Model
{
    protected $table = 'beneficiaries';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $protectFields = true;
    protected $allowedFields = [
        'name',
        'age',
        'education_level',
        'course',
        'institution',
        'city',
        'state',
        'phone',
        'email',
        'linkedin_url',
        'company_name',
        'company_link',
        'family_background',
        'academic_achievements',
        'career_goals',
        'image',
        'status',
        'is_passout'
    ];

    // Dates
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';

    // Validation
    protected $validationRules = [
        'name' => 'required|min_length[3]|max_length[255]',
        'age' => 'permit_empty|integer|greater_than[0]',
        'education_level' => 'required|max_length[100]',
        'course' => 'required|max_length[255]',
        'institution' => 'required|max_length[255]',
        'city' => 'permit_empty|max_length[100]',
        'state' => 'permit_empty|max_length[100]',
        'phone' => 'permit_empty|max_length[20]',
        'email' => 'permit_empty|valid_email|max_length[255]',
        'linkedin_url' => 'permit_empty|valid_url|max_length[500]',
        'company_link' => 'permit_empty|valid_url|max_length[500]',
        'status' => 'required|in_list[active,inactive]'
    ];

    public function getActiveBeneficiaries($limit = null, $offset = null, $search = null)
    {
        $builder = $this->where('status', 'active');

        if ($search) {
            $builder->groupStart()
                ->like('name', $search)
                ->orLike('course', $search)
                ->orLike('institution', $search)
                ->orLike('city', $search)
                ->groupEnd();
        }

        if ($limit) {
            $builder->limit($limit, $offset);
        }

        return $builder->findAll();
    }

    public function countActiveBeneficiaries($search = null)
    {
        $builder = $this->where('status', 'active');

        if ($search) {
            $builder->groupStart()
                ->like('name', $search)
                ->orLike('course', $search)
                ->orLike('institution', $search)
                ->orLike('city', $search)
                ->orLike('state', $search)
                ->groupEnd();
        }

        return $builder->countAllResults();
    }

    public function getActiveBeneficiariesByStatus($isPassout = false, $limit = null, $offset = null, $search = null)
    {
        $builder = $this->where('status', 'active')
                        ->where('is_passout', $isPassout);

        if ($search) {
            $builder->groupStart()
                ->like('name', $search)
                ->orLike('course', $search)
                ->orLike('institution', $search)
                ->orLike('city', $search)
                ->groupEnd();
        }

        if ($limit) {
            $builder->limit($limit, $offset);
        }

        return $builder->findAll();
    }

    public function countActiveBeneficiariesByStatus($isPassout = false, $search = null)
    {
        $builder = $this->where('status', 'active')
                        ->where('is_passout', $isPassout);

        if ($search) {
            $builder->groupStart()
                ->like('name', $search)
                ->orLike('course', $search)
                ->orLike('institution', $search)
                ->orLike('city', $search)
                ->groupEnd();
        }

        return $builder->countAllResults();
    }

    public function getBeneficiariesByStatus($isPassout = null, $limit = null, $offset = null, $search = null)
    {
        $builder = $this->where('status', 'active');

        // Filter by passout status if specified
        if ($isPassout !== null) {
            $builder->where('is_passout', $isPassout ? 1 : 0);
        }

        // Add search functionality
        if ($search) {
            $builder->groupStart()
                ->like('name', $search)
                ->orLike('course', $search)
                ->orLike('institution', $search)
                ->orLike('city', $search)
                ->orLike('state', $search)
                ->groupEnd();
        }

        // Add pagination if specified
        if ($limit) {
            $builder->limit($limit, $offset);
        }

        return $builder->orderBy('created_at', 'DESC')->findAll();
    }
}