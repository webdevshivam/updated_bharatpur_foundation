<?php

namespace App\Controllers;

use App\Models\BeneficiaryModel;

class AdminBeneficiaries extends BaseController
{
    protected $session;
    protected $beneficiaryModel;

    public function __construct()
    {
        $this->session = \Config\Services::session();
        $this->beneficiaryModel = new BeneficiaryModel();
    }

    private function checkAuth()
    {
        if (!$this->session->get('admin_logged_in')) {
            return redirect()->to('/admin/login');
        }
        return true;
    }

    public function index()
    {
        $authCheck = $this->checkAuth();
        if ($authCheck !== true) return $authCheck;

        $data = [
            'beneficiaries' => $this->beneficiaryModel->orderBy('created_at', 'DESC')->findAll()
        ];

        return view('admin/beneficiaries/index', $data);
    }

    public function create()
    {
        $authCheck = $this->checkAuth();
        if ($authCheck !== true) return $authCheck;

        return view('admin/beneficiaries/create');
    }

    public function store()
    {
        $authCheck = $this->checkAuth();
        if ($authCheck !== true) return $authCheck;

        $data = [
            'name' => $this->request->getPost('name'),
            'age' => $this->request->getPost('age') ? (int)$this->request->getPost('age') : null,
            'education_level' => $this->request->getPost('education_level'),
            'course' => $this->request->getPost('course'),
            'institution' => $this->request->getPost('institution'),
            'city' => $this->request->getPost('city') ?: null,
            'state' => $this->request->getPost('state') ?: null,
            'phone' => $this->request->getPost('phone'),
            'email' => $this->request->getPost('email'),
            'linkedin_url' => $this->request->getPost('linkedin_url'),
            'company_link' => $this->request->getPost('company_link'),
            'family_background' => $this->request->getPost('family_background'),
            'academic_achievements' => $this->request->getPost('academic_achievements'),
            'career_goals' => $this->request->getPost('career_goals'),
            'status' => $this->request->getPost('status'),
            'is_passout' => $this->request->getPost('is_passout') ? 1 : 0
        ];

        // Handle image upload
        $image = $this->request->getFile('image');
        if ($image && $image->isValid() && !$image->hasMoved()) {
            $newName = $image->getRandomName();
            if (!is_dir(WRITEPATH . 'uploads/beneficiaries')) {
                mkdir(WRITEPATH . 'uploads/beneficiaries', 0755, true);
            }
            $image->move(WRITEPATH . 'uploads/beneficiaries', $newName);
            $data['image'] = $newName;
        }

        if ($this->beneficiaryModel->insert($data)) {
            $this->session->setFlashdata('success', 'Beneficiary added successfully');
            return redirect()->to('/admin/beneficiaries');
        } else {
            $this->session->setFlashdata('error', 'Failed to add beneficiary');
            return redirect()->back()->withInput();
        }
    }

    public function view($id)
    {
        $authCheck = $this->checkAuth();
        if ($authCheck !== true) return $authCheck;

        $beneficiary = $this->beneficiaryModel->find($id);
        if (!$beneficiary) {
            $this->session->setFlashdata('error', 'Beneficiary not found');
            return redirect()->to('/admin/beneficiaries');
        }

        $data = ['beneficiary' => $beneficiary];
        return view('admin/beneficiaries/view', $data);
    }

    public function edit($id)
    {
        $authCheck = $this->checkAuth();
        if ($authCheck !== true) return $authCheck;

        $beneficiary = $this->beneficiaryModel->find($id);
        if (!$beneficiary) {
            $this->session->setFlashdata('error', 'Beneficiary not found');
            return redirect()->to('/admin/beneficiaries');
        }

        $data = ['beneficiary' => $beneficiary];
        return view('admin/beneficiaries/edit', $data);
    }

