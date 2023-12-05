<?php

namespace App\Http\Controllers\CountryAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AddBaradminController extends Controller
{
    public function addbaradmin(){
         return view('countryAdmin/BarAdmins/AddBarAdmin');
    }
}
