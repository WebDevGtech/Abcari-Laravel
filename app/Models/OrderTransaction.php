<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderTransaction extends Model
{
    use HasFactory;
    public $table="order_transactions";

    public function bar(){
        return $this->belongsTo(BarRestaurant::class,'bar_restaurant_id','id');
   
   }
}
