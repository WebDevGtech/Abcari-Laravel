<?php

namespace App\Http\Controllers\CountryAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BarServiceController extends Controller
{
    public function barservice(){
        return view('countryAdmin/BarSettings/BarService');
    }
}
