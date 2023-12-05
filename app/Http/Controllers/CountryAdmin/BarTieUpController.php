<?php

namespace App\Http\Controllers\CountryAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BarTieUpController extends Controller
{
    public function bartieup(){
        return view('countryAdmin/BarSettings/BarTieUp');
    }
}
