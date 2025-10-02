
<?php

namespace App\Controllers;

use App\Models\StudentApplicationModel;
use App\Models\VolunteerApplicationModel;
use App\Models\DonorApplicationModel;

class AdminJoinUs extends BaseController
{
    protected $session;

    public function __construct()
    {
        $this->session = session();
        
        // Check if user is logged in
        if (!$this->session->get('admin_logged_in')) {
            throw new \CodeIgniter\Router\Exceptions\RedirectException(base_url('admin/login'));
        }
    }

    public function students()
    {
        $studentModel = new StudentApplicationModel();
        $applications = $studentModel->orderBy('created_at', 'DESC')->findAll();

        $data = [
            'title' => 'Student Applications',
            'applications' => $applications
        ];

        return view('admin/join_us/students', $data);
    }

    public function volunteers()
    {
        $volunteerModel = new VolunteerApplicationModel();
        $applications = $volunteerModel->orderBy('created_at', 'DESC')->findAll();

        $data = [
            'title' => 'Volunteer Applications',
            'applications' => $applications
        ];

        return view('admin/join_us/volunteers', $data);
    }

    public function donors()
    {
        $donorModel = new DonorApplicationModel();
        $applications = $donorModel->orderBy('created_at', 'DESC')->findAll();

        $data = [
            'title' => 'Donor Applications',
            'applications' => $applications
        ];

        return view('admin/join_us/donors', $data);
    }

    public function updateStatus($type, $id)
    {
        $status = $this->request->getPost('status');
        
        switch($type) {
            case 'student':
                $model = new StudentApplicationModel();
                break;
            case 'volunteer':
                $model = new VolunteerApplicationModel();
                break;
            case 'donor':
                $model = new DonorApplicationModel();
                break;
            default:
                return $this->response->setJSON(['success' => false, 'message' => 'Invalid type']);
        }

        if ($model->update($id, ['status' => $status])) {
            return $this->response->setJSON(['success' => true, 'message' => 'Status updated successfully']);
        } else {
            return $this->response->setJSON(['success' => false, 'message' => 'Failed to update status']);
        }
    }
}
