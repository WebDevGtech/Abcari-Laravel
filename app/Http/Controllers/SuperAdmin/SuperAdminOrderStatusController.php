<?php

namespace App\Http\Controllers\superadmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SuperAdminOrderStatusController extends Controller
{
    public function orderstatus(){
        return view('superAdmin.settings.OrderStatus');
    }
}
