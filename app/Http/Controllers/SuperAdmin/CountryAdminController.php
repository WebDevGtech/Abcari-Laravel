<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CountryAdminController extends Controller
{
    public function countryadmin(){
        return view('superAdmin.admin.country-admin');
    }
}
