<?php

namespace App\Models;

use CodeIgniter\Model;

class ServiceModel extends Model
{
    protected $table = 'services';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = false;
    protected $returnType = 'array';
    protected $allowedFields = ['id','name','description','icon','requirements','procedure','order_num','is_active'];

    public function getActive(): array
    {
        return $this->where('is_active',1)->orderBy('order_num','ASC')->findAll();
    }
}
