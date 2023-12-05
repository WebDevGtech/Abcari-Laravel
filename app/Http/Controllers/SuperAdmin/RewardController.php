<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RewardController extends Controller
{
public function index()
{
    return view('superAdmin.transaction-report.reward-transaction');
}
}
