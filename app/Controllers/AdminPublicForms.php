<?php

namespace App\Controllers;

use App\Models\PublicFormModel;
use App\Models\PublicSubmissionModel;

class AdminPublicForms extends BaseController
{
    protected $session;
    protected $publicFormModel;
    protected $publicSubmissionModel;

    public function __construct()
    {
        $this->session = \Config\Services::session();
        $this->publicFormModel = new PublicFormModel();
        $this->publicSubmissionModel = new PublicSubmissionModel();
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
        $auth = $this->checkAuth();
        if ($auth !== true) return $auth;

        $data = [
            'forms' => $this->publicFormModel->findAll()
        ];

        return view('admin/public_forms/index', $data);
    }

    public function create()
    {
        $auth = $this->checkAuth();
        if ($auth !== true) return $auth;

        return view('admin/public_forms/create');
    }

    public function store()
    {
        $auth = $this->checkAuth();
        if ($auth !== true) return $auth;

        $formType = $this->request->getPost('form_type');
        $token = $this->publicFormModel->generateUniqueToken($formType);

        $data = [
            'form_name' => $this->request->getPost('form_name'),
            'form_type' => $formType,
            'public_url_token' => $token,
            'valid_until' => $this->request->getPost('valid_until'),
            'max_submissions' => $this->request->getPost('max_submissions') ?: 100,
            'description' => $this->request->getPost('description'),
            'created_by_admin_id' => $this->session->get('admin_id'),
            'status' => 'active'
        ];

        if ($this->publicFormModel->save($data)) {
            $this->session->setFlashdata('success', 'Public form created successfully');
            $this->session->setFlashdata('public_url', base_url('public-form/' . $token));
            return redirect()->to('/admin/public-forms');
        } else {
            $this->session->setFlashdata('error', 'Failed to create public form');
            return redirect()->back()->withInput();
        }
    }

    public function submissions($formId)
    {
        $auth = $this->checkAuth();
        if ($auth !== true) return $auth;

        $form = $this->publicFormModel->find($formId);
        if (!$form) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Form not found');
        }

        $data = [
            'form' => $form,
            'submissions' => $this->publicSubmissionModel->getSubmissionsByForm($formId)
        ];

        return view('admin/public_forms/submissions', $data);
    }

    public function approveSubmission($submissionId)
    {
        $auth = $this->checkAuth();
        if ($auth !== true) return $auth;

        $submission = $this->publicSubmissionModel->find($submissionId);
        if (!$submission) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Submission not found');
        }

        $form = $this->publicFormModel->find($submission['public_form_id']);
        $targetTable = $form['form_type'] === 'beneficiary' ? 'beneficiaries' : 'success_stories';

        if ($this->publicSubmissionModel->approveSubmission($submissionId, $targetTable)) {
            $this->session->setFlashdata('success', 'Submission approved and added to database');
        } else {
            $this->session->setFlashdata('error', 'Failed to approve submission');
        }

        return redirect()->back();
    }
}
