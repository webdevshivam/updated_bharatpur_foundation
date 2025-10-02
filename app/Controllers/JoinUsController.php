<?php

namespace App\Controllers;

use App\Models\StudentApplicationModel;
use App\Models\VolunteerApplicationModel;
use App\Models\DonorApplicationModel;

class JoinUsController extends BaseController
{
    public function submitStudentForm()
    {
        $studentModel = new StudentApplicationModel();

        $data = [
            'name' => $this->request->getPost('name'),
            'email' => $this->request->getPost('email'),
            'phone' => $this->request->getPost('phone'),
            'age' => $this->request->getPost('age'),
            'course' => $this->request->getPost('course'),
            'institution' => $this->request->getPost('institution'),
            'year_of_study' => $this->request->getPost('year_of_study'),
            'academic_percentage' => $this->request->getPost('academic_percentage'),
            'family_income' => $this->request->getPost('family_income'),
            'financial_need' => $this->request->getPost('financial_need'),
            'career_goals' => $this->request->getPost('career_goals'),
            'why_apply' => $this->request->getPost('why_apply'),
        ];

        if ($studentModel->save($data)) {
            return $this->response->setJSON([
                'success' => true,
                'message' => 'Application submitted successfully! We will contact you soon.'
            ]);
        } else {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Failed to submit application. Please try again.',
                'errors' => $studentModel->errors()
            ]);
        }
    }

    public function submitVolunteerForm()
    {
        $volunteerModel = new VolunteerApplicationModel();

        $data = [
            'name' => $this->request->getPost('name'),
            'email' => $this->request->getPost('email'),
            'phone' => $this->request->getPost('phone'),
            'age' => $this->request->getPost('age'),
            'profession' => $this->request->getPost('profession'),
            'experience' => $this->request->getPost('experience'),
            'skills' => $this->request->getPost('skills'),
            'availability' => $this->request->getPost('availability'),
            'motivation' => $this->request->getPost('motivation'),
            'previous_volunteer_work' => $this->request->getPost('previous_volunteer_work'),
            'preferred_activities' => implode(', ', $this->request->getPost('preferred_activities') ?? []),
        ];

        if ($volunteerModel->save($data)) {
            return $this->response->setJSON([
                'success' => true,
                'message' => 'Volunteer application submitted successfully! We will contact you soon.'
            ]);
        } else {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Failed to submit application. Please try again.',
                'errors' => $volunteerModel->errors()
            ]);
        }
    }

    public function submitDonorForm()
    {
        $donorModel = new DonorApplicationModel();

        $data = [
            'name' => $this->request->getPost('name'),
            'email' => $this->request->getPost('email'),
            'phone' => $this->request->getPost('phone'),
            'organization' => $this->request->getPost('organization'),
            'donation_type' => $this->request->getPost('donation_type'),
            'donation_amount' => $this->request->getPost('donation_amount'),
            'donation_frequency' => $this->request->getPost('donation_frequency'),
            'preferred_causes' => implode(', ', $this->request->getPost('preferred_causes') ?? []),
            'message' => $this->request->getPost('message'),
        ];

        if ($donorModel->save($data)) {
            return $this->response->setJSON([
                'success' => true,
                'message' => 'Thank you for your interest in supporting our cause! We will contact you soon.'
            ]);
        } else {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Failed to submit application. Please try again.',
                'errors' => $donorModel->errors()
            ]);
        }
    }
}
