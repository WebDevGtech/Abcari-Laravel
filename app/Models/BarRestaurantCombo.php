<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarRestaurantCombo extends Model
{
    use HasFactory;
    public $table="bar_combos";
    // public $casts=['sub_category_id'=>'array'];

    public function category()
    {
        return $this->hasOne(Category::class,'id','category_id');
    }
    public function categorys()
    {
        return $this->hasOne(Category::class,'id','category_1_id');
    }
    public function product()
    {
        return $this->hasOne(Product::class,'id','product_id');
    }
    public function products()
    {
        return $this->hasOne(Product::class,'id','product_1_id');
    }
}
