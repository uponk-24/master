<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\AdminModel;

class Auth extends BaseController
{
    public function login()
    {
        if (session()->get('admin_logged_in')) return redirect()->to('/admin/dashboard');
        return view('admin/login');
    }

    public function doLogin()
    {
        if (!$this->validate(['username'=>'required', 'password'=>'required'])) {
            return redirect()->back()->withInput()->with('error', 'Username dan password wajib diisi');
        }

        $model = new AdminModel();
        $admin = $model->verifyLogin($this->request->getPost('username'), $this->request->getPost('password'));

        if ($admin) {
            session()->set([
                'admin_logged_in' => true,
                'admin_id'       => $admin['id'],
                'admin_name'     => $admin['name'],
            ]);
            return redirect()->to('/admin/dashboard')->with('success', 'Selamat datang, ' . $admin['name']);
        }

        return redirect()->back()->withInput()->with('error', 'Username atau password salah');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/admin/login')->with('success', 'Berhasil logout');
    }
}
