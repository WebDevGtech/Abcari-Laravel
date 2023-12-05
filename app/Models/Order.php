<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    public $table="orders";
    public function user()
    {
        return $this->hasOne(Category::class,'id','user_id ');
    }
    public function username()
    {
        return $this->hasOne(user::class,'id','user_id');
    }
    public function orderitems()
    {
        return $this->hasOne(OrderItem::class,'order_id','id');
    }
}
