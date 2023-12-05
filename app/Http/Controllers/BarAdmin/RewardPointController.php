<?php

namespace App\Http\Controllers\BarAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RewardPointController extends Controller
{
    //
    public function rewardtransaction()
    {
        return view('barAdmin.reward-transaction');
    }
}
