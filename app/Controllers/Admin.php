<?php

namespace App\Controllers;

use App\Models\AdminModel;
use App\Models\BeneficiaryModel;
use App\Models\SuccessStoryModel;

class Admin extends BaseController
{
    protected $session;
    
    public function __construct()
    {
        $this->session = \Config\Services::session();
    }
    
    public function index()
    {
        if (!$this->session->get('admin_logged_in')) {
            return redirect()->to('/admin/login');
        }
        
        $beneficiaryModel = new BeneficiaryModel();
        $successStoryModel = new SuccessStoryModel();
        
        $data = [
            'title' => 'Dashboard',
            'page_title' => 'Dashboard',
            'total_beneficiaries' => $beneficiaryModel->countAll(),
            'active_beneficiaries' => $beneficiaryModel->where('status', 'active')->countAllResults(),
            'total_stories' => $successStoryModel->countAll(),
            'recent_beneficiaries' => $beneficiaryModel->orderBy('created_at', 'DESC')->limit(5)->findAll()
        ];
        
        return view('admin/dashboard', $data);
    }
    
    public function login()
    {
        if ($this->session->get('admin_logged_in')) {
            return redirect()->to('/admin');
        }
        
        return view('admin/login');
    }
    
    public function authenticate()
    {
        $adminModel = new AdminModel();
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');
        
        // Check if user exists first
        $admin = $adminModel->where('username', $username)->first();
        
        if (!$admin) {
            $this->session->setFlashdata('error', 'User not found');
            return redirect()->to('/admin/login');
        }
        
        // Verify password
        if (password_verify($password, $admin['password'])) {
            $this->session->set([
                'admin_logged_in' => true,
                'admin_id' => $admin['id'],
                'admin_username' => $admin['username']
            ]);
            return redirect()->to('/admin');
        } else {
            $this->session->setFlashdata('error', 'Invalid password');
            return redirect()->to('/admin/login');
        }
    }
    
    public function logout()
    {
        $this->session->destroy();
        return redirect()->to('/admin/login');
    }
    
    private function checkAuth()
    {
        if (!$this->session->get('admin_logged_in')) {
            return redirect()->to('/admin/login');
        }
        return true;
    }
}