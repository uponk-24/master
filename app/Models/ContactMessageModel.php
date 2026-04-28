<?php

namespace App\Models;

use CodeIgniter\Model;

class ContactMessageModel extends Model
{
    protected $table = 'contact_messages';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = false;
    protected $returnType = 'array';
    protected $allowedFields = ['id','name','email','message','is_read'];

    public function countUnread(): int
    {
        return $this->where('is_read',0)->countAllResults();
    }
}
