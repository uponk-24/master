<?php

namespace App\Models;

use CodeIgniter\Model;

class GalleryModel extends Model
{
    protected $table = 'gallery';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = false;
    protected $returnType = 'array';
    protected $allowedFields = ['id','title','image_url','category','order_num'];

    public function getAllOrdered(): array
    {
        return $this->orderBy('order_num','ASC')->findAll();
    }
}
