<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SuperAdminCityController extends Controller
{
    public function addcity(){
        return view('superAdmin.Places.City');
    }
}
