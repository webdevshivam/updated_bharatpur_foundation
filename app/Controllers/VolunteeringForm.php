<?php

namespace App\Controllers;

use App\Models\VolunteeringSubmissionModel;
use App\Models\BeneficiaryModel;

class VolunteeringForm extends BaseController
{
    protected $submissionModel;
    protected $beneficiaryModel;

    public function __construct()
    {
        $this->submissionModel = new VolunteeringSubmissionModel();
        $this->beneficiaryModel = new BeneficiaryModel();
    }

    public function form($beneficiaryId)
    {
        $beneficiary = $this->beneficiaryModel->find($beneficiaryId);
        if (!$beneficiary || $beneficiary['status'] !== 'active') {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Invalid beneficiary');
        }

        $currentMonth = date('Y-m');
        $existingSubmission = $this->submissionModel
            ->where('beneficiary_id', $beneficiaryId)
            ->where('submission_month', $currentMonth)
            ->first();

        if ($this->request->getMethod() === 'POST') {
            if ($existingSubmission) {
                return redirect()->back()->with('error', 'आपने इस महीने पहले से ही अपना स्वयंसेवी कार्य जमा कर दिया है।');
            }

            $isEmergencySkip = $this->request->getPost('is_emergency_skip') ? 1 : 0;

            $data = [
                'beneficiary_id' => $beneficiaryId,
                'submission_month' => $currentMonth,
                'is_emergency_skip' => $isEmergencySkip,
                'status' => 'pending'
            ];

            if ($isEmergencySkip) {
                $data['skip_reason'] = $this->request->getPost('skip_reason');
                $data['work_description'] = 'Emergency Skip';
                $data['work_type'] = 'Skip';
            } else {
                $data['work_description'] = $this->request->getPost('work_description');
                $data['work_type'] = $this->request->getPost('work_type');
                $data['hours_spent'] = $this->request->getPost('hours_spent');

                // Handle file upload
                $file = $this->request->getFile('proof_image');
                if ($file && $file->isValid() && !$file->hasMoved()) {
                    $newName = $file->getRandomName();
                    $file->move(WRITEPATH . 'uploads', $newName);
                    $data['proof_image'] = $newName;
                }
            }

            if ($this->submissionModel->insert($data)) {
                return redirect()->to("/volunteering-form/{$beneficiaryId}")
                    ->with('success', 'आपका स्वयंसेवी कार्य सफलतापूर्वक जमा हो गया है। धन्यवाद!');
            } else {
                return redirect()->back()->with('error', 'कुछ गलत हुआ है। कृपया दोबारा कोशिश करें।');
            }
        }

        $data = [
            'beneficiary' => $beneficiary,
            'currentMonth' => $currentMonth,
            'existingSubmission' => $existingSubmission
        ];

        return view('volunteering/form', $data);
    }
}
