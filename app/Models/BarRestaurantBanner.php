<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarRestaurantBanner extends Model
{
    use HasFactory;
    public $table="bar_restaurant_banners";

    public function category()
    {
        return $this->hasOne(Category::class,'id','category_id');
    }

}
