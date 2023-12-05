<?php

namespace App\Http\Controllers\CountryAdmin;

use App\Http\Controllers\Controller;

class DashBoardController extends Controller
{

    public function index()
    {
        return view('countryAdmin/dashboard');
    }
}
