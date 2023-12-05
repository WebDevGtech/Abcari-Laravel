<?php

namespace App\Http\Controllers\CountryAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PaymentGatewayController extends Controller
{
    public function paymentgateway(){
        return view('countryAdmin.Settings.PaymentGateway');
    }
}
