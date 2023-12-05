<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    use HasFactory;
    public $table="categories";

    public $fillable=['name','arabic_name','image','status'];
    public function banner()
    {
        return $this->hasMany(GeneralBanner::class,'category_id','id');
    }

}
