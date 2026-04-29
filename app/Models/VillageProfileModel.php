<?php

namespace App\Models;

use CodeIgniter\Model;

class VillageProfileModel extends Model
{
    protected $table = 'village_profiles';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = false;
    protected $returnType = 'array';
    protected $allowedFields = [
        'id','name','motto','description','history','vision','mission',
        'area_size','population','family_count','hamlets','district','regency',
        'province','phone','email','address','postal_code','latitude','longitude',
        'logo_url','hero_image','service_hours'
    ];

    public function getProfile(): ?array
    {
        return $this->first();
    }
}
