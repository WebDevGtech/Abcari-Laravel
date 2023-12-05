<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarRestaurantRule extends Model
{
    use HasFactory;
    public $table="bar_restaurant_rules";


    public function rule()
    {
        return $this->hasOne(Rule::class,'id','rule_id');
        
    }

}
