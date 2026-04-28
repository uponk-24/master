<?php

namespace App\Models;

use CodeIgniter\Model;

class OfficialModel extends Model
{
    protected $table = 'officials';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = false;
    protected $returnType = 'array';
    protected $allowedFields = ['id','name','position','photo_url','nip','order_num'];

    public function getAllOrdered(): array
    {
        return $this->orderBy('order_num','ASC')->findAll();
    }
}
