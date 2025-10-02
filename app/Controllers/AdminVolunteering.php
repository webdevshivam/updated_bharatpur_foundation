<?php

namespace App\Controllers;

use App\Models\VolunteeringSettingsModel;
use App\Models\VolunteeringSubmissionModel;
use App\Models\BeneficiaryModel;
use App\Models\EmailLogModel;
use CodeIgniter\Email\Email;

class AdminVolunteering extends BaseController
{
    protected $settingsModel;
    protected $submissionModel;
    protected $beneficiaryModel;
    protected $emailLogModel;

    public function __construct()
    {
        $this->settingsModel = new VolunteeringSettingsModel();
        $this->submissionModel = new VolunteeringSubmissionModel();
        $this->beneficiaryModel = new BeneficiaryModel();
        $this->emailLogModel = new EmailLogModel();
    }

    private function checkAdminAuth()
    {
        if (!session()->get('admin_logged_in')) {
            return redirect()->to('/admin/login');
        }
        return true;
    }

    public function index()
    {
        $authCheck = $this->checkAdminAuth();
        if ($authCheck !== true) return $authCheck;

        $currentMonth = date('Y-m');
        $stats = $this->submissionModel->getMonthlyStats($currentMonth);
        $submissions = $this->submissionModel->getSubmissionsWithBeneficiaries($currentMonth);
        $settings = $this->settingsModel->getSettings();

        $data = [
            'stats' => $stats,
            'submissions' => $submissions,
            'settings' => $settings,
            'currentMonth' => $currentMonth
        ];

        return view('admin/volunteering/index', $data);
    }

    public function settings()
    {
        $authCheck = $this->checkAdminAuth();
        if ($authCheck !== true) return $authCheck;

        if ($this->request->getMethod() === 'POST') {
            $data = [
                'reminder_interval_days' => $this->request->getPost('reminder_interval_days'),
                'email_template' => $this->request->getPost('email_template'),
                'is_active' => $this->request->getPost('is_active') ? 1 : 0
            ];

            $settings = $this->settingsModel->first();
            if ($settings) {
                $this->settingsModel->update($settings['id'], $data);
            } else {
                $this->settingsModel->insert($data);
            }

            return redirect()->to('/admin/volunteering/settings')->with('success', 'Settings updated successfully!');
        }

        $data = [
            'settings' => $this->settingsModel->getSettings()
        ];

        return view('admin/volunteering/settings', $data);
    }

    public function sendReminders()
    {
        $authCheck = $this->checkAdminAuth();
        if ($authCheck !== true) return $authCheck;

        $settings = $this->settingsModel->getSettings();
        if (!$settings['is_active']) {
            return redirect()->to('/admin/volunteering')->with('error', 'Volunteering reminders are disabled!');
        }

        $currentMonth = date('Y-m');
        $activeBeneficiaries = $this->beneficiaryModel->where('status', 'active')->findAll();

        $sentCount = 0;
        $failedCount = 0;

        foreach ($activeBeneficiaries as $beneficiary) {
            // Check if already submitted for this month
            if (!$this->submissionModel->hasSubmissionForMonth($beneficiary['id'], $currentMonth)) {
                $result = $this->sendReminderEmail($beneficiary);
                if ($result) {
                    $sentCount++;
                } else {
                    $failedCount++;
                }
            }
        }

        $message = "Reminders sent: {$sentCount}, Failed: {$failedCount}";
        return redirect()->to('/admin/volunteering')->with('success', $message);
    }

    private function sendReminderEmail($beneficiary)
    {
        $email = new Email();

        $config = [
            'protocol' => 'smtp',
            'SMTPHost' => 'smtp.hostinger.com',
            'SMTPUser' => 'info@megastarpremiercricketleague.com',
            'SMTPPass' => '9012442784@Jms@123',
            'SMTPPort' => 465,
            'SMTPCrypto' => 'ssl',
            'mailType' => 'html',
            'charset' => 'utf-8',
            'wordWrap' => true,
        ];

        $email->initialize($config);

        $formUrl = base_url("volunteering-form/{$beneficiary['id']}");

        $message = $this->getEmailTemplate($beneficiary['name'], $formUrl);

        $email->setFrom('info@megastarpremiercricketleague.com', 'Nayantar Memorial Charitable Trust');
        $email->setTo($beneficiary['email']);
        $email->setSubject('Monthly Volunteering Work Reminder - नायंतार मेमोरियल चैरिटेबल ट्रस्ट');
        $email->setMessage($message);

        try {
            if ($email->send()) {
                $this->emailLogModel->logEmail(
                    $beneficiary['id'],
                    $beneficiary['email'],
                    'Monthly Volunteering Work Reminder',
                    'sent'
                );
                return true;
            } else {
                $this->emailLogModel->logEmail(
                    $beneficiary['id'],
                    $beneficiary['email'],
                    'Monthly Volunteering Work Reminder',
                    'failed',
                    $email->printDebugger(['headers'])
                );
                return false;
            }
        } catch (\Exception $e) {
            $this->emailLogModel->logEmail(
                $beneficiary['id'],
                $beneficiary['email'],
                'Monthly Volunteering Work Reminder',
                'failed',
                $e->getMessage()
            );
            return false;
        }
    }

