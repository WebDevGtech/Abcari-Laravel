<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GeneralBanner extends Model
{
    use HasFactory;
    public $table="general_banners";

    public function category()
    {
        return $this->hasOne(Category::class,'id','category_id');
    }

}
