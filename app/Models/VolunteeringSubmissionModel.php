<?php

namespace App\Models;

use CodeIgniter\Model;

class VolunteeringSubmissionModel extends Model
{
    protected $table = 'volunteering_submissions';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $allowedFields = [
        'beneficiary_id',
        'submission_month',
        'work_description',
        'work_type',
        'hours_spent',
        'proof_image',
        'is_emergency_skip',
        'skip_reason',
        'status',
        'admin_notes'
    ];
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';

    public function getSubmissionsWithBeneficiaries($month = null)
    {
        $builder = $this->db->table($this->table)
            ->select('volunteering_submissions.*, beneficiaries.name, beneficiaries.email, beneficiaries.phone')
            ->join('beneficiaries', 'beneficiaries.id = volunteering_submissions.beneficiary_id')
            ->orderBy('volunteering_submissions.created_at', 'DESC');

        if ($month) {
            $builder->where('submission_month', $month);
        }

        return $builder->get()->getResultArray();
    }

    public function getMonthlyStats($month = null)
    {
        $month = $month ?? date('Y-m');

        $total = $this->where('submission_month', $month)->countAllResults();
        $completed = $this->where('submission_month', $month)
            ->where('is_emergency_skip', 0)
            ->countAllResults();
        $skipped = $this->where('submission_month', $month)
            ->where('is_emergency_skip', 1)
            ->countAllResults();
        $pending = $this->where('submission_month', $month)
            ->where('status', 'pending')
            ->countAllResults();

        return [
            'total' => $total,
            'completed' => $completed,
            'skipped' => $skipped,
            'pending' => $pending,
            'completion_rate' => $total > 0 ? round(($completed / $total) * 100, 2) : 0
        ];
    }

    public function hasSubmissionForMonth($beneficiaryId, $month)
    {
        return $this->where('beneficiary_id', $beneficiaryId)
            ->where('submission_month', $month)
            ->first() !== null;
    }
}
