<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;
class Auth implements FilterInterface
{
    // Fungsi before dieksekusi sebelum request diproses
    public function before(RequestInterface $request, $arguments = null)
    {
        // Jika user belum login, redirect ke halaman login
        if (!session()->get('logged_in')) {
            return redirect()->to('/user/login');
        }
    }

    // Fungsi after dieksekusi setelah response diproses
    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Tidak ada yang perlu dilakukan setelah request
    }
}
