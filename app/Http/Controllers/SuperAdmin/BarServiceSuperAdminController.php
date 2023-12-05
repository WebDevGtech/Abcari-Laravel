<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BarServiceSuperAdminController extends Controller
{
    public function service(){
        return view('superAdmin.BarSettings.BarService');
    }
}
