<?php

namespace App\Http\Controllers\CountryAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrderManagementController extends Controller
{
     public function ordermanagement(){
        return view('countryAdmin.Settings.OrderStatus');
    }
}
