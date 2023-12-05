<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarService extends Model
{
    use HasFactory;

    public $table='bar_services';
    public $fillable=['name','image','status'];
    public function servicetax()
    {
        return $this->hasOne(BarServiceTaxType::class,'bar_service_id','id');
    }

    public function barservice()
    {
        return $this->hasOne(BarRestaurantCategory::class,'bar_service_id','id');
    }
}
