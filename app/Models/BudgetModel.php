<?php

namespace App\Models;

use CodeIgniter\Model;

class BudgetModel extends Model
{
    protected $table = 'budgets';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = false;
    protected $returnType = 'array';
    protected $allowedFields = ['id','year','category','amount','type','description'];

    public function getByYear(int $year): array
    {
        return $this->where('year',$year)->orderBy('type','ASC')->orderBy('amount','DESC')->findAll();
    }

    public function getYears(): array
    {
        return $this->select('year')->distinct()->orderBy('year','DESC')->findAll();
    }

    public function getTotalByType(int $year, string $type): float
    {
        $row = $this->where('year',$year)->where('type',$type)->selectSum('amount')->first();
        return (float)($row['amount'] ?? 0);
    }
}
