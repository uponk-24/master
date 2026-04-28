<?php

namespace App\Models;

use CodeIgniter\Model;

class TourismSpotModel extends Model
{
    protected $table = 'tourism_spots';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = false;
    protected $returnType = 'array';
    protected $allowedFields = ['id','name','description','image_url','category','location','order_num'];

    public function getAllOrdered(): array
    {
        return $this->orderBy('order_num','ASC')->findAll();
    }
}
