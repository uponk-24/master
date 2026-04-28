<?php

namespace App\Models;

use CodeIgniter\Model;

class PopulationModel extends Model
{
    protected $table = 'population_stats';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = false;
    protected $returnType = 'array';
    protected $allowedFields = ['id','category','male_count','female_count','year'];

    public function getByYear(int $year): array
    {
        return $this->where('year',$year)->findAll();
    }
}
