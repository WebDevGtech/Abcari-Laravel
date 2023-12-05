<?php

namespace App\Http\Controllers\BarAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    //
    public function appcontrol()
    {
        return view('barAdmin.app-control');
    }
    public function appsetting()
    {
        return view('barAdmin.app-setting');
    }
    public function paymentgateway()
    {
        return view('barAdmin.payment-gateway');
    }
    public function taxtype()
    {
        return view('barAdmin.tax-type');
    }
    public function pushnotification()
    {
        return view('barAdmin.push-notification');
    }
}
