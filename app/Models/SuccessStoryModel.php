<?php

namespace App\Models;

use CodeIgniter\Model;

class SuccessStoryModel extends Model
{
    protected $table = 'success_stories';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $protectFields = true;
    protected $allowedFields = [
        'name',
        'age',
        'education',
        'current_position',
        'company',
        'city',
        'state',
        'linkedin_url',
        'company_link',
        'story',
        'achievements',
        'image',
        'status'
    ];

    // Dates
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';

    // Validation
    protected $validationRules = [
        'name' => 'required|min_length[3]|max_length[255]',
        'age' => 'required|integer|greater_than[0]',
        'education' => 'required|max_length[255]',
        'current_position' => 'required|max_length[255]',
        'company' => 'required|max_length[255]',
        'city' => 'required|max_length[100]',
        'state' => 'required|max_length[100]',
        'linkedin_url' => 'permit_empty|valid_url|max_length[500]',
        'company_link' => 'permit_empty|valid_url|max_length[500]',
        'story' => 'required',
        'status' => 'required|in_list[active,inactive]'
    ];

    public function getPublishedStories($limit = null)
    {
        $builder = $this->where('status', 'active')
                        ->orderBy('created_at', 'DESC');

        if ($limit !== null) {
            $builder->limit($limit);
        }

        return $builder->findAll();
    }

    public function countPublishedStories()
    {
        return $this->where('status', 'active')->countAllResults();
    }
}