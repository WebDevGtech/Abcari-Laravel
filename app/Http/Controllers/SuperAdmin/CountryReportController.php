<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CountryReportController extends Controller
{
    public function index()
    {
        return view('superAdmin.report.country');
    }
}
