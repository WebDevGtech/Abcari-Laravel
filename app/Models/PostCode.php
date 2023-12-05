<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostCode extends Model
{
    use HasFactory;

    public $table="postcodes";

    public $fillable=['country_id','state_id','city_id','pincode','status'];

   public function country(){
    return $this->belongsTo(Countries::class,'country_id','id');
}

public function zone(){
    return $this->belongsTo(Zone::class,'zone_id','id');
}

public function city(){
    return $this->belongsTo(City::class,'city_id','id');
}
}
