<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    public $table='cities';

    public function country(){
        return $this->belongsTo(Countries::class,'country_id','id');
    }

    public function zone(){
        return $this->belongsTo(Zone::class,'zone_id','id');
    }

}
