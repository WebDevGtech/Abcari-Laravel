<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderInvoice extends Model
{
    use HasFactory;
    public $table="order_invoices";
    public function user()
    {
        return $this->hasOne(Category::class,'id','user_id ');
    }
    public function username()
    {    
        return $this->hasOne(User::class,'id','customer_id');
        
    }
    public function order()
    {
        return $this->hasOne(Order::class,'id','order_id');
    }
    public function orderInvoice()
    {
        return $this->hasOne(OrderInvoice::class,'order_id','order_id');
    }
    public function orderTransaction()
    {
        return $this->hasOne(OrderTransaction::class,'id','order_transaction_id');
    }
    public function productName()
    {
        return $this->hasOne(Product::class,'id','product_id');
    }
}












