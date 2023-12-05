<?php

namespace App\Http\Controllers\CountryAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CountryFoodReportController extends Controller
{
    public function index()
    {
        return view('countryAdmin.Report.food');
    }
}
