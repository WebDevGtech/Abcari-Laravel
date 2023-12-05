<?php

namespace App\Http\Controllers\superadmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SuperAdminPaymentGatewayController extends Controller
{
    public function paymentgateway(){
        return view('superAdmin.settings.PaymentGateway');
    }
}
