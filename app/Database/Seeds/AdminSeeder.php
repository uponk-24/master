<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AdminSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'id'       => 'admin-1',
            'username' => 'admin',
            'password' => password_hash('admin123', PASSWORD_BCRYPT),
            'name'     => 'Administrator Desa',
        ];

        $this->db->table('admins')->insert($data);
    }
}
