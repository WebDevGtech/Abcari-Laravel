<?php

namespace App\Http\Controllers\CountryAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CountryRewardController extends Controller
{
    public function index()
    {
        return view('countryAdmin.transaction-report.reward-transaction');
    }
}
