<?php

namespace App\Http\Controllers\CountryAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CountryLiquorReportController extends Controller
{
    public function index()
{
    return view('countryAdmin.Report.liquor');
}
}
