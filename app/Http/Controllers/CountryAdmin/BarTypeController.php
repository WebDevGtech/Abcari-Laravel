<?php

namespace App\Http\Controllers\CountryAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BarTypeController extends Controller
{
    public function bartype(){
        return view('countryAdmin/BarSettings/BarType');
    }
}
