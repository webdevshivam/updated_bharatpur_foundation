
<?php

namespace App\Controllers;

use App\Models\PublicFormModel;
use App\Models\PublicSubmissionModel;

class PublicForm extends BaseController
{
    protected $publicFormModel;
    protected $publicSubmissionModel;
    
    public function __construct()
    {
        $this->publicFormModel = new PublicFormModel();
        $this->publicSubmissionModel = new PublicSubmissionModel();
    }
    
    public function index($token)
    {
        $form = $this->publicFormModel->getActiveForm($token);
        
        if (!$form) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Form not found or expired');
        }
        
        // Check if max submissions reached
        if ($form['max_submissions'] && $form['current_submissions'] >= $form['max_submissions']) {
            return view('public_forms/closed', ['message' => 'Maximum submissions reached']);
        }
        
        $data = [
            'form' => $form,
            'token' => $token
        ];
        
        return view('public_forms/' . $form['form_type'], $data);
    }
    
    public function submit($token)
    {
        $form = $this->publicFormModel->getActiveForm($token);
        
        if (!$form) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Form not found or expired');
        }
        
        // Check if max submissions reached
        if ($form['max_submissions'] && $form['current_submissions'] >= $form['max_submissions']) {
            return view('public_forms/closed', ['message' => 'Maximum submissions reached']);
        }
        
        // Prepare form data based on type
        if ($form['form_type'] === 'beneficiary') {
            $formData = [
                'name' => $this->request->getPost('name'),
                'age' => (int)$this->request->getPost('age'),
                'education_level' => $this->request->getPost('education_level'),
                'course' => $this->request->getPost('course'),
                'institution' => $this->request->getPost('institution'),
                'city' => $this->request->getPost('city'),
                'state' => $this->request->getPost('state'),
                'phone' => $this->request->getPost('phone'),
                'email' => $this->request->getPost('email'),
                'linkedin_url' => $this->request->getPost('linkedin_url'),
                'company_link' => $this->request->getPost('company_link'),
                'family_background' => $this->request->getPost('family_background'),
                'academic_achievements' => $this->request->getPost('academic_achievements'),
                'career_goals' => $this->request->getPost('career_goals'),
                'status' => 'active'
            ];
        } else {
            $formData = [
                'name' => $this->request->getPost('name'),
                'age' => (int)$this->request->getPost('age'),
                'education' => $this->request->getPost('education'),
                'current_position' => $this->request->getPost('current_position'),
                'company' => $this->request->getPost('company'),
                'city' => $this->request->getPost('city'),
                'state' => $this->request->getPost('state'),
                'linkedin_url' => $this->request->getPost('linkedin_url'),
                'company_link' => $this->request->getPost('company_link'),
                'story' => $this->request->getPost('story'),
                'achievements' => $this->request->getPost('achievements'),
                'status' => 'active'
            ];
        }
        
        $submissionData = [
            'public_form_id' => $form['id'],
            'form_data' => json_encode($formData),
            'ip_address' => $this->request->getIPAddress(),
            'user_agent' => $this->request->getUserAgent(),
            'status' => 'pending'
        ];
        
        // Handle image upload
        $image = $this->request->getFile('image');
        if ($image && $image->isValid() && !$image->hasMoved()) {
            $newName = $image->getRandomName();
            $uploadPath = WRITEPATH . 'uploads/public_submissions';
            
            if (!is_dir($uploadPath)) {
                mkdir($uploadPath, 0777, true);
            }
            
            $image->move($uploadPath, $newName);
            $submissionData['image'] = $newName;
        }
        
        if ($this->publicSubmissionModel->save($submissionData)) {
            $this->publicFormModel->incrementSubmissions($form['id']);
            return view('public_forms/success');
        } else {
            session()->setFlashdata('error', 'Failed to submit form. Please try again.');
            return redirect()->back()->withInput();
        }
    }
}
