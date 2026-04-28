<?php

namespace App\Controllers;

use App\Models\AdminModel;

/**
 * Setup Controller - Jalankan sekali setelah deploy
 * Akses: /setup untuk membuat akun admin default
 */
class Setup extends BaseController
{
    public function index()
    {
        $adminModel = new AdminModel();

        // Cek apakah admin sudah ada
        if ($adminModel->first()) {
            return 'Setup sudah pernah dijalankan. Admin sudah ada di database.';
        }

        // Buat admin default
        $adminModel->insert([
            'id'       => 'admin-1',
            'username' => 'admin',
            'password' => password_hash('admin123', PASSWORD_BCRYPT),
            'name'     => 'Administrator Desa',
        ]);

        return '✅ Setup berhasil! Akun admin telah dibuat.<br>
                Username: <strong>admin</strong><br>
                Password: <strong>admin123</strong><br><br>
                Silakan login di <a href="/admin/login">/admin/login</a><br><br>
                <small>⚠️ Segera ubah password setelah login pertama!</small>';
    }
}
