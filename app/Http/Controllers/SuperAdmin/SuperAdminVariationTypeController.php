<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SuperAdminVariationTypeController extends Controller
{
    public function addvariationtype(){
        return view('superAdmin.Product.VariationType');
    }
}
