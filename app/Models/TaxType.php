<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaxType extends Model
{
    use HasFactory;
    public $table="tax_types";
 
    public function country()
    {
        return $this->hasOne(Country::class,'id','country_id');
    }
    public function zone()
    {
        return $this->hasOne(Zone::class,'id','zone_id');
    }
    public function city()
    {
        return $this->hasOne(City::class,'id','city_id');
    }
    public function postcode()
    {
        return $this->hasOne(PostCode::class,'id','postcode_id');
    }

}
