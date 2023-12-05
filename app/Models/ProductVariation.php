<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductVariation extends Model
{
    use HasFactory;
    use SoftDeletes;
    public $table='product_variations';
    protected $dates = ['deleted_at'];

    public $fillable=['product_id','variation_type_id','name','value','status'];

    public function product(){
        return $this->belongsTo(Product::class,'product_id','id');
    }

    public function variation(){
        return $this->belongsTo(VariationType::class,'variation_type_id','id');
    }




}
