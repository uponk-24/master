<?php

namespace App\Models;

use CodeIgniter\Model;

class NewsModel extends Model
{
    protected $table = 'news';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = false;
    protected $returnType = 'array';
    protected $allowedFields = ['id','title','content','excerpt','image_url','category','is_published','date'];

    public function getPublished(int $limit = 10): array
    {
        return $this->where('is_published',1)->orderBy('date','DESC')->limit($limit)->findAll();
    }

    public function findById(string $id): ?array
    {
        return $this->where('id',$id)->where('is_published',1)->first();
    }
}
