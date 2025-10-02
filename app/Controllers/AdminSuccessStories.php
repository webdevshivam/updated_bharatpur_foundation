<?php

namespace App\Controllers;

use App\Models\SuccessStoryModel;

class AdminSuccessStories extends BaseController
{
    protected $session;
    protected $successStoryModel;

    public function __construct()
    {
        $this->session = \Config\Services::session();
        $this->successStoryModel = new SuccessStoryModel();
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
            'stories' => $this->successStoryModel->orderBy('created_at', 'DESC')->findAll()
        ];

        return view('admin/success_stories/index', $data);
    }

    public function create()
    {
        $authCheck = $this->checkAuth();
        if ($authCheck !== true) return $authCheck;

        return view('admin/success_stories/create');
    }

    public function store()
    {
        $authCheck = $this->checkAuth();
        if ($authCheck !== true) return $authCheck;

        $data = [
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
            'status' => $this->request->getPost('status')
        ];

        // Handle image upload
        $image = $this->request->getFile('image');
        if ($image && $image->isValid() && !$image->hasMoved()) {
            $newName = $image->getRandomName();
            $uploadPath = WRITEPATH . 'uploads/success_stories/';
            
            // Create directory if it doesn't exist
            if (!is_dir($uploadPath)) {
                mkdir($uploadPath, 0755, true);
            }
            
            // Validate file type and size
            $validTypes = ['image/jpeg', 'image/jpg', 'image/png', 'image/gif'];
            $maxSize = 2 * 1024 * 1024; // 2MB
            
            if (in_array($image->getMimeType(), $validTypes) && $image->getSize() <= $maxSize) {
                // Move the file
                try {
                    if ($image->move($uploadPath, $newName)) {
                        $data['image'] = $newName;
                    } else {
                        $this->session->setFlashdata('error', 'Failed to upload image - file move error');
                        return redirect()->back()->withInput();
                    }
                } catch (\Exception $e) {
                    $this->session->setFlashdata('error', 'Upload error: ' . $e->getMessage());
                    return redirect()->back()->withInput();
                }
            } else {
                if (!in_array($image->getMimeType(), $validTypes)) {
                    $this->session->setFlashdata('error', 'Invalid image format. Please use JPG, PNG, or GIF');
                } else {
                    $this->session->setFlashdata('error', 'Image size too large. Maximum 2MB allowed');
                }
                return redirect()->back()->withInput();
            }
        }

        if ($this->successStoryModel->insert($data)) {
            $this->session->setFlashdata('success', 'Success story added successfully');
            return redirect()->to('/admin/success-stories');
        } else {
            $this->session->setFlashdata('error', 'Failed to add success story');
            return redirect()->back()->withInput();
        }
    }

    public function edit($id)
    {
        $authCheck = $this->checkAuth();
        if ($authCheck !== true) return $authCheck;

        $successStory = $this->successStoryModel->find($id);
        if (!$successStory) {
            $this->session->setFlashdata('error', 'Success story not found');
            return redirect()->to('/admin/success-stories');
        }

        $data = ['success_story' => $successStory];
        return view('admin/success_stories/edit', $data);
    }

    public function update($id)
    {
        $authCheck = $this->checkAuth();
        if ($authCheck !== true) return $authCheck;

        $successStory = $this->successStoryModel->find($id);
        if (!$successStory) {
            $this->session->setFlashdata('error', 'Success story not found');
            return redirect()->to('/admin/success-stories');
        }

        $data = [
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
            'status' => $this->request->getPost('status')
        ];

        // Handle image upload
        $image = $this->request->getFile('image');
        if ($image && $image->isValid() && !$image->hasMoved()) {
            $newName = $image->getRandomName();
            $uploadPath = WRITEPATH . 'uploads/success_stories/';
            
            // Create directory if it doesn't exist
            if (!is_dir($uploadPath)) {
                mkdir($uploadPath, 0755, true);
            }
            
            // Validate file type and size
            $validTypes = ['image/jpeg', 'image/jpg', 'image/png', 'image/gif'];
            $maxSize = 2 * 1024 * 1024; // 2MB
            
            if (in_array($image->getMimeType(), $validTypes) && $image->getSize() <= $maxSize) {
                // Move the file
                try {
                    if ($image->move($uploadPath, $newName)) {
                        $data['image'] = $newName;
                        
                        // Delete old image if exists
                        if (!empty($successStory['image']) && file_exists($uploadPath . $successStory['image'])) {
                            unlink($uploadPath . $successStory['image']);
                        }
                    } else {
                        $this->session->setFlashdata('error', 'Failed to upload image - file move error');
                        return redirect()->back()->withInput();
                    }
                } catch (\Exception $e) {
                    $this->session->setFlashdata('error', 'Upload error: ' . $e->getMessage());
                    return redirect()->back()->withInput();
                }
            } else {
                if (!in_array($image->getMimeType(), $validTypes)) {
                    $this->session->setFlashdata('error', 'Invalid image format. Please use JPG, PNG, or GIF');
                } else {
                    $this->session->setFlashdata('error', 'Image size too large. Maximum 2MB allowed');
                }
                return redirect()->back()->withInput();
            }
        }

        if ($this->successStoryModel->update($id, $data)) {
            $this->session->setFlashdata('success', 'Success story updated successfully');
            return redirect()->to('/admin/success-stories');
        } else {
            $this->session->setFlashdata('error', 'Failed to update success story');
            return redirect()->back()->withInput();
        }
    }

    public function delete($id)
    {
        $authCheck = $this->checkAuth();
        if ($authCheck !== true) return $authCheck;

        $successStory = $this->successStoryModel->find($id);
        if (!$successStory) {
            $this->session->setFlashdata('error', 'Success story not found');
            return redirect()->to('/admin/success-stories');
        }

        // Delete image if exists
        if (!empty($successStory['image']) && file_exists(WRITEPATH . 'uploads/success_stories/' . $successStory['image'])) {
            unlink(WRITEPATH . 'uploads/success_stories/' . $successStory['image']);
        }

        if ($this->successStoryModel->delete($id)) {
            $this->session->setFlashdata('success', 'Success story deleted successfully');
        } else {
            $this->session->setFlashdata('error', 'Failed to delete success story');
        }

        return redirect()->to('/admin/success-stories');
    }
}