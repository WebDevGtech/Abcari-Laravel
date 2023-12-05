<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarOffer extends Model
{
    use HasFactory;
    public $table="bar_offers";
    
    public function category()
    {
        return $this->hasOne(Category::class,'id','category_id');
    }
   
public function barrestaurant(){
    return $this->hasOne(BarRestaurant::class,'id','bar_restaurant_id');

}

   
}
