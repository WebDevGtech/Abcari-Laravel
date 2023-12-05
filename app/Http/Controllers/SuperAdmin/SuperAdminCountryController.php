<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SuperAdminCountryController extends Controller
{
    public function country(){
        return view('superAdmin.Places.Country');
    }
}
