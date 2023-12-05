<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;
    public $table="order_item";

    public function order(){
        return $this->hasOne(Order::class,'id','order_id');
    }

    public function productName(){
        return $this->hasOne(Product::class,'id','product_id');
    }
     public function productvariations()
    {
        return $this->hasOne(ProductVariation::class,'id','product_variation_id');
    }
    public function waiterId(){
        return $this->belongsTo(Order::class,'order_id','id');
    }
    public function waiterTableDetails(){
        return $this->belongsTo(WaiterDetail::class,'bar_waiter_detail_id','id');
    }
}
