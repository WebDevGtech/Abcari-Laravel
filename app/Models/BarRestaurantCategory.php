<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BarRestaurantCategory extends Model
{
    use HasFactory,SoftDeletes;
    public $table="bar_restaurant_category";



}
