<?php

namespace App\Models;

use CodeIgniter\Model;

class NgoWorkModel extends Model
{
    protected $table = 'ngo_works';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $protectFields = true;
    protected $allowedFields = [
        'title',
        'description',
        'category',
        'location',
        'date_completed',
        'beneficiaries_count',
        'budget_amount',
        'partners',
        'achievements',
        'images',
        'status'
    ];

    // Dates
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';

    // Validation
    protected $validationRules = [
        'title' => 'required|min_length[3]|max_length[255]',
        'description' => 'required',
        'category' => 'required|max_length[100]',
        'location' => 'permit_empty|max_length[255]',
        'date_completed' => 'permit_empty|valid_date',
        'beneficiaries_count' => 'permit_empty|integer|greater_than[0]',
        'budget_amount' => 'permit_empty|decimal',
        'status' => 'required|in_list[active,inactive]'
    ];

    public function getPublishedWorks($limit = null, $offset = null)
    {
        $builder = $this->where('status', 'active');

        if ($limit) {
            $builder->limit($limit, $offset);
        }

        return $builder->orderBy('date_completed', 'DESC')->findAll();
    }

    public function countPublishedWorks()
    {
        return $this->where('status', 'active')->countAllResults();
    }

    public function getWorksByCategory($category)
    {
        return $this->where(['status' => 'active', 'category' => $category])
            ->orderBy('date_completed', 'DESC')
            ->findAll();
    }
}
