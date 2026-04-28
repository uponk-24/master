<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\AdminModel;

class Settings extends BaseController
{
    protected AdminModel $model;

    public function __construct() { $this->model = new AdminModel(); }

    public function index()
    {
        return view('admin/settings');
    }

    public function changePassword()
    {
        $adminId = session()->get('admin_id');

        $currentPassword = $this->request->getPost('current_password');
        $newPassword     = $this->request->getPost('new_password');
        $confirmPassword = $this->request->getPost('confirm_password');

        // Validate inputs
        if (empty($currentPassword) || empty($newPassword) || empty($confirmPassword)) {
            return redirect()->to('/admin/pengaturan')->with('error', 'Semua field harus diisi');
        }

        // Verify current password
        $admin = $this->model->find($adminId);
        if (!$admin || !password_verify($currentPassword, $admin['password'])) {
            return redirect()->to('/admin/pengaturan')->with('error', 'Password saat ini salah');
        }

        // Confirm new password
        if ($newPassword !== $confirmPassword) {
            return redirect()->to('/admin/pengaturan')->with('error', 'Konfirmasi password tidak cocok');
        }

        // Minimum length
        if (strlen($newPassword) < 6) {
            return redirect()->to('/admin/pengaturan')->with('error', 'Password baru minimal 6 karakter');
        }

        // Update password
        $this->model->update($adminId, [
            'password' => password_hash($newPassword, PASSWORD_DEFAULT),
        ]);

        return redirect()->to('/admin/pengaturan')->with('success', 'Password berhasil diubah');
    }
}
