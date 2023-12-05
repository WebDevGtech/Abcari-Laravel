<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarPaymentGateway extends Model
{
    use HasFactory;
    public $table='bar_payment_gateways';
    public function paymentgateway()
    {
        return $this->hasOne(PaymentGateway::class,'id','payment_gateway_id');
    }
}
