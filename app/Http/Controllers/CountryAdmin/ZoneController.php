<?php

namespace App\Http\Controllers\CountryAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ZoneController extends Controller
{
    public function zone(){
        return view('countryAdmin.Places.Zone');
    }
}
