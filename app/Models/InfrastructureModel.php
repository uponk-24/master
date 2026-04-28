<?php

namespace App\Models;

use CodeIgniter\Model;

class InfrastructureModel extends Model
{
    protected $table = 'infrastructure';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = false;
    protected $returnType = 'array';
    protected $allowedFields = ['id','name','category','quantity','unit','condition'];
}
