<?php

namespace App\Http\Controllers\CountryAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CountryTransactionController extends Controller
{
    public function index()
    {
        return view('countryAdmin.transaction-report.transaction');
    }
}
