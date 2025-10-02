<?php

namespace App\Models;

use CodeIgniter\Model;

class EmailLogModel extends Model
{
    protected $table = 'email_logs';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $allowedFields = [
        'beneficiary_id',
        'email',
        'subject',
        'status',
        'error_message',
        'sent_at'
    ];
    protected $useTimestamps = false;

    public function logEmail($beneficiaryId, $email, $subject, $status, $errorMessage = null)
    {
        return $this->insert([
            'beneficiary_id' => $beneficiaryId,
            'email' => $email,
            'subject' => $subject,
            'status' => $status,
            'error_message' => $errorMessage,
            'sent_at' => date('Y-m-d H:i:s')
        ]);
    }

    public function getRecentLogs($limit = 50)
    {
        return $this->select('email_logs.*, beneficiaries.name')
            ->join('beneficiaries', 'beneficiaries.id = email_logs.beneficiary_id')
            ->orderBy('sent_at', 'DESC')
            ->limit($limit)
            ->findAll();
    }
}
