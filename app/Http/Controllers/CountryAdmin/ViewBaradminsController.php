<?php

namespace App\Http\Controllers\CountryAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ViewBaradminsController extends Controller
{
    public function viewbaradmin(){
        return view('countryAdmin.BarAdmins.ToViewBarAdmins');
    }
}