    private function getEmailTemplate($name, $formUrl)
    {
        return "
        <html>
        <body style='font-family: Arial, sans-serif; line-height: 1.6; color: #333;'>
            <div style='max-width: 600px; margin: 0 auto; padding: 20px;'>
                <h2 style='color: #2c5aa0;'>प्रिय {$name},</h2>

                <p>नमस्कार! आशा है आप स्वस्थ और खुश होंगे।</p>

                <p>यह आपको याद दिलाने के लिए है कि इस महीने का आपका स्वयंसेवी कार्य (Volunteering Work) जमा करने का समय आ गया है।</p>

                <div style='background: #f8f9fa; padding: 15px; border-left: 4px solid #2c5aa0; margin: 20px 0;'>
                    <h3 style='margin-top: 0; color: #2c5aa0;'>स्वयंसेवी कार्य के उदाहरण:</h3>
                    <ul style='margin: 10px 0;'>
                        <li>अनाथालय में बच्चों की सहायता करना</li>
                        <li>गरीब छात्रों को ट्यूशन देना</li>
                        <li>वृद्ध व्यक्तियों की मदद करना</li>
                        <li>भोजन वितरण करना</li>
                        <li>कपड़े दान करना</li>
                        <li>पार्क/स्कूल की सफाई करना</li>
                        <li>दिव्यांग व्यक्तियों की सहायता</li>
                    </ul>
                </div>

                <p style='background: #e3f2fd; padding: 15px; border-radius: 5px;'>
                    <strong>प्रेरणा:</strong> याद रखें, आपका छोटा सा प्रयास किसी की जिंदगी में बड़ा बदलाव ला सकता है।
                    आप जो भी अच्छा काम करते हैं, वह न केवल दूसरों की मदद करता है बल्कि आपको भी खुशी और संतुष्टि देता है।
                </p>

                <div style='text-align: center; margin: 30px 0;'>
                    <a href='{$formUrl}' style='background: #2c5aa0; color: white; padding: 15px 30px; text-decoration: none; border-radius: 5px; font-weight: bold;'>
                        अपना स्वयंसेवी कार्य जमा करें
                    </a>
                </div>

                <p><strong>महत्वपूर्ण:</strong> यदि आप किसी कारणवश इस महीने स्वयंसेवी कार्य नहीं कर सके हैं, तो कृपया फॉर्म में इसका कारण बताएं।</p>

                <p>धन्यवाद!</p>
                <p><strong>नायंतार मेमोरियल चैरिटेबल ट्रस्ट</strong></p>
            </div>
        </body>
        </html>";
    }

    public function viewSubmission($id)
    {
        $authCheck = $this->checkAdminAuth();
        if ($authCheck !== true) return $authCheck;

        $submission = $this->submissionModel->getSubmissionsWithBeneficiaries();
        $submission = array_filter($submission, function ($s) use ($id) {
            return $s['id'] == $id;
        });
        $submission = reset($submission);

        if (!$submission) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Submission not found');
        }

        $data = ['submission' => $submission];
        return view('admin/volunteering/view', $data);
    }

    public function updateStatus($id)
    {
        $authCheck = $this->checkAdminAuth();
        if ($authCheck !== true) return $authCheck;

        $status = $this->request->getPost('status');
        $adminNotes = $this->request->getPost('admin_notes');

        $this->submissionModel->update($id, [
            'status' => $status,
            'admin_notes' => $adminNotes
        ]);

        return redirect()->to('/admin/volunteering')->with('success', 'Status updated successfully!');
    }

    public function emailLogs()
    {
        $authCheck = $this->checkAdminAuth();
        if ($authCheck !== true) return $authCheck;

        $data = [
            'logs' => $this->emailLogModel->getRecentLogs()
        ];

        return view('admin/volunteering/email_logs', $data);
    }
}
