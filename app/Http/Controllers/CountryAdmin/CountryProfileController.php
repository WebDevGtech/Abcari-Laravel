<?php

namespace App\Http\Controllers\CountryAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CountryProfileController extends Controller
{
public function index()
{
    return view('countryAdmin.country-profile.country-profile');
}
}
