<?php

namespace App\Http\Controllers\CountryAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CountryBarReportController extends Controller
{
public function index()
{
    return view('countryAdmin.Report.bar');
}
}
