<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LiquorReportController extends Controller
{
    public function index()
    {
        return view('superAdmin.report.liquor');
    }
}
