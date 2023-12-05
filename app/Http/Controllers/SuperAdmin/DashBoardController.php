<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;

class DashBoardController extends Controller
{

    public function index()
    {
        return view('superAdmin/dashboard');
    }
}