    public function update($id)
    {
        $authCheck = $this->checkAuth();
        if ($authCheck !== true) return $authCheck;

        $beneficiary = $this->beneficiaryModel->find($id);
        if (!$beneficiary) {
            $this->session->setFlashdata('error', 'Beneficiary not found');
            return redirect()->to('/admin/beneficiaries');
        }

        $data = [
            'name' => $this->request->getPost('name'),
            'age' => $this->request->getPost('age') ? (int)$this->request->getPost('age') : null,
            'education_level' => $this->request->getPost('education_level'),
            'course' => $this->request->getPost('course'),
            'institution' => $this->request->getPost('institution'),
            'city' => $this->request->getPost('city') ?: null,
            'state' => $this->request->getPost('state') ?: null,
            'phone' => $this->request->getPost('phone'),
            'email' => $this->request->getPost('email'),
            'linkedin_url' => $this->request->getPost('linkedin_url'),
            'company_link' => $this->request->getPost('company_link'),
            'family_background' => $this->request->getPost('family_background'),
            'academic_achievements' => $this->request->getPost('academic_achievements'),
            'career_goals' => $this->request->getPost('career_goals'),
            'status' => $this->request->getPost('status'),
            'is_passout' => $this->request->getPost('is_passout') ? 1 : 0
        ];

        // Handle image upload
        $image = $this->request->getFile('image');
        if ($image && $image->isValid() && !$image->hasMoved()) {
            $newName = $image->getRandomName();
            if (!is_dir(WRITEPATH . 'uploads/beneficiaries')) {
                mkdir(WRITEPATH . 'uploads/beneficiaries', 0755, true);
            }
            $image->move(WRITEPATH . 'uploads/beneficiaries', $newName);
            $data['image'] = $newName;

            // Delete old image if exists
            if (!empty($beneficiary['image']) && file_exists(WRITEPATH . 'uploads/beneficiaries/' . $beneficiary['image'])) {
                unlink(WRITEPATH . 'uploads/beneficiaries/' . $beneficiary['image']);
            }
        }

        if ($this->beneficiaryModel->update($id, $data)) {
            $this->session->setFlashdata('success', 'Beneficiary updated successfully');
            return redirect()->to('/admin/beneficiaries');
        } else {
            $this->session->setFlashdata('error', 'Failed to update beneficiary');
            return redirect()->back()->withInput();
        }
    }

    public function delete($id)
    {
        $authCheck = $this->checkAuth();
        if ($authCheck !== true) return $authCheck;

        $beneficiary = $this->beneficiaryModel->find($id);
        if (!$beneficiary) {
            $this->session->setFlashdata('error', 'Beneficiary not found');
            return redirect()->to('/admin/beneficiaries');
        }

        // Delete image if exists
        if (!empty($beneficiary['image']) && file_exists(WRITEPATH . 'uploads/beneficiaries/' . $beneficiary['image'])) {
            unlink(WRITEPATH . 'uploads/beneficiaries/' . $beneficiary['image']);
        }

        if ($this->beneficiaryModel->delete($id)) {
            $this->session->setFlashdata('success', 'Beneficiary deleted successfully');
            // Send notification email if email is provided
            if (!empty($beneficiary['email'])) {
                $subject = "Account Deletion Notification";
                $message = "Dear " . $beneficiary['name'] . ",<br><br>";
                $message .= "Your account has been removed from our system.<br><br>";
                $message .= "If you have any questions, please contact us.<br><br>";
                $message .= "Best regards,<br>";
                $message .= "Nayantar Memorial Charitable Trust";

                // Try to send email, but don't fail the deletion if email fails
                $emailSent = $this->sendEmail($beneficiary['email'], $subject, $message);
                if (!$emailSent) {
                    session()->setFlashdata('warning', 'Beneficiary deleted successfully, but notification email could not be sent.');
                }
            }
        } else {
            $this->session->setFlashdata('error', 'Failed to delete beneficiary');
        }

        return redirect()->to('/admin/beneficiaries');
    }

    public function deleteMultiple()
    {
        if (!$this->isLoggedIn()) {
            return $this->response->setJSON(['success' => false, 'message' => 'Unauthorized access']);
        }

        $ids = $this->request->getPost('ids');

        if (empty($ids) || !is_array($ids)) {
            return $this->response->setJSON(['success' => false, 'message' => 'No records selected']);
        }

        $beneficiaryModel = new BeneficiaryModel();

        try {
            $deletedCount = 0;
            foreach ($ids as $id) {
                if (is_numeric($id) && $beneficiaryModel->delete($id)) {
                    $deletedCount++;
                }
            }

            if ($deletedCount > 0) {
                return $this->response->setJSON([
                    'success' => true,
                    'message' => $deletedCount . ' record(s) deleted successfully'
                ]);
            } else {
                return $this->response->setJSON([
                    'success' => false,
                    'message' => 'No records were deleted'
                ]);
            }
        } catch (\Exception $e) {
            log_message('error', 'Error deleting beneficiaries: ' . $e->getMessage());
            return $this->response->setJSON([
                'success' => false,
                'message' => 'Error deleting records. Please try again.'
            ]);
        }
    }

