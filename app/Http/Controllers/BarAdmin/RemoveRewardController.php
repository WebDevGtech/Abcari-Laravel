<?php

namespace App\Http\Controllers\BarAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RemoveRewardController extends Controller
{
    //
    public function removereward()
    {
        return view('barAdmin.remove-reward');
    }
}
