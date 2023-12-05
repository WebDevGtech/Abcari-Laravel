<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    public $table='products';
    public function subcategory()
    {
        return $this->hasOne(SubCategory::class,'id','sub_category_id');
    }
    public function productvariations()
    {
        return $this->hasMany(ProductVariation::class,'product_id','id');
    }
    public function tax()
    {
        return $this->belongsTo(TaxType::class,'tax_id','id');

    }
    public function category()
    {
        return $this->hasOne(Category::class,'id','category_id');
    }
    public function service()
    {
        return $this->hasOne(BarService::class,'id','service_id');
    }

}
