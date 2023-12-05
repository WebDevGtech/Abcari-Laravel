<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductSubCategory extends Model
{
    use HasFactory;

  public $table="sub_categories";

  public $fillable=['name','image','status','category_id'];

public  function category(){
  return $this->belongsTo(ProductCategory::class,'category_id','id');
}


}
