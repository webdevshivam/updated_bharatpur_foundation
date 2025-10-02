<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class AuthFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // Get the current URI
        $uri = $request->getUri();
        $path = $uri->getPath();
        
        // Allow access to login and authenticate routes without authentication
        if (strpos($path, '/admin/login') !== false || strpos($path, '/admin/authenticate') !== false) {
            return;
        }
        
        // Check if user is logged in (assuming you store admin login in session)
        if (!session()->get('admin_logged_in')) {
            // Redirect to login page
            return redirect()->to('/admin/login');
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here if needed
    }
}
