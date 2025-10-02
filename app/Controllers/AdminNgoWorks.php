<?php

namespace App\Controllers;

use App\Models\NgoWorkModel;
use CodeIgniter\Controller;

class AdminNgoWorks extends BaseController
{
    protected $session;
    protected $ngoWorkModel;

    public function __construct()
    {
        $this->session = \Config\Services::session();
        $this->ngoWorkModel = new NgoWorkModel();
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

        helper('text'); // Load text helper for character_limiter

        $data = [
            'works' => $this->ngoWorkModel->orderBy('created_at', 'DESC')->findAll()
        ];

        return view('admin/ngo_works/index', $data);
    }

    public function create()
    {
        $authCheck = $this->checkAuth();
        if ($authCheck !== true) return $authCheck;

        return view('admin/ngo_works/create');
    }

    public function store()
    {
        $authCheck = $this->checkAuth();
        if ($authCheck !== true) return $authCheck;

        $data = [
            'title' => $this->request->getPost('title'),
            'description' => $this->request->getPost('description'),
            'category' => $this->request->getPost('category'),
            'location' => $this->request->getPost('location'),
            'date_completed' => $this->request->getPost('date_completed'),
            'beneficiaries_count' => (int)$this->request->getPost('beneficiaries_count'),
            'budget_amount' => $this->request->getPost('budget_amount'),
            'partners' => $this->request->getPost('partners'),
            'achievements' => $this->request->getPost('achievements'),
            'status' => $this->request->getPost('status')
        ];

        // Handle multiple image uploads
        $images = $this->request->getFiles()['images'] ?? [];
        $uploadedImages = [];

        if (!empty($images)) {
            foreach ($images as $image) {
                if ($image && $image->isValid() && !$image->hasMoved()) {
                    $newName = $image->getRandomName();
                    if (!is_dir(WRITEPATH . 'uploads/ngo_works')) {
                        mkdir(WRITEPATH . 'uploads/ngo_works', 0755, true);
                    }
                    $image->move(WRITEPATH . 'uploads/ngo_works', $newName);
                    $uploadedImages[] = $newName;
                }
            }
        }

        if (!empty($uploadedImages)) {
            $data['images'] = json_encode($uploadedImages);
        }

        if ($this->ngoWorkModel->insert($data)) {
            $this->session->setFlashdata('success', 'NGO work added successfully');
            return redirect()->to('/admin/ngo-works');
        } else {
            $this->session->setFlashdata('error', 'Failed to add NGO work');
            return redirect()->back()->withInput();
        }
    }

    public function edit($id)
    {
        $authCheck = $this->checkAuth();
        if ($authCheck !== true) return $authCheck;

        $ngoWork = $this->ngoWorkModel->find($id);
        if (!$ngoWork) {
            $this->session->setFlashdata('error', 'NGO work not found');
            return redirect()->to('/admin/ngo-works');
        }

        $data = ['ngo_work' => $ngoWork];
        return view('admin/ngo_works/edit', $data);
    }

    public function update($id)
    {
        $authCheck = $this->checkAuth();
        if ($authCheck !== true) return $authCheck;

        $ngoWork = $this->ngoWorkModel->find($id);
        if (!$ngoWork) {
            $this->session->setFlashdata('error', 'NGO work not found');
            return redirect()->to('/admin/ngo-works');
        }

        $data = [
            'title' => $this->request->getPost('title'),
            'description' => $this->request->getPost('description'),
            'category' => $this->request->getPost('category'),
            'location' => $this->request->getPost('location'),
            'date_completed' => $this->request->getPost('date_completed'),
            'beneficiaries_count' => (int)$this->request->getPost('beneficiaries_count'),
            'budget_amount' => $this->request->getPost('budget_amount'),
            'partners' => $this->request->getPost('partners'),
            'achievements' => $this->request->getPost('achievements'),
            'status' => $this->request->getPost('status')
        ];

        // Handle multiple image uploads
        $images = $this->request->getFiles()['images'] ?? [];
        $uploadedImages = [];

        if (!empty($images)) {
            foreach ($images as $image) {
                if ($image && $image->isValid() && !$image->hasMoved()) {
                    $newName = $image->getRandomName();
                    if (!is_dir(WRITEPATH . 'uploads/ngo_works')) {
                        mkdir(WRITEPATH . 'uploads/ngo_works', 0755, true);
                    }
                    $image->move(WRITEPATH . 'uploads/ngo_works', $newName);
                    $uploadedImages[] = $newName;
                }
            }

            // Delete old images if new ones are uploaded
            if (!empty($ngoWork['images'])) {
                $oldImages = json_decode($ngoWork['images'], true);
                if ($oldImages) {
                    foreach ($oldImages as $oldImage) {
                        if (file_exists(WRITEPATH . 'uploads/ngo_works/' . $oldImage)) {
                            unlink(WRITEPATH . 'uploads/ngo_works/' . $oldImage);
                        }
                    }
                }
            }

            $data['images'] = json_encode($uploadedImages);
        }

        if ($this->ngoWorkModel->update($id, $data)) {
            $this->session->setFlashdata('success', 'NGO work updated successfully');
            return redirect()->to('/admin/ngo-works');
        } else {
            $this->session->setFlashdata('error', 'Failed to update NGO work');
            return redirect()->back()->withInput();
        }
    }

    public function delete($id)
    {
        $authCheck = $this->checkAuth();
        if ($authCheck !== true) return $authCheck;

        $ngoWork = $this->ngoWorkModel->find($id);
        if (!$ngoWork) {
            $this->session->setFlashdata('error', 'NGO work not found');
            return redirect()->to('/admin/ngo-works');
        }

        // Delete images if exist
        if (!empty($ngoWork['images'])) {
            $images = json_decode($ngoWork['images'], true);
            if ($images) {
                foreach ($images as $image) {
                    if (file_exists(WRITEPATH . 'uploads/ngo_works/' . $image)) {
                        unlink(WRITEPATH . 'uploads/ngo_works/' . $image);
                    }
                }
            }
        }

        if ($this->ngoWorkModel->delete($id)) {
            $this->session->setFlashdata('success', 'NGO work deleted successfully');
        } else {
            $this->session->setFlashdata('error', 'Failed to delete NGO work');
        }

        return redirect()->to('/admin/ngo-works');
    }

    public function view($id)
    {
        $authCheck = $this->checkAuth();
        if ($authCheck !== true) return $authCheck;

        $ngoWork = $this->ngoWorkModel->find($id);
        if (!$ngoWork) {
            $this->session->setFlashdata('error', 'NGO work not found');
            return redirect()->to('/admin/ngo-works');
        }

        $data = ['ngo_work' => $ngoWork];
        return view('admin/ngo_works/view', $data);
    }
}