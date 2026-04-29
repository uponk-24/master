<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\AdminModel;

class Auth extends BaseController
{
    public function login()
    {
        if (session()->get('admin_logged_in')) return redirect()->to(site_url('admin/dashboard'));
        return view('admin/login');
    }

    public function doLogin()
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        if (empty($username) || empty($password)) {
            return redirect()->back()->withInput()->with('error', 'Username dan password wajib diisi');
        }

        try {
            $model = new AdminModel();
            $admin = $model->where('username', $username)->first();

            if (!$admin) {
                return redirect()->back()->withInput()->with('error', 'Username atau password salah');
            }

            if (!password_verify($password, $admin['password'])) {
                return redirect()->back()->withInput()->with('error', 'Username atau password salah');
            }

            session()->set([
                'admin_logged_in' => true,
                'admin_id'       => $admin['id'],
                'admin_name'     => $admin['name'],
            ]);

            return redirect()->to(site_url('admin/dashboard'))->with('success', 'Selamat datang, ' . $admin['name']);

        } catch (\Exception $e) {
            log_message('error', 'Login error: ' . $e->getMessage());
            return redirect()->back()->withInput()->with('error', 'Terjadi kesalahan sistem. Silakan coba lagi.');
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to(site_url('admin/login'))->with('success', 'Berhasil logout');
    }
}
