<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarCategory extends Model
{
    use HasFactory;

   public $fillable=['name','image','status'];

    public $table='bar_category';

    

    public function barcategory()
{
    return $this->hasOne(BarRestaurantCategory::class,'bar_category_id','id');
}

}
