<?php

namespace App\Http\Controllers\BarAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BarProfileController extends Controller
{
    //
    public function barprofile()
    {
        return view('barAdmin.bar-profile');
    } 
}