    public function exportPdf()
    {
        if (!$this->isLoggedIn()) {
            return redirect()->to('/admin/login');
        }

        try {
            $beneficiaryModel = new BeneficiaryModel();
            $beneficiaries = $beneficiaryModel->findAll();

            if (empty($beneficiaries)) {
                session()->setFlashdata('error', 'No beneficiaries found to export.');
                return redirect()->back();
            }

            // Load TCPDF library
            require_once ROOTPATH . 'vendor/tecnickcom/tcpdf/tcpdf.php';

            // Create new PDF document
            $pdf = new \TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

            // Set document information
            $pdf->SetCreator('Nayantar Memorial Charitable Trust');
            $pdf->SetAuthor('Admin');
            $pdf->SetTitle('Beneficiaries List');
            $pdf->SetSubject('Beneficiaries Export');

            // Set default header data
            $pdf->SetHeaderData('', 0, 'Beneficiaries List', 'Nayantar Memorial Charitable Trust\nGenerated on: ' . date('Y-m-d H:i:s'));

            // Set header and footer fonts
            $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
            $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

            // Set default monospaced font
            $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

            // Set margins
            $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
            $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
            $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

            // Set auto page breaks
            $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

            // Add a page
            $pdf->AddPage();

            // Set font
            $pdf->SetFont('helvetica', '', 9);

            // Create table content with better styling
            $html = '<style>
                table { border-collapse: collapse; width: 100%; }
                th { background-color: #4CAF50; color: white; font-weight: bold; text-align: center; padding: 8px; }
                td { padding: 6px; border: 1px solid #ddd; text-align: left; }
                tr:nth-child(even) { background-color: #f9f9f9; }
            </style>

            <h2 style="text-align: center; color: #333;">Beneficiaries List</h2>
            <p style="text-align: center; color: #666;">Total Records: ' . count($beneficiaries) . '</p>

            <table border="1" cellpadding="4" cellspacing="0">
                <thead>
                    <tr style="background-color: #4CAF50; color: white;">
                        <th width="8%"><b>ID</b></th>
                        <th width="20%"><b>Name</b></th>
                        <th width="18%"><b>Email</b></th>
                        <th width="12%"><b>Phone</b></th>
                        <th width="25%"><b>Address</b></th>
                        <th width="10%"><b>Status</b></th>
                        <th width="12%"><b>Created</b></th>
                    </tr>
                </thead>
                <tbody>';

            foreach ($beneficiaries as $beneficiary) {
                $statusColor = $beneficiary['status'] === 'active' ? '#28a745' : '#dc3545';
                $html .= '<tr>
                    <td style="text-align: center;">' . $beneficiary['id'] . '</td>
                    <td>' . htmlspecialchars($beneficiary['name']) . '</td>
                    <td>' . htmlspecialchars($beneficiary['email']) . '</td>
                    <td>' . htmlspecialchars($beneficiary['phone']) . '</td>
                    <td>' . htmlspecialchars(substr($beneficiary['address'], 0, 50) . (strlen($beneficiary['address']) > 50 ? '...' : '')) . '</td>
                    <td style="color: ' . $statusColor . '; text-align: center;"><b>' . ucfirst($beneficiary['status']) . '</b></td>
                    <td style="text-align: center;">' . date('Y-m-d', strtotime($beneficiary['created_at'])) . '</td>
                </tr>';
            }

            $html .= '</tbody></table>
            <br><br>
            <p style="text-align: center; font-size: 10px; color: #888;">
                Generated by Nayantar Memorial Charitable Trust Admin Panel<br>
                Export Date: ' . date('Y-m-d H:i:s') . '
            </p>';

            // Print text using writeHTMLCell()
            $pdf->writeHTML($html, true, false, true, false, '');

            // Close and output PDF document
            $filename = 'beneficiaries_export_' . date('Y-m-d_H-i-s') . '.pdf';

            // Set headers for download
            $this->response->setHeader('Content-Type', 'application/pdf');
            $this->response->setHeader('Content-Disposition', 'attachment; filename="' . $filename . '"');

            $pdf->Output($filename, 'D');
            exit();

        } catch (\Exception $e) {
            log_message('error', 'PDF Export Error: ' . $e->getMessage());
            session()->setFlashdata('error', 'Error generating PDF export. Please try again.');
            return redirect()->back();
        }
    }

    // Helper method to check if admin is logged in
    private function isLoggedIn()
    {
        return $this->session->get('admin_logged_in');
    }

    private function sendEmail($to, $subject, $message)
    {
        try {
            $email = \Config\Services::email();

            // Clear any previous email data
            $email->clear();

            $email->setTo($to);
            $email->setSubject($subject);
            $email->setMessage($message);

            if ($email->send()) {
                return true;
            } else {
                log_message('error', 'Email failed to send: ' . $email->printDebugger(['headers']));
                return false;
            }
        } catch (\Exception $e) {
            log_message('error', 'Email sending exception: ' . $e->getMessage());
            return false;
        }
    }
}