<?php

namespace App\Models;

use CodeIgniter\Model;

class AdminModel extends Model
{
    protected $table = 'admins';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = false;
    protected $returnType = 'array';
    protected $allowedFields = ['id','username','password','name'];

    public function verifyLogin(string $username, string $password): ?array
    {
        $admin = $this->where('username',$username)->first();
        if ($admin && password_verify($password, $admin['password'])) return $admin;
        return null;
    }
}
